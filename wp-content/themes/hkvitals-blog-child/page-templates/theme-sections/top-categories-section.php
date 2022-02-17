<div class="container top-categories">
    <div class="hide-desk section-heading top-categories-title">Top stories</div>
    <div class="top-categories-container">
        <?php $categories = get_terms([
            'taxonomy' => 'category',
            'meta_query' => array(
                array(
                    'key'     => 'featured_categories',
                    'value'   => '"Add as a featured category"',
                    'compare' => 'LIKE'
                )
            )
        ]);
        foreach ($categories as $category){?>
            <div class="top-categories-single">
                <a href="<?php echo get_category_link($category->term_id); ?>" >
                    <?php
                        $cat_image = get_field('image', $category->taxonomy . '_' . $category->term_id );
                    ?>
                    <img title="<?php echo $category->name; ?>" src="<?php echo $cat_image; ?>" alt="<?php echo $category->name; ?>"/>
                    <div class="gradient-overlay"></div>
                    <div class="top-categories-single-title"><?php echo $category->name; ?></div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>