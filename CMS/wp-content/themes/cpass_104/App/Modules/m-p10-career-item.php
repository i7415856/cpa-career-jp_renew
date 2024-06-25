<?php

function career_item($post, $class = '') {
?>

	<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="career__item <?php echo $class ?>">
		<div class="item__inr">
			<div class="item__head">

				<figure class="head__icon">
					<img src="<?php echo get_template_directory_uri() . '/Image/case/' . get_field('single_case_list_icon', $post->ID) . '.png' ?>" alt="<?php echo get_field('single_case_list_age', $post->ID) . get_field('single_case_list_gender', $post->ID) ?>">
				</figure>

				<div class="head__ttl"><?php echo get_field('single_case_list_copy', $post->ID) ?></div>
			</div>
			<div class="item__cnt">
				<div class="item__infor">
					<div class="infor__left">
						<?php echo get_field('single_case_profile_prev_industry', $post->ID) ?>
						<span>年収<span class="-num"><?php echo num(get_field('single_case_profile_prev_income', $post->ID)) ?></span>万円</span>
					</div>
					<div class="infor__right">
						<?php echo get_field('single_case_profile_current_industry', $post->ID) ?>
						<span>年収<span class="-num"><?php echo num(get_field('single_case_profile_current_income', $post->ID)) ?></span>万円</span>
					</div>
				</div>
				<p class="item__txt"><?php echo get_field('single_case_list_phrase', $post->ID) ?></p>
			</div>
		</div>
	</a>
<?php
}
