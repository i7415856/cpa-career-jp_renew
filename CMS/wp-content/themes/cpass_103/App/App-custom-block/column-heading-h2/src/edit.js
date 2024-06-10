/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';



// import { useState } from '@wordpress/element';
import { RichText } from '@wordpress/block-editor';
import { useDispatch } from '@wordpress/data';


// Edit component
const Edit = (props) => {
	const { attributes: { content }, clientId, setAttributes } = props;
	const { removeBlock } = useDispatch('core/block-editor');
	const blockProps = useBlockProps();
	const onChangeContent = (newContent) => {
		setAttributes({ content: newContent });
	};


	const onKeyDown = (event) => {
		// コンテンツが空でバックスペースが押された場合、ブロックを削除
		if (content === '' && event.keyCode === 8) {
			removeBlock(clientId);
		}
	};



	return (
		<RichText
			tagName="h2" // The tag here could be "h2", "h3", etc.
			value={content}
			className="columnHeading2 wp-block"
			onChange={onChangeContent}
			onKeyDown={onKeyDown}
			placeholder="ここに見出しを入力..."
		/>
	);
}

export default Edit;
