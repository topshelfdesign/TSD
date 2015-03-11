<?php
/**
 * SINGLE PORTFOLIO PAGE
 *
 * This is the template for single, full-page blog posts.
 */
\NV\Theme::get_header();
\NV\Theme::output_file_marker(__FILE__);
?>
  <div id='wrap'>
    <div id='main'>
      <?php get_template_part("parts/interior", "site-header"); ?>
      <div id="main-content" class="interior sub">
        <?php \NV\Theme::loop('parts/portfolio', 'parts/article-empty') ?>
      </div>
    </div>
  </div>
<?php
\NV\Theme::get_footer();