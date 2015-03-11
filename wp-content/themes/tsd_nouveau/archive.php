<?php
/**
 * DEFAULT ARCHIVE TEMPLATE
 *
 * This is the default template for archive pages (pages that show multiple posts).
 */
\NV\Theme::get_header();
\NV\Theme::output_file_marker(__FILE__);
?>

<div id='wrap'>
	<div id='main'>
		<?php get_template_part("parts/interior", "site-header"); ?>
		<div id="main-content" class="interior sub">
			<?php \NV\Theme::archive_nav(array('id' => 'nav-top')) ?>
			<?php \NV\Theme::loop('parts/article', 'parts/article-empty') ?>
			<?php \NV\Theme::archive_nav(array('id' => 'nav-bottom')) ?>
		</div>
	</div>
</div>

<?php
\NV\Theme::get_footer();
