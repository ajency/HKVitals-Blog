<?php
get_header(); 
$category = get_queried_object();
get_template_part( 'page-templates/theme-sections/tag-single', 'section' );
get_footer(); 

?>	
