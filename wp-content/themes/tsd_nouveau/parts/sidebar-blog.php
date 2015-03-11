<?php \NV\Theme::output_file_marker(__FILE__); ?>

<script type="text/javascript">
	$(function() {
		init_sidebar_category_list();
		archive_select_change();
	})
	
	function archive_select_change() {
		$('#archive_select').change(function(){
			var _value = $(this).val();
			var _filter = _value.replace(/^\/|\/$/g, '').split('/');
			var _year = _filter[0];
			var _month = _filter[1];
			
			$.ajax({
				url: '/wp-json/posts?filter[year]=' + _year + '&filter[monthnum]=' + _month,
				success: function(result) {
					console.log(result);
					$("#blog-content").empty();
					build_archive(result);
				}
			});
		});
	}

	function init_sidebar_category_list() {
		$.ajax({
			url: '/wp-json/taxonomies/category/terms',
			success: function(result) {
				build_sidebar_category_list(result);
			}
		});
	}

	function build_sidebar_category_list(terms) {
		for (i in terms) {
			cat_id = terms[i].meta.links.self;
			n = cat_id.lastIndexOf('/');
			_cat_id = cat_id.substring(n + 1);
			list_item = $("<li/>", {
				html: terms[i].name,
				'data-cat-id': _cat_id,
				'data-count': terms[i].count,
				on: {
					click: function() {
						load_archive(0, $(this).data('cat-id'), $(this).data('count'));
						
						cat_header = $('<h3>', {
							text: 'Displaying: ' + $(this).text()
						});
						
						remove_filter_link = $("<a/>", {
							text: 'Remove Filter',
							on: {
								click: function () {
									load_archive(0);
									$('.pagination-centered').appendTo('#blog-content'); // move pagination to bottom
								}
							}
						});
						
						cat_header_container = $('<div>', {
							class: 'large-12 column cat-header'
						});
						
						cat_header_container.append(cat_header).append(remove_filter_link);
						
						$('#blog-content').append(cat_header_container);
					}
				}
			});
			select_item = $("<option/>", {
				text: terms[i].name
			});
			$("#category_list").append(list_item);
			$("#category_select").append(select_item);
		}
	}

</script>

<div id="sidebar" class="large-3 columns right large-offset-1">
	<h5 class="with-line text-center show-for-large-up"><span class="block">Sidebar Title</span></h5>
	<div class="side-item"><p>This is the news &amp; archives page for Top Shelf Design. We are a graphic design firm serving the Washington DC and Raleigh-Durham metro areas.</p></div>

	<div class="side-item medium-4 large-12 columns">
		<form action="/blog" method="get" id="search">
			<div class="row collapse">
				<div class="small-10 columns">
					<input type="search" name="search" value="<?php print $_GET['search']; ?>" placeholder="Search by keyword">
				</div>
				<div class="small-2 columns end">
					<input class="button postfix round" type="submit" value="GO">
				</div>
			</div>
		</form>
	</div>
	<div class="side-item medium-4 large-12 columns">
		<h6 class="with-line text-center show-for-large-up"><span class="block">Archives by Date</span></h6>
		<div class="select-styled">
			<select class="form-field" placeholder="Select Month" id="archive_select">
				<option value="0" disabled="">Select Month</option>
				<?php
					$archives = wp_get_archives(array(
						'type' => 'monthly',
						'format' => 'option',
						'echo' => 0
						));
						
					$archives = str_replace(site_url(), '', $archives);
					
					echo $archives;
				?>
			</select>
		</div>
	</div>
	<div class="side-item medium-4 large-12 columns">
		<h6 class="with-line text-center show-for-large-only"><span class="block">Archives by Category</span></h6>
		<div class="select-styled show-for-medium-down">
			<select class="form-field" placeholder="Select Month" id="category_select"></select>
		</div>
		<ul class="two-col show-for-large-up" id="category_list"></ul>
	</div>
	<div class="side-item medium-4 large-12 columns show-for-large-up">
		<h6 class="with-line text-center"><span class="block">Follow Us</span></h6>
		<div class="icon-sm row text-center">
			<a href="http://www.pinterest.com/topshelfdesign/" class="pinterest"></a>
			<a href="https://www.facebook.com/pages/Top-Shelf-Design/267045386740933" class="facebook"></a>
			<a href="https://twitter.com/tsd_llc" class="twitter"></a>
			<a href="https://www.linkedin.com/company/gena's-test-company/" class="linkedin"></a>
			<a href="https://plus.google.com/104040468903861547295/" class="googleplus"></a>
		</div>
	</div>

	<h6 class="with-line text-center row show-for-medium-down"></h6>
</div>