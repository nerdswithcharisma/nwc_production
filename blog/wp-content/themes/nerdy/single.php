<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <header id="post-header">
        <?php /* thumbnail */ ?>
        <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
        ?>

            <?php if (has_post_thumbnail()){ ?>
                <div class="single-thumbnail" style="background-image: url(<?php echo $thumb_url[0]; ?>)"></div>
            <?php } ?>
        
        
        <?php /* the title */ ?>
        <h2 class="single-title"><?php the_title(); ?></h2>
        
        <div class="divider">
            <hr />
        </div>
        
        <?php /* meta */ ?>
        <div id="single-meta">
            <?php the_category(' '); ?>
        </div>
    </header>

    <div id="single">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-article clearfix'); ?>>
            
                
                <br /><br />
                <section class="pull-right dull">
                    <small>
                        <?php the_date(); ?>
                        <?php the_tags('', ', ', ''); ?>
                    </small>
                </section>
                
                <?php /* content */ ?>
                <br /><br />
                
                
                <section class="dark">
                    <?php the_content(); ?>
                </section>
                
                <hr />
                
                <?php /* comments */ ?>
                <?php comments_template(); ?>
                
                <!-- <?php /* post infor */ ?>
                <?php the_author(); ?>
				<?php the_date(); ?>
				<?php the_category(', '); ?>
				<?php the_tags('', ', ', ''); ?> -->
            </article>
            <br />        
        </div> <!-- container -->
        
        <?php /* show next post link */ ?>
            <?php $nextPost = get_next_post(true);
                if($nextPost) { ?>
                    <?php
                    $url = get_the_post_thumbnail(9);
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id(9), 'thumbnail-size'  );
                    //echo $src[0];
                    ?>
                    <footer id="single-nextPost">
                        <div class="single-thumbnail text-center" style="background-image: url(<? echo $src[0]; ?>)">
                            <br />
                            <?php next_post_link('%link',"<h2 class='single-title'>%title</h2>", TRUE); ?>
                            <br />
                            <?php next_post_link('%link', '<span class="btn btn-alt">Next</span>', TRUE); ?>
                            <br /><br /><br />
                        </div>    
                    </footer>
            <?php } ?>
    </div> <!--single -->
								
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

<?php get_footer(); ?>