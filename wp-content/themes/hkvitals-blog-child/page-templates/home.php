<?php
/**
 * Genesis Sample.
 *
 * This file adds the landing page template to the Genesis Sample Theme.
 *
 * Template Name: Home
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */
get_header();
?>

<div class="container-main">
	<?php 
		get_template_part( 'page-templates/theme-sections/hero-banner', 'section' );
		get_template_part( 'page-templates/theme-sections/top-categories', 'section' );
		get_template_part( 'page-templates/theme-sections/latest-trending-articles', 'section' );
		get_template_part( 'page-templates/theme-sections/explore-articles', 'section' );
		get_template_part( 'page-templates/theme-sections/more-articles', 'section' );
	?>
</div>

<?php get_footer();