<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header('nosidebar'); ?>
		
		<div class="service-body-wrap">

			<div class="body-inner">
				

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					$category = get_the_category()[0];


					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', $category->slug );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
				?>

		</div></div>


<?php get_footer(); ?>
