<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->

	<head>
	
        <title><?php wp_title(''); ?></title>
        
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Brian Dausman - briandausman@gmail.com">
        
        <!-- favicons -->
        <link rel="shortcut icon" href="http://nerdswithcharisma.com/images/favicon.ico">
		<link rel="apple-touch-icon" sizes="72x72" href="http://nerdswithcharisma.com/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://nerdswithcharisma.com/images/apple-touch-icon-114x114.png">
        

        <!-- WP Stuff -->
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
        
        <!-- css -->
        <link href="http://localhost:8888/github/nwc_production/nwc_production/css/style.css" rel="stylesheet">
        <link href="http://localhost:8888/github/nwc_production/nwc_production/css/fonts.css" rel="stylesheet">
        
        <!-- SEO Stuff -->
        <meta name="description" content="Nerds With Charisma is a cutting edge digital media agency specializing in Wordpress development." />
        <meta name="keywords" content="Nerds with Charisma, NWC, Brian Dausman, Andrew Bieganski, Wordpress Development, Wordpress Themes, Super Awesome Websites, Chicago Marketing Firm, Chicago Web Developers" />
        <link rel="canonical" href="http://nerdswithcharisma.com/" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
	</head>
	
	<?php 
		$options = get_option('nerdy_theme_options');
	?>

	<body id="blog" <?php body_class(); ?>>
	
        <!-- Push Navigation 
        ================================================== -->   
        <nav id="pushNav">
            <?php bones_main_nav(); ?>
            <?php get_sidebar(); ?>  
        </nav>
        
        
		<!-- Primary Page Layout
        ================================================== -->   
        <div id="pushContent">
            <header>
                <h1 class="logo logo-white">
                    <a href="/">Nerds With Charisma</a>  
                </h1>
            
                <div id="logo">
                    <a href="http://nerdswithcharisma.com"><div class="icon nwc-nwc-logo shake"></div></a>
                </div>
            
                <nav id="navigation">
                    <div id="nav-toggle" class="icon nwc-fontawesome-webfont-10"></div>        
                </nav>
            </header>    
