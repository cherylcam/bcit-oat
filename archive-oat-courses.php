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
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

		<?php
		while ( have_posts() ) :
			the_post();

			the_title();

			if( function_exists('get_field') ){
				$file = get_field('course_outline');
				if( get_field('credits') ){
					echo '<span> Credits: ';
					the_field('credits');
					echo '</span>';
				}
				if( get_field('course_description') ){
					echo '<p>';
					the_field('course_description');
					echo '</p>';
				}
				if( $file ){
				?>
					<a href="<?php echo $file['url']; ?>">Download OAT <?php echo ucwords(strtolower(substr(strstr(get_the_title()," "), 1))); ?> Course Outline</a>
				<?php	
				}		
				if( get_field('course_image') ){
					echo wp_get_attachment_image( get_field('course_image'), 'large' );
				}
			}
			
		endwhile;
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
