/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// This file contains style definitions that can be used by CKEditor plugins.
//
// The most common use for it is the "stylescombo" plugin, which shows a combo
// in the editor toolbar, containing all styles. Other plugins instead, like
// the div plugin, use a subset of the styles on their feature.
//
// If you don't have plugins that depend on this file, you can simply ignore it.
// Otherwise it is strongly recommended to customize this file to match your
// website requirements and design properly.

CKEDITOR.stylesSet.add( 'default', [
	/* Block Styles */

	// These styles are already available in the "Format" combo ("format" plugin),
	// so they are not needed here by default. You may enable them to avoid
	// placing the "Format" combo in the toolbar, maintaining the same features.
	/*
	{ name: 'Paragraph',		element: 'p' },
	{ name: 'Heading 1',		element: 'h1' },
	{ name: 'Heading 2',		element: 'h2' },
	{ name: 'Heading 3',		element: 'h3' },
	{ name: 'Heading 4',		element: 'h4' },
	{ name: 'Heading 5',		element: 'h5' },
	{ name: 'Heading 6',		element: 'h6' },
	{ name: 'Preformatted Text',element: 'pre' },
	{ name: 'Address',			element: 'address' },
	*/

	{ name: 'Параграф',		element: 'p'},

	{ name: 'Заголовок 1ч',		element: 'h1', attributes: { 'class': 's' } },
	{ name: 'Заголовок 1с',		element: 'h1' },

	{ name: 'Заголовок 2ч',		element: 'h2', attributes: { 'class': 's' } },
	{ name: 'Заголовок 2с',		element: 'h2' },

	{ name: 'Заголовок 3ч',		element: 'h3', attributes: { 'class': 's' } },
	{ name: 'Заголовок 3с',		element: 'h3' },

	{ name: 'Заголовок 4ч',		element: 'h4', attributes: { 'class': 's' } },
	{ name: 'Заголовок 4с',		element: 'h4' },

	{ name: 'Заголовок 5ч',		element: 'h5', attributes: { 'class': 's' } },
	{ name: 'Заголовок 5с',		element: 'h5' },

	{ name: 'Параграф без отступа',		element: 'div' },
	{ name: 'Блок с желтым фоном',		element: 'div', attributes: { 'class': 'quote' } },
	{ name: 'Содержание',		element: 'address' },
	{ name: 'Подпись к файлу',		element: 'div', attributes: { 'class': 'subttl' } },
	{ name: 'Цитата',		element: 'div', attributes: { 'class': 'blockquote' } },
	{ name: 'Блок в рамке (малиновый)',		element: 'div', attributes: { 'class': 'N6' } },
	{ name: 'Блок в рамке (желтый)',		element: 'div', attributes: { 'class': 'G6' } },
	{ name: 'Блок в рамке (голубой)',		element: 'div', attributes: { 'class': 'H6' } },



	/* Inline Styles */

	// These are core styles available as toolbar buttons. You may opt enabling
	// some of them in the Styles combo, removing them from the toolbar.
	// (This requires the "stylescombo" plugin)
	/*
	{ name: 'Strong',			element: 'strong', overrides: 'b' },
	{ name: 'Emphasis',			element: 'em'	, overrides: 'i' },
	{ name: 'Underline',		element: 'u' },
	{ name: 'Strikethrough',	element: 'strike' },
	{ name: 'Subscript',		element: 'sub' },
	{ name: 'Superscript',		element: 'sup' },
	*/

	{ name: 'Маркер',			element: 'span', attributes: { 'class': 'marker' } },


	/* Object Styles */

	{
		name: 'Styled image (left)',
		element: 'img',
		attributes: { 'class': 'left' }
	}

]);

// %LEAVE_UNMINIFIED% %REMOVE_LINE%
