<?php
/*
Template Name: Contact	
*/
?>


<?php
	if( isset( $_POST['submitted'] ) ){
		$website = bloginfo('name');
	
		//make sure we're filled out correctly
		if( trim( $_POST['contactName'] ) === '' ){
			$nameError = 'Please enter your name';
			$hasError = true;
		}else{
			$name = trim( $_POST['contactName'] );
		}
	
		if( trim( $_POST['email']) === '' ){
			$emailError = 'Please enter your email';
			$hasError = true;
		}else if ( !preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email'])) ){
			$emailError = 'Please enter a valid email address';
			$hasError = true;
		}else{
			$email = trim( $_POST['email'] );
		}
		
		if( trim( $_POST['comments'] ) === '' ){
			$commentError = 'Please enter a message';
			$hasError = true;
		}else{
			if( function_exists('stripslashes') ){
				$comments = stripslashes( trim( $_POST['comments'] ) );
			}else{
				$comments = trim( $_POST['comments'] );
			}
		}
		
		
		//check for errors
		if( !isset( $hasError ) ){
			$emailTo = get_option( 'tz_email' );
			
			if( !isset( $emailTo ) || ( $emailTo == '' ) ){
				$emailTo = get_option('admin_email');
			}
			
			//build and send
			$subject = '' . $website . ' Website Inquiry';
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: ' . $name . ' <'. $emailTo . '>' . "\r\n" . 'Reply-To: ' .$email;
			
			wp_mail( $emailTo, $subject, $body, $headers );
			$emailSent = true;
			
		}
	
	} //isset $_POST['submitted']
?>

<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
								<?php if( of_get_option('show_headings', 'no entry') == 1 ){ ?>
									<header class="article-header">
										<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									</header> <!-- end article header -->
								<?php } ?>
					
								<section class="entry-content clearfix" itemprop="articleBody">
								
								<!-- Messages -->
								<?php if( isset( $emailSent ) && $emailSent == true) { ?>
								
									<div class="success" id="thanks">
										Thank you for contacting us.  Your message was delivered successfully.
									</div>
									
								<?php }else if( isset( $hasError ) ){ ?>
									<div class="error" id="problemSendingMail">
										Sorry, an error occurred.
										
										<?php if( $nameError != '' ){ ?>
												Please enter your name.
										<?php } ?>
										
										<?php if( $emailError != '' ){ ?>
												Don't forget your email.
										<?php } ?>
										
										<?php if( $commentError != '' ){ ?>
												You must have comments, right?!
										<?php } ?>
										
									</div>
								<?php } ?>
								<!-- end Messages -->
								
								
								
								
								
							
								
									
									<div class="fivecol first clearfix">
										<?php the_content(); ?>
									</div>
									
									<div class="contactForm sevencol last clearfix">
										<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
											<label for="contactName">Name</label>
											<input type="text" name="contactName" id="contactName" value="" placeholder="Your Name" />
											<br /><br />
											<label for="email">Email</label>
											<input type="email" name="email" id="email" value="" placeholder="example@gmail.com" />
											<br /><br />
											<label for="commentsText">Comments</label>
											<textarea name="comments" id="commentsText"></textarea>
											<br /><br />
											<button class="button" type="submit">Send Email</button>
											<input type="hidden" name="submitted" id="submitted" value="true" />
										</form>
									</div>
								</section> <!-- end article section -->
						
								<footer class="article-footer">
			
									<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
								</footer> <!-- end article footer -->
					
					
							</article> <!-- end article -->
					
						<?php endwhile; ?>			
					
						<?php else : ?>
					
							<article id="post-not-found" class="hentry clearfix">
					    		<header class="article-header">
					    			<h1><?php _e("Oops, Post Not Found!", "nerdy"); ?></h1>
					    		</header>
					    		<section class="entry-content">
					    			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "nerdy"); ?></p>
					    		</section>
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "nerdy"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>
			
					</div> <!-- end #main -->
    
					<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">
					    <?php get_sidebar(); ?>
				   </div>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>