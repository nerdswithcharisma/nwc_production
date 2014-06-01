<?php get_header(); ?>
			
			<div id="content">

				<!-- topper image -->
					<div class="four-oh-four-topper">
						<div>
							<img class="four-oh-four-image" src="<?php echo get_template_directory_uri(); ?>/library/images/404.jpg" alt="<?php echo bloginfo('name'); ?> Page Not Found" />
						</div>

						<aside class="topper_meta">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/topper_404.png" alt="<?php echo bloginfo('name'); ?> 404 Icon" />
							<br />
							<h2 class="topper_h2">Page Not Found</h2>

							<br />
							<h6><?php _e("It Appears We Have a Problem.", "nerdy"); ?></h3>
							<p><?php _e("Unfortunately, the page you're looking for cannot be found.<br /> Maybe you typed something wrong or an outdated link lead you astray.", "nerdy"); ?></p>
							<p><?php _e("Try Searching or <a href='home'>Return Home</a>	", "nerdy"); ?></p>
							<?php get_search_form(); ?>
						</aside>
					</div>
			</div> <!-- end #content -->

<?php get_footer(); ?>
