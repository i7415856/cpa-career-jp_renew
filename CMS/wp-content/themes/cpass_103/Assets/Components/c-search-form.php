<?php $param = vanilla_sanitize_array($_GET);
$keyword = @$param['keyword']; ?>
<form class="search_form" id="searchForm" action="<?php echo home_url("/search/"); ?>">
	<input type="text" name="keyword" id="searchKeyword" value="<?php echo $keyword ?>" placeholder="フリーワードで探す">

	<div class="custom_select">
		<select class="js-selectbox form-control" name="popular_keywords" id="popularKeywords">
			<option value="人気キーワード">人気キーワード</option>
			<?php
			$popular_keywords = vanilla_fetch_popular_keywords();
			foreach ($popular_keywords as $popular_keyword) { ?>
				<?php if (isset($popular_keyword['word'])) { ?>
					<option value="<?php echo $popular_keyword['word'] ?>"><?php echo $popular_keyword['word'] ?></option>
				<?php } ?>
			<?php } ?>
		</select>
	</div>

	<button type="submit" id="searchKeywordSubmit"><span>検索</span></button>
</form>

<script>
	//= 検索キーワードを保存するためのajax ====
	document.addEventListener('DOMContentLoaded', function() {
		const form = document.getElementById('searchForm');
		form.addEventListener('submit', function(event) {
			const keyword = document.getElementById('searchKeyword').value;

			fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
					method: 'POST',
					credentials: 'same-origin',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'action=vanilla_save_search_keyword&keyword=' + encodeURIComponent(keyword)
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						console.log('Keyword saved: ', keyword);
					} else {
						console.log('Error: ', data.message);
					}
				});
		});
	});

	$(function() {
		//= セレクトボックスをクリックしたらその単語がtext inputに反映 ====
		$('.options li').click(function() {
			let value = $(this).text()
			$('#searchKeyword').val(value)
		})
	});
</script>
