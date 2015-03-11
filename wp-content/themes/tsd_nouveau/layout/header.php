<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php \NV\Theme::page_title(); ?></title>
	<link rel="icon" href="<?php echo NV_IMG ?>/favicon.ico" type="image/gif">

    <!--wp_head-->
    <?php wp_head(); //Enqueue your own stuff in functions.php or \NV\Hooks\Config::enqueue_assets() ?>
    <!--/wp_head-->

    <!-- Font embed code goes here -->

    <script type="text/javascript" src="//use.typekit.net/ckb2wle.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body <?php body_class() ?>>