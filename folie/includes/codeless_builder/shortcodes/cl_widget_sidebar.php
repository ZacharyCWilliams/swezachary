<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_reset_postdata();

?>

<aside class="cl_widget_sidebar style-<?php echo esc_attr( $sidebar ); ?>" <?php $this->generateStyle('.cl_blog', true) ?>>
	<?php dynamic_sidebar( $sidebar ); ?>
</aside>