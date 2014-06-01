<?php
/*
Template Name: Archive
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article class="eightcol first" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							
							    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>						
						    </header> <!-- end article header -->
					
						    <section class="entry-content clearfix">
							    <?php the_content(); ?>
							    
							    
							    <div class="sixcol first">
								    <h2>Recent Posts</h2>
								    <?php
								    		$args = array( 'numberposts' => '12' );
											$recent_posts = wp_get_recent_posts( $args );
											foreach( $recent_posts as $recent ){
												echo '<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a><br /> ';
											}
								    ?>
							    </div>
							    
							    <div class="sixcol last">
								    <h2>Months</h2>
								    <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12, 'format' => 'custom', 'after' => '<br />' ) ); ?>
									</a>
							    </div>
							    
							    <div class="sixcol first">
								    <br />
								    <h2>Category</h2>
								    <?php wp_list_categories('style=none&optioncount=12'); ?>
							    </div>
							    
							    <div class="sixcol last">
								    <br />
								    <h2>Authors</h2>
								    <?php
								    /*
								    	tag clouds don't seem to like linking from an archive page
								    	wp_tag_cloud('number=12&separator=<br />&largest=11&smallest=11'); 
								    */	
								    
									    wp_list_authors('exclude_admin=0&optioncount=12&style=none');
								    ?>
							    </div>
						    </section> <!-- end article section -->
						
						    
						    <?php // comments_template(); // uncomment if you want to use them ?>
					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { ?>
					            <?php bones_page_navi(); ?>
					        <?php } else { ?>
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "nerdy")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "nerdy")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
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

					    <div class="fourcol last">
					    	<?php get_sidebar(); ?>
						</div>
			
				    </div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
