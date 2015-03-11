<?php
\NV\Theme::get_header();
\NV\Theme::output_file_marker(__FILE__);
?>
  <div id='wrap'>
    <div id='main'>
      <?php get_template_part("parts/interior", "site-header"); ?>
      <div id="main-content" class="interior sub">
        <?php get_template_part('parts/sidebar', 'blog'); ?>
        <div id="blog-content" class="large-8 columns clearfix">

        </div>
      </div>
    </div>
  </div>



<?php
$blog_args = array('posts_per_page' => -1);

if (isset($_GET['search']))
  $blog_args['s'] = $_GET['search'];

$post_info = new WP_Query($blog_args);

?>

  <script type="text/javascript">

  _posts = 10;
  var _page_count;

  $(function () {
    <?php if(isset($_GET['search'])): ?>
    load_archive(0, false, false, '<?php print $_GET['search']; ?>');
    <?php else: ?>
    load_archive(0);
    <?php endif; ?>
  });


  function init_pager(_page, _category, _count, _search) {

    pager_container = $("<div/>", {
      class: 'pagination-centered large-12 columns'
    });
    pager = $("<ul>", {
      class: 'pagination'
    });
    for (i = 0; i < _page_count; i++) {
      _pager_num = i + 1;

      pager_link = $("<a/>", {
        text: _pager_num,
        'data-pager-num': _pager_num,
        'data-category': _category,
        'data-count': _count,
        on: {
          click: function () {
            load_archive($(this).attr('data-pager-num') - 1, $(this).data('category'), $(this).data('count'));
          }
        }
      });
      if (i == _page) {
        _class = 'current';
      } else {
        _class = '';
      }
      pager_item = $("<li/>", {
        class: _class
      });
      pager_item.append(pager_link);
      pager.append(pager_item);
    }
    if (_category) {
      remove_filter_holder = $("<li>");
      remove_filter_link = $("<a/>", {
        text: 'Remove Filter',
        on: {
          click: function () {
            load_archive(0);
          }
        }
      })
      remove_filter_holder.append(remove_filter_link);
      pager.append(remove_filter_holder);
    }

    pager_container.append(pager);
    $("#blog-content").append(pager_container);
  }

  function load_archive(_page, _category, _count, _search) {

    $("#blog-content").empty();
    _offset = _posts * _page;

    if (_count) {
      _total = _count;
    } else {
      _total = <?php print $post_info->found_posts; ?>;
    }
    _page_count = Math.ceil(_total / _posts);

    init_pager(_page, _category, _count, _search);

    if (_search) {
      if (_page != 0) {
        _url = "/wp-json/posts?filter[s]=" + _search + "&filter[offset]=" + _offset;
      } else {
        _url = "/wp-json/posts?filter[s]=" + _search;
      }
    } else if (_category) {
      if (_page != 0) {
        _url = "/wp-json/posts?filter[cat]=" + _category + "&filter[offset]=" + _offset;
      } else {
        _url = "/wp-json/posts?filter[cat]=" + _category;
      }
    } else {
      if (_page != 0) {
        _url = "/wp-json/posts?filter[offset]=" + _offset;
      } else {
        _url = "/wp-json/posts";
      }
    }
    $.ajax({
      url: _url,
      success: function (result) {
        build_archive(result);
				$('.pagination-centered').appendTo('#blog-content'); // move pagination to bottom
      }
    });

    if(<?php print $post_info->found_posts; ?> == 0){
      display_empty_result();
    }

  }

  function build_archive(posts) {
		var blog_containers = '';
		
    for (var i in posts) {
	    console.log(posts[i]);

      _format_date = format_date(posts[i].date);
      _title = posts[i].title;
      _date = _format_date;
      _author_name = $("<a/>", {
        href: '<?php echo site_url() ?>/author/' + posts[i].author.slug,
        html: posts[i].author.nickname
      })
      _author = 'Posted By: ' + _author_name;
      _tags = posts[i].terms.post_tag;
      _content = posts[i].excerpt;
			_link = posts[i].link;

      post_meta = $("<div/>", {
        class: 'large-12 columns post-info'
      });

      container = $('<div>', {
        class: 'large-12 columns content-block'
      });

      post_title = $("<h2/>", {
        html: _title
      });

/*       sm_icons = $("<p/>", {
        html: "[fb] [tw]",
        'data-post-id' : posts[i].ID,
        class: 'text-right'
      }); */

      date_holder = $("<div/>", {
        class: 'date right'
      });

      date = $('<h6>', {
        html: _date
      });

      author_holder = $("<div/>", {
        class: 'byline left'
      });

      author = $("<h6/>", {
        text: "Posted By: "
      });

      author.append(_author_name);

      date_holder.append(date);

      author_holder.append(author);

      post_meta_holder = $("<div/>", {
        class: 'row'
      });

      post_meta_holder.append(date_holder).append(author_holder);

      post_meta.append(post_meta_holder);

      if (_tags) {

        post_tags = $("<div/>", {
          class: 'tags row'
        });

        tags_list = $("<ul/>", {
          class: "tags"
        });

        tags_container = $("<h6/>");

        tag_title = $("<li/>", {
          text: 'Tags: ',
          class: 'title'
        });
        tags_container.append(tag_title);

        for (i in _tags) {
          tag_item = $("<li/>", {
            text: _tags[i].name
          });
          tags_container.append(tag_item);
        }

        tags_list.append(tags_container);

        post_tags.append(tags_list);

        post_meta.append(post_tags);

      }
			
			//featured_image = posts[i].featured_image.content;
			featured_image = $('<img/>', {
				src: posts[i].featured_image.guid,
				class: 'featured-image'
			});

      post_content = $("<div/>", {
        class: 'text-blog'
      });

      decor = $("<div/>", {
        class: 'speech-triangle left'
      });

      var content = $("<div/>", {
        class: 'text-holder',
        html: _content
      });

      post_content.append(decor).append(content);


      var read_more = $('<a/>', {
				href: _link,
        text: "More",
        class: 'button tiny expand more'
      });
			
      container
        //.append(sm_icons)
        .append(post_title)
        .append(post_meta)
				.append(featured_image)
        .append(post_content)
        .append(read_more);
      $("#blog-content").append(container);
    }
  }

  function display_empty_result(){
    $("#blog-content").prepend("<h2>Search Query Not Found</h2><p>We're sorry, but your search query yielded no result.</p>");
  }

  function format_date(date) {

    m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    _post_date = new Date(date);
    curr_date = _post_date.getDate();

    var sup = "";
    if (curr_date == 1 || curr_date == 21 || curr_date == 31) {
      sup = "st";
    }
    else if (curr_date == 2 || curr_date == 22) {
      sup = "nd";
    }
    else if (curr_date == 3 || curr_date == 23) {
      sup = "rd";
    }
    else {
      sup = "th";
    }


    curr_month = _post_date.getMonth() + 1; //Months are zero based
    curr_year = _post_date.getFullYear();
    return m_names[curr_month] + " " + curr_date + "<sup>" + sup + "</sup> " + curr_year;
  }

  </script>


<?php
\NV\Theme::get_footer();































