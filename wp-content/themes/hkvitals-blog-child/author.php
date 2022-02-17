<?php
get_header(); 
?>
<div class="single-post">
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

	<div class="single_post_page">
		<div class="container">
			<div class="single-post-content">
				<div class="entry-content">
                    <div class="author-details">
                            <?php 
                                $user_info = get_user_by( 'slug', get_query_var( 'author_name' ) );
                                if (!empty(get_avatar_url( $user_info->ID ))){?>
                                    <img class="author-details-avatar" src="<?php echo esc_url( get_avatar_url( $user_info->ID ) ); ?>" /><?php
                                }
                                if (!empty(get_field('designation', 'user_'.$user_info->ID))){
                                    ?><p class="author-details-designation"><?php echo the_field('designation', 'user_'.$user_info->ID); ?></p>
                                <?php } ?>
                                <h1 class="author-details-dname"><?php echo $user_info->display_name; ?></h1>
                                <?php
                                    $facebook = get_the_author_meta( 'facebook', $user_info->ID );
                                    $instagram = get_the_author_meta( 'instagram', $user_info->ID );
                                    $linkedin = get_the_author_meta( 'linkedin', $user_info->ID );
                                    $myspace = get_the_author_meta( 'myspace', $user_info->ID );
                                    $pinterest = get_the_author_meta( 'pinterest', $user_info->ID );
                                    $soundcloud = get_the_author_meta( 'soundcloud', $user_info->ID );
                                    $tumblr = get_the_author_meta( 'tumblr', $user_info->ID );
                                    $twitter = get_the_author_meta( 'twitter', $user_info->ID );
                                    $youtube = get_the_author_meta( 'youtube', $user_info->ID );
                                    $wikipedia = get_the_author_meta( 'wikipedia', $user_info->ID );
                                        
                                if(!empty($facebook || $instagram || $linkedin || $myspace || $pinterest || $soundcloud || $tumblr || $twitter || $youtube || $wikipedia )){?>
                                    <div class="author-details-social-media">
                                        <!-- facebook -->
                                        <?php if (!empty($facebook)){ ?>
                                        <a href="<?php echo esc_url($facebook); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <?php } ?>
                                        <!-- instagram -->
                                        <?php if (!empty($instagram)){ ?>
                                        <a href="<?php echo esc_url($instagram); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-instagram"></i></a>
                                        <?php } ?>
                                        <!-- linkedin -->
                                        <?php if (!empty($linkedin)){ ?>
                                        <a href="<?php echo esc_url($linkedin); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <?php } ?>
                                        <!-- myspace -->
                                        <?php if (!empty($myspace)){ ?>
                                        <a href="<?php echo esc_url($myspace); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-external-link"></i></a>
                                        <?php } ?>
                                        <!-- pinterest -->
                                        <?php if (!empty($pinterest)){ ?>
                                        <a href="<?php echo esc_url($pinterest); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        <?php } ?>
                                        <!-- soundcloud -->
                                        <?php if (!empty($soundcloud)){ ?>
                                        <a href="<?php echo esc_url($soundcloud); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-soundcloud"></i></a>
                                        <?php } ?>
                                        <!-- tumblr -->
                                        <?php if (!empty($tumblr)){ ?>
                                        <a href="<?php echo esc_url($tumblr); ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-tumblr"></i></a>
                                        <?php } ?>
                                        <!-- twitter -->
                                        <?php if (!empty($twitter)){ ?>
                                        <a href="<?php echo "https://twitter.com/".$twitter; ?>" class="social-media-icons" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <?php } ?>
                                        <!-- youtube -->
                                        <?php if (!empty($youtube)){ ?>
                                        <a href="<?php echo esc_url($youtube); ?>" rel="nofollow" class="social-media-icons" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                        <?php } ?>
                                        <!-- wikipedia -->
                                        <?php if (!empty($wikipedia)){ ?>
                                        <a href="<?php echo esc_url($wikipedia); ?>" rel="nofollow" class="social-media-icons" target="_blank"><i class="fa fa-wikipedia-w"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php $author_bio = get_the_author_meta( 'user_description', $user_info->ID);
                                if(!empty($author_bio)){?>
                                    <p class="author-details-bio"> <?php echo esc_textarea($author_bio) ?> </p>
                                <?php } ?>
                    </div>
				</div> 
				<div class="latest-articles">
					<div class="section-heading">Latest Articles</div>
						<?php 
							$post_ids = [];
							$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
							$args = array(
								'posts_per_page' => 6,
								'author__in'   => array( $author->ID ),
								'no_found_rows'  => true,
								'author'        =>  $author->ID,
							);
								
							// Query posts
							$wpex_query = new wp_query( $args );
                            // Loop through posts
							if( $wpex_query->have_posts() ) :?>
                                <div class="latest-articles-container">
                                    <?php while( $wpex_query->have_posts() ) :
                                        $wpex_query->the_post(); 
                                        $post_ids[] = get_the_id();?>
                                            <?php get_template_part( 'page-templates/theme-sections/category', 'component' );?>
                                    <?php endwhile; ?>
                                </div>
							<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>	
