<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="clearfix">
				    <div id="main" class="twelvecol first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						    

						    <!-- slider -->
						    <div class="the_big_picture twelvecol clearfix first nomobile">
						    	<?php echo get_new_royalslider(2); ?>
						    </div>

						    <div class="the_big_picture twelvecol clearfix first yesmobile">
						    	<?php echo get_new_royalslider(3); ?>
						    </div>

						    <!-- partners -->
						    <div class="partners_bar twelvecol clearfix first nomobile">
						    	<div class="wrap">
						    		<div class="twocol first">
						    			<?php if( of_get_option('partner1', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner1', 'no entry'); ?>" alt="<?php echo of_get_option('alt1', 'no entry'); ?>" />
										<?php } ?>
									</div>
									<div class="twocol">
						    			<?php if( of_get_option('partner2', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner2', 'no entry'); ?>" alt="<?php echo of_get_option('alt2', 'no entry'); ?>" />
										<?php } ?>
									</div>
									<div class="twocol">
						    			<?php if( of_get_option('partner3', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner3', 'no entry'); ?>" alt="<?php echo of_get_option('alt3', 'no entry'); ?>" />
										<?php } ?>
									</div>
									<div class="twocol">
						    			<?php if( of_get_option('partner4', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner4', 'no entry'); ?>" alt="<?php echo of_get_option('alt4', 'no entry'); ?>" />
										<?php } ?>
									</div>
									<div class="twocol">
						    			<?php if( of_get_option('partner5', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner5', 'no entry'); ?>" alt="<?php echo of_get_option('alt5', 'no entry'); ?>" />
										<?php } ?>
									</div>
									<div class="twocol last">
						    			<?php if( of_get_option('partner6', 'no entry') ){ ?>
											<img src="<?php echo of_get_option('partner6', 'no entry'); ?>" alt="<?php echo of_get_option('alt6', 'no entry'); ?>" />
										<?php } ?>
									</div>
						    	</div>
						    </div>

						    <section class="entry-content wrap clearfix" itemprop="articleBody">
								<div class="eightcol first clearfix">
						    		<?php the_content(); ?>
						    	</div>

						    	<div class="fourcol last clearfix">
						    		<h1>From the Axiom Blog</h1>
						    		<br />
						    		<?php $the_query = new WP_Query( 'showposts=2' ); ?>
									<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
										<div class="home_blog_posts">
											<a href="<?php the_permalink() ?>">
												<span class="home_the_title">
													<?php the_title(); ?>
													<hr />
													<h6>Find Out More</h6>
												</span>
												<?php the_post_thumbnail( $size = 'homepage_thumbnail' ); ?>
											</a>
										</div>
									<?php endwhile;?>
						    	</div>
							</section> <!-- end article section -->	

							<hr />		

							<section class="entry-content wrap clearfix" itemprop="articleBody">
								<div class="sevencol first">
									<?php if( of_get_option('recent_title', 'no entry') ){ ?>
										<h1><?php echo of_get_option('recent_title', 'no entry'); ?></h1><br />
									<?php } ?>

									<?php if( of_get_option('recent_image', 'no entry') ){ ?>
										<a href="<?php echo of_get_option('recent_link', 'no entry'); ?>" class='recent_link'>
											<img src="<?php echo of_get_option('recent_image', 'no entry'); ?>" class="recent_image" alt="<?php echo of_get_option('recent_title', 'no entry'); ?>" />
											<img src="<?php echo of_get_option('recent_image_hover', 'no entry'); ?>" class="recent_hover" alt="<?php echo of_get_option('recent_title', 'no entry'); ?>" />
										</a>
									<?php } ?>
								</div>

								<div class="fivecol last" id="home_jobs">
									<?php dynamic_sidebar( 'jobs_sidebar' ); ?>
								</div>
							</section>			    				
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