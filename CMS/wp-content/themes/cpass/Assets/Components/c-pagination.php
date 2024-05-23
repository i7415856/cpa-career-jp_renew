<?php $pagination_array =  paginate_links(array(
	// 'format' => 'page/%#%/',
	'format' => '?paged=%#%',
	'current' => max(1, vanilla_paged()),
	'total' => $WP_post->max_num_pages,
	'type' => 'array',
	'mid_size' => '1',
	'prev_text' => '← 前へ',
	'next_text' => '次へ →',
));
wp_reset_postdata();

if (!empty($pagination_array)) {
?>
	<ul class="sec__pagination">
		<?php
		//= 1ページ目の時にもPREVを表示 ====
		if (vanilla_paged() === 1) { ?>
			<li class="pagination__item">
				<span class="prev page-numbers -disabled">← 前へ</span>
			</li>
		<?php } ?>

		<?php foreach ($pagination_array as $pagination) { ?>
			<li class="pagination__item"><?php echo $pagination ?></li>
		<?php } ?>

		<?php
		//= 最後のページの時にもNEXTを表示 ====
		if (vanilla_paged() === (int) $WP_post->max_num_pages) { ?>
			<li class="pagination__item">
				<span class="next page-numbers -disabled">次へ →</span>
			</li>
		<?php } ?>
	</ul>
<?php } ?>
