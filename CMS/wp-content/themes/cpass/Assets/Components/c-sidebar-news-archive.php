<?php
$param = vanilla_sanitize_array($_GET);

$all_active_class = (!isset($param['archive'])) ? '-active' : '';
$years = vanilla_get_news_yearly_archive();
?>
<aside class="block__side">
	<p class="side__ttl">アーカイブ</p>
	<ul class="side__lst">
		<li class="lst__item">
			<a href="<?php echo home_url("/news/"); ?>" class="<?php echo $all_active_class ?>">ALL</a>
		</li>
		<?php


		foreach ($years as $year) {
			$archive_active_class = ($param && isset($param['archive']) && $param['archive'] === $year) ? '-active' : '';
			$archive_url = (is_single()) ? home_url("/news?archive={$year}") : "?archive={$year}" ;
		?>
			<li class="lst__item">
				<a href="<?php echo $archive_url ?>" class="<?php echo $archive_active_class ?>"><?php echo $year ?></a>
			</li>
		<?php } ?>
	</ul>
</aside>
