<?php

function column_item($post) {
?>
	<a href="<?php echo esc_url(get_permalink($post)); ?>" class="column__item" data-height="item__height">
		<figure class="item__img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post)); ?>" alt=""></figure>

		<div class="item__cnt">
			<div class="cnt__head">
				<?php
				$cats = get_the_terms($post, 'category');
				if ($cats) { ?>
					<p class="cnt__tag"><?php echo $cats[0]->name ?></p>
				<?php } ?>
				<p class="cnt__date"><?php echo get_the_date('Y.m.d', $post); ?>
			</div>
			<p class="cnt__txt"><?php echo get_the_title($post) ?></p>
		</div>
	</a>
<?php
}
