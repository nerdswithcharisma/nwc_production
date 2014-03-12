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

				<br /><br />

				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						
								<div class="threecol first the_post_meta">
									
									<?php
										$link = get_the_author_meta('user_url');
										$email = get_the_author_meta('email');
										$image = get_avatar($email, 60);
										echo '<span class="post-type-box"><a href="'.$link.'">'.$image.'</a></span>';
									?>

									<br />
									<span class="the-categories"><?php the_category('<br /> '); ?></span><br />
									
								</div> 
					
					
								<div class="ninecol last">
									<header>

										<?php 
											if (has_post_thumbnail()){ ?>
											<div class="post-thumbnail">
													<?php the_post_thumbnail('blog-thumbnail'); ?>
											</div>
										<?php } ?>		
						
										<!-- title -->
										<?php if( of_get_option('show_headings', 'no entry') == 1 ){ ?>
										<h1 class="no_margin">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a>
										</h1>	
									
										<hr />
										<?php } ?>
									
								</header> <!-- end article header -->	
								
								<!-- content -->
								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->						
							</div>
							
							<div class="twelvecol clearfix">
								<br />
								<hr />
								<br /><br />					
								<?php comments_template(); ?>
					
							</div>
		
						</article> <!-- end article -->
					
						<?php endwhile; ?>			
					
						<?php else : ?>
					
							<article id="post-not-found" class="hentry clearfix">
					    		<header class="article-header">
					    			<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					    		</header>
					    		<section class="entry-content">
					    			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					    		</section>
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>
			
					</div> <!-- end #main -->
    
					<aside class="article-header">											
						<div class="threecol first the_post_meta">
							<h1>Post Info</h1>
							<strong>Posted By:</strong> <?php the_author(); ?>
							<br />
							<strong>Posted On:</strong> <?php the_date(); ?>
							<br /><br />
							<strong>Categories:</strong>
							<br />
							<?php the_category(', '); ?>
							<br /><br />
							<strong>Tagged:</strong>
							<br />
							<?php the_tags('', ', ', ''); ?>

						</div> 
			
					</aside> <!-- end article header -->

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>