<?php get_header(); ?>
<div class="container">
    
    <?php /* start the loop */ ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('loop-post clearfix'); ?>>
        
            
            <?php /* post thumbnail */ ?>
            <?php if (has_post_thumbnail()){ ?>
                <section class="loop-thumbnail">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('loop_thumbnail'); ?>
                    </a>
                    
                    <br /><br />
                </section>
            <?php } ?>
            
            
            
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <?php /* post meta */ ?>
                    <section class="loop-meta">
                        <!-- date of post -->
                        <strong>Posted On:</strong>
                        <br />
                        <?php the_date(); ?>
                        <br /><br />
                        
                        <!-- comments number -->
                        <a href="<?php the_permalink(); ?>" title="comments for <?php the_title(); ?>" class="commentsLink">
                            <?php comments_number(); ?>
                        </a>
                        
                        <?php /* categories */ ?>
                        <section class="loop-categories">
                            <?php the_category('<br /> '); ?>   
                        </section>
                    </section>
                </div>
                
                
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <?php /* title */ ?>
                    <h6 class="loop-title">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h6>  
                    
                    <?php /* the excerpt */ ?>
                    <section class="loop-excerpt">
                        <p><?php the_excerpt(); ?></p>
                    </section>
                </div>
            </div>
            <hr />    
        </article>
    
    <?php endwhile; ?>	
</div>

						
						
						
<!-- prev/next navigation -->
<?php if (show_posts_nav()) : ?>
<div class="container">
    <nav class="wp-prev-next">
        <span id="btn-prev" class="btn">
            <?php next_posts_link('« Older Posts') ?>
        </span>
        <span id="btn-next" class="btn pull-right">
            <?php previous_posts_link('Newer Posts »') ?>
        </span>
    </nav>
</div>
<?php endif; ?>
<?php else : ?>
    You can put a 404 not found error here, but if you have a blog, what's the point.
<?php endif; ?>
			
<?php get_footer(); ?>
