<div class="container explore-articles">
    <div class="section-heading latest-articles-title text-center">Explore Articles</div>
        <?php
            $args = array(
                'hide_empty'      => true,
                'meta_query' => array(
                    array(
                        'key'     => 'explore_category',
                        'value'   => '"Show in explore article section"',
                        'compare' => 'LIKE'
                    )
                )
            );
            $categories = get_categories($args);
            if($categories){ ?>
                <div class="category-buttons">
                    <?php foreach ($categories as $index => $category): ?>
                        <button type="button" class="tb-button tb-button--border category-buttons-single <?php if(!$index){
                            echo 'category-buttons-single-active'; $_POST['category_id'] = $category->term_id; }?>" data-val="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></button>
                    <?php endforeach; ?>
                </div>
            <?php } ?>
            <div class = "explore-articles-container">
                <?php get_template_part( 'page-templates/theme-sections/explore-articles', 'component' ); ?>
            </div>
	</div>
</div>