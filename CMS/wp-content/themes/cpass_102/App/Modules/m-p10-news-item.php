<?php

function news_item($post, $class = '') {
?>
	<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="newsItem <?php echo $class ?>">

		<div class="newsItem__head">
			<p class="newsItem__date"><?php echo get_the_date('Y.m.d'); ?></p>
			<?php
			$terms = get_the_terms($post, 'news_category');
			if ($terms) { ?>
				<div class="newsItem__cats">
					<?php foreach ($terms as $term) { ?>
						<span class="newsItem__cat <?php echo "-{$term->slug}" ?>">
							<?php echo $term->name ?>
						</span>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<p class="newsItem__title">
			<?php echo get_the_title($post->ID) ?>
		</p>
	</a>
<?php
}
