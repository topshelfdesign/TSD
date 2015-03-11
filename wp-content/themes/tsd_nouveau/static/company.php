<h2 class="page-title">The <strong>TSD</strong> Team</h2>

<p class="intro">We are a small, agile team. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
	deserunt mollit anim id est laborum.
</p>

<div id="team-grid">
	<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
		<?php
		\NV\Theme::output_file_marker(__FILE__);
		$company_query = new WP_Query(array(
			'posts_per_page' => -1,
			'post_type' => 'staff',
			'orderby' => 'ID',
			'order' => 'ASC'
		));


		if ($company_query->found_posts):
			foreach ($company_query->posts as $staff): $video = get_field('video_image', $staff->ID); $video = $video['url']; $still = get_field('still_image', $staff->ID); $still= $still['url']?>

				<li id="<?php echo $staff->post_title; ?>">
					<video class="still" width="100%" height="auto" src="<?php echo $still; ?>" autoplay loop=""></video>
					<video class="hover" width="100%" height="auto" src="<?php echo $video; ?>" loop=""></video>
					<h3><?php echo $staff->post_title; ?></h3>
					<h4><?php echo $staff->position; ?></h4>
				</li>

			<?php endforeach;
		endif;
		?>

	</ul>
</div>
<script type="text/javascript" src="<?php echo NV_JS ?>/custom-team.js"></script>
