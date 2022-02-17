<div class="article-single">
    <div class="wraper">
        <div class="article-single-image">
            <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                <?php 
                    $thumbnail = get_post_meta(get_the_id(), 'tb_thumbnail_image', true);
                    if ( $thumbnail ) { ?>
                        <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                        <?php
                    } else if ( has_post_thumbnail() ) {
                            the_post_thumbnail('medium', ['title' => get_the_title()], ['alt' => get_the_title()]); ?>
                    <?php } else { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                            <?php } ?>
                    <div class="gradient-overlay"></div>
            </a>
            <div class="cat-detail">
                <span class="last-read"><?php echo get_mins_read(); ?> Min read</span>
                <span class="dot"><i class="fa fa-circle" aria-hidden="true"></i></span>
                <?php $post_date = get_the_date( 'M j, Y' ); ?>
                <span class="last-read"><?php echo $post_date; ?></span>
            </div>
        </div>
        <div class="article-single-content">
            <div class="article-single-content-title">
                <h2 class="title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),7); ?></a></h2>
            </div>
            <div class="article-single-content-description"><?php echo tb_get_excerpt(59); ?></div>
        </div>
    </div>
</div>