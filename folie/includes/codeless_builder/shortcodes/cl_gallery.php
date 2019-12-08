<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( ! isset( $gallery_id ) || empty( $gallery_id ) )
	$gallery_id = 'cl_gallery_' . str_replace( ".", '-', uniqid("", true) );

if( $carousel_gallery )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

if( $lightbox_gallery ){
	wp_enqueue_style('ilightbox-skin', CODELESS_BASE_URL . 'css/ilightbox/'.codeless_get_mod( 'lightbox_skin', 'dark' ).'-skin/skin.css' );
	wp_enqueue_style('ilightbox', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css' );
}

?>

<div class="cl_gallery cl-element <?php echo esc_attr( $this->generateClasses('.cl_gallery') ) ?>" <?php $this->generateStyle('.cl_gallery', '', true) ?>>
<?php $images = codeless_js_object_to_array($images); if( !empty($images) ): foreach($images as $img_id): ?>
	<div class="gallery-item"  <?php $this->generateStyle('.cl_gallery .gallery-item', '', true) ?>>
		<div class="inner-wrapper">
			<?php echo codeless_generate_image( $img_id, $image_size ); ?>
			<?php if( $lightbox_gallery ): ?>
				<div class="overlay">
				    <a data-lboxid="<?php echo esc_attr( $gallery_id ) ?>" href="<?php echo esc_url( wp_get_attachment_url( $img_id ) ) ?>" class="entry-lightbox"><i class="cl-icon-search"></i></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endforeach; endif; ?>
</div>