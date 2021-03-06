<!-- Footer -->
<div id="footer">
	<div class="row">
		<div class="small-5 large-7 columns" id="addresses">
			<div class="row collapse">
				<div class="large-7 columns">
					<h5 class="show-for-medium-down">(571) 431-6101<br/>
						<a href="mailto:info@topshelfdesign.net">info@topshelfdesign.net</a></h5>
					<h6>WASHINGTON DC/NORTHERN VIRGINIA<br/>
						<small>1011 Arlington Blvd, Suite 330
							Arlington, VA 22209
						</small>
					</h6>
					<h6>RALEIGH, NC<br/>
						<small>8480 Honeycutt Rd, Suite 200
							Raleigh, NC 27615
						</small>
					</h6>
				</div>
				<div class="large-5 columns hide-for-medium-down">
					<h5>(571) 431-6101<br/>
						<a href="mailto:info@topshelfdesign.net">info@topshelfdesign.net</a></h5>
				</div>
			</div>
		</div>
		<div class="small-7 large-5 columns text-right">
			<h6>Copyright 2014, <img src="<?php echo NV_IMG ?>/tsdWebtag.png" alt="Top Shelf Design" class="webtag"/>
			</h6>
			<?php wp_nav_menu(array(
				'depth' => 1,
				'exclude' => array(6),
				'container' => '',
				'items_wrap' => '<div id="footer-menu" class="row collapse">%3$s</div>',
				'walker' => new MV_Cleaner_Walker_Nav_Menu()
			)); ?>

			<div id="mc_embed_signup" class="small-12 medium-8 medium-offset-4 right">
				<form class="validate" id="mc-embedded-subscribe-form"
				      action="http://topshelfdesign.us2.list-manage.com/subscribe/post?u=b64c1903c19a6c499ef1ad863&amp;id=9989c74ee9"
				      method="post" name="mc-embedded-subscribe-form" _lpchecked="1">
					<div class="row collapse">
						<div class="small-10 columns">
							<input class="required email tsd_empty round" id="mce-EMAIL" type="email" name="EMAIL"
							       value="" placeholder="Newsletter Sign-up">

							<p></p>

							<div class="response" id="mce-error-response" style="display: none;"></div>
							<div class="response" id="mce-success-response" style="display: none;"></div>
						</div>
						<div class="small-2 columns end">
							<input class="button postfix round" id="mc-embedded-subscribe" type="submit"
							       name="subscribe" value="GO">
						</div>
					</div>
				</form>
			</div>

			<div class="icon-sm small-12 columns">
				<a href="www.pinterest.com/topshelfdesign/" class="pinterest">&#62226;</a>
				<a href="https://www.facebook.com/pages/Top-Shelf-Design/267045386740933" class="facebook">&#62220;</a>
				<a href="https://twitter.com/tsd_llc" class="twitter">&#62217;</a>
				<a href="https://www.linkedin.com/company/gena's-test-company/" class="linkedin">&#62232;</a>
				<a href="https://plus.google.com/104040468903861547295/" class="googleplus">&#62223;</a>
			</div>

		</div>
	</div>
</div>

<?php wp_footer(); ?>
<script type="text/javascript">
	$(document).foundation();
</script>


</body>
</html>