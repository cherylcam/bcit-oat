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
		

		<header class="page-header">
			<h1 class="page-title">Careers</h1>
		</header><!-- .page-header -->
		
		<div class='careers-wrapper'>
			<h1>Civic Jobs BC</h1>
			<div class='jobPostings'>
			<?php
				$url = "https://www.civicjobs.ca/rss/pc?id=36"; // Civic Jobs Office Administration
				$feeds = file_get_contents($url);
				$rss = simplexml_load_string($feeds);
				$number_of_posts_to_show = 6;

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

					/* Regex to Remove Time and Timezone */
					$reg = '/\s[0-9]{2}:[0-9]{2}:[0-9]{2}\s[A-Z]{3}/m';
					$pubDate_formatted = preg_replace($reg, "", $item['pubDate']->__toString());
					
					/* Calculate how many days ago the Job was posted */
					$pubDate_seconds = strtotime($item['pubDate']->__toString());
					$date = strtotime('now');
					
					$pubDate_daysElapsed = floor(($date - $pubDate_seconds)/(60*60*24));
			?>
					<div class='posting'>
						<h2 class='title'><a href='<?php print_r($link); ?>'><?php print_r($title); ?></a></h2>
						<p class='pubDate'>Posted <?php print_r($pubDate_daysElapsed); ?> days ago</p>
						<p class='description'><?php print_r($description); ?></p>
						<p class='viewJob'><a href='<?php print_r($link); ?>'>View Posting</a><p>
					</div>
			<?php
					$counter++;
				endforeach;
			?>
			</div>
		</div>
	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
