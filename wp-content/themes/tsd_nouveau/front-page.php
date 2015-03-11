<?php
/**
 * DEFAULT TEMPLATE
 *
 * This is the global default template. If WordPress can't find a more appropriate, specific template file,
 * it will use this one.
 */
\NV\Theme::get_header();
\NV\Theme::output_file_marker(__FILE__);
?>


<?php get_template_part("parts/home-header"); ?>

  <div id="main-content" class="home row clearfix">

    <div class="action-items clearfix" data-equalizer>
      <div class="large-5 small-6 columns large-offset-1" data-equalizer-watch>
        <div class="medium-6 columns front_split_text">Sounding good, but I want a little more info:</div>
        <div class="medium-6 columns text-center">
          <a href="/portfolio" class="button">See our work</a>
        </div>
      </div>
      <div class="large-5 small-6 columns end" data-equalizer-watch>
        <div class="medium-6 columns front_split_text">I'm liking what I'm hearing, onward:</div>
        <div class="medium-6 columns text-center">
          <a href="/contact" class="button">Get a quote</a>
        </div>
      </div>
    </div>


    <div id="blog-feed" class="medium-7 large-5 columns large-push-3">
      <h4>Latest &amp; Greatest</h4>
    </div>


    <div id="social" class="medium-5 large-4 columns large-push-3">
      <h4>Socialize with us:</h4>

      <div id="feed-container">
        <dl class="tabs" data-tab>
          <dd><a href="#panel2-1" class="icon-sm facebook active">&#62220;</a></dd>
          <dd><a href="#panel2-2" class="icon-sm twitter">&#62217;</a></dd>
          <dd><a href="#panel2-3" class="icon-sm pinterest">&#62226;</a></dd>
        </dl>
        <div class="tabs-content">
          <div class="content facebook active" id="panel2-1"></div>
          <div class="content twitter" id="panel2-2">
            <a class="twitter-timeline" href="https://twitter.com/TSD_LLC"
               data-widget-id="466314835110539264"
               data-chrome="nofooter transparent">Tweets by @TSD_LLC</a>
            <script>
              !function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                  js = d.createElement(s);
                  js.id = id;
                  js.src = p + "://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);
                }
              }(document, "script", "twitter-wjs");
            </script>
          </div>
          <div class="content pinterest" id="panel2-3">

            <?php
            /*$pins = get_pins();
            for ($i = 0; $i < 1; $i++) {
              $pin = $pins[$i];
              print "
                <div class='panel'>
                  <h2>#livedata</h2>
                          <img src='{$pin->src}' style='display: block; margin: auto;' />
                      </div>
              ";
            };*/
            ?>
            <div id="pinterest">
				<a target="_blank" class="PIN_1414723613303_embed_grid_th PIN_1414723613303_hazClick" title="Fanzine" href="//www.pinterest.com/topshelfdesign/" data-pin-id="485966616014005841" data-pin-log="embed_user_thumb" style="height: 350px; width: 300px; top: 0px; left: 0px;">
					<img src="http://media-cache-ec0.pinimg.com/237x/32/29/1f/32291fbace2b228d35633138f0937645.jpg" data-pin-nopin="true" class="PIN_1414723613303_embed_grid_img" alt="Fanzine" style="width: 300px; margin-top: -9.658px;">
                </a>
                <a target="_blank" class="PIN_1414723613303_embed_grid_ft" data-pin-log="embed_user_ft" href="//www.pinterest.com/topshelfdesign/">
					See On <img src="<?php print NV_IMG; ?>/Pinterest-Logo.png" />
				</a>
            </div>
          </div> 
        </div>
      </div>

    </div>

    <div id="connect-content" class="large-3 columns show-for-large-up large-pull-9">
      <div class="row collapse">
        <h4>Get in touch:</h4>
        <br/>

        <div class="small-6 medium-5 large-12 columns">
          <h6>DC Metro<br/></h6>

          <p><em>
              <small>call</small>
            </em> 571.431.6101<br/>
            <em>
              <small>fax</small>
            </em> 202.595.9161 <br/>
            <a href="mailto:info@topshelfdesign.net"> info@topshelfdesign.net</a>
            <br/>
            <small>1011 Arlington Boulevard | Suite 330 <br/>
              Arlington, VA 22209
            </small>
          </p>

        </div>
        <div class="small-6 medium-4 large-12 columns">
          <h6>Raleigh-Durham Metro<br/></h6>

          <p>
            <em>
              <small>call</small>
            </em> 919.200.6300<br/>
            <small>8480 Honeycutt Rd | Suite 200<br/>
              Raleigh, NC 27615
            </small>
          </p>
        </div>
        <div class="icon-sm medium-3 large-12 columns">
          <a href="http://www.pinterest.com/topshelfdesign/" class="pinterest">&#62226;</a>
          <a href="https://www.facebook.com/pages/Top-Shelf-Design/267045386740933" class="facebook">
            &#62220;</a>
          <a href="https://twitter.com/tsd_llc" class="twitter">&#62217;</a>
          <a href="https://www.linkedin.com/company/gena's-test-company/" class="linkedin">&#62232;</a>
          <a href="https://plus.google.com/104040468903861547295/" class="googleplus">&#62223;</a>
        </div>

        <div id="mc_embed_signup" class="medium-3 large-10 columns end">
          <form class="validate" id="mc-embedded-subscribe-form"
                action="http://topshelfdesign.us2.list-manage.com/subscribe/post?u=b64c1903c19a6c499ef1ad863&amp;id=9989c74ee9"
                method="post" name="mc-embedded-subscribe-form" _lpchecked="1">
            <div class="row collapse">
              <div class="small-10 medium-9 columns">
                <input class="required email tsd_empty round" id="mce-EMAIL" type="email" name="EMAIL"
                       value=""
                       placeholder="Newsletter Sign-up">

                <p></p>

                <div class="response" id="mce-error-response" style="display: none;"></div>
                <div class="response" id="mce-success-response" style="display: none;"></div>
              </div>
              <div class="small-2 medium-3 columns end">
                <input class="button postfix round" id="mc-embedded-subscribe" type="submit"
                       name="subscribe" value="GO">
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

  </div>

  <script type="text/javascript">
    $(function () {
      load_home_blog();
      init_fb_loading();
    })
  </script>

<?php
\NV\Theme::get_footer();
