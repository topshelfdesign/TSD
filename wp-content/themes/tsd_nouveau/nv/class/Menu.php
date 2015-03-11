<?php

class Menu {

	protected $url;
	protected $_img = NV_IMG;

	function __construct() {

	}

	static function interior_desktop_menu() {

		$url  = get_bloginfo( 'url' );
		$_img = NV_IMG;

		$menu_items = wp_nav_menu( array(
			'container'  => '',
			'items_wrap' => '<ul id="%1$s" class="%2$ item small-2 right">%3$s</ul>',
			'echo'       => false
		) );

		$menu_items = str_replace( 'sub-menu', 'dropdown', $menu_items );
		$menu_items = str_replace( 'menu-item-has-children', 'has-dropdown', $menu_items );

		$return = "
		<div id='header' class='interior hide-for-small-only'>
			<div id='menu'>
				<nav class='top-bar centered large-12' data-topbar role='navigation'>
					<ul class='title-area'>
						<li class='name'>
							<a href='$url'><img src='$_img/logo-h.png' alt=''></a>
						</li>
						<li class='toggle-topbar menu-icon'><a href='#'><span>Menu</span></a></li>
					</ul>
					<section class='top-bar-section'>
						$menu_items
					</section>
				</nav>
			</div> <!-- End menu -->
		</div>
	";

		return $return;
	}

	static function mobile_interior_menu() {


		$url  = get_bloginfo( 'url' );
		$_img = NV_IMG;

		$menu_items = wp_nav_menu( array(
			'container'  => '',
			'items_wrap' => '<ul id="%1$s" class="%2$s right">%3$s</ul>',
			'echo'       => false
		) );

		$menu_items = str_replace( 'menu-item-has-children', 'has-dropdown', $menu_items );
		$menu_items = str_replace( 'sub-menu', 'dropdown', $menu_items );

		$return = "

		<div id='mobile-interior-menu' class='show-for-small-only'>
			<div id='header' class='interior'>
				<div id='menu'>
					<nav class='top-bar' data-topbar role='navigation'>
						<ul class='title-area'>
							<li class='name'>
								<a href='$url'><img src='$_img/logo-h.png' alt=''></a>
							</li>
							<li class='toggle-topbar menu-icon'><a href='#'><span>Menu</span></a></li>
						</ul>

						<section class='top-bar-section'>
							$menu_items
						</section>
					</nav>
				</div>
			</div>
		</div>
		";

		return $return;

	}

} 