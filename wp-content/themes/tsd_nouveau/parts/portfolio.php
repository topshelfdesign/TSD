<div class="portfolio individual">
	<div class="small-12 medium-12 large-12 xlarge-12 xxlarge-12 columns web" data-category="web">
		<div class="item">

			<div id="title" class="panel">
				<div class="category text-center">

					<?php
					$type = wp_get_post_terms( get_the_ID(), 'portfolio-type' );
					?>
					<span class="icon website"></span>
					<h6 class="tags"><?php print $type[0]->name; ?></h6>
				</div>
				<h3><?php the_title() ?>
					<small><a class="external-link"
					          href="http://<?php the_field( 'url' ); ?>"><?php the_field( 'url' ); ?></a></small>
				</h3>
			</div>

			<div class="portfolio-individual-slider">
				<ul id="portfolio-cycle"
				    class="cycle-slideshow"
				    data-cycle-slides="li"
				    data-cycle-log=false
				    data-cycle-auto-height=container
					>
					<?php foreach ( get_field( 'additional_pieces' ) as $piece ): ?>
						<li>
							<img src="<?php echo $piece['media']['url']; ?>" alt=""/>
							<div class="orbit-caption">
								<h5><?php echo $piece['label'] ?></h5>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="panel clearfix">
				<div class="large-8 columns">
					<p><?php the_field( "thumbnail_caption" ); ?></p>
				</div>
				<div class="large-4 columns">
					<?php $tags = wp_get_post_terms( get_the_ID(), 'portfolio_tag' ); ?>
					<ul class="tags">
						<h6>
							<li class="title">Tags:</li>
							<?php foreach ( $tags as $tag ): ?>
								<li><?php print $tag->name; ?></li>
							<?php endforeach; ?>
						</h6>
					</ul>
				</div>
			</div>
		</div>
	</div>


</div><!-- End of Isotope -->