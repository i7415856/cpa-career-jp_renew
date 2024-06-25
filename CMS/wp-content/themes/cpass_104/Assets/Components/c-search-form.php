<?php

$param = vanilla_sanitize_array($_GET);
$keyword = @$param['keyword'];
$search_page = get_page_by_path('search');
?>
<form class="search_form" id="searchForm" action="<?php echo home_url("/search/"); ?>">
	<input type="text" name="keyword" id="searchKeyword" value="<?php echo $keyword ?>" placeholder="フリーワードで探す">


	<div class="custom_select">
		<select class="js-selectbox form-control" id="popularKeywords">
			<option value="人気キーワード">人気キーワード</option>
			<?php if ($search_page && have_rows('search_keywords', $search_page->ID)) { ?>
				<?php while (have_rows('search_keywords', $search_page->ID)) {
					the_row(); ?>
					<?php if (get_sub_field('search_keyword', $search_page->ID)) { ?>
						<option value="<?php echo get_sub_field('search_keyword', $search_page->ID) ?>"><?php echo get_sub_field('search_keyword', $search_page->ID) ?></option>
					<?php } ?>
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
