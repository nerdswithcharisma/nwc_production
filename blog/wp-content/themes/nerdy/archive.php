<?php get_header(); ?>
			
			<div id="content">

				<!-- topper image -->
				<?php 
					if (has_post_thumbnail()){ ?>
					<div class="topper">
						<div class="post-thumbnail">
							<?php if( of_get_option('blog_topper', 'no entry') ){ ?>
								<img src="<?php echo of_get_option('blog_topper', 'no entry'); ?>" alt="<?php echo bloginfo('name'); ?> Blog" />
							<?php } ?>
						</div>

						<aside class="topper_meta">
							<img src="<?php echo of_get_option('blog_icon', 'no entry'); ?>" alt="<?php echo of_get_option('blog_title', 'no entry'); ?> Blog Icon" />
							<br />
							<h2 class="topper_h2"><?php echo of_get_option('blog_title', 'no entry'); ?></h2>
						</aside>
					</div>
				<?php } ?>

			
				<div id="inner-content" class="wrap clearfix">
				    <div id="main" class="twelvecol first clearfix" role="main">
				    	<br />
						<?php if (is_category()) { ?>							
								<h1>
									<span><?php _e("Posts Categorized ", "nerdy"); ?></span> <?php single_cat_title(); ?>
								</h1>
							<?php } elseif (is_tag()) { ?> 
								<h1>
									<span><?php _e("Posts Tagged ", "nerdy"); ?></span> <?php single_tag_title(); ?>
								</h1>
							<?php } elseif (is_author()) { ?>
								<h1>
									<span><?php _e("Posts By Author ", "nerdy"); ?></span>							</h1>
							<?php } elseif (is_day()) { ?>
								<h1>
									<span><?php _e("Daily Archives ", "nerdy"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>
							<?php } elseif (is_month()) { ?>
							    <h1>
							    	<span><?php _e("Monthly Archives ", "nerdy"); ?>:</span> <?php the_time('F Y'); ?>
							    </h1>
							<?php } elseif (is_year()) { ?>
							    <h1>
							    	<span><?php _e("Yearly Archives ", "nerdy"); ?>:</span> <?php the_time('Y'); ?>
							    </h1>
						<?php } ?>
					
					
						<br /><br />
						
						
						
						
						
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('thepost clearfix'); ?> role="article">
							
							<div class="twocol first the_post_meta">
								
								<?php
									$link = get_the_author_meta('user_url');
									$email = get_the_author_meta('email');
									$image = get_avatar($email, 60);
									echo '<span class="post-type-box"><a href="'.$link.'">'.$image.'</a></span>';
								?>
								<br />
								<span class="the-categories"><?php the_category('<br /> '); ?></span><br />
								
							</div> 
							
							<div class="sevencol">
<header>		
										<!-- if post image show it here -->
										<?php 
											if (has_post_thumbnail()){ ?>
											<div class="post-thumbnail">
												<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail('blog-thumbnail'); ?>
												</a>
											</div>
										<?php } ?>
									
								
											
											<!-- title -->
											<h1 class="post-title">
												<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
													<?php the_title(); ?>
												</a>
											</h1>	

											<aside id="post-meta">
												By <?php the_author_posts_link(); ?> &nbsp;&nbsp;/&nbsp;&nbsp; 
												<a href="<?php the_permalink(); ?>" title="comments for <?php the_title(); ?>" class="commentsLink"><?php comments_number(); ?></a>&nbsp;&nbsp;/&nbsp;&nbsp;
												<?php the_date(); ?>
											</aside>
											
											<hr />
											
										</header> <!-- end article header -->	
										
										<!-- content -->
										<section class="post-content clearfix">
											<?php the_excerpt(); ?>
										</section> <!-- end article section -->		
							</div>
							
							
						
							<div id="sidebar1" class="sidebar threecol last clearfix nomobile">
					    		<?php get_sidebar(); ?>
				   			</div>	
							
						</article> <!-- end article -->
						
						
						
						
						
						<?php endwhile; ?>	
						
						<hr />
						
						<!-- page/prev/next navigation -->
						<?php if (show_posts_nav()) : ?>
							<nav class="wp-prev-next">
								<ul class="clearfix">
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Old', "nerdy")) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('New &raquo;', "nerdy")) ?></li>
								</ul>
							</nav>
						<?php endif; ?>
						
									
						
						<?php else : ?>
					    
					        <article id="post-not-found" class="hentry clearfix">
					            <header class="article-header">
					        	    <h1><?php _e("Oops, Post Not Found!", "nerdy"); ?></h1>
					        	</header>
					            <section class="entry-content">
					        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "nerdy"); ?></p>
					        	</section>
					        	<footer class="article-footer">
					        	    <p><?php _e("This is the error message in the index.php template.", "nerdy"); ?></p>
					        	</footer>
					        </article>
					
					    <?php endif; ?>

					    <div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
					    <?php get_sidebar(); ?>
				   </div>
			
				    </div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
