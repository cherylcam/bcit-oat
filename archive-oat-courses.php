<?php
/**
 * The template for displaying archive courses page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcit-oat
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Courses</h1>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) :
					the_post();
					the_title(); ?>
					
				<?php if( function_exists('get_field') ):
						$file = get_field('course_outline'); ?>

					<?php if( get_field('credits') ): ?>
							<span>Credits: <?php the_field('credits') ?></span>
					<?php endif; ?>

					<?php if( get_field('course_description') ): ?>
							<p><?php the_field('course_description') ?></p>
					<?php endif; ?>

					<?php if( $file ): ?>
							<a href="<?php echo $file['url']; ?>">Download OAT <?php echo ucwords(strtolower(substr(strstr(get_the_title()," "), 1))); ?> Course Outline</a>
					<?php endif; ?>

					<?php if( get_field('course_image') ): 
							echo wp_get_attachment_image( get_field('course_image'), 'large' ); ?>
					<?php endif; ?>

				<?php endif; ?>
					
			<?php endwhile; ?>
				
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
