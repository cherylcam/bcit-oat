<?php
/**
 * The template for displaying career pages
 *
 * This is the template that displays career pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
		?>

		<?php
			$url = "https://www.civicjobs.ca/rss/pc?id=36"; // Civic Jobs Office Administration
			$feeds = file_get_contents($url);
			$rss = simplexml_load_string($feeds);
			$number_of_posts_to_show = 4;

			$items = [];

			foreach($rss->channel->item as $entry):
				$items[] = [
					'title' 		=> $entry->title,			// Title
					'link' 			=> $entry->link,			// Link
					'description' 	=> $entry->description,		// Description
					'pubDate' 		=> $entry->pubDate,			// Publication Date
				];
			endforeach;

			$counter = 0;
			foreach($items as $item):
				/* Show a set number of most recent Posts */
				if($counter === $number_of_posts_to_show):
					break;
				endif;

				/* Parse XML Object into Usable String */
				$title = $item['title']->__toString();
				$link = $item['link']->__toString();
				$description = $item['description']->__toString();
				$pubDate = $item['pubDate']->__toString();
		?>
			<div class='jobPosting'>
				<a class='title' href='<?php print_r($link); ?>'><h1><?php print_r($title); ?></h1></a>
				<span class='pubDate'><?php print_r($pubDate); ?></span>
				<p class='description'><?php print_r($description); ?></p>
				<a class='viewJob' href='<?php print_r($link); ?>'>View Posting</a>
			</div>
		<?php
				$counter++;
			endforeach;
		?>
	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
