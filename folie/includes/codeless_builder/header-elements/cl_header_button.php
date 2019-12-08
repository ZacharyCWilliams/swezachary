<?php 
    
    extract( $element['params'] ); 

?>

<a href="<?php echo esc_url($link) ?>" class="<?php echo esc_attr( codeless_button_classes() ) ?> cl_header_button <?php echo esc_attr( $this->generateClasses('.cl_header_button') ) ?>" <?php $this->generateStyle('.cl_header_button', true ) ?>><span><?php echo cl_remove_empty_p( cl_remove_wpautop($btn_title, true) ) ?></span></a>