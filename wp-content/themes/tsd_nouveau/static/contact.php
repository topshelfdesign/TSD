<!-- Use of this file from /parts/switchboard is now depreciated. load this file only through the page_content object -->


<span class='contact'>
	<h2 class="page-title">Get In Touch with Us</h2>
	<div class="large-5 columns">
		<div class="row collapse">
			<p class="intro">Top Shelf Design is based in Washington, DC and in Raleigh, NC. We serve organizations in
				the greater Metro areas, along with national and international clients.</p>

			<div class="x-row row collapse">
				<div class="medium-6 z-medium-6-to-12 large-12 columns">
					<div class="x-medium-6">
						<h3 class="with-line text-center"><span class="block">DC Metro</span></h3>

						<p>
							<a href="https://www.google.com/maps/place/1011+Arlington+Blvd/@38.8925772,-77.0700792,17z/data=!3m1!4b1!4m2!3m1!1s0x89b7b659ccf0ecad:0x61d6b3d029df01e0"
							   target="_blank" class="location">1011 Arlington Boulevard / Suite 330 / Arlington, VA
								22209</a><br/>
							<em>
								<small>call</small>
							</em> 571.431.6101<br/>
							<em>
								<small>fax</small>
							</em> 202.595.9161 <br/>
							<a href="mailto:info@topshelfdesign.net" class="email"> info@topshelfdesign.net</a>
						</p>
					</div>

					<div class="x-medium-6">
						<h3 class="with-line text-center"><span class="block">Raleigh-Durham</span></h3>

						<p>
							<a href="https://www.google.com/maps/place/8040+Honeycutt+Rd,+Raleigh,+NC+27615/@35.8952028,-78.6233548,15z/data=!4m2!3m1!1s0x89ac5828062323cb:0xa9d482465ba264ee"
							   target="_blank" class="location">8480 Honeycutt Rd / Suite 200 / Raleigh, NC
								27615</a><br/>
							<em>
								<small>call</small>
							</em> 919.200.6300<br/>
							<a href="mailto:rdu@topshelfdesign.net" class="email">rdu@topshelfdesign.net</a>
						</p>
					</div>
				</div>
			</div>

			<div id="connect-content" class="medium-5 z-medium-5-to-12 large-12 columns show-for-large-up">
				<div class="row collapse">
					<div class="x-medium-6 large-6 columns">
						<h6>Let's Get Social!</h6>

						<div class="icon-sm row">
							<a href="http://www.pinterest.com/topshelfdesign/" class="pinterest">&#62226;</a>
							<a href="https://www.facebook.com/pages/Top-Shelf-Design/267045386740933" class="facebook">
								&#62220;</a>
							<a href="https://twitter.com/tsd_llc" class="twitter">&#62217;</a>
							<a href="https://www.linkedin.com/company/gena's-test-company/" class="linkedin">
								&#62232;</a>
							<a href="https://plus.google.com/104040468903861547295/" class="googleplus">&#62223;</a>
						</div>
					</div>
					<div class="x-medium-6 large-6 columns">
						<h6>Join our e-mail list</h6>

						<div id="mc_embed_signup">
							<form class="validate" id="mc-embedded-subscribe-form"
							      action="http://topshelfdesign.us2.list-manage.com/subscribe/post?u=b64c1903c19a6c499ef1ad863&amp;id=9989c74ee9"
							      method="post" name="mc-embedded-subscribe-form" _lpchecked="1">
								<div class="row collapse">
									<div class="small-10 large-9 columns">
										<input class="required email tsd_empty round" id="mce-EMAIL" type="email"
										       name="EMAIL" value="" placeholder="Newsletter Sign-up">

										<p></p>

										<div class="response" id="mce-error-response" style="display: none;"></div>
										<div class="response" id="mce-success-response" style="display: none;"></div>
									</div>
									<div class="small-2 large-3 columns end">
										<input class="button postfix round" id="mc-embedded-subscribe" type="submit"
										       name="subscribe" value="GO">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="large-6 columns large-offset-1">
		<h3>We'll call you back, promise.</h3>

		<?php
			$form = do_shortcode('[contact-form-7 id="2925" title="Contact"]');
			$form = str_replace('</p>', '', $form);
			$form = str_replace('<br />', '', $form);
			
			echo $form;
		?>
	</div>

</span>