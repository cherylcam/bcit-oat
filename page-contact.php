<?php
/**
 * The template for displaying the contact page.
 *
 * This is the template that displays the contact page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcit-oat
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

		$terms = get_terms( 
			array(
				'post_type' => 'oat-staff'
			)
		);
		
		if( $terms && ! is_wp_error( $terms ) ){
			echo '<section class="widget">';
			echo '<h2 class="faculty-staff">Faculty Contact</h2>';
			echo '<ul>';
			foreach( $terms as $term ){
				echo '<li>';
				echo '<a href="' . get_term_link( $term ) . '">';
				echo $term->name;
				echo '</a>';	
				echo '</li>';
			}
			wp_reset_postdata();
			echo '</ul>';
			echo '</section>';
		}	


		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
