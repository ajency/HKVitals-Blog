<?php
/* read these next */
add_shortcode( 'read-these-next', function(){ ?>
	<div class="section-title"> What to read next</div>
	<?php
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		$currentCat = $categories[0]->name;
	}
	?>
		<div class="read-these-next">
			<?php
				$args = array(
					'posts_per_page' => 6,
					'post_type' => 'post',
					'category_name' => $currentCat,
					'post__not_in'   => array( get_the_ID() ),
					'no_found_rows'  => true, 
					/* 'date_query'    => array(
						'column'  => 'post_date',
						'before'   => get_the_date('Y-m-d')
					), */
				);
	// 			foreach($args as $val){
	//   if(!is_array($val)){
	//         echo $val, '<br>';
	//     }
	// }
				// Query posts
				$count = 0;
				$wpex_query = new wp_query( $args );?>
				<?php  // Loop through posts
				if( $wpex_query->have_posts() ) :
				while( $wpex_query->have_posts() ) :
				$wpex_query->the_post(); 
				$post_ids[] = get_the_id();
				$count ++;
				?>
					<div class="col-md-4 col-12 recent-post p-0">
						<div class="single-post row">
							<div class="img-container">
								<div class="recent-post-featured-img">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php 
										$thumbnail = get_post_meta(get_the_id(), 'tb_thumbnail_image', true);
										if ( $thumbnail ) { ?>
											<img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
										<?php } else if ( has_post_thumbnail() ) {
										the_post_thumbnail('medium', ['title' => get_the_title()]); ?>
										<?php
										} else { ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
										<?php } ?>
									</a>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-link"><div class="gradient-overlay"></div></a>
							<div class="next-articles">
								<div class="recent-post-header">
									<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo ((strlen(get_the_title())>100) ? (substr(get_the_title(), 0, 100) . "...") : get_the_title()) ?></a></h2>
								</div>
							</div>
						</div>
					</div>
				<?php 
				if($count == 6){
					break;
				}
				endwhile; ?>
			<?php endif; ?>
		</div>
<?php });
/* subscribe form */
add_shortcode( 'Subscribe-form', function(){?>
	<div class="form-wrapper subscribe-section">
		<div class="wrap">
			<h2 class="form-title">Sign up for the newsletter</h2>
			<p>If you want relevant updates occasionally, sign up for the private newsletter.</p>
			<p> Your email is never shared.</p>
			<div class="form-group">
		      	<?php echo do_shortcode( '[formidable id=3]' ) ?>
			</div>
		</div>
	</div>
<?php });

