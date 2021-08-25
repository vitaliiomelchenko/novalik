<div class="product">
	<div class="product-image">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="product_title"><?php the_title(); ?></div>
	<?php do_action( 'porto_woocommerce_before_shop_loop_item_title' ); ?>
	<div class="product_add_to_cart_wrapper">
		<div class="product_price">
			<?php do_action('product_price'); ?>
		</div>
		<div class="product_buy_button"><a href="<?php the_permalink(  ) ?>">Купить</a></div>
	</div>
</div>