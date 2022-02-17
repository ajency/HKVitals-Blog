<?php
$category = get_queried_object();
/* $hindi_cat = get_category_by_slug('hindi'); */
$args = array(
	'posts_per_page' => 15,
	'post_type' => array('post'),
	'post_status' => 'publish',
	'category__in' => $category->term_id,
);
if(isset($_GET['page'])){
	$args['paged'] = $_GET['page'];
}
/* if($category->term_id != $hindi_cat->term_id){
	$args['category__not_in'] = array($hindi_cat->term_id);
} */
query_posts( $args );
global $wp_query; 
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
	<h1 class="category-name">
		<?php echo $category->name;  ?>
	</h1>
	<p class="text-black article-count">
		<?php echo $category->count . ' Articles '; ?>
	</p>
	<div class="latest-reads category-list-view position-relative" data-category="<?php echo $category->term_id; ?>" data-type="post" data-count="<?php echo $wp_query->found_posts; ?>" data-taxonomy="<?php echo $category->taxonomy; ?>">
		<div class="category-post-row row m-0">
			<?php if( have_posts() ) :
				while( have_posts() ): the_post();
					get_template_part( 'page-templates/theme-sections/category', 'component' );
				endwhile;
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
			$pages = tb_get_pagination($wp_query->found_posts, $currentPage); ?>

			<li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>" id="previous-page"> <a class="prev page-link" href="#">Prev</a></li>
			<?php  foreach ($pages as $page) : ?>
				<li class="page-item <?php echo ($currentPage == $page ? 'active' : ''); echo is_numeric($page) ? ' current-page' : ''; ?>" data-page="<?php echo is_numeric($page) ? $page : 0; ?>">
					<a class="page-link" href="javascript:void(0)"><?php echo $page; ?></a>
				</li>
			<?php endforeach; ?>
			<li class="page-item <?php echo $currentPage == end($pages) ? 'disabled' : ''; ?>" id="next-page"> <a class="next page-link" href="#">Next</a></li>
		</ul>
	</nav> 
</div>