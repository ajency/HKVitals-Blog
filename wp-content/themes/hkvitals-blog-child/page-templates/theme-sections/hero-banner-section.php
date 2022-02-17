<div class="container hero-banner">
    <div class="banner-container">
        <?php
            $args = array(
                        'post_type' => array('post'),
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'meta_query' => array(
                            array(
                                'key'     => 'choose_article_location',
                                'value'   => '"Banner Article"',
                                'compare' => 'LIKE'
                            )
                        )

                    );
            $banner_posts = new wp_query( $args );
            if( $banner_posts->have_posts() ){
                while( $banner_posts->have_posts() ){
                    $banner_posts->the_post();
                    $post_ids[] = get_the_ID();?>
                    <div class="single-slide">
                        <div class="single-slide__img">
                            <img src="<?php echo the_post_thumbnail_url('large');?>" alt="<?php echo get_the_title();?>" title="<?php echo get_the_title();?>" data-lazy="<?php echo the_post_thumbnail_url('large');?>" class="full-image"/>
                        </div>
                        <div class="gradient-overlay"></div>
                        <div class="single-slide__content1">
                            <h2 class="f-20 blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="blog-desc hide-mob"><?php echo tb_get_excerpt(160); ?></span>
                            <p class="blog-desc hide-desk"><?php echo tb_get_excerpt(140); ?></span>
                            <?php $categories = tb_get_category(get_the_ID());  ?>
                            <div class="category-container">
                                <span class="category">
                                    <?php foreach($categories as $index => $category){ ?>
                                        <a class="category" title="<?php echo $category->name; ?>" href="<?php echo get_category_link($category); ?>" rel="category tag"><?php echo $category->name; ?></a>
                                        <?php if($index+1 != count($categories)){
                                            }
                                    } ?>
                                </span>
                                <span class="dot"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <span class="last-read"><?php echo get_mins_read(); ?> Min Read</span>
                                <span class="dot"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <?php $post_date = get_the_date( 'M j, Y' ); ?>
                                <span class="date"><?php echo $post_date; ?></span>
                            </div>
                            <div class="read-more-button">
                                <a href="<?php the_permalink(); ?>" class="tb-button tb-button--transparent"><span>Read more</span></a>
                            </div>
                        </div>
                        <div class="single-slide__content2 hide-mob">
                            <h2 class="blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),4);?></a></h2>
                        </div>
                        <div class="single-slide__content2 hide-desk">
                            <h2 class="blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                        </div>
                    </div>
                <?php }
            }else{
                echo "no posts selected!";
            }
        ?>
    </div>
</div>