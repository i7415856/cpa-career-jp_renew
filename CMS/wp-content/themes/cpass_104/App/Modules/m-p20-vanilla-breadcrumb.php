<?php
function vanilla_breadcrumb($breadcrumb_array) {
?>
	<div class="breadcrumb">
		<ul class="breadcrumb__list">
			<li class="breadcrumb__item">
				<a href="<?php echo home_url(); ?>" class="breadcrumb__link">トップ</a>
			</li>

			<?php
			foreach ($breadcrumb_array as $array) { ?>
				<li class="breadcrumb__item">
					<a href="<?php echo esc_attr($array['href']); ?>" class="breadcrumb__link">
						<?= esc_html($array['text']) ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php
}
