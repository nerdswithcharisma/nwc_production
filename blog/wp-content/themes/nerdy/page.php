<?php get_header(); ?>

			<div id="content">

				<!-- topper image -->
				<?php 
					if (has_post_thumbnail()){ ?>
					<div class="topper">
						<div class="post-thumbnail">
							<?php the_post_thumbnail('inner-topper'); ?>
						</div>

						<aside class="topper_meta">
							<img src="<?php echo get_post_meta( $post->ID, 'nwc_post_icon', true ); ?>" alt="<?php echo get_post_meta( $post->ID, 'nwc_post_title', true ); ?>" />
							<br />
							<h2 class="topper_h2"><?php echo get_post_meta( $post->ID, 'nwc_post_title', true ); ?></h2>
						</aside>
					</div>
				<?php } ?>

				
				<div id="inner-content" class="wrap clearfix">
				    <div id="main" class="twelvecol first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<h3><?php echo get_post_meta( $post->ID, 'nwc_post_tagline', true ); ?></h3>

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