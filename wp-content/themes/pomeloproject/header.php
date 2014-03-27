<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie8-custom"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 ie8-custom"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8-custom"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<!--[if (IE)&(lt IE 9) ]>
		        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
		<!--<![endif]-->
		<!--[if (IE)&(gt IE 8) ]>
		        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<!--<![endif]-->
		<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
		<![endif]-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title><?php wp_title( ); ?></title>
		
		<meta name="title" content="<?php
			if (function_exists('is_tag') && is_tag()) {
				single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
			elseif (is_search()) {
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
			elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - '; }
			elseif (is_404()) {
				echo 'Not Found - '; }
			if (is_home()) {
				bloginfo('name'); echo ' - '; bloginfo('description'); }
			else {
				bloginfo('name'); }
			if ($paged>1) {
				echo ' - page '. $paged; }
		?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="Pomelo Project">
		<meta name="Copyright" content="Copyright &copy; <?php the_time('Y'); ?> Pomelo Project. All Rights Reserved.">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
		<script src="<?php bloginfo('template_directory'); ?>/js/main.min.js"></script>
		
		

		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<div class="row">
				<div class="small-12 columns">
					<h4>This is the header, we need to put navigation here.</h4>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
			</div>
		</header>