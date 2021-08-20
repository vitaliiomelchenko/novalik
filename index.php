<?php get_header(); ?>

<?php
global $porto_settings, $page_share;

$post_layout = $porto_settings['post-layout'];
?>

<div id="content" role="main">
	<section class="blogPage">
		<div class="container">
			<div class="row justify-content-center justify-content-md-between">
				
				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array(
				    'post_type' => 'post',
				    'posts_per_page' => 16,
				    'paged' => $paged,
				    'publish' => true,
				    'operator' => 'NOT EXISTS'
				);
				query_posts($args);

				if ( have_posts() ){
				    while ( have_posts() ){
				        the_post();
				        ?>
				       
				    		<div class="col-12 col-sm-8 col-lg-3 mb-3 mb-lg-5">
				    			<?php 
				    			//должно находится внутри цикла
				    			if( has_post_thumbnail() ) {
				    				?>
				    					<article class="blogPage__card">
				    						<div class="date">
				    							<?php the_date('j F Y'); ?>
				    						</div>
				    						<div class="image">
				    							<?php the_post_thumbnail(); ?>
				    						</div>
				    						<div class="text">
				    							<h3 style="min-height: 75px;">
				    								<?php trim_title_chars(70, ''); ?>
				    							</h3>
				    							<a href="<?php the_permalink(); ?>" class="blue-btn">
				    								Читати далі
				    							</a>
				    						</div>
				    					</article>
				    				<?php
				    			}
				    			else {
				    				?>
				    				<article class="blogPage__card" style="height: 100%!important; justify-content: unset!important;">
				    					<div class="date">
				    						<?php the_date('j F Y'); ?>
				    					</div>
				    					<div class="text">
				    						<h3>
				    							<?php trim_title_chars(70, ''); ?>
				    						</h3>
				    						<a href="<?php the_permalink(); ?>" class="blue-btn">
				    							Читати далі
				    						</a>
				    					</div>
				    				</article>
				    				<?php
				    			}
				    			?>
				    		</div>
				        <?php
				    }
				} else {
				    echo wpautop( 'Posts not found' );
				}
				?>
			</div>
			<?php the_posts_pagination(array(

			    'prev_text'    => __('<svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
			    <path d="M3.56349e-07 4.92385L4.16266e-07 4.23848L4.50644 -4.31486e-08L4.94635 1.2986L2.19957 3.89579L1.12661 4.56313L2.18884 5.14028L5 7.71944L4.57082 9L3.56349e-07 4.92385Z" fill="#4F4F4E"/>
			    </svg>              
			    '),
			    'next_text'    => __('<svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
			    <path d="M5 4.07615V4.76152L0.493562 9L0.0536481 7.7014L2.80043 5.10421L3.87339 4.43687L2.81116 3.85972L0 1.28056L0.429185 0L5 4.07615Z" fill="#4F4F4E"/>
			    </svg>
			    '),

			            ));
			?>
		</div>
	</section>
</div>
<?php get_footer(); ?>
