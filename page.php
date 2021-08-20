<?php get_header(); ?>

<?php if(!empty(get_the_content())): ?>
    <?php the_content(); ?>
<?php endif; ?>

<?php get_footer(); ?>