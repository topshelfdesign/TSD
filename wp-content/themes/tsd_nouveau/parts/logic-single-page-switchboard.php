<?php

\NV\Theme::output_file_marker(__FILE__);
$id = get_the_ID();
switch ($id):
	case 8:
		get_template_part("static/company");
		break;
	case 10:
		get_template_part("static/services");
		break;
	case 12:
		get_template_part("template/portfolio");
		break;
	case 14:
		get_template_part("static/clients");
		break;
	case 18:
		get_template_part("static/contact");
		break;
	case 20:
		get_template_part("static/philosophy");
		break;
	case 22:
		get_template_part("static/history");
		break;
	case 24:
		get_template_part("static/team");
		break;
	default:
		print "<p>Current Page ID: $id</p>";
		break;
endswitch;
?>