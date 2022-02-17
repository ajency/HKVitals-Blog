<div class="explore-articles-container-list">
                    <?php 
                        /* $hindi_cat = get_category_by_slug('hindi'); */
                        $post_ids = get_query_var('post_ids');
                        $args1 = array(
                                'posts_per_page' => 6,
                                'post_type' => array('post'),
                                'post_status' => 'publish',
                                'cat' => $_POST['category_id'],
                                /* 'category__not_in' => array($hindi_cat->term_id), */
                                'meta_query' => array(
                                    array(
                                        'key'     => 'choose_article_location',
                                        'value'   => '"Explore Article"',
                                        'compare' => 'LIKE'
                                    )
                                )
                            );
                        $main_post = new wp_query( $args1 );
                        if( $main_post->have_posts() ) {
                            while( $main_post->have_posts() ) {
                                $main_post->the_post();
                                if(is_array($post_ids)){
                                    $post_ids[] = get_the_id();
                                }
                                ?>
                                <?php get_template_part( 'page-templates/theme-sections/category', 'component' ); ?>
                            <?php }
                        } 
                        set_query_var( 'post_ids', $post_ids ); ?>
                </div>
                <?php
                    $args2 = array(
                        'posts_per_page' => -1,
                        'post_type' => array('post'),
                        'post_status' => 'publish',
                        'cat' => $_POST['category_id'],
                        /* 'category__not_in' => array($hindi_cat->term_id), */
                    );
                    $posts_in_cat = new wp_query( $args2 );
                    $total_post_in_cat = $posts_in_cat->found_posts;
                    if($total_post_in_cat >= 7){?>
                        <div class="action-btn text-center">
                            <a href="<?php echo get_category_link($_POST['category_id']); ?>" class="tb-button">View more</a>
                        </div>
                    <?php } ?>
                    <div class="my-5 loader explore-articles-loader d-none">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loader.svg">
                    </div>