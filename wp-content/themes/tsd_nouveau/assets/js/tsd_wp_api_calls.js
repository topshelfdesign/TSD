function load_home_blog() {

    var loader = $("<div/>", {
        class: 'loader',
        html: 'Loading&hellip;'
    });

    $("#blog-feed").append(loader);

    $.ajax({
        //url: "/wp-json/posts?type[]=portfolio&filter[posts_per_page]=1",
				url: "/wp-json/posts?filter[posts_per_page]=1",
        success: function (result) {
            build_blog_excerpt(result);
						console.log(result);

            $("#blog-feed .loader").remove();
        }
    });
}

function build_blog_excerpt(post) {
		var month = new Array();
		month[0] = "Jan";
		month[1] = "Feb";
		month[2] = "Mar";
		month[3] = "Apr";
		month[4] = "May";
		month[5] = "Jun";
		month[6] = "Jul";
		month[7] = "Aug";
		month[8] = "Sep";
		month[9] = "Oct";
		month[10] = "Nov";
		month[11] = "Dec";
		
		var _date = new Date(post[0].date);
		var _month = month[_date.getMonth()];
		var _day = _date.getDate();
		var _year = _date.getFullYear();
    var _content = post[0].title;
    var _image = post[0].featured_image.guid;
    var _link = post[0].link;

    var container = $("<div/>", {
        class: 'row collapse'
    });
    var date_bubble = $("<div/>", {
        class: 'date text-center'
    });
    var month = $("<span/>", {
        class: "month",
        html: _month
    })
    var day = $("<span/>", {
        class: "day",
        html: _day
    })
    var year = $("<span/>", {
        class: "year",
        html: _year
    })

    date_bubble.append(month).append(day).append(year);

    var title = $("<h5/>", {
        html: "<a href='" + _link + "'>" + _content + "</a>"
    });
    var image = $("<img/>", {
        src: _image,
        class: 'blog-img',
        alt: ''
    });
    var more_link = $("<a/>", {
        href: _link,
        class: "button tiny expand more",
        html: "More"
    });
		
		console.log('_link='+_link);

    container.append(date_bubble).append(title).append(image).append(more_link);

    $("#blog-feed").append(container);

}

function create_fb_posts(data) {
    for (var i = 0; i < 1; i++) {
        var _post = data[i];
        var _title = _post.title;
        var _content = _post.content;
        var _timestamp = _post.published;
        var _date = new Date(_timestamp);

        var published = $("<p/>", {
            html: _date.getMonth() + "/" + _date.getDate() + "/" + _date.getFullYear(),
            class: 'post-date'
        });

        var op = $("<div/>", {
            class: 'fb-api-post panel'
        });

        var title = $("<h4/>", {
            html: _title,
            class: 'post-title'
        });

        var content = $("<p/>", {
            html: _content,
            class: 'post-content'
        });

        op.append(title).append(content).append(published);
        $("#panel2-1").append(op);
    }
}

function init_fb_loading() {
    var fbUrl = "http://www.facebook.com/feeds/page.php?id=267045386740933&format=JSON";

    $.ajax({
        url: "http://query.yahooapis.com/v1/public/yql",
        dataType: "jsonp",
        data: {
            q: 'select * from json where url="' + fbUrl + '"',
            format: "json"
        },
        success: function (data) {
            create_fb_posts(data.query.results.json.entries);
        }
    });

}