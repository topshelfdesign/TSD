<?php \NV\Theme::output_file_marker(__FILE__); ?>


<h2 class="page-title">The <strong>TSD</strong> Team</h2>
<p class="intro">Imagine a group of talented designers, developers, and marketers all working together to provide an outstanding design product and customer experience.  At Top Shelf Design, our staff create a collaborative and supportive environment where we strive each day to push the limits of our creative and technical skills.  You won't find a team anywhere that you'll enjoy working with more!</p>

<div id="team-grid">
	<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
		<?php
			\NV\Theme::output_file_marker(__FILE__);
			$company_query = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type' => 'staff',
				'order' => 'ASC',
				'order_by' => 'ID'
			));
			
			if($company_query->found_posts):
				foreach($company_query->posts as $staff):
				$staff_details = get_fields($staff->ID);
		?>
		
		<li id="<?php echo $staff->post_name; ?>">
			<video class="still" width="100%" height="auto" src="<?php echo $staff_details['still_image']['url']; ?>" autoplay="" loop=""></video>
			<video class="hover" width="100%" height="auto" src="<?php echo $staff_details['video_image']['url']; ?>" loop=""></video>
			<h3><?php echo $staff->post_title; ?></h3>
			<h4><?php echo $staff_details['position']; ?></h4>
		</li>
		<?php
				endforeach;
			endif;
		?>
	</ul>
</div>