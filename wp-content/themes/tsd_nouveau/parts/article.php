<?php
/**
 * ARTICLE PART (NO COMMENTS)
 *
 * This part can be used IN THE LOOP to output a single article (sans comments).
 */
?>
<article id="article-<?php the_ID() ?>" class="<?php echo implode(get_post_class(), ' ') ?>" class='row'>

  <div class="small-6 columns">
    <p><a href="<?php print site_url(); ?>/blog">Go Back to the blog</a></p>
  </div>

  <div class="small-6 columns text-right">
    <?php
      //$sm = new page_share(get_the_ID());
      //$sm->print_html();
    ?>
  </div>

  <div class="small-12 columns">
    <h1><?php the_title() ?></h1>

	<div class="large-12 columns post-info">
		<div class="row">
			<div class="date right">
				<h6><?php echo format_date_ordinal(get_the_date()); ?></h6>
			</div>
			<div class="byline left">
				<h6>Posted By: <a href="#"><?php echo get_the_author(); ?></a></h6>
			</div>
		</div>
		<?php 
			$post_tags = wp_get_post_tags(get_the_ID()); 
			if(count($post_tags)):
		?>
		<div class="tags row">
			<ul class="tags">
				<h6>
					<li class="title">Tags: </li>
					<?php foreach($post_tags as $tag): ?>
					<li><?php echo $tag->name; ?></li>
					<?php endforeach; ?>
				</h6>
			</ul>
		</div>
		<?php endif; ?>
	</div>
	
    <div class="post_content">
      <?php the_content() ?>
    </div>
  </div>

  <div class="small-12 columns text-center">
    <h2>Do we want a pager down here? Comments?</h2>
  </div>

</article>