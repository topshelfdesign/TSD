<?php
/**
 * DEFAULT TEMPLATE
 *
 * This is the global default template. If WordPress can't find a more appropriate, specific template file,
 * it will use this one.
 */
\NV\Theme::get_header();
\NV\Theme::output_file_marker( __FILE__ );
?>
	<div id='wrap'>
		<div id='main'>
			<?php get_template_part( "parts/interior", "site-header" ); ?>
			<div id="main-content" class="interior sub">
				<?php
				$content = new page_content( get_the_ID() );
				$content->print_html();
				?>
			</div>
		</div>
	</div>
<?php
\NV\Theme::get_footer();
