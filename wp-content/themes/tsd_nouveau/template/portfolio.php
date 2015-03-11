<script type="text/javascript">
	$(function() {
		load_portfolio();
	});

	function load_portfolio() {
		$.ajax({
			url: "/wp-json/posts?type[]=portfolio&filter[posts_per_page]=-1",
			success: function(result) {
				display_portfolio(result);
			}
		});
	}

	function display_portfolio(posts) {
		$(".portfolio").empty();
		for (i in posts) {
			item = new portfolio_item(posts[i]);
			$('.portfolio').append(item.isotope_item);
		}
		$(".portfolio").prepend("<div class='grid-sizer'></div>");
		$(".portfolio").waitForImages(function() {
			init_isotope();
			$(".portfolio .fade").removeClass("fade");
			<?php if (get_query_var("profile_category")): ?>
				$("#filters .<?php print get_query_var("profile_category"); ?>").trigger("click");
			<?php endif; ?>
		});
	}



	function portfolio_item(post) {
//		console.log(post);
		_type = post.terms["portfolio-type"][0].slug;
		_title = post.title;
		_subtitle = post.portfolio_information.thumbnail_caption;
		_category = post.terms["portfolio-type"][0].slug;
		_tags = post.terms["portfolio_tag"];
		
		if(post.featured_image){
			_image = post.featured_image.source;
		} else {
			_image = "#";
		}
		
		cat_icon_container = $('<div/>', {
			class: 'category text-center'
		});

		cat_icon = $("<span/>", {
			class: 'icon ' + _category
		});

		cat_icon_container.append(cat_icon);

		title = $('<h5/>', {
			html: _title + " "
		});

		subtitle = $('<small>', {
			html: _subtitle
		});

		title.append(subtitle);

		information = $('<div/>', {
			class: 'panel hide-for-small'
		});


		information.append(title);

		if (_tags) {

			tags = $('<ul/>', {
				class: 'tags hide-for-medium'
			});

			tag_container = $('<h6/>');

			for (i in _tags) {
				tag_item = $('<li/>', {
					html: _tags[i].name
				});
				tag_container.append(tag_item);
			}

			tags.append(tag_container);
			information.append(tags);

		}

		more_link = $('<a/>', {
			html: 'More',
			class: 'button tiny expand more',
			href: post.link
		});

		image = $('<img/>', {
			src: _image,
			class: 'portfolio-thumb'
		});

		container = $('<div/>', {
			class: 'item'
		});

		container
						.append(cat_icon_container)
						.append(image)
						.append(information)
						.append(more_link);

		this.isotope_item = $("<div/>", {
			class: 'small-6 medium-4 large-3 xlarge-3 xxlarge-2 columns fade ' + _type,
		});

		this.isotope_item.append(container);
	}

	function init_isotope() {
		var $container = $('.portfolio.isotope').isotope({
			itemSelector: '.columns',
			masonry: {
				columnWidth: ".grid-sizer"
			}
		});

		$('#filters').on('click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$container.isotope({filter: filterValue});
		});
	}

</script>

<div id="filters" class="button-group text-center">  <button class="button is-checked" data-filter="*">show all</button>
	<button class="button websites" data-filter=".category_websites"><span class="icon website"></span>Websites</button>
	<button class="button print" data-filter=".category_print"><span class="icon print"></span>Print</button>
	<button class="button brand" data-filter=".category_brand"><span class="icon brand"></span>Branding</button>
	<button class="button presentation" data-filter=".category_presentation"><span class="icon presentation"></span>Presentation</button>
	<button class="button case-study" data-filter=".category_case-study"><span class="icon case-study"></span>Case Study</button>
</div>

<div class="portfolio isotope"><p class="center">Please wait, portfolio loading</p></div>
