<?php

function column_item($post) {
?>
	<a href="<?php echo esc_url(get_permalink($post)); ?>" class="column__item" data-height="item__height">
		<figure class="item__img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post)); ?>" alt="<?php echo get_the_title($post) ?>"></figure>

		<div class="item__cnt">
			<div class="cnt__head">
				<?php
				$cats = get_the_terms($post, 'category');

				$param = vanilla_sanitize_array($_GET);
				if ($param && isset($param['term']) && count($cats) > 1) {
					$cats = array_filter($cats, fn($cat) => $cat->slug === $param['term']);
					$cats = array_values($cats); // 配列のキーをリセット
				}
				if ($cats) { ?>
					<p class="cnt__tag"><?php echo $cats[0]->name ?></p>
				<?php } ?>
				<p class="cnt__date"><?php echo get_the_date('Y.m.d', $post); ?></p>
			</div>
			<p class="cnt__txt"><?php echo get_the_title($post) ?></p>
		</div>
	</a>
<?php
}
