<?php

function faq_item($post, $class = '') {
?>
	<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="faqItem">
		<?php
		$terms = get_the_terms($post, 'faq_category');
		if ($terms) { ?>
			<div class="faqItem__cats">
				<?php foreach ($terms as $term) {
				?>
					<span class="faqItem__cat">
						<?php echo $term->name ?>
					</span>
				<?php } ?>
			</div>
		<?php } ?>

		<p class="faqItem__title">
			<?php echo get_the_title($post->ID) ?>
		</p>
	</a>
<?php
}
