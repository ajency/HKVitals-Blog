<?php
/*
Template Name: Search Page
*/
get_header(); 

global $query_string;

wp_parse_str( $query_string, $search_query );
//$search_query['paged'] = $search_query['page'];
/* $search_query[$query_split[0]] = urldecode($query_split[1]); */
$search_args = ( array(
	'posts_per_page'  => 15,
	's'               => get_search_query(),
) );
if (isset($_GET['page'])){
	$search_args['paged'] = $_GET['page'];
}

$search = new WP_Query ($search_args);

?>	
<div class="header_image position-relative">
	<div class="header">
		<div class="container">
			<div class="breadcrumbs-wrapper position-relative">
  				<div class="breadcrumbs-inside">
						<?php echo yoast_breadcrumb(); ?>
					</div>
				</div>
		</div>
	</div>
</div>
<div class="container category-container">
	<p class="text-black pl-15 f-14 article-count">
		<?php echo $search->found_posts . ' Articles Found for '.get_search_query(); ?>
	</p>
	<?php if ($search->found_posts) : ?>
	<div class="latest-reads category-list-view position-relative" data-taxonomy="search_page" data-type="post" data-count="<?php echo $wp_query->found_posts; ?>" data-search="<?php echo get_search_query(); ?>">
		<div class="category-post-row row m-0">
			<?php if( $search->have_posts() ) :
				while( $search->have_posts() ): $search->the_post(); ?>
					<?php get_template_part( 'page-templates/theme-sections/category', 'component' ); ?>
				<?php endwhile;
			endif; ?>
		</div>
		<div class="my-5 loader category-loader d-none justify-content-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loader.svg">
		</div>
	</div>
	
	<nav class="pagination-nav">
		<ul class="pagination">
			<?php 
			$currentPage = $_GET['page'] ?? 1;
			$pages = tb_get_pagination($search->found_posts, $currentPage); ?>

			<li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>" id="previous-page"> <a class="prev page-link" href="#">Prev</a></li>
			<?php  foreach ($pages as $page) : ?>
				<li class="page-item <?php echo ($currentPage == $page ? 'active' : ''); echo is_numeric($page) ? ' current-page' : ''; ?>" data-page="<?php echo is_numeric($page) ? $page : 0; ?>">
					<a class="page-link" href="javascript:void(0)"><?php echo $page; ?></a>
				</li>
			<?php endforeach; ?>
			<li class="page-item <?php echo $currentPage == end($pages) ? 'disabled' : ''; ?>" id="next-page"> <a class="next page-link" href="#">Next</a></li>
		</ul>
	</nav> 
	<?php else: ?>
		<div class="my-5 text-center"><h3>No results have been found.</h3></div>
	<?php endif; ?>
</div>
<?php
get_footer(); 

?>	
