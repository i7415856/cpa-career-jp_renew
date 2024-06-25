<?php


function tax_sidebar($taxonomy, $args = []) {
	global $post;
	$param = vanilla_sanitize_array($_GET);

	$all_active_class = (!is_single() && !isset($param['term'])) ? '-active' : '';
	$archive_page_name = vanilla_get_archive_page_name();
	$terms = get_terms($taxonomy, $args);
	if ($terms && count($terms) >= 1) {
?>
		<aside class="block__side">
			<p class="side__ttl">カテゴリ</p>

			<ul class="side__lst">

				<li class="lst__item">
					<a href="<?php echo home_url("/{$archive_page_name}/"); ?>" class="<?php echo $all_active_class ?>">ALL</a>
				</li>

				<?php
				foreach ($terms as $term) {
					if (is_single()) {
						$terms = get_the_terms($post, "$taxonomy");
						$archive_url =  home_url("/{$archive_page_name}/?term={$term->slug}");
						if ($terms) {
							$term_slugs = array_column($terms, 'slug');
							$term_active_class = in_array($term->slug, $term_slugs) ? '-active' : '';
						}
					} else {
						$term_active_class = $param && isset($param['term']) && $param['term'] === $term->slug ? '-active' : '';
						$archive_url = "?term={$term->slug}";
					}
				?>
					<li class="lst__item">
						<a href="<?php echo $archive_url ?>" class="<?php echo $term_active_class ?>">
							<?php echo $term->name ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</aside>
	<?php } ?>

<?php
}
