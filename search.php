<?php get_header(); ?>
<section class="search_res_wrapper">
    <div class="container">
        <div class="search_page_title"><?php the_search_query(); ?></div>
        <div class="search_res_items row">
            <?php 
            function wpdocs_custom_excerpt_length( $length ) {
                return 20;
            }
            add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
            ?>
            <?php if(have_posts()):
                while(have_posts()): the_post(); ?>
                <div class="search_res_item_wrapper col-lg-3 col-md-6 col-12">
                    <div class="search_res_item">
                        <div class="item_image"><?php the_post_thumbnail(); ?></div>
                        <div class="item_title"><?php the_title(); ?></div>
                        <a class="view_item_button" href="<?php the_permalink(  ); ?>">Читать дальше</a>
                    </div>
                </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>