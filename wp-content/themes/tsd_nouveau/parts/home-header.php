<?php \NV\Theme::output_file_marker( __FILE__ ); ?>

<div id="header">
	<div id="home-photo-bg">
		<div class="white-gradient">
			<div class="halftone-gradient"></div>
		</div>

		<div class="row">
			<!--<div class="small-12 columns">
				<div id="logo" class="large-6 columns text-center large-centered clearfix"><img src="<?php bloginfo( "template_directory" ); ?>/assets/img/logo-header.png" alt="" /></div>
			</div>-->
		</div>

		<div id="menu" class="small-12 columns text-center">
			<div class="row-collapse">
				<nav class="top-bar centered" data-topbar>
					<ul class="title-area row collapse">
						<li class="name">
							<div class="small-12 columns">
								<div id="logo"
								     class="large-6 columns text-center large-centered clearfix show-for-medium-up">
									<img src="<?php bloginfo( "template_directory" ); ?>/assets/img/logo-header.png"
									     alt=""/>
								</div>
								<div id="logo" class="small-8 columns end show-for-small-only">
									<img src="<?php bloginfo( "template_directory" ); ?>/assets/img/logo-h.png" alt=""
									     class="left"/>
								</div>
							</div>
						</li>
						<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
						<li class="toggle-topbar menu-icon small-3 columns"><a href="#"><span>Menu</span></a></li>
					</ul>

					<section class="top-bar-section home-nav">
						<?php
						$menu_items = wp_nav_menu( array(
							'container'  => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s item small-12 medium-2">%3$s</ul>',
							'echo'       => false
						) );

						$menu_items = str_replace( 'menu-item ', 'small-12 medium-2 columns ', $menu_items );
						$menu_items = str_replace( 'sub-menu', 'dropdown', $menu_items );
						$menu_items = str_replace( 'menu-item-has-children', 'has-dropdown', $menu_items );

						echo $menu_items;
						?>
					</section>
				</nav>
			</div>

		</div>

		<div class='triangle'></div>

		<!-- Slider aligns to bottom of header -->
		<div id="text-slider" class="small-centered hide-for-small-only">
			<div class="row text-center">
				<div class="cycle-slideshow"
				     data-cycle-fx="scrollHorz"
				     data-cycle-slides=".item"
				     data-cycle-pause-on-hover="true"
				     data-cycle-center-horz=true
				     data-cycle-center-vert=true
				     data-cycle-timeout=5000
				     data-cycle-pager="#custom-pager"
				     data-cycle-log=false
				     data-cycle-pager-template="<strong><a href=#> {{slideNum}} </a></strong>">
					<?php

					$slides = get_field( "slides" );

					if ( $slides ):
						foreach ( $slides as $slide ):
							$_big   = $slide['big_text'];
							$_small = $slide['small_text'];
							$_img   = $slide['image'];
							$_src   = $_img['sizes']['large'];
							$_w     = $_img['sizes']['large-width'];
							$_h     = $_img['sizes']['large-height'];

							$_op = "
								<div class='item'>
									<img src='$_src' width='$w' height='$_h' alt='$_big'/>

									<div class='caption'>
										<h1>$_big</h1>
										<h3>$_small</h3>
									</div>
								</div>
								";
							print $_op;
						endforeach;
					endif;

					?>
				</div>
			</div>

			<!-- empty element for pager links -->
			<div id="custom-pager" class="small-12 columns text-center small-centered"></div>
		</div>
		<!-- End of slider -->

		<!-- alternative view instead of slider for mobile -->
		<div id="text-slider" class="small-centered show-for-small-only">
			<div class="small-12 columns text-center">
				<div>
					<div class="item">

						<div class="caption">
							<h1>We Get you</h1>

							<h3>We are a Washington DC web design and graphic design firm that focuses on your business,
								understands your culture, and learns about your products and target audience, so we can
								develop strategic design that address your business objectives.</h3>
						</div>
					</div>
				</div>
			</div>

			<div id="custom-pager" class="small-12 columns text-center small-centered"></div>
		</div>
		<!-- alternative view instead of slider for mobile -->

	</div>
</div><!-- End background-photo -->