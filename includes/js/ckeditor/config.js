/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.indentClasses = ["ul-grey", "ul-red", "text-red", "ul-content-red", "circle", "style-none", "decimal", "paragraph-portfolio-top", "ul-portfolio-top", "url-portfolio-top", "text-grey"];
    config.protectedSource.push(/<(style)[^>]*>.*<\/style>/ig);
    config.protectedSource.push(/<(script)[^>]*>.*<\/script>/ig);// ��������� ���� <script>
    config.protectedSource.push(/<(i)[^>]*>.*<\/i>/ig);// ��������� ���� <i>
    config.protectedSource.push(/<\?[\s\S]*?\?>/g);// ��������� php-���
    config.protectedSource.push(/<!--dev-->[\s\S]*<!--\/dev-->/g);
    config.allowedContent = true; /* all tags */
};
