

/*	$('#molly').hover(
		function () {
			$(this).children('img').attr("src", "img/headshots-molly.gif");
		},
		function () {
			$(this).children('img').attr("src", "img/headshots-molly-still.gif");
		}
	);
	
	
	$('#kirk').hover(
		function () {
			$(this).children('img').attr("src", "img/headshots-kirk.gif");
		},
		function () {
			$(this).children('img').attr("src", "img/headshots-kirk.jpg");
		}
	);*/

	$('#team-grid video.still').css('z-index','9999');

	$('#team-grid video.still').hover(
		function () {
			$(this).css('z-index','0');
			$(this).siblings('video.hover')[0].play();
			return false;
		},
		function () {
			return false;
		}
	);
	
	
	$('#team-grid video.hover').hover(
		function () {
			return false;
		},
		function () {
			$(this)[0].pause();
			$(this)[0].currentTime = 0;
			$(this).siblings('video.still').css('z-index','100');
			$(this).css('z-index','0');
			return false;
		}
	);