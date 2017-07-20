<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="lt-LT"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php bloginfo('name'); ?> <?php wp_title("|",true); ?></title>

	<?php wp_head(); ?>

	<?php
		$primary_color   = theme_option('theme_color', '#f12078');
		$secondary_color = theme_option('theme_color_secondary', '#f88fbb');
		
		$default_background = IMG_DIR.'/background.jpg';
		$background_opt     = theme_option('theme_background', $default_background);
		$background         = (strlen($background_opt) > 0) ? $background_opt : $default_background;
		
		$font            = theme_option('theme_font', 'molle');
	?>
	<link href="<?php echo FONTS_DIR."/".$font.".css"; ?>" media="all" rel="stylesheet" type="text/css" />
	<style>
		body{ 
			background: #ffffff url('<?php echo $background; ?>') no-repeat center top; 
		}
		.download{
			background: <?php echo $primary_color; ?>;
		}

		.features-slider-container li:hover h3, .features-slider-container li.hover h3{
			border-bottom: 2px solid <?php echo $primary_color; ?>;
		}

		.features-slider-container .bx-prev, .features-slider-container .bx-next{
			background-color: <?php echo $secondary_color; ?>;
		}
		.features-slider-container .bx-prev:hover, .features-slider-container .bx-next:hover{
			background-color: <?php echo $primary_color; ?>;
		}

		.get-it .app-name{
			color: <?php echo $primary_color; ?>;
		}
		.get-it .download{
			background: <?php echo $primary_color; ?>;
		}
	</style>
</head>
<body class="font-<?php echo $font; ?>">
