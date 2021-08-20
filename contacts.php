<?php 
/*
Template Name: Contacts
*/
 ?>
 <?php get_header(); ?>
 
 	<?php if(have_rows('flexible_content')): 
 	    while(have_rows('flexible_content')): the_row(); ?>
 	    <?php get_template_part( '/acf-blocks/' . get_row_layout() ) ?>
 	    <?php endwhile;
 	endif; ?>
 <?php get_footer(); ?>