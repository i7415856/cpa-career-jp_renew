<?php

function consultant_item($post) {
?>
	<a href="<?php echo esc_url(get_permalink($post)); ?>" class="consultantItem">
		<figure class="item__img">
			<?php if (get_field('single_consultant_profile_thumbnail', $post->ID)) { ?>
				<img src="<?php echo get_field('single_consultant_profile_thumbnail', $post->ID) ?>" alt="中園 隼人">
			<?php } ?>
		</figure>

		<div class="item__cnt">
			<div class="cnt__ttl"><span class="cnt__ttlText"><?php echo get_field('single_consultant_profile_phrase', $post->ID) ?></span></div>
			<p class="cnt__position"><?php echo get_field('single_consultant_profile_position', $post->ID) ?></p>
			<p class="cnt__name -jp"><?php echo get_field('single_consultant_profile_name_ja', $post->ID) ?></p>
			<p class="cnt__name -en"><?php echo get_field('single_consultant_profile_name_en', $post->ID) ?></p>

			<?php if (have_rows('single_consultant_profile_expert_area', $post->ID)) { ?>
				<p class="cnt__specialty">得意分野</p>
				<ul class="cnt__lst">
					<?php while (have_rows('single_consultant_profile_expert_area', $post->ID)) {
						the_row(); ?>
						<li><?php the_sub_field('single_consultant_profile_expert_area_text', $post->ID); ?></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</a>
<?php
}
