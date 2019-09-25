<?php
/**
 * The template for displaying archive pages
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
				<h1 class="page-title">Certifications</h1>
			</header><!-- .page-header -->
			<?php
				while(have_posts()): 
			?>

			<?php
					the_post();
					the_title();
					if(function_exists('get_field')):
						if(get_field('logo')):
			?>
							<img src="<?php the_field('logo'); ?>">
			<?php
						endif;

						if(get_field('description')):
							the_field('description');
						endif;

						if(get_field('url')):
			?>
							<a href="<?php the_field('url'); ?>">More Info</a>
			<?php
						endif;
					endif;
				endwhile;
			?>
		<?php endif; ?>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
