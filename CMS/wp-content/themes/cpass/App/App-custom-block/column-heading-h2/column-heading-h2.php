<?php
/**
 * Plugin Name:       Example Dynamic
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       column-heading-h2
 *
 * @package           column-heading-h2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function column_heading_column_heading_block_init() {
	register_block_type_from_metadata(
		__DIR__ . '/build',
		array(
			'render_callback' => 'render_vanilla_column_heading_block',
		)
	);
}
add_action( 'init', 'column_heading_column_heading_block_init' );
