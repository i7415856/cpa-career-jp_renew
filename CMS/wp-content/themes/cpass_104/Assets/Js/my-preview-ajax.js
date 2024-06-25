jQuery(document).ready(function () {

	/** --------------------------------
	* 管理画面の投稿編集画面のrepeater fieldのinputのidから実際に保存されるmeta_keyに変換する関数
	*
	* @param string input_id
	* @return string meta_key
	*/
	function get_repeater_sub_field_meta_key_by_input_id(input_id = false) {
		if (!input_id) {
			return;
		}

		let meta_key = input_id

		//= 「acf-」を削除 ====
		meta_key = input_id.replace(/acf-/g, '');
		//= 「-」を「_」に置換 ====
		meta_key = meta_key.replace(/-/g, '_');
		return meta_key
	}

	/** --------------------------------
	* 管理画面の投稿編集画面のrepeater fieldを含む全てのfieldのキーとバリューをオブジェクトで取得する関数
	*
	* @param object field カスタムフィールドのオブジェクト
	* @param object acf_data 出力結果
	* @return object acf_data 出力結果
	*/
	function handle_preview_acf_field(field, acf_data) {
		//= 変数定義 ====
		let field_type = field.data.type
		let meta_key = field.data.key
		let meta_value = field.val()


		//---------------------
		// フィールドタイプごとに違う処理
		//---------------------
		if (field_type === 'repeater') {
			//= repeater fieldを定義 ====
			let repeater_field = acf.getField(field.data.key)
			//= repeater fieldのrowの数を算出 ====
			let repeater_field_count = repeater_field.getValue()
			//= repeater field自体の値をacf_dataに格納 ====
			acf_data[repeater_field.data.key] = repeater_field_count

			//= sub_fieldsを定義 ====
			let sub_fields = acf.getFields({ parent: repeater_field.$el.closest('.acf-field-repeater') });
			sub_fields.forEach(sub_field => { // loop
				//= sub_fieldのinputのelement ====
				let sub_field_input_el = sub_field.$el.find('.acf-input-wrap > *')
				//= sub_fieldのinputのelementのid ====
				let sub_field_input_id = sub_field_input_el.attr('id')
				//= sub_fieldのinputのelementのidからmeta_keyに変換 ====
				meta_key = get_repeater_sub_field_meta_key_by_input_id(sub_field_input_id)
				//= sub_fieldのinputのvalueを取得 ====
				meta_value = sub_field.val()

				//= 再帰的な処理を実行 ====
				handle_preview_acf_field(sub_field, acf_data);

				//= 値をacf_dataに格納 ====
				if (meta_value) {
					acf_data[meta_key] = meta_value
					acf_data["_" + meta_key] = sub_field.data.key
				}
			});
		}

		//= 値をacf_dataに格納 ====
		if (meta_value) {
			acf_data[meta_key] = meta_value
		}

		return acf_data
	}



	/** --------------------------------
	* 管理画面の投稿編集画面でカスタムフィールドの値をプレビューで編集するために
	* ページロード時とフィールドの値が変更された時にajax通信でその時点での全フィールドのkeyとvalueをオブジェクトで送信する
	* （以下php側の処理なのでこのファイルには記述がありません）
	* php側では、受け取ったオブジェクトを$wpdbを使用してsql文でプレビュー投稿のメタデータに保存する
	*
	*/
	//---------------------
	// acfでない値は含まない
	//---------------------
	if (typeof acf !== 'undefined') {
		//= 全てのacfのフィールドを取得 ====
		let fields = acf.getFields();

		//= 痩身用のオブジェクトを定義 ====
		let acf_data = {}
		//= 送信する値 ====
		let submit_data = {
			action: 'vanilla_handle_acf_changes_in_admin',
			post_id: jQuery('#post_ID').val(),
			nonce: myPreviewAjax.nonce,
			acf_data: acf_data
		};

		fields.forEach(field => { // ループ開始
			//= acf_dataを定義 ====
			acf_data = handle_preview_acf_field(field, acf_data)

			//= フィールドの入力に変更がある場合はacf_dataを更新====
			field.on('change', function (e) {
				//= acf_dataを再定義 ====
				acf_data = handle_preview_acf_field(field, acf_data)
				//= submit_data更新 ====
				submit_data[acf_data] = acf_data

				//= ajaxで送信 ====
				jQuery.post(myPreviewAjax.ajax_url, submit_data, function (response) {
					//= 結果をconsoleに表示 ====
					console.log(response);
				});
			});
		});

		//= ajaxで送信 ====
		jQuery.post(myPreviewAjax.ajax_url, submit_data, function (response) {
			//= 結果をconsoleに表示 ====
			console.log(response);
		});
	}
});
