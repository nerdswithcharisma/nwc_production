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
							<h2 class="topper_h2">Search Results</h2>
						</aside>
					</div>
				<?php } ?>

				<br /><br />


				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="eightcol first clearfix" role="main">
						<h1 class="archive-title"><span>Search Results for:</span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
								<header class="article-header">
							
									<strong class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>
									<br />
									<small><time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate> <?php the_time('F jS, Y'); ?></time> / <?php _e("By", "bonestheme"); ?> <span class="author"><?php the_author_posts_link(); ?></span> <br /><?php _e("Categories:", "bonestheme"); ?> <?php the_category(', '); ?></p></small>
									<?php the_excerpt('<span class="read-more">Read more &raquo;</span>'); ?>
									<small><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">View Page</a></small>
								</header> <!-- end article header -->
					
					
							</article> <!-- end article -->

							<hr />
					
						<?php endwhile; ?>	
					
						    <?php if (function_exists('bones_page_navi')) { ?>
						        <?php bones_page_navi(); ?>
						    <?php } else { ?>
						        <nav class="wp-prev-next">
						            <ul class="clearfix">
						    	        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
						    	        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
						            </ul>
						        </nav>
						    <?php } ?>		
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix">
    					    	<header class="article-header">
    					    		<h1><?php _e("Sorry, No Results.", "bonestheme"); ?></h1>
    					    	</header>
    					    	<section class="entry-content">
    					    		<p><?php _e("Try your search again.", "bonestheme"); ?></p>
    					    	</section>
    					    	<footer class="article-footer">
    					    	    <p><?php _e("This is the error message in the search.php template.", "bonestheme"); ?></p>
    					    	</footer>
    					    </article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    			
    			    <?php get_sidebar(); ?>
    			
    			</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>