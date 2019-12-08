<?php
/**
 * Media Content
 *
 * @package Folie
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

?>
<div class="entry-wrapper-content">

	<div class="entry-content">

		<h3 class="portfolio-title custom_font h3"> 

			<a href="<?php echo codeless_portfolio_item_permalink() ?>" target="<?php echo codeless_portfolio_item_permalink_target() ?>" class="cl-portfolio-title" title="<?php the_title() ?>"><?php the_title() ?></a>
			
		</h3>

		<div class="content">

			<?php the_excerpt() ?>

		</div><!-- content -->
		<div class="link"><a href="<?php the_permalink() ?>"><?php esc_attr_e('Expand', 'folie'); ?> -></a></div>
		
	</div><!-- entry-content -->

</div><!-- entry-wrapper-content -->