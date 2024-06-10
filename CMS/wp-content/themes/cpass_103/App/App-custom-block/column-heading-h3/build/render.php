<?php
// render.php
function render_vanilla_column_heading_block($attributes, $content) {
		if ( ! $content ) {
			return $content;
		}

    // get_block_wrapper_attributes() でブロックのラッパー属性を取得し、利用する
    return sprintf(
        '<h3 %1$s>%2$s</h3>',
        get_block_wrapper_attributes(),
        esc_html($content)
    );
}
