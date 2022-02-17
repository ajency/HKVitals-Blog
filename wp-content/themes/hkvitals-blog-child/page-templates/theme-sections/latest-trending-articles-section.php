<div class="latest-articles">
    <div class="container section-heading latest-articles-title">Latest & Trending Articles</div>
        <div class="wraper">
        <?php
            wp_reset_query();
            $post_ids = (array) get_query_var('post_ids');
            $args = array(
                        'post_type' => array('post'),
                        'post_status' => 'publish',
                        'posts_per_page' => 2,
                    );
            $latest_posts = new wp_query( $args );
            if( $latest_posts->have_posts() ){
                while( $latest_posts->have_posts() ){
                    $latest_posts->the_post(); ?>
                    <div class="latest-articles-single">
                        <div class="latest-articles-single-container">
                            <div class="latest-articles-single-image">
                                <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                    <?php 
                                        $thumbnail = get_post_meta(get_the_id(), 'tb_large_image', true);
                                        if ( $thumbnail ) { ?>
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                        <?php } else if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('large', ['title' => get_the_title()], ['alt' => get_the_title()]); ?>
                                        <?php
                                        } else { ?>
                                            <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/09/default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                        <?php } ?>
                                </a>
                            </div>
                            <div class="latest-articles-single-content">
                                <div class="content-title">
                                    <h2 class="title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="content-description hide-desk"><?php echo tb_get_excerpt(230); ?></div>
                                <div class="content-description hide-mob"><?php echo tb_get_excerpt(280); ?></div>
                                <div class="w-100 action-btn hide-mob">
                                    <a href="<?php the_permalink(); ?>" class="tb-button">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?> 
        </div>
</div>