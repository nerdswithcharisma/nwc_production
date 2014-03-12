<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap clearfix">
				    <div id="main" class="twelvecol first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						    <?php if( of_get_option('show_headings', 'no entry') == 1 ){ ?>
						    	<header class="article-header">
							    	<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						    	</header> <!-- end article header -->
						    <?php } ?>
					
						    <section class="entry-content clearfix" itemprop="articleBody">
							    <?php the_content(); ?>
							</section> <!-- end article section -->						    				
					    </article> <!-- end article -->
					
					
					
					    <?php endwhile; else : ?>
					
							<article id="post-not-found" class="clearfix">
								<header>
									<h1><?php _e("HUH?! Nothing to see here", "nerdy") ?></h1>
								</header> <!-- end article header -->
						

								<section class="post_content">	
									<p><?php _e("This is not the page you're looking for…", "nerdy") ?></p>
									<p><?php _e("Move along, move along or ", "nerdy") ?> <a href="<?php bloginfo( 'url' ); ?>">go home</a></p>
								</section> <!-- end article section -->
							
							</article> <!-- end article -->
					
					    <?php endif; ?>
			
    				</div> <!-- end #main -->    
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>