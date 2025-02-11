<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_cat_title = isset($show_title)?$show_title:true;
$show_cat_product_count = isset($show_product_count)?$show_product_count:true;
$show_cat_view_shop_button = isset($show_view_shop_button)?$show_view_shop_button:true;
$cat_view_shop_button_text = isset($view_shop_button_text)?$view_shop_button_text:__('View Shop Now', 'upstore');
$cat_style = isset($style)?$style:'style-1';

$term_link = get_term_link( $category, 'product_cat' );
?>
<section <?php wc_product_cat_class('product-category product', $category); ?>>

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
	
	<a href="<?php echo esc_url($term_link) ?>">
	<?php
		/**
		 * woocommerce_before_subcategory_title hook
		 *
		 * @hooked woocommerce_subcategory_thumbnail - 10
		 */
		do_action( 'woocommerce_before_subcategory_title', $category );
		
		if ( $show_cat_product_count && $cat_style == 'style-2' ){
			echo apply_filters( 'woocommerce_subcategory_count_html', '<div class="count">' . sprintf( _n( '%s Product', '%s Products', $category->count, 'upstore' ), $category->count ) . '</div>', $category );
		}
	?>
	</a>
	
	<div class="meta-wrapper">
		<?php if( $show_cat_title ){ ?>
		<div class="category-name">
			<h3 class="heading-title">
				<a href="<?php echo esc_url($term_link) ?>">
					<?php echo esc_html($category->name); ?>
				</a>
			</h3>
			<?php 
			if ( $show_cat_product_count && $cat_style != 'style-2' ){
				echo apply_filters( 'woocommerce_subcategory_count_html', '<div class="count">' . sprintf( _n( '%s Product', '%s Products', $category->count, 'upstore' ), $category->count ) . '</div>', $category );
			}
			?>
		</div>
		<?php } ?>
		<?php if( $show_cat_view_shop_button ){ ?>
		<div class="button">
			<a href="<?php echo esc_url($term_link) ?>" class="shop-now-button">
				<?php echo esc_html($cat_view_shop_button_text); ?>
			</a>
		</div>
		<?php } ?>
	</div>
	
	<?php
		/**
		 * woocommerce_after_subcategory_title hook
		 */
		do_action( 'woocommerce_after_subcategory_title', $category );
	?>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</section>