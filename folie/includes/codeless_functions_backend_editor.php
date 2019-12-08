<?php
/*vc_remove_element("vc_row_inner");
vc_remove_element("vc_column_inner");*/
vc_remove_element("vc_row");
vc_remove_element("vc_column");
//vc_remove_element("contact-form-7");
vc_remove_element("rev_slider_vc");
vc_remove_element("layerslider_vc");
vc_remove_element("vc_column_text");

// Create multi dropdown param type

if( function_exists( 'vc_add_short_param' ) ){
	vc_add_short_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
	function dropdown_multi_settings_field( $param, $value ) {
	   $param_line = '';

	   $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
	   foreach ( $param['value'] as $text_val => $val ) {
	       if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
	                    $text_val = $val;
	                }
	              
	                $selected = '';

	                if(!is_array($value)) {
	                    $param_value_arr = explode(',',$value);
	                } else {
	                    $param_value_arr = $value;
	                }

	                if ($value!=='' && in_array($val, $param_value_arr)) {
	                    $selected = ' selected="selected"';
	                }
	                $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
	            }
	   $param_line .= '</select>';

	   return  $param_line;
	}
}


vc_map( array (
	'base' => 'cl_row',
  	'name' => __( 'Row', 'folie' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'folie' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Place content elements inside the row', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_row' ),
	'js_view' => 'VcRowView'
));


vc_map( array (
	'base' => 'cl_column',
	'name' => __( 'Column', 'folie' ),
	'icon' => 'icon-wpb-row',
	'is_container' => true,
	'content_element' => false,
	'description' => __( 'Place content elements inside the column', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_column', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'folie' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'folie' ) => '1/12',
				__( '2 columns - 1/6', 'folie' ) => '1/6',
				__( '3 columns - 1/4', 'folie' ) => '1/4',
				__( '4 columns - 1/3', 'folie' ) => '1/3',
				__( '5 columns - 5/12', 'folie' ) => '5/12',
				__( '6 columns - 1/2', 'folie' ) => '1/2',
				__( '7 columns - 7/12', 'folie' ) => '7/12',
				__( '8 columns - 2/3', 'folie' ) => '2/3',
				__( '9 columns - 3/4', 'folie' ) => '3/4',
				__( '10 columns - 5/6', 'folie' ) => '5/6',
				__( '11 columns - 11/12', 'folie' ) => '11/12',
				__( '12 columns - 1/1', 'folie' ) => '1/1',
			),
			'group' => __( 'General', 'folie' ),
			'description' => __( 'Select column width.', 'folie' ),
			'std' => '1/1',
		) ),
	'js_view' => 'VcColumnView',
));


vc_map( array(
	'base' => 'cl_row_inner',
	'name' => __( 'Inner Row', 'folie' ),
	//Inner Row
	'content_element' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'weight' => 1000,
	'show_settings_on_create' => false,
	'description' => __( 'Place content elements inside the inner row', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_row_inner' ),
	'js_view' => 'VcRowView',
));


vc_map( array(
	'base' => 'cl_column_inner',
	'name' => __( 'Inner Column', 'folie' ),
	'icon' => 'icon-wpb-row',
	'class' => '',
	'wrapper_class' => '',
	'controls' => 'full',
	'allowed_container_element' => false,
	'content_element' => false,
	'is_container' => true,
	'description' => __( 'Place content elements inside the inner column', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_column_inner', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'folie' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'folie' ) => '1/12',
				__( '2 columns - 1/6', 'folie' ) => '1/6',
				__( '3 columns - 1/4', 'folie' ) => '1/4',
				__( '4 columns - 1/3', 'folie' ) => '1/3',
				__( '5 columns - 5/12', 'folie' ) => '5/12',
				__( '6 columns - 1/2', 'folie' ) => '1/2',
				__( '7 columns - 7/12', 'folie' ) => '7/12',
				__( '8 columns - 2/3', 'folie' ) => '2/3',
				__( '9 columns - 3/4', 'folie' ) => '3/4',
				__( '10 columns - 5/6', 'folie' ) => '5/6',
				__( '11 columns - 11/12', 'folie' ) => '11/12',
				__( '12 columns - 1/1', 'folie' ) => '1/1',
			),
			'group' => __( 'General', 'folie' ),
			'description' => __( 'Select column width.', 'folie' ),
			'std' => '1/1',
		) ),
));

vc_map( array (
	'base' => 'cl_page_header',
  	'name' => __( 'Page Header', 'folie' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'as_child' => array(
		'only' => '', // Only root
	),
	
	'category' => __( 'Content', 'folie' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Can be edited only on Customizer', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_page_header' ),
));

class WPBakeryShortCode_CL_Page_Header extends WPBakeryShortCode_CL{ 
	public function getBackendEditorControlsElementCssClass() {
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();

		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) && $moveAccess ? ' vc_element-move vc_column-move' : ' ' . $this->nonDraggableClass );

		return 'vc_control-btn vc_element-name' . $sortable;
	}
 }

vc_map( array(
	'base' => 'cl_text',
	'name' => __( 'Text', 'folie' ),
	'icon' => 'icon-wpb-layer-shape-text',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'A block of text with WYSIWYG editor', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_text' ),
));

class WPBakeryShortCode_CL_Text extends WPBakeryShortCode_CL { }

vc_map( array(
	'base' => 'cl_custom_heading',
	'name' => __( 'Custom Heading', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/title_heading.png',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'folie' ),
	'show_settings_on_create' => true,
	'description' => __( 'Text with Google fonts', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_custom_heading' ),
));

class WPBakeryShortCode_CL_Custom_Heading extends WPBakeryShortCode_CL { }

vc_map( array(
	'base' => 'cl_service',
	'name' => __( 'Service', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/services_circle.png',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'folie' ),
	'show_settings_on_create' => true,
	'description' => __( 'Build a service Element', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_service' ),
));

class WPBakeryShortCode_CL_Service extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_slider',
  	'name' => __( 'Codeless Slider', 'folie' ),
	'is_container' => true,
	'icon' => get_template_directory_uri().'/img/icons/slideshow.png',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'folie' ),
	'js_view' => 'VcColumnView',
	'as_parent' => array(
		'only' => 'cl_slide',
	),
	'as_child' => array(
		'only' => '', // Only root
	),
	'class' => 'vc_main-sortable-element',
	'params' => codeless_generate_backend_params( 'cl_slider' ),
));

vc_map( array (
	'base' => 'cl_slide',
  	'name' => __( 'Slide', 'folie' ),
	'is_container' => true,
	'icon' => 'icon-wpb-single-image',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'folie' ),
	

	'as_child' => array(
		'only' => 'cl_slider',
	),

	'class' => 'vc_main-sortable-element',
	'params' => codeless_generate_backend_params( 'cl_slide' ),
));


class WPBakeryShortCode_CL_Slider extends WPBakeryShortCodesContainer_CL { }
class WPBakeryShortCode_CL_Slide extends WPBakeryShortCodesContainer_CL { }

vc_map( array (
	'base' => 'cl_media',
  	'name' => __( 'Media', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/media.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Simple image with CSS animation', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_media' ),
));

class WPBakeryShortCode_CL_Media extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_button',
  	'name' => __( 'Button', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/button.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Add a button', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_button' ),
));

class WPBakeryShortCode_CL_Button extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_divider',
  	'name' => __( 'Divider', 'folie' ),
	 'icon' => get_template_directory_uri().'/img/icons/separator.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Add a divider element between elements', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_divider' ),
));

class WPBakeryShortCode_CL_Divider extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_gallery',
  	'name' => __( 'Gallery', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/slideshow.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Add a gallery of images', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_gallery' ),
));

class WPBakeryShortCode_CL_Gallery extends WPBakeryShortCode_CL { }

vc_map( array (
	'base' => 'cl_clients',
  	'name' => __( 'Clients', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/clients.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Add clients carousel', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_clients' ),
));

class WPBakeryShortCode_CL_Clients extends WPBakeryShortCode_CL { }

vc_map( array (
	'base' => 'cl_empty_space',
  	'name' => __( 'Empty Space', 'folie' ),
	'icon' => 'icon-wpb-ui-empty_space',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Empty Space between elements', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_empty_space' ),
));

class WPBakeryShortCode_CL_Empty_Space extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_counter',
  	'name' => __( 'Counter', 'folie' ),
	'show_settings_on_create' => true,
	'icon' => get_template_directory_uri().'/img/icons/counter.png',
	'category' => __( 'Content', 'folie' ),
	'description' => __( 'Counter element', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_counter' ),
));

class WPBakeryShortCode_CL_Counter extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_countdown',
  	'name' => __( 'Countdown', 'folie' ),
	'show_settings_on_create' => true,
	'icon' => get_template_directory_uri().'/img/icons/countdown.png',
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_countdown' ),
));

class WPBakeryShortCode_CL_Countdown extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_progress_bar',
  	'name' => __( 'Progress Bar', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/skills.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_progress_bar' ),
));

class WPBakeryShortCode_CL_Progress_Bar extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_map',
  	'name' => __( 'Google Map', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/maps.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	
	'params' => codeless_generate_backend_params( 'cl_map' ),
));

class WPBakeryShortCode_CL_Map extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_icon',
  	'name' => __( 'Icon', 'folie' ),
	'icon' => 'icon-wpb-vc_icon',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_icon' ),
));

class WPBakeryShortCode_CL_Icon extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_socialicon',
  	'name' => __( 'Social Icons', 'folie' ),
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_socialicon' ),
));

class WPBakeryShortCode_CL_Socialicon extends WPBakeryShortCode_CL { }










if( function_exists( 'mc4wp_show_form' ) ){

	vc_map( array (
		'base' => 'cl_mailchimp',
	  	'name' => __( 'Mailchimp', 'folie' ),
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'folie' ),
		'params' => codeless_generate_backend_params( 'cl_mailchimp' ),
	));

	class WPBakeryShortCode_CL_Mailchimp extends WPBakeryShortCode_CL { }

}








vc_map( array (
	'base' => 'cl_testimonial',
  	'name' => __( 'Testimonial', 'folie' ),
  	'icon' => get_template_directory_uri().'/img/icons/testimonial.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_testimonial' ),
));

class WPBakeryShortCode_CL_Testimonial extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_blog',
  	'name' => __( 'Blog', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/latest_blog.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_blog' ),
));

class WPBakeryShortCode_CL_Blog extends WPBakeryShortCode_CL { }



vc_map( array (
	'base' => 'cl_team',
  	'name' => __( 'Team', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/staff_single.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_team' ),
));

class WPBakeryShortCode_CL_Team extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_portfolio',
  	'name' => __( 'Portfolio', 'folie' ),
    'icon' => get_template_directory_uri().'/img/icons/recent_portfolio.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio' ),
));

class WPBakeryShortCode_CL_Portfolio extends WPBakeryShortCode_CL { }


/*
 * Not for folie
vc_map( array (
	'base' => 'cl_portfolio_nav',
  	'name' => __( 'Portfolio Nav', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/recent_portfolio.png',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio_nav' ),
));
class WPBakeryShortCode_CL_Portfolio_Nav extends WPBakeryShortCode_CL { }
*/


vc_map( array (
	'base' => 'cl_toggles',
  	'name' => __( 'Toggles', 'folie' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_toggle',
	),
	'icon' => get_template_directory_uri().'/img/icons/list.png',
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_toggles' ),
	'js_view' => 'VcColumnView',
));

class WPBakeryShortCode_CL_Toggles extends WPBakeryShortCodesContainer_CL { }

vc_map( array (
	'base' => 'cl_toggle',
  	'name' => __( 'Toggle', 'folie' ),
	'is_container' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_toggle' ),
	'as_child' => array(
		'only' => 'cl_toggles',
	),

));

class WPBakeryShortCode_CL_Toggle extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_tabs',
  	'name' => __( 'Tabs', 'folie' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_tab',
	),
	'icon' => get_template_directory_uri().'/img/icons/tabs.png',
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_tabs' ),
));

class WPBakeryShortCode_CL_Tabs extends WPBakeryShortCodesContainer_CL { }


vc_map( array (
	'base' => 'cl_tab',
  	'name' => __( 'Tab', 'folie' ),
	'is_container' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_tab' ),
	'as_child' => array(
		'only' => 'cl_tabs',
	),
));

class WPBakeryShortCode_CL_Tab extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_pricelist',
  	'name' => __( 'Price List', 'folie' ),
	 'is_container' => true,
	 'icon' => get_template_directory_uri().'/img/icons/price_list.png',
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_list_item',
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_pricelist' ),
));

class WPBakeryShortCode_CL_Pricelist extends WPBakeryShortCodesContainer_CL { }



vc_map( array (
	'base' => 'cl_list',
  	'name' => __( 'List', 'folie' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => array( 'cl_list_item', 'cl_table_row'),
	),
	'icon' => get_template_directory_uri().'/img/icons/list.png',
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_list' ),
));

class WPBakeryShortCode_CL_List extends WPBakeryShortCodesContainer_CL { }


vc_map( array (
	'base' => 'cl_list_item',
  	'name' => __( 'List Item', 'folie' ),
	'is_container' => false,
	'category' => __( 'List Elements', 'folie' ),
	'icon' => get_template_directory_uri().'/img/icons/list_item.png',
	'params' => codeless_generate_backend_params( 'cl_list_item' ),
	'as_child' => array(
		'only' => 'cl_list',
	),
));

class WPBakeryShortCode_CL_List_Item extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_share',
  	'name' => __( 'Share Buttons', 'folie' ),
	'icon' => 'icon-wpb-balloon-facebook-left',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_share' ),
));

class WPBakeryShortCode_CL_Share extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_contact_form7',
  	'name' => __( 'Contact Form 7  (Folie)', 'folie' ),
	'icon' => 'icon-wpb-contactform7',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_contact_form7' ),
));

class WPBakeryShortCode_CL_Contact_Form7 extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_revslider',
  	'name' => __( 'Revolution Slider', 'folie' ),
  	'icon' => 'icon-wpb-revslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_revslider' ),
));

class WPBakeryShortCode_CL_Revslider extends WPBakeryShortCode_CL { }





vc_map( array (
	'base' => 'cl_layerslider',
  	'name' => __( 'Layer Slider', 'folie' ),
  	'icon' => 'icon-wpb-layerslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_layerslider' ),
));

class WPBakeryShortCode_CL_Layerslider extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_widget_sidebar',
  	'name' => __( 'Widget Sidebar', 'folie' ),
  	'icon' => 'icon-wpb-wp',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_widget_sidebar' ),
));

class WPBakeryShortCode_CL_Widget_Sidebar extends WPBakeryShortCode_CL { }


vc_map( array (
	'base' => 'cl_custom_code',
  	'name' => __( 'Custom Code', 'folie' ),
  	'icon' => 'icon-wpb-raw-html',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'folie' ),
	'params' => codeless_generate_backend_params( 'cl_custom_code' ),
));

class WPBakeryShortCode_CL_Custom_Code extends WPBakeryShortCode_CL { }


if( class_exists( 'Woocommerce' ) ){

	vc_map( array (
		'base' => 'cl_woocommerce',
		'name' => __( 'Woocommerce Shop (Folie)', 'folie' ),
		'icon' => 'icon-wpb-woocommerce',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'folie' ),
		
		'params' => codeless_generate_backend_params( 'cl_woocommerce' ),
	));

	class WPBakeryShortCode_CL_Woocommerce extends WPBakeryShortCode_CL { }
}


abstract class WPBakeryShortCode_CL extends WPBakeryShortcode {

	// Modified By Codeless
		protected $css_classes = array();
		protected $css_property = array();
		protected $custom_css = '';

	// Modified By Codeless
		protected function checkRequired($cl_required){
			$bool = true;
		
			if(isset($this->atts[$cl_required['element']]) && $this->atts[$cl_required['element']] != $cl_required['value'][0]) {
				$bool = false;
			}							
							
			return $bool;
		}


		// Modified By Codeless
		public function generateClasses($selector){
			$classes = array();
			
			if(isset($this->css_classes[$selector])){
				
				foreach($this->css_classes[$selector] as $field_id => $field){

					if(isset($this->atts[$field_id]))
						$value = $this->atts[$field_id];
					else
						$value = $field['std'];

						
					if(isset($field['dependency'])){
						if(!$this->checkRequired($field['dependency']))
							continue;
					}
					
					if($field_id == 'animation'){
						if($value != 'none'){
							$classes[] = 'animate_on_visible';
							$classes[] = $value;
						}
						continue;
					}
					
					if($field['type'] == 'multicheck'){
						
						$value =  codeless_js_object_to_array($value);
						
						if(!empty($value)){
							foreach($value as $prop => $val){
								$classes[] = $val;
							}
						}
						continue;
					}

					if( $field[ 'type' ] == 'select' && isset($field['multiple']) && $field['multiple'] ) {
						$value = codeless_js_object_to_array( $value );
						
						if( !empty( $value ) ) {
							foreach( $value as $prop => $val ) {
								$classes[] = $val;
							}
						}
						continue;
					}
					
						
					if(isset($field['selectClass'])){
						$classes[] = $field['selectClass'].$value;
						continue;
					}
					
					if(isset($field['addClass'])){
						
						if((int) $value || !empty($value))
							$classes[] = $field['addClass'];
						continue;
					}
				
				}
			}
			
			return implode(" ", $classes);
		
		}

		//Modified By Codeless
		public function addCustomCss( $css ){

			if( strpos($this->custom_css, $css) === false )
				$this->custom_css .= ' '.$css.' ';
		}


		// Modified By Codeless
		protected function generateStyleArray(){
			$fields = $this->settings['params'];

			if(!empty($fields)){
				foreach($fields as $field){
					if( (isset($field['css_property']) || isset($field['htmldata']) ) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_property[$field['selector']]))
							$this->css_property[$field['selector']] = array();
							
						$this->css_property[$field['selector']][ $field['param_name'] ] = $field; 

					}
					
					if( (isset($field['selectClass']) || $field['param_name'] == 'animation' ) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_classes[$field['selector']]))
							$this->css_classes[$field['selector']] = array();
							
						$this->css_classes[$field['selector']][ $field['param_name'] ] = $field; 
					}
					
					if(isset($field['addClass']) && isset($field['selector']) && !empty($field['selector'])){
						if(!isset($this->css_classes[$field['selector']]))
							$this->css_classes[$field['selector']] = array();
							
						$this->css_classes[$field['selector']][ $field['param_name'] ] = $field; 
					}
					
				
				}
			}
		}

		// Modified By Codlees
		public function generateStyle($selector, $extra = '', $echo = false){
			$style = '';
			$dataHtml = '';
			
			if(isset($this->css_property[$selector])){
				foreach($this->css_property[$selector] as $field_id => $field){

					if( isset($field['media_query']) )
						continue;

					if(isset($this->atts[$field_id]) && ( !empty($this->atts[$field_id]) || $field['type'] == 'css_editor' ) ){
						$value = $this->atts[$field_id];

						if(isset($field['dependency'])){ 
							if(!$this->checkRequired($field['dependency']))
								continue;
						}

						
						$suffix = (isset($field['suffix']) && !empty($field['suffix']) ) ? $field['suffix'] : '';
						$suffix = ( $suffix == '' && isset($field['choices']) && isset($field['choices']['suffix'])) ? $field['choices']['suffix'] : $suffix;		
						
						
						if(isset($field['htmldata']) && !empty($field['htmldata'])){
							$dataHtml .= 'data-'.$field['htmldata'].'="'.$value.'" ';
							continue;
						}
						
						
						if($field['css_property'] == 'background-image'){
							
							
						
							if( strpos( $value, 'http' ) == 0 ){
								$style .= $field[ 'css_property' ] . ': url(' . urldecode( $value ) . ');';
							}else{
								
								$value = codeless_js_object_to_array( $value );
								
								if( is_array($value) ){
									if( isset($value['id']) ){
										$img = codeless_get_attachment_image_src( (int) $value['id'], 'full' );
	
										$style .= $field['css_property'].': url('.$img.');';
									}
								}
							}

							continue;
						}

						if($field['css_property'] == 'font-family' ){
							if( $value == 'theme_default' )
								continue;
							else{
								$value = trim($value, '&#8221;');
								if( strpos($value, ' ') !== false )
									$value = "'".$value."'";

							}
						} 
						
						
						
						if($field['type'] == 'css_editor'){
							
							
							if( !is_array($value) && !empty( $value ) ){
								$value = codeless_js_object_to_array( $value );
							}
							
				
							
							$default = $field['std'];

							$value = array_merge( $default, $value );
							
							foreach($value as $prop => $val){
									$style .= $prop.': '.$val.';';
							}
							
							continue;
							
						} 
						
						if( ! is_array( $field['css_property'] ) )
							$style .= $field['css_property'].': '.$value.$suffix.';';
						else{
							$css_property1 = $field['css_property'][0];
							$style .= $css_property1.': '.$value.$suffix.';';
							$exec = false;
							if( isset($field['css_property'][1]) && is_array($field['css_property'][1]) ){
								$addition_property = $field['css_property'][1][0];
								$addition_require = $field['css_property'][1][1];
								if( is_array( $addition_require )  ){
									foreach($addition_require as $a_value => $new_value){
										if( ! $exec ){
											if( $a_value == $value )
												$style .= $addition_property.': '.$new_value.';';
											else{
												if( isset( $addition_require['other'] ) ){
													$style .= $addition_property.': '.$new_value.';';
												}
											}
											$exec = true;
										}
									}
								}
							}else{
								if( isset($field['css_property'][1]) ){
									$css_property2 = $field['css_property'][1];
									$style .= $css_property2.': '.$value.$suffix.';';
								}
								
							}
						}
					}
				}
			}
			
			$style = 'style="'.$style.$extra.'" '.$dataHtml;
			
			if( $echo )
                echo codeless_complex_esc( $style );
            else
                return $style;
		}

}











abstract class WPBakeryShortCodesContainer_CL extends WPBakeryShortCode_CL {
	/**
	 * @var array
	 */
	protected $predefined_atts = array();
	protected $backened_editor_prepend_controls = true;

	/**
	 * @return string
	 */
	public function customAdminBlockParams() {
		return '';
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function mainHtmlBlockParams( $width, $i ) {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );

		return 'data-element_type="' . $this->settings['base'] . '" class="wpb_' . $this->settings['base'] . ' ' . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' ) . ' wpb_content_holder vc_shortcodes_container"' . $this->customAdminBlockParams();
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="' . $this->containerContentClass() . '"';
	}

	/**
	 *
	 * @return string
	 */
	public function containerContentClass() {
		return 'wpb_column_container vc_container_for_children vc_clearfix';
	}

	/**
	 * @param $controls
	 * @param string $extended_css
	 *
	 * @return string
	 */
	public function getColumnControls( $controls = 'full', $extended_css = '' ) {
		$controls_start = '<div class="vc_controls vc_controls-visible controls_column' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
		$controls_end = '</div>';

		if ( 'bottom-controls' === $extended_css ) {
			$control_title = sprintf( __( 'Append to this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) );
		} else {
			$control_title = sprintf( __( 'Prepend to this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) );
		}

		$controls_move = '<a class="vc_control column_move vc_column-move" data-vc-control="move" href="#" title="' . sprintf( __( 'Move this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-dragndrop"></i></a>';
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();
		if ( ! $moveAccess ) {
			$controls_move = '';
		}
		$controls_add = '<a class="vc_control column_add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		$controls_edit = '<a class="vc_control column_edit" data-vc-control="edit" href="#" title="' . sprintf( __( 'Edit this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_clone = '<a class="vc_control column_clone" data-vc-control="clone" href="#" title="' . sprintf( __( 'Clone this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
		$controls_delete = '<a class="vc_control column_delete" data-vc-control="delete" href="#" title="' . sprintf( __( 'Delete this %s', 'folie' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$controls_full = $controls_move . $controls_add . $controls_edit . $controls_clone . $controls_delete;

		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

		if ( ! empty( $controls ) ) {
			if ( is_string( $controls ) ) {
				$controls = array( $controls );
			}
			$controls_string = $controls_start;
			foreach ( $controls as $control ) {
				$control_var = 'controls_' . $control;
				if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
					if ( isset( ${$control_var} ) ) {
						$controls_string .= ${$control_var};
					}
				}
			}

			return $controls_string . $controls_end;
		}

		if ( $allAccess ) {
			return $controls_start . $controls_full . $controls_end;
		} elseif ( $editAccess ) {
			return $controls_start . $controls_edit . $controls_end;
		}

		return $controls_start . $controls_end;
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function contentAdmin( $atts, $content = null ) {
		$width = '';

		$atts = shortcode_atts( $this->predefined_atts, $atts );
		extract( $atts );
		$this->atts = $atts;
		$output = '';

		$output .= '<div ' . $this->mainHtmlBlockParams( $width, 1 ) . '>';
		if ( $this->backened_editor_prepend_controls ) {
			$output .= $this->getColumnControls( $this->settings( 'controls' ) );
		}
		$output .= '<div class="wpb_element_wrapper">';

		if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
			$markup = $this->settings['custom_markup'];
			$output .= $this->customMarkup( $markup );
		} else {
			$output .= $this->outputTitle( $this->settings['name'] );
			$output .= '<div ' . $this->containerHtmlBlockParams( $width, 1 ) . '>';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			$output .= $this->paramsHtmlHolders( $atts );
		}

		$output .= '</div>';
		if ( $this->backened_editor_prepend_controls ) {
			$output .= $this->getColumnControls( 'add', 'bottom-controls' );

		}
		$output .= '</div>';

		return $output;
	}

	/**
	 * @param $title
	 *
	 * @return string
	 */
	protected function outputTitle( $title ) {
		$icon = $this->settings( 'icon' );
		if ( filter_var( $icon, FILTER_VALIDATE_URL ) ) {
			$icon = '';
		}
		$params = array(
			'icon' => $icon,
			'is_container' => $this->settings( 'is_container' ),
			'title' => $title,
		);

		return '<h4 class="wpb_element_title"> ' . $this->getIcon( $params ) . '</h4>';
	}

	public function getBackendEditorChildControlsElementCssClass() {
		return 'vc_element-name';
	}
}






















/**
 * WPBakery WPBakery Page Builder row
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Row extends WPBakeryShortCode_CL {
	protected $predefined_atts = array(
		'el_class' => '',
	);

	public $nonDraggableClass = 'vc-non-draggable-row';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', 'https//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	protected function content( $atts, $content = null ) {
		$prefix = '';

		return $prefix . $this->loadTemplate( $atts, $content );
	}

	/**
	 * This returs block controls
	 */
	public function getLayoutsControl() {
		global $vc_row_layouts;
		$controls_layout = '<span class="vc_row_layouts vc_control">';
		foreach ( $vc_row_layouts as $layout ) {
			$controls_layout .= '<a class="vc_control-set-column set_columns" data-cells="' . $layout['cells'] . '" data-cells-mask="' . $layout['mask'] . '" title="' . $layout['title'] . '"><i class="vc-composer-icon vc-c-icon-' . $layout['icon_class'] . '"></i></a> ';
		}
		$controls_layout .= '<br/><a class="vc_control-set-column set_columns custom_columns" data-cells="custom" data-cells-mask="custom" title="' . __( 'Custom layout', 'folie' ) . '">' . __( 'Custom', 'folie' ) . '</a> ';
		$controls_layout .= '</span>';

		return $controls_layout;
	}

	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_controls-row controls_row vc_clearfix">';
		$controls_end = '</div>';
		//Create columns
		$controls_layout = $this->getLayoutsControl();

		$controls_move = ' <a class="vc_control column_move vc_column-move" href="#" title="' . __( 'Drag row to reorder', 'folie' ) . '" data-vc-control="move"><i class="vc-composer-icon vc-c-icon-dragndrop"></i></a>';
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();
		if ( ! $moveAccess ) {
			$controls_move = '';
		}
		$controls_add = ' <a class="vc_control column_add vc_column-add" href="#" title="' . __( 'Add column', 'folie' ) . '" data-vc-control="add"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" href="#" title="' . __( 'Delete this row', 'folie' ) . '" data-vc-control="delete"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$controls_edit = ' <a class="vc_control column_edit vc_column-edit" href="#" title="' . __( 'Edit this row', 'folie' ) . '" data-vc-control="edit"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_clone = ' <a class="vc_control column_clone vc_column-clone" href="#" title="' . __( 'Clone this row', 'folie' ) . '" data-vc-control="clone"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
		$controls_toggle = ' <a class="vc_control column_toggle vc_column-toggle" href="#" title="' . __( 'Toggle row', 'folie' ) . '" data-vc-control="toggle"><i class="vc-composer-icon vc-c-icon-arrow_drop_down"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				$control_var = 'controls_' . $control;
				if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
					if ( isset( ${$control_var} ) ) {
						$output .= ${$control_var};
					}
				}
			}
			$output .= $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( ( $editAccess && 'edit' === $controls ) || $allAccess ) {
				if ( isset( ${$control_var} ) ) {
					$output .= ${$control_var} . $controls_end;
				}
			}
		} else {
			$row_edit_clone_delete = '<span class="vc_row_edit_clone_delete">';
			if ( $allAccess ) {
				$row_edit_clone_delete .= $controls_delete . $controls_clone . $controls_edit;
			} elseif ( $editAccess ) {
				$row_edit_clone_delete .= $controls_edit;
			}
			$row_edit_clone_delete .= $controls_toggle;
			$row_edit_clone_delete .= '</span>';

			if ( $allAccess ) {
				$output .= $controls_move . $controls_layout . $controls_add . $row_edit_clone_delete . $controls_end;
			} elseif ( $editAccess ) {
				$output .= $row_edit_clone_delete . $controls_end;
			} else {
				$output .= $row_edit_clone_delete . $controls_end;
			}
		}

		return $output;
	}

	public function contentAdmin( $atts, $content = null ) {
		$atts = shortcode_atts( $this->predefined_atts, $atts );

		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );

		$output .= '<div data-element_type="' . $this->settings['base'] . '" class="' . $this->cssAdminClass() . '">';
		$output .= str_replace( '%column_size%', 1, $column_controls );
		$output .= '<div class="wpb_element_wrapper">';
		$output .= '<div class="vc_row vc_row-fluid wpb_row_container vc_container_for_children">';
		if ( '' === $content && ! empty( $this->settings['default_content_in_template'] ) ) {
			$output .= do_shortcode( shortcode_unautop( $this->settings['default_content_in_template'] ) );
		} else {
			$output .= do_shortcode( shortcode_unautop( $content ) );

		}
		$output .= '</div>';
		if ( isset( $this->settings['params'] ) ) {
			$inner = '';
			foreach ( $this->settings['params'] as $param ) {
				if ( ! isset( $param['param_name'] ) ) {
					continue;
				}
				$param_value = isset( $atts[ $param['param_name'] ] ) ? $atts[ $param['param_name'] ] : '';
				if ( is_array( $param_value ) ) {
					// Get first element from the array
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[ $first_key ];
				}
				$inner .= $this->singleParamHtmlHolder( $param, $param_value );
			}
			$output .= $inner;
		}
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	public function cssAdminClass() {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? ' wpb_sortable' : ' ' . $this->nonDraggableClass );

		return 'wpb_' . $this->settings['base'] . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' );
	}

	/**
	 * @deprecated - due to it is not used anywhere? 4.5
	 * @typo Bock - Block
	 * @return string
	 */
	public function customAdminBockParams() {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::customAdminBockParams', '4.5 (will be removed in 4.10)' );

		return '';
	}

	/**
	 * @deprecated 4.5
	 *
	 * @param string $bg_image
	 * @param string $bg_color
	 * @param string $bg_image_repeat
	 * @param string $font_color
	 * @param string $padding
	 * @param string $margin_bottom
	 *
	 * @return string
	 */
	public function buildStyle( $bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '', $margin_bottom = '' ) {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::buildStyle', '4.5 (will be removed in 4.10)' );

		$has_image = false;
		$style = '';
		if ( (int) $bg_image > 0 && false !== ( $image_url = wp_get_attachment_url( $bg_image ) ) ) {
			$has_image = true;
			$style .= 'background-image: url(' . $image_url . ');';
		}
		if ( ! empty( $bg_color ) ) {
			$style .= vc_get_css_color( 'background-color', $bg_color );
		}
		if ( ! empty( $bg_image_repeat ) && $has_image ) {
			if ( 'cover' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: cover;';
			} elseif ( 'contain' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: contain;';
			} elseif ( 'no-repeat' === $bg_image_repeat ) {
				$style .= 'background-repeat: no-repeat;';
			}
		}
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}
		if ( '' !== $padding ) {
			$style .= 'padding: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding ) ? $padding : $padding . 'px' ) . ';';
		}
		if ( '' !== $margin_bottom ) {
			$style .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_bottom ) ? $margin_bottom : $margin_bottom . 'px' ) . ';';
		}

		return empty( $style ) ? '' : ' style="' . esc_attr( $style ) . '"';
	}

	public function generateCSSBox( $value ){
			
		$style = '';

		if( !is_array($value) )
			$value = codeless_js_object_to_array( $value );
						
		if(!empty($value)){

			foreach($value as $prop => $val){
				$style .= $prop.': '.$val.' !important;';
			}
		}
					
		return $style;
	}
}



/**
 * WPBakery WPBakery Page Builder shortcodes
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Column extends WPBakeryShortCode_CL {
	/**
	 * @var array
	 */
	protected $predefined_atts = array(
		'font_color' => '',
		'el_class' => '',
		'el_position' => '',
		'width' => '1/1',
	);

	public $nonDraggableClass = 'vc-non-draggable-column';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', 'https//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	/**
	 * @param $controls
	 * @param string $extended_css
	 *
	 * @return string
	 */
	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_control-column vc_controls-visible' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
		$controls_end = '</div>';

		if ( ' bottom-controls' === $extended_css ) {
			$control_title = __( 'Append to this column', 'folie' );
		} else {
			$control_title = __( 'Prepend to this column', 'folie' );
		}
		if ( vc_user_access()->part( 'shortcodes' )->checkStateAny( true, 'custom', null )->get() ) {
			$controls_add = '<a class="vc_control column_add vc_column-add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		} else {
			$controls_add = '';
		}
		$controls_edit = '<a class="vc_control column_edit vc_column-edit"  data-vc-control="edit" href="#" title="' . __( 'Edit this column', 'folie' ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" data-vc-control="delete"  href="#" title="' . __( 'Delete this column', 'folie' ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );
		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				if ( 'add' === $control || ( $editAccess && 'edit' === $control ) || $allAccess ) {
					$method_name = vc_camel_case( 'output-editor-control-' . $control );
					if ( method_exists( $this, $method_name ) ) {
						$output .= $this->$method_name();
					} else {
						$control_var = 'controls_' . $control;
						if ( isset( ${$control_var} ) ) {
							$output .= ${$control_var};
						}
					}
				}
			}

			return $output . $controls_end;
		} elseif ( is_string( $controls ) && 'full' === $controls ) {
			if ( $allAccess ) {
				return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
			} elseif ( $editAccess ) {
				return $output . $controls_add . $controls_edit . $controls_end;
			}

			return $output . $controls_add . $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( 'add' === $controls || ( $editAccess && 'edit' == $controls || $allAccess ) && isset( ${$control_var} ) ) {
				return $output . ${$control_var} . $controls_end;
			}

			return $output . $controls_end;
		}
		if ( $allAccess ) {
			return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
		} elseif ( $editAccess ) {
			return $output . $controls_add . $controls_edit . $controls_end;
		}

		return $output . $controls_add . $controls_end;
	}

	/**
	 * @param $param
	 * @param $value
	 *
	 * @return string
	 */
	public function singleParamHtmlHolder( $param, $value ) {
		$output = '';
		// Compatibility fixes.
		$old_names = array(
			'yellow_message',
			'blue_message',
			'green_message',
			'button_green',
			'button_grey',
			'button_yellow',
			'button_blue',
			'button_red',
			'button_orange',
		);
		$new_names = array(
			'alert-block',
			'alert-info',
			'alert-success',
			'btn-success',
			'btn',
			'btn-info',
			'btn-primary',
			'btn-danger',
			'btn-warning',
		);
		$value = str_ireplace( $old_names, $new_names, $value );
		$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
		$type = isset( $param['type'] ) ? $param['type'] : '';
		$class = isset( $param['class'] ) ? $param['class'] : '';

		if ( isset( $param['holder'] ) && 'hidden' !== $param['holder'] ) {
			$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
		}

		return $output;
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function contentAdmin( $atts, $content = null ) {
		$width = $el_class = '';
		extract( shortcode_atts( $this->predefined_atts, $atts ) );
		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
		$column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );

		if ( ' column_14' === $width || ' 1/4' === $width ) {
			$width = array( 'vc_col-sm-3' );
		} elseif ( ' column_14===$width-14-14-14' ) {
			$width = array(
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
			);
		} elseif ( ' column_13' === $width || ' 1/3' === $width ) {
			$width = array( 'vc_col-sm-4' );
		} elseif ( ' column_13===$width-23' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-8',
			);
		} elseif ( ' column_13===$width-13-13' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-4',
				'vc_col-sm-4',
			);
		} elseif ( ' column_12' === $width || ' 1/2' === $width ) {
			$width = array( 'vc_col-sm-6' );
		} elseif ( ' column_12===$width-12' ) {
			$width = array(
				'vc_col-sm-6',
				'vc_col-sm-6',
			);
		} elseif ( ' column_23' === $width || ' 2/3' === $width ) {
			$width = array( 'vc_col-sm-8' );
		} elseif ( ' column_34' === $width || ' 3/4' === $width ) {
			$width = array( 'vc_col-sm-9' );
		} elseif ( ' column_16' === $width || ' 1/6' === $width ) {
			$width = array( 'vc_col-sm-2' );
		} elseif ( ' column_56' === $width || ' 5/6' === $width ) {
			$width = array( 'vc_col-sm-10' );
		} else {
			$width = array( '' );
		}
		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls );
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			if ( isset( $this->settings['params'] ) ) {
				$inner = '';
				foreach ( $this->settings['params'] as $param ) {
					$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
					if ( is_array( $param_value ) ) {
						// Get first element from the array
						reset( $param_value );
						$first_key = key( $param_value );
						$param_value = $param_value[ $first_key ];
					}
					$inner .= $this->singleParamHtmlHolder( $param, $param_value );
				}
				$output .= $inner;
			}
			$output .= '</div>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls_bottom );
			$output .= '</div>';
		}

		return $output;
	}

	/**
	 * @return string
	 */
	public function customAdminBlockParams() {
		return '';
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function mainHtmlBlockParams( $width, $i ) {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );
		$base_ = 'vc_column';
		if( $this->settings['base'] == 'cl_column_inner' )
			$base_ = 'vc_column_inner';
		return 'data-element_type="' . $this->settings['base'] . '" data-vc-column-width="' . wpb_vc_get_column_width_indent( $width[ $i ] ) . '" class="wpb_' . $base_ . ' ' . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' ) . ' ' . $this->templateWidth() . ' wpb_content_holder"' . $this->customAdminBlockParams();
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="wpb_column_container vc_container_for_children"';
	}

	/**
	 * @param string $content
	 *
	 * @return string
	 */
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}

	/**
	 * @return string
	 */
	protected function templateWidth() {
		return '<%= window.vc_convert_column_size(params.width) %>';
	}

	/**
	 * @param string $font_color
	 *
	 * @return string
	 */
	public function buildStyle( $font_color = '' ) {
		$style = '';
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}

		return empty( $style ) ? $style : ' style="' . esc_attr( $style ) . '"';
	}


	public function generateCSSBox( $value ){
			
		$style = '';

		if( !is_array($value) )
			$value = codeless_js_object_to_array( $value );
						
		if(!empty($value)){

			foreach($value as $prop => $val){
				$style .= $prop.': '.$val.' !important;';
			}
		}
					
		return $style;
	}
}




class WPBakeryShortCode_CL_Row_Inner extends WPBakeryShortCode_CL_Row {
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}
}

class WPBakeryShortCode_CL_Column_Inner extends WPBakeryShortCode_CL_Column {

}


function codeless_generate_backend_params( $tag, $add = false ){
	if( !class_exists( 'Cl_Builder_Mapper' ) )
		return array();


	$shortcode = Cl_Builder_Mapper::getShortCode( $tag );
	$new_params = array();

	if( $add !== false ){
		$new_params[] = $add;
	}

	$group_id = '';
	if( is_array( $shortcode['fields'] ) ){
		foreach( $shortcode['fields'] as $field_id => $field_attr ){
			

			if( $field_attr['type'] == 'show_tabs' ||
				$field_attr['type'] == 'tab_start' ||
				$field_attr['type'] == 'group_start' ||
				$field_attr['type'] == 'group_end' ||
				$field_attr['type'] == 'tab_end' ||
				$field_id == 'width' && $tag == 'cl_column' ||
				$field_id == 'width' && $tag == 'cl_column_inner' ){
					if( $field_attr['type'] == 'tab_start' )
						$group_id = $field_attr['label'];
					if( $field_attr['type'] == 'tab_end' )
						$group_id = '';

					continue;
				}
				

			$type_map = array(
				'select' => 'dropdown',
				'switch' => 'dropdown',
				//'css_tool' => 'css_tool',
				'inline_select' => 'dropdown',
				'color' => 'colorpicker',
				'image' => 'attach_image',
				'css_tool' => 'css_editor',
				'image_gallery' => 'attach_images',
				'sortable' => 'sortable',
				'select_icon' => 'iconpicker',
				'multicheck' => 'dropdown_multi'
			);

			$new_param = array(
				'heading' => $field_attr['label'],
				'type' => (isset( $type_map[ $field_attr['type'] ] ) ? $type_map[ $field_attr['type'] ] : 'textfield'),
				'description' => (isset( $field_attr['tooltip'] ) ? $field_attr['tooltip'] : ''),
				'param_name' => $field_id
			);

			if( $field_id == 'content' && $field_attr['type'] == 'inline_text' )
				$new_param['type'] = 'textarea_html';

			if( isset( $field_attr['group_vc'] ) )
				$new_param['group'] = $field_attr['group_vc'];

			if( !empty( $group_id ) )
				$new_param['group'] = $group_id;

			if( isset( $field_attr['selector'] ) )
				$new_param['selector'] = $field_attr['selector'];
			if( isset( $field_attr['selectClass'] ) )
				$new_param['selectClass'] = $field_attr['selectClass'];
			if( isset( $field_attr['htmldata'] ) )
				$new_param['htmldata'] = $field_attr['htmldata'];
			if( isset( $field_attr['addClass'] ) )
				$new_param['addClass'] = $field_attr['addClass'];
			if( isset( $field_attr['css_property'] ) )
				$new_param['css_property'] = $field_attr['css_property'];
			if( isset( $field_attr['suffix'] ) )
				$new_param['suffix'] = $field_attr['suffix'];
			if( isset( $field_attr['media_query'] ) )
				$new_param['media_query'] = $field_attr['media_query'];


			if( isset( $field_attr['holder'] ) ){
				$new_param['holder'] = $field_attr['holder'];
			}
				

			if( isset( $field_attr['cl_required'] ) && $field_attr['cl_required'][0]['operator'] == '==' ){
				$new_param['dependency'] = array(
					'element' => $field_attr['cl_required'][0]['setting'],
					'value' => array( (string) $field_attr['cl_required'][0]['value'] )
				);
			}

			if( isset( $field_attr['replace_type_vc'] ) && !empty( $field_attr['replace_type_vc'] ) )
				$new_param['type'] = $field_attr['replace_type_vc'];


			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){

				if( isset( $field_attr['choices'] ) ){

					$new_param['value'] = array_flip( $field_attr['choices'] );
					if( $field_attr['type'] == 'multicheck' )
						$new_param['value'] = array( 'None' => 'none_' ) + $new_param['value'];
						
						


				}
			}

			if( $field_attr['type'] == 'switch' ){
				$new_param['value'] = ($field_attr['default']) ? array('On' => 1, 'Off' => 0) : array('Off' => 0, 'On' => 1) ;
			}

			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){
				$new_param['std'] = $field_attr['default'];

				if( $new_param['type'] == 'dropdown_multi' )
					unset( $new_param['std'] );
			}

			if( $new_param['type'] == 'textfield' && isset( $field_attr['default'] ) )
				$new_param['value'] = $field_attr['default'];

			if( $new_param['type'] == 'css_editor' ){
				$new_param['value'] = $field_attr['default'];
				$new_param['std'] = $field_attr['default'];
			}
			

			if( $field_attr['type'] == 'select_icon' ){
				$new_param['settings'] = array(
					'type' => 'codeless_icons'
				);
			}



			$new_params[] = $new_param;


		}

	}
	return $new_params;
}


add_filter( 'vc_iconpicker-type-codeless_icons', 'codeless_vc_map_icons' );

function codeless_vc_map_icons(){
	return Codeless_Icons::get_icons();
}





add_filter( 'vc_get_all_templates', 'codeless_modify_default_template_name', 999 );
function codeless_modify_default_template_name($data){
    $data[1]['category_name'] = esc_attr__('Folie Templates', 'folie');
    $data[1]['category_description'] = esc_attr__( 'Append predefined Folie Templates to the actual layout', 'folie' );
    $default_templates = visual_composer()->templatesPanelEditor()->getDefaultTemplates();

    foreach( $data[1]['templates'] as $index => $template_data ){
        if( isset( $template_data['unique_id'] ) && isset( $default_templates[ $template_data['unique_id'] ] ) ){
            
            $data[1]['templates'][$index]['cat_display_name'] = isset( $default_templates[ $template_data['unique_id'] ]['cat_display_name'] ) ? $default_templates[$template_data['unique_id']]['cat_display_name'] : '';
        }
    }
    $data[1]['category_weight'] = 5;

    return $data;
    
}


add_filter( 'vc_templates_render_category', 'codeless_templates_render_category', 999 );
function codeless_templates_render_category($category){
    if( $category['category'] == 'default_templates' ){
        $output = $category['output'];
        $category['output'] = '<div class="library_categories">';
            $category['output'] .= '<ul>';
            $codeless_library_cats = codeless_vc_cat_list();
            $category['output'] .=  '<li data-sort="all" class="active">'.esc_attr__('All', 'folie').'</li>';
            foreach($codeless_library_cats as $cat_id => $cat_name) {
                $category['output'] .=  '<li data-sort="'.$cat_id.'">'.$cat_name.'</li>';
            }
            $category['output'] .= '</ul>';

        $category['output'] .= '</div>';
        $category['output'] .= '<div class="cl-templates-wrap">';
        $category['output'] .= $output;
        $category['output'] .= '</div>';
    }

    return $category;
}


add_filter( 'vc_templates_render_template', 'codeless_templates_render_template', 99, 2 );
function codeless_templates_render_template($name, $template){
    $name = $template['name'];
    $cat_display_name = isset( $template['cat_display_name'] ) ? $template['cat_display_name'] : '';

    $output = '';
    $output .= '<div class="cl-template-wrap">';
        if( isset( $template['image'] ) && !empty(  $template['image'] ) )
            $output .= '<div class="img-wrap"><img class="lazy" data-src="'.$template['image'].'" alt="'.$name.'" width="300" height="200"></div>';
        $output .= '<div class="title-wrap">';
            $output .= '<div class="display_cat">'.$cat_display_name.'</div>';
            $output .= $name;
        $output .= '</div>';
        $output .= '<a type="button" class="vc_ui-list-bar-item-trigger" title="$add_template_title"
    data-template-handler=""
    data-vc-ui-element="template-title"></a>';
    $output .= '</div>';
    return $output;
}


add_action( 'vc_load_default_templates_action','codeless_templates_for_vc' ); 

function codeless_vc_cat_list(){
    $cat_display_names = array(
		'about' => __('About', 'folie'),
		'block' => __('Block', 'folie'),
		'blog' => __('Blog', 'folie'),
		'cta' => __('Call to Action', 'folie'),
		'contact' => __('Carousel', 'folie'),
		'counter' => __('Counter', 'folie'),
		'clients' => __('Clients', 'folie'),
		'events' => __('Events', 'folie'),
		'faq' => __('Faq', 'folie'),
		'grid' => __('Grid', 'folie'),
		'gallery' => __('Gallery', 'folie'),
		'portfolio' => __('Portfolio', 'folie'),
		'services' => __('Services', 'folie'),
		'skills' => __('Skills', 'folie'),
		'shop' => __('Shop', 'folie'),
		'testimonial' => __('Testimonial', 'folie'),
		'team' => __('Team', 'folie'),
		'title' => __('Title Block', 'folie'),
    );

    return $cat_display_names;
}


function codeless_templates_for_vc() {

$cat_display_names = codeless_vc_cat_list();


// Service Small 1
$data = array();
$data['name'] = __( 'Services Small 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-small-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px','border-top-width':'0px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" title="Visual Page builder" icon="cl-icon-expand2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top"]Visual Drag & Drop Page Builder with an intuitive, simple and easy to work interface. The first all-in-one Builder.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="In-line editing" icon="cl-icon-pencil2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="100" animation_speed="200"]Simply click and start typing to add or edit text content. Font, Color, Size, Styling a snippet of text or all content.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Draggable Dimensions" icon="cl-icon-focus" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="200"]Click and drag to resize height, padding or empty spaces between elements. The first WP Theme that offers this feature.[/cl_service][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px','border-top-width':'0px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" title="Predefined Elements" icon="cl-icon-puzzle" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="300"]Every single elements comes with various predefined styles (demos) to add everywhere. Combine various elements.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Real-time Design" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="42" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="400"]Edit any piece of website in real-time with live options: Header, Styling, Page and more. Preview all options without refresh.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="500"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Title 1
$data = array();
$data['name'] = __( 'Title Block 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['title'];
$data['custom_class'] = 'title';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/title-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><mark class="highlight">Our Offices</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'20px'}_-_json" text_line_height="42"]<div style="text-align: center;"><span style="letter-spacing: 0px;">Lets Talk Together</span></div>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]<p style="text-align: center;">Learn more about our locations and lets talk together.</p><p style="text-align: center;">Write us your suggestions and get opportunities</p>
[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Title 2
$data = array();
$data['name'] = __( 'Title Block 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['title'];
$data['custom_class'] = 'title';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/title-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'60px','padding-bottom':'60px'}_-_json"][cl_column][cl_custom_heading typography="h1"]

<p>Hi! I am John Doe, a Designer based in Poland and I design <i>functional &amp; amazing</i> illustrations</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="24" text_font_weight="300" text_color="#828282" css_style="{'margin-top':'40px'}_-_json"]

	<p>View some of my works below &amp; get in touch!</p>

[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Title 3
$data = array();
$data['name'] = __( 'Title Block 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['title'];
$data['custom_class'] = 'title';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/title-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#f3f4fb"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<p>Web design that sells your <b>products.</b></p><p>Built with <b>content-blocks</b> and predefined elements.</p><p>Documentation &amp; Video Tutorials</p>
[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Title 4
$data = array();
$data['name'] = __( 'Title Block 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['title'];
$data['custom_class'] = 'title';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/title-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'80px'}_-_json" equal_height="1"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'0px','padding-right':'0px'}_-_json" width="3/4"][cl_custom_heading typography="h1" animation="bottom-t-top" animation_speed="600" css_style="{'margin-top':'35px'}_-_json" custom_responsive_768_bool="1" custom_responsive_768_size="24px" custom_responsive_768_line_height="34px"]<p style="text-align: left;">Hello, we are an creative agency experienced in design &amp; illustrations.</p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_weight="400" text_transform="none" animation="bottom-t-top" animation_delay="200" animation_speed="600" css_style="{'margin-top':'20px'}_-_json" custom_responsive_768_line_height="24px" custom_responsive_768_bool="1" custom_responsive_768_size="16px"]<p>Get In Touch With Us. <b><mark class="highlight"><a href="//codeless.co/folie/join.php">Lets talk now!</a></mark></b></p>
[/cl_custom_heading][/cl_column][cl_column width="1/4" vertical_align="bottom" css_style="{'padding-bottom':'0px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Service Small 1
$data = array();
$data['name'] = __( 'Services Small 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-small-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px','border-top-width':'0px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" title="Visual Page builder" icon="cl-icon-expand2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top"]Visual Drag & Drop Page Builder with an intuitive, simple and easy to work interface. The first all-in-one Builder.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="In-line editing" icon="cl-icon-pencil2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="100" animation_speed="200"]Simply click and start typing to add or edit text content. Font, Color, Size, Styling a snippet of text or all content.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Draggable Dimensions" icon="cl-icon-focus" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="200"]Click and drag to resize height, padding or empty spaces between elements. The first WP Theme that offers this feature.[/cl_service][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px','border-top-width':'0px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" title="Predefined Elements" icon="cl-icon-puzzle" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="300"]Every single elements comes with various predefined styles (demos) to add everywhere. Combine various elements.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Real-time Design" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="42" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="400"]Edit any piece of website in real-time with live options: Header, Styling, Page and more. Preview all options without refresh.[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="500"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Small 2
$data = array();
$data['name'] = __( 'Services Small 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-small-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'60px','padding-bottom':'60px','border-top-width':'1px'}_-_json" text_color="light-text" background_color="#1b1f21" border_color="#eeeeee"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" title="Responsive Every Device" icon="cl-icon-laptop2" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][cl_service media="type_icon" layout_type="media_top" title="Build your online shop" icon="cl-icon-basket" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="400"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Experienced Support Team" icon="cl-icon-profile-male" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="100"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][cl_service media="type_icon" layout_type="media_top" title="Easiest Visual Builder" icon="cl-icon-hotairballoon" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="500"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Use Predefined Modules" icon="cl-icon-puzzle" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="200"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][cl_service media="type_icon" layout_type="media_top" title="High Graphic Performance" icon="cl-icon-layers2" css_style="{'margin-top':'50px'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="600"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Small 3
$data = array();
$data['name'] = __( 'Services Small 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-small-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/3"][cl_service media="type_icon" title="FIrst Theme with LivePhotos" icon="cl-icon-hotairballoon" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Visual Click &amp; Edit Builder" icon="cl-icon-puzzle" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Header &amp; Footer Builder" icon="cl-icon-expand2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Shop Block 1
$data = array();
$data['name'] = __( 'Shop Block 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['shop'];
$data['custom_class'] = 'shop';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/shop-block-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'34px','padding-bottom':'25px','border-top-width':'0px'}_-_json" background_color="#ffffff" border_color="#ebebeb"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'0px','margin-bottom':'0px'}_-_json"]<p>WHAT'S NEW</p>
[/cl_custom_heading][cl_divider width_full="0" width="94" color="#262626" color_icon="#222222" css_style="{'margin-top':'10px','margin-bottom':'25px'}_-_json"][cl_woocommerce shortcode="top_rated_products" per_page="6" distance="25" product_title="h3" carousel="1" carousel_dots="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Shop Block 2
$data = array();
$data['name'] = __( 'Shop Block 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['shop'];
$data['custom_class'] = 'shop';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/shop-block-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'0px','border-top-width':'1px'}_-_json" background_color="#ffffff" border_color="#ffffff"][cl_column css_style="{'padding-top':'20px','padding-bottom':'0px'}_-_json"][cl_custom_heading css_style="{'margin-top':'0px','margin-bottom':'0px'}_-_json"]<p>Collection 2017</p>
[/cl_custom_heading][cl_divider width_full="0" width="94" color="#262626" color_icon="#222222" css_style="{'margin-top':'10px','margin-bottom':'25px'}_-_json"][/cl_column][/cl_row][cl_row row_type="container-fluid" columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column width="1/3" horizontal_align="middle" css_style="{'padding-top':'300px','padding-bottom':'300px'}_-_json" text_color="light-text" background_image="{'uploading':'false','date':'1495451873000','filename':'701325_rollover-1.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-content%2Fuploads%2F2017%2F05%2F701325_rollover-1.jpg','title':'701325_rollover','caption':'','alt':'','description':'','id':'3467','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2F%3Fattachment_id%3D3467','author':'1','name':'701325_rollover-2','status':'inherit','modified':'1495451873000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-admin%2Fpost.php%3Fpost%3D3467%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'75377','filesizeHumanReadable':'74%20KB','height':'1200','width':'1200','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" background_position="center center" animation="zoom-in" animation_delay="200" custom_link="//codeless.co/folie/shop-classic/" column_effect="image_zoom" overlay="color" overlay_color="#191919" overlay_opacity="0.35"][cl_custom_heading typography="custom_font" text_letterspace="4" css_style="{'margin-top':'35px'}_-_json"]<p>Leather Bags</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'5px'}_-_json"]<p>Shop Now</p>
[/cl_custom_heading][/cl_column][cl_column width="1/3" background_image="{'uploading':'false','date':'1495449948000','filename':'38095_a91.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-content%2Fuploads%2F2017%2F05%2F38095_a91.jpg','title':'38095_a91','caption':'','alt':'','description':'','id':'3455','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2F%3Fattachment_id%3D3455','author':'1','name':'38095_a91','status':'inherit','modified':'1495449948000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-admin%2Fpost.php%3Fpost%3D3455%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'74341','filesizeHumanReadable':'73%20KB','height':'1200','width':'1200','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" horizontal_align="middle" vertical_align="middle" background_position="center center" text_color="light-text" animation="zoom-in" animation_delay="400" custom_link="//codeless.co/folie/shop-classic/" column_effect="image_zoom" overlay="color" overlay_color="#0a0a0a" overlay_opacity="0.2"][cl_custom_heading typography="custom_font" text_letterspace="4" css_style="{'margin-top':'35px'}_-_json"]<p>Women Fashion</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'5px'}_-_json"]<p>Shop Now</p>
[/cl_custom_heading][/cl_column][cl_column width="1/3" background_image="{'uploading':'false','date':'1495450631000','filename':'sebastian-cole-134857.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-content%2Fuploads%2F2017%2F05%2Fsebastian-cole-134857.jpg','title':'sebastian-cole-134857','caption':'','alt':'','description':'','id':'3460','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2F%3Fattachment_id%3D3460','author':'1','name':'sebastian-cole-134857','status':'inherit','modified':'1495450631000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fshop-classic%2Fwp-admin%2Fpost.php%3Fpost%3D3460%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'47247','filesizeHumanReadable':'46%20KB','height':'731','width':'1200','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" background_position="center center" horizontal_align="middle" vertical_align="middle" text_color="light-text" animation="zoom-in" animation_delay="600" custom_link="//codeless.co/folie/shop-classic/" column_effect="image_zoom"][cl_custom_heading typography="custom_font" text_letterspace="4" css_style="{'margin-top':'35px'}_-_json"]<p>Handcrafted SPRING</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'5px'}_-_json"]<p>Shop Now</p>
[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );





// Portfolio Grid 1
$data = array();
$data['name'] = __( 'Portfolio Grid 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['portfolio'].', '.$cat_display_names['grid'];
$data['custom_class'] = 'portfolio grid';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/portfolio-grid-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'35px','border-top-width':'1px'}_-_json" border_color="#eeeeee"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]
<p style="text-align: center;"><mark class="highlight">LIVE PORTFOLIO EDITING</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'20px'}_-_json" text_line_height="42"]
<div style="text-align: center;">Show off your Portfolio</div>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]
<p style="text-align: center;">Folie comes with Visual Portfolio Builder like no other theme.</p>
<p style="text-align: center;">Predefined Layouts &amp; 100+ Options to choose from.</p>
[/cl_text][/cl_column][/cl_row][cl_row background_color="#ffffff" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" row_type="container-fluid" columns_gap="0"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_portfolio portfolio_overlay_color="rgba(31,180,204,0.9)" posts_per_page="6" portfolio_overlay_content_animation="left-t-right" order="ASC" portfolio_pagination_style="none" boxed="1" categories="{'0':'photo'}_-_json" distance="0" portfolio_overlay_title_style="h4" portfolio_overlay_layout="icon_top_content_bottom" portfolio_overlay_icon_bool="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Portfolio Grid 2
$data = array();
$data['name'] = __( 'Portfolio Grid 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['portfolio'].', '.$cat_display_names['grid'];
$data['custom_class'] = 'portfolio grid';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/portfolio-grid-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'25px','padding-bottom':'80px'}_-_json"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'0px','margin-bottom':'52px'}_-_json"]<p style="text-align: center;">Our Latest Works</p>
[/cl_custom_heading][cl_portfolio distance="2" portfolio_pagination_style="none" posts_per_page="6" portfolio_overlay_categories_bool="0" portfolio_overlay_color="rgba(56,136,226,0.89)"][cl_button btn_title="<p>View All Portfolio</p>
" button_bg_color="#0cabd3" button_bg_color_hover="#0cabd3" button_border_color="" css_style="{'margin-top':'60px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Portfolio Grid 3
$data = array();
$data['name'] = __( 'Portfolio Grid 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['portfolio'].', '.$cat_display_names['grid'];
$data['custom_class'] = 'portfolio grid';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/portfolio-grid-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#ffffff"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px','padding-left':'0px'}_-_json"][cl_portfolio columns="4" distance="0" portfolio_overlay_color="rgba(31,180,204,0.86)" portfolio_animation="zoom-in" carousel="1" order="ASC"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );







// Call to Action 1
$data = array();
$data['name'] = __( 'Call To Action 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'130px','padding-bottom':'140px','border-top-width':'1px'}_-_json" background_color="#ffffff" border_color="#eeeeee" equal_height="1" custom_width_bool="1" custom_width="730"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px','padding-left':'0px','padding-right':'0px'}_-_json" horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]
<p style="text-align: center;"><mark class="highlight">Modular Architecture</mark></p>
[/cl_custom_heading][cl_custom_heading typography="h1" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'20px'}_-_json" text_line_height="42" animation_delay="400"]
<p style="text-align: center;">Fast &amp; Powerful Theme</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]
<p style="text-align: center;">The beauty of this theme is that is built with Modules. Every time you can active or dis-active any module that you would not need anymore !</p>
[/cl_text][cl_button css_style="{'margin-top':'30px'}_-_json" btn_title="

View All Features

" link="https://codeless.co/folie/presentation/?page_id=13"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 2
$data = array();
$data['name'] = __( 'Call To Action 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" text_color="light-text" background_color="#1b1f21"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><font color="#1fb4cc">Ready for the FUTURE?</font></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#ffffff" css_style="{'margin-top':'0px'}_-_json" text_line_height="42"]<div style="text-align: center;">Get Codeless Membership</div>
[/cl_custom_heading][cl_button btn_title="<p>Purchase Another Licence</p>
" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 3
$data = array();
$data['name'] = __( 'Call To Action 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'400px'}_-_json" background_image="{'uploading':'false','date':'1498126670000','filename':'landing_mockup-compressed-4.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-content%2Fuploads%2F2017%2F06%2Flanding_mockup-compressed-4.jpg','title':'landing_mockup-compressed%20(4)','caption':'','alt':'','description':'','id':'4392','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2F%3Fattachment_id%3D4392','author':'1','name':'landing_mockup-compressed-4','status':'inherit','modified':'1498126670000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-admin%2Fpost.php%3Fpost%3D4392%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'133204','filesizeHumanReadable':'130%20KB','height':'1950','width':'2600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" background_position="center center" overlay_color="#ffffff" overlay_opacity="0.15"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'24px','padding-right':'22px'}_-_json" background_image="{}_-_json" background_position="center center"][cl_custom_heading tag="h1" typography="custom_font" text_font_family="Poppins" text_font_size="36" text_font_weight="100" text_line_height="56" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_color="#1c1c1c"]<p>Boosted performance theme</p>
[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'margin-top':'5px','margin-bottom':'20px'}_-_json" text_color="#5e5e5e"]<p>New kind of page builder you will change everything in seconds and you will see it live.&nbsp;</p><p>The Codeless Page builder it is faster like no other builder on the market.</p>
[/cl_text][cl_button btn_title="<p>View all demos</p>
"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 4
$data = array();
$data['name'] = __( 'Call To Action 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_color="#201132" text_color="light-text" css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="h1"]

<p>Let's <b>work</b> together<br></p>
[/cl_custom_heading][cl_custom_heading css_style="{'margin-top':'10px','margin-bottom':'35px'}_-_json"]

<p>Contact me via instagram or email</p><p>if you're reaching out with a new project.</p>
[/cl_custom_heading][cl_button btn_title="<p>Contact Now</p>
" button_bg_color="#0cabd3" button_bg_color_hover="#0cabd3" button_border_color=""][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Call to Action 5
$data = array();
$data['name'] = __( 'Call To Action 5', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-5.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json" text_color="light-text" background_image="{'id':'2115','title':'education-1','filename':'education-1.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-content%2Fuploads%2F2017%2F07%2Feducation-1.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2F%3Fattachment_id%3D2115','alt':'','author':'1','description':'','caption':'','name':'education-1','status':'inherit','uploadedTo':'0','date':'Wed%20Jul%2019%202017%2011%3A26%3A37%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Wed%20Jul%2019%202017%2011%3A26%3A37%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'July%2019%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-admin%2Fpost.php%3Fpost%3D2115%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'157487','filesizeHumanReadable':'154%20KB','height':'1067','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay="color" overlay_color="#0a0a0a"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]
<p style="text-align: center;">Call us at our phone +123 445 227</p>
<p style="text-align: center;">email: <b><mark class="highlight">info@folieexample.com</mark></b></p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="16" css_style="{'margin-top':'20px'}_-_json"]
<p style="text-align: center; margin-top: 10px; margin-bottom: 10px;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
<p style="text-align: center; margin-top: 10px; margin-bottom: 10px;">praesentium voluptatum deleniti atque corrupti quos dolores</p>
[/cl_text][cl_button btn_title="

View More

" button_bg_color="#0cabd3" button_bg_color_hover="#0cabd3" button_border_color="" css_style="{'margin-top':'35px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 6
$data = array();
$data['name'] = __( 'Call To Action 6', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-6.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'25px','padding-bottom':'25px'}_-_json" text_color="light-text" background_color="#1c1c1c"][cl_column width="2/3" horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Start you project with Folie Visual Website Builder</p>
[/cl_custom_heading][/cl_column][cl_column width="1/3" horizontal_align="middle"][cl_button btn_title="<p>Purchase Now</p>
" link="http://codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 7
$data = array();
$data['name'] = __( 'Call To Action 7', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-7.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row equal_height="1" css_style="{'padding-top':'25px','padding-bottom':'25px'}_-_json"][cl_column width="3/4" vertical_align="middle"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<p style="">Purchase today to start <b>selling</b> or <b>showcasing</b> online</p>
[/cl_custom_heading][/cl_column][cl_column width="1/4"][cl_button btn_title="<p>Purchase Now</p>
" overwrite_style="1" button_style="material_circular" button_layout="extra-large" button_bg_color="#4450ef" button_bg_color_hover="#4450ef" button_border_color=""][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Call to Action 8
$data = array();
$data['name'] = __( 'Call To Action 8', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-8.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'60px','padding-bottom':'70px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><mark class="highlight">Life-time Free Updates</mark></p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]<p style="text-align: center;">Be a Codeless member today and get life-time free updates.</p><p style="text-align: center;">Each license purchase of Folie comes with six months free support.</p>
[/cl_text][cl_button btn_title="<p>Purchase another license</p>
" button_bg_color="#4450ef" button_bg_color_hover="#4450ef" button_border_color="" overwrite_style="1" button_style="material_circular"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Call-to-action 9
$data = array();
$data['name'] = __( 'Call to Action 9', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'blog';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-9.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" text_color="light-text" background_color="#1fb4cc"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Lora" text_font_weight="400" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_font_size="18" text_line_height="20"]<p><i>Build your next brand</i></p>
[/cl_custom_heading][cl_custom_heading css_style="{'margin-top':'20px'}_-_json" typography="custom_font" text_font_size="42" text_line_height="48" text_font_weight="800" text_letterspace="1.5" text_color="#ffffff" custom_responsive_768_size="22px" custom_responsive_768_bool="1" custom_responsive_768_line_height="36px"]<p>Ready to start today?</p>
[/cl_custom_heading][cl_button btn_title="<p>GET a QUOTE</p>
" css_style="{'margin-top':'25px'}_-_json" link="//codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;



vc_add_default_templates( $data );




// Services Border 1
$data = array();
$data['name'] = __( 'Services Border 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-border-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'45px','border-top-width':'1px','border-bottom-width':'1px','border-right-width':'1px','border-left-width':'1px','padding-left':'45px','padding-right':'45px','padding-bottom':'45px'}_-_json" border_color="#e5e5e5"][cl_service media="type_icon" layout_type="media_top" title="<p>	</p><p>LOAD ONLY NEEDED FILES</p>" icon="cl-icon-linegraph" css_style="{'margin-top':'35px','border-top-width':'1px','border-left-width':'1px','border-bottom-width':'1px','border-right-width':'1px'}_-_json" icon_color="#707070" wrapper_size="30" wrapper_distance="21" title_content_distance="10" icon_font_size="40"]<p>With Folie your website will load only the necessary files. This will make your website loads faster.</p>[/cl_service][/cl_column][cl_column width="1/3" css_style="{'padding-top':'45px','border-top-width':'1px','border-bottom-width':'1px','border-right-width':'1px','border-left-width':'1px','padding-left':'45px','padding-right':'43px','padding-bottom':'45px'}_-_json" border_color="#e5e5e5"][cl_service media="type_icon" layout_type="media_top" title="	Cutting-edge setup" icon="cl-icon-hourglass" css_style="{'margin-top':'35px','border-top-width':'1px','border-left-width':'1px','border-bottom-width':'1px','border-right-width':'1px'}_-_json" icon_color="#707070" wrapper_size="30" wrapper_distance="21" title_content_distance="10" icon_font_size="40"]<p>You have only to select the demo, theme options, &nbsp;menu, widgets, images will be installed automatically. </p>[/cl_service][/cl_column][cl_column width="1/3" css_style="{'border-top-width':'1px','border-bottom-width':'1px','border-right-width':'1px','border-left-width':'1px','padding-top':'45px','padding-bottom':'45px','padding-right':'45px','padding-left':'45px'}_-_json" border_color="#e5e5e5"][cl_service media="type_icon" layout_type="media_top" title="<p>	</p><p>LOAD ONLY NEEDED FILES</p>" icon="cl-icon-speedometer" css_style="{'margin-top':'35px','border-top-width':'1px','border-left-width':'1px','border-bottom-width':'1px','border-right-width':'1px'}_-_json" icon_color="#707070" wrapper_size="30" wrapper_distance="21" title_content_distance="10" icon_font_size="40"]<p>With Folie your website will load only the necessary files. This will make your website loads faster.</p>[/cl_service][/cl_column][/cl_row]
CONTENT;



vc_add_default_templates( $data );


// Services Border 2
$data = array();
$data['name'] = __( 'Services Border 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-border-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'110px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'30px','padding-bottom':'50px','border-left-width':'1px','border-top-width':'1px','border-bottom-width':'1px','border-right-width':'1px','padding-left':'30px','padding-right':'30px'}_-_json" border_color="#ebebeb"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Financial Services &amp; Ideas" icon="cl-icon-lightbulb" css_style="{'margin-top':'35px'}_-_json" icon_font_size="80" icon_color="#238dff" wrapper_size="106" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
[/cl_service][/cl_column][cl_column width="1/3" css_style="{'border-left-width':'1px','border-top-width':'1px','border-right-width':'1px','border-bottom-width':'1px','padding-top':'30px','padding-left':'30px','padding-right':'30px','padding-bottom':'50px'}_-_json" border_color="#ebebeb"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Investigate Business" icon="cl-icon-bargraph" css_style="{'margin-top':'35px'}_-_json" icon_font_size="80" icon_color="#238dff" wrapper_size="106" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
[/cl_service][/cl_column][cl_column width="1/3" css_style="{'border-left-width':'1px','border-top-width':'1px','border-right-width':'1px','border-bottom-width':'1px','padding-top':'30px','padding-right':'30px','padding-left':'30px','padding-bottom':'50px'}_-_json" border_color="#ebebeb"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Evaluate Opportunities" icon="cl-icon-strategy" css_style="{'margin-top':'35px'}_-_json" icon_font_size="80" icon_color="#238dff" wrapper_size="106" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Box 1
$data = array();
$data['name'] = __( 'Services Box 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-box-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','padding-bottom':'70px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'40px','padding-bottom':'40px','padding-left':'10px','padding-right':'10px'}_-_json" background_color="#f4f4f4" custom_link="//codeless.co/folie/minimal/#"][cl_icon size="86" color="#ff7372" align="center" line_height="100" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'15px'}_-_json"]

Photography

[/cl_custom_heading][/cl_column][cl_column width="1/3" background_color="#f4f4f4" css_style="{'padding-top':'40px','padding-bottom':'40px','padding-left':'10px','padding-right':'10px'}_-_json" custom_link="//codeless.co/folie/minimal/#"][cl_icon size="86" color="#ff7372" align="center" line_height="100" css_style="{'margin-top':'35px'}_-_json" icon="cl-icon-hotairballoon"][cl_custom_heading typography="h3" css_style="{'margin-top':'15px'}_-_json"]

Artists

[/cl_custom_heading][/cl_column][cl_column width="1/3" background_color="#f4f4f4" css_style="{'padding-top':'40px','padding-bottom':'40px','padding-left':'10px','padding-right':'10px'}_-_json" custom_link="//codeless.co/folie/minimal/#"][cl_icon size="86" color="#ff7372" align="center" line_height="100" css_style="{'margin-top':'35px'}_-_json" icon="cl-icon-toolbox"][cl_custom_heading typography="h3" css_style="{'margin-top':'15px'}_-_json"]

Our Portfolio

[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Box 2
$data = array();
$data['name'] = __( 'Services Box 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-box-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','padding-bottom':'90px'}_-_json" background_color="#f9f9f9" col_responsive="half"][cl_column css_style="{'padding-top':'30px','padding-bottom':'30px','padding-left':'20px','padding-right':'20px'}_-_json" width="1/4" background_color="#ffffff" animation="bottom-t-top" animation_delay="100"][cl_icon icon="cl-icon-presentation" size="60" color="#1fb4cc" hover_color="#1fb4cc" line_height="64" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="600" text_line_height="30" text_transform="none" text_color="#353535" css_style="{'margin-top':'15px'}_-_json"]

Better Performance

[/cl_custom_heading][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item]

GPU Accelerated Animations

[/cl_list_item][cl_list_item]

Script Loading Dependency

[/cl_list_item][cl_list_item]

Faster Page load with adaptive images

[/cl_list_item][/cl_list][/cl_column][cl_column width="1/4" background_color="#ffffff" css_style="{'padding-left':'20px','padding-top':'30px','padding-bottom':'30px'}_-_json" animation="bottom-t-top" animation_delay="200"][cl_icon icon="cl-icon-pricetags" size="60" color="#1fb4cc" hover_color="#1fb4cc" line_height="64" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="600" text_line_height="30" text_transform="none" text_color="#353535" css_style="{'margin-top':'15px'}_-_json"]

Well-crafted Shop

[/cl_custom_heading][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item]

Sell anything, anywhere

[/cl_list_item][cl_list_item]

Well designed WooCommerce Shop

[/cl_list_item][cl_list_item]

Modern and clean interface

[/cl_list_item][/cl_list][/cl_column][cl_column width="1/4" background_color="#ffffff" css_style="{'padding-left':'20px','padding-right':'20px','padding-top':'30px','padding-bottom':'30px'}_-_json" animation="bottom-t-top" animation_delay="300"][cl_icon icon="cl-icon-adjustments" size="60" color="#1fb4cc" hover_color="#1fb4cc" line_height="64" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="600" text_line_height="30" text_transform="none" text_color="#353535" css_style="{'margin-top':'15px'}_-_json"]

Draggable Dimensions

[/cl_custom_heading][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item]

Awesome Drag &amp; Drop Front Builder

[/cl_list_item][cl_list_item]

Shift + Drag Resize any dimension

[/cl_list_item][cl_list_item]

All options in one place

[/cl_list_item][/cl_list][/cl_column][cl_column width="1/4" background_color="#ffffff" css_style="{'padding-left':'20px','padding-right':'20px','padding-top':'30px','padding-bottom':'30px'}_-_json" animation="bottom-t-top" animation_delay="400"][cl_icon icon="cl-icon-layers2" size="60" color="#1fb4cc" hover_color="#1fb4cc" line_height="64" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="600" text_line_height="30" text_transform="none" text_color="#353535" css_style="{'margin-top':'15px'}_-_json"]

A Better Theme

[/cl_custom_heading][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item]

Cutting-Edge Setup, one-click and go

[/cl_list_item][cl_list_item]

Adaptive Images for different devices

[/cl_list_item][cl_list_item]

Predefined Elements and Blocks

[/cl_list_item][/cl_list][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );











// About & Skills
$data = array();
$data['name'] = __( 'About & Skills', 'folie' );
$data['cat_display_name'] = $cat_display_names['about'].', '.$cat_display_names['skills'].', ' . $cat_display_names['block'];
$data['custom_class'] = 'about skills block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-skills.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'0px'}_-_json"][cl_custom_heading typography="custom_font" css_style="{'margin-top':'35px'}_-_json" text_font_size="18" text_font_weight="100" text_letterspace="4"]<p><mark class="highlight">Our Mission</mark></p>
[/cl_custom_heading][cl_custom_heading typography="h1" css_style="{'margin-top':'0px'}_-_json"]<p>Built with Passion</p>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px'}_-_json" col_responsive="full"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-right':'15px'}_-_json"][cl_text custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'margin-top':'0px'}_-_json"]<p>Ladys and Gentleman this is the most esclusive theme you ever seen! Folie means madness, because this theme will make you mad about how easy and capable is. Let us show you more about us!</p>
[/cl_text][cl_row_inner css_style="{'margin-top':'10px'}_-_json"][cl_column_inner width="1/2" animation="bottom-t-top" animation_delay="200"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p><mark class="highlight">A Modern Platform</mark></p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'0px'}_-_json"]<p>You will enjoy the ease of scrolling through live customizer and live page builder in other side.</p>
[/cl_text][/cl_column_inner][cl_column_inner width="1/2" animation="bottom-t-top" animation_delay="300"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p><mark class="highlight">Codeless Live Composer</mark></p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'0px'}_-_json"]<p>With this new kind of page builder you will change everything in seconds and will see it live. The #1 all-in-one builder.</p>
[/cl_text][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/2"][cl_progress_bar percentage="64" css_style="{'margin-top':'15px'}_-_json" animation="alpha-anim" animation_delay="200" color="#313033"][cl_progress_bar percentage="86" css_style="{'margin-top':'15px'}_-_json" animation="alpha-anim" animation_delay="300" title="<p>Web Design</p>" color="#313033"][cl_progress_bar percentage="95" css_style="{'margin-top':'15px'}_-_json" animation="alpha-anim" animation_delay="400" title="<p>Marketing</p>" color="#313033"][cl_progress_bar percentage="77" css_style="{'margin-top':'15px'}_-_json" animation="alpha-anim" animation_delay="500" title="<p>UX / UI</p>" color="#313033"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// About & Skills 2
$data = array();
$data['name'] = __( 'About & Skills 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['about'].', '.$cat_display_names['skills'].', ' . $cat_display_names['block'];
$data['custom_class'] = 'about skills block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-skills-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]Company Information[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]<p>Codeless is an experienced and passionate group of designers, developers, project managers, writers and artists, of passages of Lorem Ipsum available.</p>
[/cl_text][cl_toggles accordion="1" css_style="{'margin-top':'25px'}_-_json"][cl_toggle is_active="1" title="History"][cl_text css_style="{'margin-top':'35px'}_-_json"]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="What we have Done"][cl_text css_style="{'margin-top':'35px'}_-_json"]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="Our Future"][cl_text css_style="{'margin-top':'35px'}_-_json"]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][/cl_toggles][/cl_column][cl_column width="1/2"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>What We Do</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]<p>Codeless is an experienced and passionate group of designers, developers, project managers, writers and artists, of passages of Lorem Ipsum available.&nbsp;Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.</p>
[/cl_text][cl_progress_bar title="<p>Development Software</p>" percentage="67" css_style="{'margin-top':'15px'}_-_json"][cl_progress_bar title="Create Brands from scratch<br>" percentage="53" css_style="{'margin-top':'15px'}_-_json"][cl_progress_bar title="Marketing<br>" percentage="74" css_style="{'margin-top':'15px'}_-_json"][cl_progress_bar title="Web Design<br>" percentage="91" css_style="{'margin-top':'15px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// About & Skills 3
$data = array();
$data['name'] = __( 'About & Skills 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['about'].', '.$cat_display_names['skills'].', ' . $cat_display_names['block'];
$data['custom_class'] = 'about skills block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-skills-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#f3f4fb" background_image="{'id':'32','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fmodern%2Fwp-content%2Fuploads%2F2018%2F03%2Ftyler-nix-466138-unsplash-compressed.jpg'}_-_json" background_size="auto" background_position="left center"][cl_column width="1/3" background_position="center center"][/cl_column][cl_column width="2/3" background_color="#f3f4fb" css_style="{'padding-top':'100px','padding-bottom':'100px','padding-left':'15%','padding-right':'0'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<p>Web design that sells your <b>products.</b></p>
[/cl_custom_heading][cl_divider width="80" color="#bdc9f9" color_icon="#222222" css_style="{'margin-top':'15px'}_-_json" width_full="0"][cl_text css_style="{'margin-top':'10px'}_-_json"]

	<p style="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.&nbsp;The beauty of this theme is that is built with Modules. Every time you can active or dis-active any module that you would.</p>

[/cl_text][cl_progress_bar percentage="79" css_style="{'margin-top':'35px'}_-_json"][cl_progress_bar title="<p>Web Design</p>" percentage="51" css_style="{'margin-top':'20px'}_-_json"][cl_progress_bar title="<p>Marketing &amp; UI<br></p>" percentage="94" css_style="{'margin-top':'20px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );








// Team 1
$data = array();
$data['name'] = __( 'Team 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['team'];
$data['custom_class'] = 'team';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/team-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" columns_gap="0"][cl_column css_style="{'padding-top':'0px','padding-bottom':'20px','padding-left':'0px'}_-_json" horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><mark class="highlight">Collaborative Team</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'20px'}_-_json" text_line_height="42"]<div style="text-align: center;">Our Core Team</div>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]<p style="text-align: center;">Coming together is a beginning. Keeping together is progress.&nbsp;</p><p style="text-align: center;">Working together is success. Codeless Team.</p>
[/cl_text][cl_team item_distance="0" team_id="1413" carousel="1" team_animation="zoom-out" carousel_dots="1"][cl_button btn_title="<p>We are hiring - Apply Now</p>
" css_style="{'margin-top':'34px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Team 2
$data = array();
$data['name'] = __( 'Team 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['team'];
$data['custom_class'] = 'team';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/team-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px','border-top-width':'1px'}_-_json" border_color="#eeeeee"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_text custom_typography="1" text_font_size="26" text_line_height="42" text_color="#303133" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0" text_font_weight="300"]<p>The Codeless leadership team brings together years of</p><p>experience building WordPress Themes and Web Experience.</p>
[/cl_text][/cl_column][/cl_row][cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_team grid_layout="4" team_items_distance="0" carousel="1" css_style="{'margin-top':'35px'}_-_json" style="photo" image_size="team_size"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Team 3
$data = array();
$data['name'] = __( 'Team 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['team'];
$data['custom_class'] = 'team';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/team-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" row_id="team"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="h5" css_style="{'margin-top':'35px'}_-_json"]<p>Our Team</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'20px','margin-bottom':'0px'}_-_json"]<p>Who makes things happen</p>
[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="18" text_line_height="31" css_style="{'margin-top':'30px','margin-bottom':'30px'}_-_json"]<p>We have cheerfully and expertly designed, developed, strategized and implemented web marketing programs and wordpress sites for small and large medical clients, non-profit foundations, design agencies, real estate groups and small service clients. Specular includes all our years of experience on doing web.<br></p>[/cl_text][cl_team style="photo" grid_layout="4" css_style="{'margin-top':'35px'}_-_json" carousel="1" title_typography="h4" team_animation="bottom-t-top" carousel_dots="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Team 4
$data = array();
$data['name'] = __( 'Team 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['team'];
$data['custom_class'] = 'team';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/team-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px'}_-_json"][cl_column horizontal_align="middle"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<p>Meet our great core <b>Team</b></p>
[/cl_custom_heading][cl_divider width="80" color="#bdc9f9" color_icon="#222222" css_style="{'margin-top':'15px'}_-_json" width_full="0" align="center_divider"][cl_text css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]

	<p style="">At vero eos et accusamus et iusto odio dignissimos ducimus qui</p><p style="">blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.&nbsp;</p>

[/cl_text][cl_team title_typography="h4"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );




// About with Video & Counter
$data = array();
$data['name'] = __( 'About with Video & Counter', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', ' . $cat_display_names['counter'].', ' . $cat_display_names['block'];
$data['custom_class'] = 'about counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-video-counter.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" columns_gap="21" col_responsive="full"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'0px','padding-right':'15px'}_-_json"][cl_media image="{'id':1561,'url':'https://codeless.co/folie/default/wp-content/uploads/2017/02/img_video-compressed.jpg'}_-_json" css_style="{'margin-top':'15px'}_-_json" video="youtube" video_youtube="9q2h6oGD6UA" media_type="video" custom_width="350" height="340" animation="left-t-right"][/cl_column][cl_column width="1/2"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: left;"><font color="#1fb4cc">Located in San Francisco</font></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'0px'}_-_json" text_line_height="42"]<div style="text-align: left;"><span style="letter-spacing: 0px;">We are a Creative Agency</span></div>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]<p style="text-align: left;">Folie comes with Visual Portfolio Builder like no other theme.</p>
<p style="text-align: left;">Predefined Layouts &amp; 100+ Options to choose from.</p>
[/cl_text][cl_text css_style="{'margin-top':'20px'}_-_json"]<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
[/cl_text][cl_row_inner css_style="{'margin-top':'15px'}_-_json"][cl_column_inner width="1/3"][cl_counter number="47" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p><mark class="highlight">People Working</mark></p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_counter number="12" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p><font color="#1fb4cc">`offices in US</font></p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_counter align="left" number="8"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p><mark class="highlight">Millions in 2016</mark></p>
[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );







// CTA 2
$data = array();
$data['name'] = __( 'CTA 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['cta'];
$data['custom_class'] = 'cta';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/cta-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" text_color="light-text" background_color="#1b1f21"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><font color="#1fb4cc">Ready for the FUTURE?</font></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#ffffff" css_style="{'margin-top':'0px'}_-_json" text_line_height="42"]<div style="text-align: center;">Get Codeless Membership</div>
[/cl_custom_heading][cl_button btn_title="<p>Purchase Another Licence</p>
" css_style="{'margin-top':'35px'}_-_json" link="https://codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Testimonial Parallax 1
$data = array();
$data['name'] = __( 'Testimonial Parallax 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/testimonial-parallax-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'120px','padding-bottom':'110px'}_-_json" background_image="{'uploading':'false','date':'1488994794000','filename':'working-compressed.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-content%2Fuploads%2F2017%2F03%2Fworking-compressed.jpg','title':'working-compressed','caption':'','alt':'','description':'','id':'2123','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2F%3Fattachment_id%3D2123','author':'1','name':'working-compressed','status':'inherit','modified':'1488994794000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'March%208%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-admin%2Fpost.php%3Fpost%3D2123%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'66522','filesizeHumanReadable':'65%20KB','height':'1067','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" parallax="1" overlay="color" overlay_color="#222222" overlay_opacity="0.65" text_color="light-text"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_testimonial carousel_dots="1"][/cl_column][/cl_row][cl_row css_style="{'padding-top':'30px','padding-bottom':'30px'}_-_json" text_color="light-text" background_color="#1b1f21" equal_height="1"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="2/3" horizontal_align="middle" vertical_align="middle"][cl_custom_heading typography="custom_font" text_line_height="32" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_font_weight="600"]
<p style="text-align: center;">Our <span style="letter-spacing: 0px;">aim is to create something special in the market</span></p>
[/cl_custom_heading][/cl_column][cl_column width="1/3" horizontal_align="middle" vertical_align="middle"][cl_button css_style="{'margin-top':'0px'}_-_json" horizontal_align="middle" btn_title="

Purchase Now

" link="https://codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Testimonial 2
$data = array();
$data['name'] = __( 'Testimonial 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/testimonial-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><mark class="highlight">Our Success Stories</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'0px'}_-_json" text_line_height="42"]<div style="text-align: center;"><span style="letter-spacing: 0px;">What They Say</span></div>
[/cl_custom_heading][cl_empty space="30px"][cl_testimonial carousel_dots="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Testimonial 3
$data = array();
$data['name'] = __( 'Testimonial 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/testimonial-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'0px'}_-_json"][cl_media position="center" image="{'uploading':'false','date':'1498819452000','filename':'slide-image-1.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-content%2Fuploads%2F2017%2F06%2Fslide-image-1.jpg','title':'slide-image-1','caption':'','alt':'','description':'','id':'185','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2F%3Fattachment_id%3D185','author':'1','name':'slide-image-1','status':'inherit','modified':'1498819452000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2030%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-admin%2Fpost.php%3Fpost%3D185%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'138235','filesizeHumanReadable':'135%20KB','height':'590','width':'647','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" custom_width_bool="1" css_style="{'margin-top':'15px'}_-_json" custom_width="450px"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'50px','padding-bottom':'50px'}_-_json"][cl_text custom_typography="1" text_font_size="26" text_font_weight="300" text_line_height="40" css_style="{'margin-top':'35px'}_-_json"]<p>"This is the most customible theme i ever purchased. Super support staff. I love to work with Folie WordPress Theme"</p>
[/cl_text][cl_custom_heading typography="h4" css_style="{'margin-top':'35px'}_-_json"]<p>Jason Wallsh</p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="14" text_font_weight="400" text_line_height="20" text_color="#cccccc" css_style="{'margin-top':'5px'}_-_json"]<p>Codeless Client</p>
[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



//Testimonial 4
$data = array();
$data['name'] = __( 'Testimonial Black Background', 'folie' );
$data['cat_display_name'] = $cat_display_names['testimonial'];
$data['custom_class'] = 'testimonial';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/testimonial-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json" background_color="#1c1c1c" text_color="light-text"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'0px','padding-right':'0px'}_-_json"][cl_testimonial carousel_dots="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Services Block 1
$data = array();
$data['name'] = __( 'Services Block 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'40px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'40px','border-bottom-width':'1px'}_-_json" border_color="#eeeeee"][cl_custom_heading typography="custom_font" text_font_size="26" text_font_weight="300" text_line_height="38" text_transform="none" text_color="#1fb4cc" css_style="{'margin-top':'35px'}_-_json"]<p style="text-align: left;">We believe in building Large brands,&nbsp;<span style="letter-spacing: 0px;">good clean design, well-crafted UX&nbsp;</span></p>
<p style="text-align: left;">and elegant solutions for our lovely customers!</p>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/3" animation="bottom-t-top" animation_delay="100"][cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="100"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service][cl_list css_style="{'margin-top':'15px','padding-left':'75px'}_-_json"][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">GPU Accelerated Animations</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Script Loading Dependency</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Faster Page load with adaptive images&nbsp;</mark></p>[/cl_list_item][/cl_list][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="200"][cl_service media="type_icon" title="Well-Crafted Shop" icon="cl-icon-basket" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="200"]<p>We have design a full shop experience not only a simple design. You will love the way that Folie build the Online Shop.</p>[/cl_service][cl_list css_style="{'margin-top':'15px','padding-left':'75px'}_-_json"][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Well designed WooCommerce Shop</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Sell anything, anywhere</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Mobile friendly</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Modern and clean interface</mark></p>[/cl_list_item][/cl_list][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="300"][cl_service media="type_icon" title="DRAGGABLE DIMENSIONS" icon="cl-icon-focus" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="500"]<p>Click and drag to resize height, padding or empty spaces between elements. The first WP Theme that offers this feature.</p>[/cl_service][cl_list css_style="{'margin-top':'15px','padding-left':'75px'}_-_json"][cl_list_item icon="cl-icon-check2"]<p><mark class="highlight">Awesome Drag &amp; Drop Front Builder</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><font color="#1fb4cc">Shift + Drag &nbsp;- Resize any dimension</font></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p><font color="#1fb4cc">All options in one place&nbsp;</font></p>[/cl_list_item][/cl_list][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Services Block 2
$data = array();
$data['name'] = __( 'Services Block 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]<p style="text-align: center;"><mark class="highlight">Our Offices</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#383838" css_style="{'margin-top':'20px'}_-_json" text_line_height="42"]<div style="text-align: center;"><span style="letter-spacing: 0px;">Lets Talk Together</span></div>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="20" text_line_height="32" text_color="#969696" animation_delay="1000" animation_speed="800" css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]<p style="text-align: center;">Learn more about our locations and lets talk together.</p><p style="text-align: center;">Write us your suggestions and get opportunities</p>
[/cl_text][/cl_column][/cl_row][cl_row css_style="{'padding-top':'30px','padding-bottom':'70px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" icon="cl-icon-map3" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="34" icon_color="#ffffff" wrapper_bg_color="#1fb4cc" wrapper_size="68" wrapper_distance="24" title="Our Locations" wrapper_border_color="#1fb4cc"]<p>1140 Lawton St, <mark class="highlight"><b>San Francisco, CA</b></mark></p><p>150 E 42nd St, <mark class="highlight"><b>New York, NY</b></mark><br></p>[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" icon="cl-icon-happy" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="34" icon_color="#ffffff" wrapper_bg_color="#232323" wrapper_size="68" wrapper_distance="24" title="Open Hours"]<p><mark class="highlight"><b>Mon - Friday :</b></mark> 09 00 - 18 00</p><p><mark class="highlight"><b>Sat - Sun :</b></mark> 10 00 - 14 00</p>[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" icon="cl-icon-phone2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="34" icon_color="#ffffff" wrapper_bg_color="#232323" wrapper_size="68" wrapper_distance="24" title="Contact Details"]<p><mark class="highlight"><b>Tel :</b></mark> +01 415 4111</p><p><mark class="highlight"><b>Email :</b></mark> info@codeless.co</p>[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 3
$data = array();
$data['name'] = __( 'Services Block 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" equal_height="1" css_style="{'padding-bottom':'0px','padding-top':'0','border-top-width':'1px'}_-_json" background_color="#ffffff" border_color="#ebebeb" parallax="1"][cl_column width="1/4" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" vertical_align="middle"][cl_custom_heading tag="h1" typography="custom_font" text_font_weight="300" text_transform="none" text_color="#303133" css_style="{'margin-top':'35px'}_-_json" text_font_size="26"]
<p style="text-align: center;">Our Main Services</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'17px','padding-left':'30px','padding-right':'30px'}_-_json" margin_paragraphs="3"]
<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
[/cl_text][/cl_column][cl_column width="3/4" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#f5f5f5"][cl_row_inner css_style="{'margin-top':'35px','padding-top':'80px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'0px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Financial Services &amp; Ideas" icon="cl-icon-lightbulb" css_style="{'margin-top':'0px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'50px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Marketing Research" icon="cl-icon-megaphone" css_style="{'margin-top':'0px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'100px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3" css_style="{'padding-bottom':'0px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Credit In Your Disposal" icon="cl-icon-toolbox" css_style="{'margin-top':'0px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'50px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Auditing your capital" icon="cl-icon-lock2" css_style="{'margin-top':'9px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'50px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3" css_style="{'padding-bottom':'0px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Future Investments" icon="cl-icon-presentation" css_style="{'margin-top':'0px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'50px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="INTEREST Rate" icon="cl-icon-wallet" css_style="{'margin-top':'7px','border-top-width':'1px','border-left-width':'1px','padding-right':'50px','border-bottom-width':'1px','padding-top':'0px','padding-bottom':'50px','padding-left':'50px'}_-_json" icon_font_size="57" icon_color="#238dff" wrapper_size="73" wrapper_distance="21" title_distance_top="2" title_content_distance="7"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 4
$data = array();
$data['name'] = __( 'Services Block 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row fullheight="1" css_style="{'padding-top':'45px','padding-bottom':'0px'}_-_json" text_color="light-text" background_color="#7f7f7f" background_image="{'uploading':'false','date':'1495534209000','filename':'tree.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Ftree.jpg','title':'tree','caption':'','alt':'','description':'','id':'35','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D35','author':'1','name':'tree','status':'inherit','modified':'1495534209000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2023%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D35%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'354179','filesizeHumanReadable':'346%20KB','height':'962','width':'1414','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" parallax="1" overlay="gradient" overlay_opacity="0.85" equal_height="1" columns_gap="0" col_responsive="full" overlay_color="#161616" overlay_gradient="solid_vault" anchor_label="Welcome"][cl_column css_style="{'padding-top':'30px','padding-bottom':'0px','padding-right':'0px'}_-_json" width="1/2"][cl_media image="{'uploading':'false','date':'1495536804000','filename':'1.png','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'png','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2F1.png','title':'1','caption':'','alt':'','description':'','id':'47','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D47','author':'1','name':'1','status':'inherit','modified':'1495536804000','mime':'image%2Fpng','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2023%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D47%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'78396','filesizeHumanReadable':'77%20KB','height':'1199','width':'640','orientation':'portrait','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" height="380" css_style="{'margin-top':'15px','padding-left':'0px','padding-right':'0px'}_-_json" animation="left-t-right" animation_delay="200" position="center" custom_width_bool="1"][/cl_column][cl_column width="1/2" css_style="{'padding-bottom':'75px','padding-left':'0px','padding-top':'68px','padding-right':'41px'}_-_json" overlay_opacity="1" overlay_color="#0a0a0a"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" animation="bottom-t-top" animation_delay="400" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_992_line_height="26px"]

<span style="letter-spacing: 0px;">Welcome to </span><span style="letter-spacing: 0px;">our new <b>Mobile app presentation.</b></span>

[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="28" css_style="{'margin-top':'20px'}_-_json" animation="bottom-t-top" animation_delay="500" custom_responsive_992_bool="1" custom_responsive_768_bool="1" custom_responsive_768_size="14px" custom_responsive_768_line_height="24px" custom_responsive_992_line_height="26px" custom_responsive_992_size="14px"]

A mobile application software or mobile app is an application software designed to run on mobile devices such as smartphones and tablet computers.

Mobile apps often stand in contrast to desktop applications that run on desktop computers, and with web applications which run in mobile web browsers.

[/cl_text][cl_button css_style="{'margin-top':'35px'}_-_json" btn_title="Purchase Now" animation="bottom-t-top" animation_delay="700" link="//codeless.co/folie/join.php"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 5
$data = array();
$data['name'] = __( 'Services Block 5', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-5.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row fullheight="1" css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" background_color="#fafafa" background_image="{'uploading':'false','date':'1495801318000','filename':'web.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Fweb.jpg','title':'web','caption':'','alt':'','description':'','id':'276','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D276','author':'1','name':'web','status':'inherit','modified':'1495801318000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2026%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D276%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'64474','filesizeHumanReadable':'63%20KB','height':'487','width':'680','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay_opacity="0.85" equal_height="1" columns_gap="0" background_position="right center" col_responsive="full" background_size="auto" anchor_label="Performance"][cl_column css_style="{'padding-top':'30px','padding-bottom':'30px','padding-right':'30px','padding-left':'30px'}_-_json" width="1/2" overlay="color" overlay_color="#f9f9f9" overlay_opacity="0.95"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" animation="bottom-t-top" animation_delay="100" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_992_line_height="28px"]

<mark class="highlight">Boosted Performance</mark>

<mark class="highlight">and <b>quality design.</b></mark>

[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="28" css_style="{'margin-top':'20px'}_-_json" animation="bottom-t-top" animation_delay="300" custom_responsive_992_line_height="26px" custom_responsive_992_size="14px" custom_responsive_768_bool="1" custom_responsive_768_size="14px"]

With Folie its possible to save a lot of memory. Its not necessary to create for each image different image sizes. Your website will load only the necessary files. This will make your website loads faster.
<p style="text-align: justify;"></p>
[/cl_text][cl_row_inner css_style="{'margin-top':'35px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_service media="type_icon" layout_type="media_top" title="Improved" icon="cl-icon-pie-graph" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="38" icon_color="#222222" wrapper_bg_color="#eeeeee" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="85" wrapper_distance="0" animation="zoom-in" animation_delay="400"]

Folie improves overall site performance.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Build Visually" icon="cl-icon-stacked" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="38" icon_color="#222222" wrapper_bg_color="#eeeeee" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="85" wrapper_distance="0" animation="zoom-in" animation_delay="500"]

Build every page visually with drag&amp;drop.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Beautiful Design" icon="cl-icon-star2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="38" icon_color="#222222" wrapper_bg_color="#eeeeee" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="85" wrapper_distance="0" animation="zoom-in" animation_delay="600"]

A pixel-perfect design. Sharp in any aspect.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/2" css_style="{'padding-bottom':'90px','padding-left':'0px','padding-top':'90px','padding-right':'0px'}_-_json" background_image="{}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 6
$data = array();
$data['name'] = __( 'Services Block 6', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-6.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row fullheight="1" css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" background_color="#d2f5f7" background_image="{}_-_json" overlay_opacity="0.85" equal_height="1" columns_gap="0" background_position="right center" custom_width_bool="1" custom_width="1160" col_responsive="full" anchor_label="Features"][cl_column css_style="{'padding-top':'30px','padding-bottom':'0px','padding-right':'60px','padding-left':'0px'}_-_json" width="1/2"][cl_media image="{'id':'72','title':'Untitled-3','filename':'Untitled-3.png','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2FUntitled-3.png','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D72','alt':'','author':'1','description':'','caption':'','name':'untitled-3','status':'inherit','uploadedTo':'0','date':'Tue%20May%2023%202017%2017%3A28%3A10%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Tue%20May%2023%202017%2017%3A28%3A10%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fpng','type':'image','subtype':'png','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2023%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D72%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'213608','filesizeHumanReadable':'209%20KB','height':'633','width':'600','orientation':'portrait','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" css_style="{'margin-top':'15px'}_-_json" animation="left-t-right" animation_delay="400" position="left" custom_width_bool="1" custom_width="470px"][/cl_column][cl_column width="1/2" css_style="{'padding-bottom':'90px','padding-left':'0px','padding-top':'90px','padding-right':'0px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" animation="bottom-t-top" animation_delay="400" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_992_line_height="28px"]

<mark class="highlight">Boosted Performance</mark>

<mark class="highlight">and quality <b>design</b>.</mark>

[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="28" css_style="{'margin-top':'20px'}_-_json" animation="bottom-t-top" animation_delay="500" custom_responsive_992_line_height="26px" custom_responsive_992_size="14px" custom_responsive_768_bool="1" custom_responsive_768_size="14px"]

With Folie its possible to save a lot of memory. Its not necessary to create for each image different image sizes. Your website will load only the necessary files. This will make your website loads faster.
<p style="text-align: justify;"><i><mark class="highlight">Mobile apps often stand in contrast to desktop applications that run on desktop computers, and with web applications which run in mobile web browsers.</mark></i></p>
[/cl_text][cl_list distance="1" css_style="{'margin-top':'15px'}_-_json"][cl_list_item animation="bottom-t-top" animation_delay="700" animation_speed="500"]

Generate only needed thumbnails

[/cl_list_item][cl_list_item animation="bottom-t-top" animation_delay="800" animation_speed="500"]

Load only needed JS files

[/cl_list_item][cl_list_item animation="bottom-t-top" animation_delay="900" animation_speed="500"]

GPU Accelerated Parallax Effect

[/cl_list_item][cl_list_item animation="bottom-t-top" animation_delay="1000" animation_speed="500"]

Boosted Performance Folie Theme

[/cl_list_item][/cl_list][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 7
$data = array();
$data['name'] = __( 'Services Block 7', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-7.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'40px'}_-_json" background_color="#ffffff"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]
<p style="text-align: center;">Some <b>Codeless</b> Core Features</p>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'35px'}_-_json" background_color="#ffffff"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px','border-top-width':'1px','border-left-width':'1px','border-right-width':'1px','border-bottom-width':'1px'}_-_json" background_color="#ffffff" border_color="#ebebeb"][cl_service media="type_icon" icon="cl-icon-stack-2" css_style="{'margin-top':'35px','padding-left':'30px','padding-top':'20px','padding-right':'30px','padding-bottom':'20px','border-top-width':'0px'}_-_json" icon_font_size="64" icon_color="#3888e2" wrapper_size="83" wrapper_distance="23" title_content_distance="5" title_typography="h3" custom_desc_typography="1" desc_font_size="16" desc_line_height="29" desc_color="#8c8c8c" box_border_color="rgba(0,0,0,0)"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/2" css_style="{'padding-left':'30px','padding-right':'30px','border-top-width':'1px','border-left-width':'1px','border-right-width':'1px','border-bottom-width':'1px','padding-top':'20px','padding-bottom':'20px'}_-_json" border_color="#ebebeb"][cl_service media="type_icon" icon="cl-icon-video" css_style="{'margin-top':'35px','padding-left':'30px','padding-top':'20px','padding-right':'30px','padding-bottom':'20px','border-top-width':'3px'}_-_json" icon_font_size="64" icon_color="#3888e2" wrapper_size="83" wrapper_distance="23" title_content_distance="5" title_typography="h3" custom_desc_typography="1" desc_font_size="16" desc_line_height="29" desc_color="#8c8c8c" box_border_color="rgba(0,0,0,0)"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'120px'}_-_json" background_color="#ffffff"][cl_column width="1/2" css_style="{'padding-top':'0px','padding-bottom':'20px','border-top-width':'0px','border-left-width':'1px','border-right-width':'1px','border-bottom-width':'1px'}_-_json" background_color="#ffffff" border_color="#ebebeb"][cl_service media="type_icon" icon="cl-icon-unlock2" css_style="{'margin-top':'35px','padding-left':'30px','padding-top':'40px','padding-right':'30px','padding-bottom':'20px','border-top-width':'3px'}_-_json" icon_font_size="64" icon_color="#3888e2" wrapper_size="83" wrapper_distance="23" title_content_distance="5" title_typography="h3" custom_desc_typography="1" desc_font_size="16" desc_line_height="29" desc_color="#8c8c8c" box_border_color="#3888e2"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/2" css_style="{'padding-left':'30px','padding-right':'30px','border-top-width':'1px','border-left-width':'1px','border-right-width':'1px','border-bottom-width':'1px','padding-top':'20px','padding-bottom':'20px'}_-_json" border_color="#ebebeb"][cl_service media="type_icon" icon="cl-icon-cog2" css_style="{'margin-top':'35px','padding-left':'30px','padding-top':'20px','padding-right':'30px','padding-bottom':'20px','border-top-width':'3px'}_-_json" icon_font_size="64" icon_color="#3888e2" wrapper_size="83" wrapper_distance="23" title_content_distance="5" title_typography="h3" custom_desc_typography="1" desc_font_size="16" desc_line_height="29" desc_color="#8c8c8c" box_border_color="rgba(0,0,0,0)"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 8
$data = array();
$data['name'] = __( 'Services Block 8', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-8.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row equal_height="1" css_style="{'padding-top':'100px','padding-bottom':'80px'}_-_json"][cl_column width="2/3" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'30px','padding-right':'30px'}_-_json"][cl_media image="{'uploading':'false','date':'1498922341000','filename':'minimal-1.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-content%2Fuploads%2F2017%2F07%2Fminimal-1.jpg','title':'minimal-1','caption':'','alt':'','description':'','id':'251','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2F%3Fattachment_id%3D251','author':'1','name':'minimal-1','status':'inherit','modified':'1498922341000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'July%201%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-admin%2Fpost.php%3Fpost%3D251%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'30891','filesizeHumanReadable':'30%20KB','height':'367','width':'559','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json"][/cl_column][cl_column width="1/3" css_style="{'padding-left':'0px'}_-_json" vertical_align="middle"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" custom_responsive_992_bool="1"]

Build a site

<span style="letter-spacing: 0px; display: inline !important;">in record </span><span style="letter-spacing: 0px; display: inline !important;">time!</span>

[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'15px'}_-_json"]

Whether you're building a welcome page

for your next project or a personal, portfolio,

Folie has all necessary tools and design covered.

[/cl_text][cl_button btn_title="

Purchase Now

" button_bg_color="#0cabd3" button_bg_color_hover="#0cabd3" button_border_color="" link="http://codeless.co/folie/join.php" css_style="{'margin-top':'35px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 9
$data = array();
$data['name'] = __( 'Services Block 9', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-9.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'100px'}_-_json" background_color="#f8f8f8"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" custom_responsive_992_bool="1"]

The Rising Star of Future WordPress Themes

[/cl_custom_heading][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="18" text_line_height="32" text_color="#999999" css_style="{'margin-top':'15px'}_-_json"]

Whether you're building a welcome page <span style="letter-spacing: 0px;">for your next project or a personal, portfolio, </span>

Folie has all necessary tools and design covered.

[/cl_text][cl_row_inner css_style="{'margin-top':'60px'}_-_json"][cl_column_inner width="1/2" css_style="{'padding-top':'10px','padding-bottom':'10px','padding-right':'20px','padding-left':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Draggable Spaces" icon="cl-icon-tools-2" css_style="{'margin-top':'35px'}_-_json" icon_font_size="80" icon_color="#687ced" wrapper_size="110" title_distance_top="10" title_content_distance="24"]

No more loosing time by refresh browser and again change tab to adjust element margin or padding. You have only to type Shift and drag your mouse to change padding and margins.

[/cl_service][/cl_column_inner][cl_column_inner width="1/2" css_style="{'padding-left':'20px','padding-right':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Live HEader Builder" icon="cl-icon-layers2" css_style="{'margin-top':'35px'}_-_json" icon_font_size="80" icon_color="#687ced" wrapper_size="110" title_distance_top="10" title_content_distance="25"]

Header is the main section of the website so we have made it easily to customize. Add elements on the header and drag and drop them live and see how does it look. You can also set directly a header styles.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 10
$data = array();
$data['name'] = __( 'Services Block 10', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-10.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px','border-bottom-width':'1px'}_-_json" background_color="#f8f8f8" border_color="#ebebeb"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_color="#2d2d2d" css_style="{'margin-top':'35px'}_-_json"]
<p style="text-align: center;">Some of our Great Features</p>
[/cl_custom_heading][cl_custom_heading tag="h5" typography="custom_font" text_font_size="18" text_font_weight="400" text_line_height="32" text_transform="none" text_color="#7c7c7c" css_style="{'margin-top':'10px'}_-_json"]
<p style="text-align: center;">Codeless is an experienced and passionate group of designers, developers, project managers</p>
<p style="text-align: center;">writers and artists, of passages of Lorem Ipsum available.</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'72px'}_-_json"][cl_column_inner width="1/3"][cl_service media="type_icon" title="FIrst Theme with LivePhotos" icon="cl-icon-phone2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" title="Inline Text Edit" icon="cl-icon-layers2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" title="High Parallax Performance" icon="cl-icon-presentation" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][/cl_row_inner][cl_row_inner css_style="{'margin-top':'38px'}_-_json"][cl_column_inner width="1/3"][cl_service media="type_icon" title="Responsive in any device" icon="cl-icon-laptop2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" title="Options &amp; Builder in One Place" icon="cl-icon-gears2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" title="Build Website with collaboration" icon="cl-icon-edit2" css_style="{'margin-top':'30px'}_-_json" icon_font_size="32" icon_color="#6b6b6b" wrapper_size="47" wrapper_distance="15" title_content_distance="2"]

On the other hand, we denounce with righteous indignation and dislike men who are so beguiled dislike men.

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 11
$data = array();
$data['name'] = __( 'Services Block 11', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-11.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'200px','padding-bottom':'35px'}_-_json" background_image="{'id':'11','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fmodern%2Fwp-content%2Fuploads%2F2018%2F03%2Falvaro-reyes-500044-unsplash-compressed.jpg'}_-_json" overlay="color" overlay_color="#000000" overlay_opacity="0.5"][cl_column text_color="light-text"][cl_custom_heading typography="custom_font" text_font_size="52" text_line_height="60" text_letterspace="-1.5" text_transform="none" text_color="#ffffff"]

Introducing the

new Folie 2.0 version &amp;

Visual Composer

[/cl_custom_heading][cl_text custom_typography="1" text_font_size="17" text_color="#ffffff" css_style="{'margin-top':'20px'}_-_json"]

The new version of Folie 2.0 includes a better Codeless Builder, fully integrated

with WPBakery Visual Composer. Select the back-end or front-end editing experience.

Also, new modern business demo added &amp; lot of performance increases and theme fixes.

[/cl_text][cl_button btn_title="

GET YOUR LICENSE TODAY

" overwrite_style="1" button_style="material_circular" button_layout="extra-large" button_bg_color="#4450ef" button_bg_color_hover="rgba(68,80,239,0.66)" button_border_color="#4450ef" css_style="{'margin-top':'40px'}_-_json"][cl_row_inner css_style="{'margin-top':'100px'}_-_json"][cl_column_inner width="1/4"][cl_service media="type_icon" layout_type="media_top" title="Photography &amp; Portfolio" box_border_color="rgba(0,0,0,0)" icon_color="#ffffff" wrapper_size="30" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_color="#ffffff"]

Use Folie to create an awesome website.

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_icon" layout_type="media_top" title="Most intuitive Builder" icon="cl-icon-lightbulb" box_border_color="rgba(0,0,0,0)" icon_color="#ffffff" wrapper_size="30" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_color="#ffffff"]

A better User Experience web Builder

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_icon" layout_type="media_top" title="Responsive in any-device" icon="cl-icon-mobile2" box_border_color="rgba(0,0,0,0)" icon_color="#ffffff" wrapper_size="30" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_color="#ffffff"]

Build awesome fully responsive websites

[/cl_service][/cl_column_inner][cl_column_inner width="1/4"][cl_service media="type_icon" layout_type="media_top" title="Effective for Business" icon="cl-icon-profile-male" box_border_color="rgba(0,0,0,0)" icon_color="#ffffff" wrapper_size="30" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_color="#ffffff"]

Use for Business / Corporate / Personal

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 12
$data = array();
$data['name'] = __( 'Services Block 12', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-12.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'35px'}_-_json"][cl_column width="1/2" css_style="{'padding-top':'70px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<b>Pricing</b> Plan &amp; Options

[/cl_custom_heading][cl_divider width="80" color="#bdc9f9" color_icon="#222222" css_style="{'margin-top':'15px'}_-_json" width_full="0" align="left_divider"][cl_text css_style="{'margin-top':'10px'}_-_json"]
<p style="margin-top: 0px; margin-bottom: 0px;">At vero eos et accusamus et iusto odio dignissimos ducimus qui <span style="letter-spacing: 0px;">blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</span></p>
<p style="margin-top: 0px; margin-bottom: 0px;"><span style="letter-spacing: 0px;">Making something beautiful is the essence of what most designers want to do.</span><span style="letter-spacing: 0px;">Here are some of our lovely clients. Do you want to be the next one?</span></p>
[/cl_text][cl_tabs][cl_tab title="The simple" tab_id="tabid_1"][cl_text]

Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology.

<mark class="highlight"><b>Price:</b></mark> <i>$19 / monthly</i>

[/cl_text][/cl_tab][cl_tab title="The premium" tab_id="tabid_2"][cl_text]

Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered.

<mark class="highlight"><b>Price:</b></mark><i> $29 / monthly</i>

[/cl_text][/cl_tab][cl_tab title="Ultra COrporate" tab_id="tabid_3"][cl_text]

Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through.

<mark class="highlight"><b>Price:</b></mark> <i>$49 / monthly</i>

[/cl_text][/cl_tab][/cl_tabs][/cl_column][cl_column width="1/2"][cl_media position="center" image="{'id':'127','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fmodern%2Fwp-content%2Fuploads%2F2018%2F03%2Fv.jpg'}_-_json" shadow="0"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 13
$data = array();
$data['name'] = __( 'Services Block 13', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-13.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#f3f4fb" background_image="{'id':'65','mime':'image%2Fjpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fmodern%2Fwp-content%2Fuploads%2F2018%2F03%2Fchristopher-gower-291246-unsplash-compressed.jpg'}_-_json" background_position="right bottom" background_size="auto"][cl_column width="2/3" background_position="center center" background_color="#f3f4fb" css_style="{'padding-top':'100px','padding-bottom':'100px','padding-left':'','padding-right':'20%'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

Web design that sells your <b>products.</b>

[/cl_custom_heading][cl_divider width="80" color="#bdc9f9" color_icon="#222222" css_style="{'margin-top':'15px'}_-_json" width_full="0"][cl_text css_style="{'margin-top':'10px'}_-_json"]

At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.The beauty of this theme is that is built with Modules. Every time you can active or dis-active any module that you would.

[/cl_text][cl_row_inner][cl_column_inner width="1/2"][cl_service media="type_icon" layout_type="media_top" title="Live Chat Communication" icon="cl-icon-envelope2" box_border_color="rgba(0,0,0,0)" icon_font_size="40" wrapper_size="42" wrapper_distance="10" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_font_size="16" desc_color="#777777"]

<i>Use Folie to create an awesome website.</i>

[/cl_service][/cl_column_inner][cl_column_inner width="1/2"][cl_service media="type_icon" layout_type="media_top" title="Increase company earnings" icon="cl-icon-piechart" box_border_color="rgba(0,0,0,0)" icon_font_size="40" wrapper_size="42" wrapper_distance="10" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_font_size="16" desc_color="#777777"]

<i>Use Folie to create an awesome website.</i>

[/cl_service][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/3" css_style="{'padding-top':'100px','padding-bottom':'100px','padding-left':'20%','padding-right':'20%'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Block 14
$data = array();
$data['name'] = __( 'Services Block 14', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-14.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'40px'}_-_json"][cl_column css_style="{'padding-bottom':'40px','border-bottom-width':'1px'}_-_json" border_color="rgba(220,224,239,0.81)"][cl_custom_heading typography="custom_font" text_font_size="26" text_font_weight="300" text_line_height="38" text_transform="none" text_color="#303133"]

<p style="text-align: left;">We believe in building Large brands,&nbsp;<span style="letter-spacing: 0px; display: inline !important;">good clean design, well-crafted UX&nbsp;</span></p>
<p style="text-align: left;">and elegant solutions for our lovely customers!</p>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px'}_-_json"][cl_column width="1/3" animation="bottom-t-top" animation_delay="100"][cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="100" box_border_color="rgba(0,0,0,0)"]<p>A technology that renders via GPU, power saver, dependency manager, faster load. Load only needed script</p>
[/cl_service][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="200"][cl_service media="type_icon" title="Well-Crafted Shop" icon="cl-icon-basket" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="200" box_border_color="rgba(0,0,0,0)"]<p>We have design a full shop experience not only a simple design. You will love the way that Folie build the Online</p>
[/cl_service][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="300"][cl_service media="type_icon" title="DRAGGABLE DIMENSIONS" icon="cl-icon-focus" css_style="{'margin-top':'55px'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation_delay="500" box_border_color="rgba(0,0,0,0)"]<p>Click and drag to resize height, padding or empty spaces between elements.</p>
[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Services Block 15
$data = array();
$data['name'] = __( 'Service Block 15', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-15.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json" columns_gap="0" custom_width="1090" background_color="#fafafa"][cl_column css_style="{'padding-top':'80px','padding-bottom':'80px','margin-top':'-120px','padding-left':'40px','padding-right':'40px','margin-bottom':'80px'}_-_json" horizontal_align="right" background_color="#1fb4cc" text_color="light-text" width="1/2" animation="bottom-t-top" animation_speed="300" animation_delay="200"][cl_custom_heading typography="custom_font" text_font_family="Lora" text_font_weight="400" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_font_size="15" text_line_height="26" text_color="#ffffff"]

<i>Who we have created for</i>

[/cl_custom_heading][cl_custom_heading css_style="{'margin-top':'10px'}_-_json" typography="custom_font" text_font_size="28" text_font_weight="800" text_letterspace="1.5" text_color="#ffffff"]

Forward Brands

[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'16px'}_-_json"]
<p style="margin-top: 5px; margin-bottom: 5px;">Aliquet scelerisque in dui velit suspendisse nulla, ac risus per eleifend,donec scelerisque mauris in id posuere elementum.</p>
[/cl_text][/cl_column][cl_column width="1/2" css_style="{'margin-top':'-120px','padding-top':'80px','padding-bottom':'80px','padding-left':'40px','padding-right':'40px','margin-bottom':'60px'}_-_json" background_color="#191919" background_image="{}_-_json" text_color="light-text" animation="bottom-t-top" animation_delay="300" animation_speed="300"][cl_custom_heading typography="custom_font" text_font_family="Lora" text_font_weight="400" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_font_size="15" text_line_height="26" text_color="#ffffff"]

<i>Our Methodologies</i>

[/cl_custom_heading][cl_custom_heading css_style="{'margin-top':'10px'}_-_json" typography="custom_font" text_font_size="28" text_font_weight="800" text_letterspace="1.5" text_color="#ffffff"]

Creativity Design

[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'16px'}_-_json"]
<p style="margin-top: 5px; margin-bottom: 5px;">Aliquet scelerisque in dui velit suspendisse nulla, ac risus per eleifend, donec scelerisque mauris in id posuere elementum.</p>
[/cl_text][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'70px'}_-_json" background_color="#fafafa"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-left':'15px','padding-right':'15px'}_-_json"][cl_service media="type_icon" layout_type="media_top" icon="cl-icon-trophy2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="54" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="66" wrapper_distance="10" title_content_distance="5" layout_align="align_center"]On the other hand, we denounce with righteous indignation and dislike men

who are so beguiled

[/cl_service][/cl_column][cl_column width="1/3" css_style="{'padding-left':'15px','padding-right':'15px','padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" icon="cl-icon-target2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="54" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="66" wrapper_distance="10" title_content_distance="5" layout_align="align_center"]On the other hand, we denounce with righteous indignation and dislike men

who are so beguiled

[/cl_service][/cl_column][cl_column width="1/3" css_style="{'padding-left':'15px','padding-right':'15px','padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" icon="cl-icon-upload2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="54" wrapper_border_color="rgba(0,0,0,0)" wrapper_size="66" wrapper_distance="10" title_content_distance="5" layout_align="align_center"]On the other hand, we denounce with righteous indignation and dislike men

who are so beguiled

[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Services Block 16
$data = array();
$data['name'] = __( 'Services Text Block', 'folie' );
$data['cat_display_name'] = $cat_display_names['services']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'services block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-block-16.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'50px'}_-_json"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-right':'0px','padding-left':'0px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Slabo 27px" text_font_weight="300" text_line_height="36" text_transform="none" css_style="{'margin-top':'35px'}_-_json"]<p>Since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'70px','padding-bottom':'70px','border-top-width':'1px'}_-_json" border_color="#ebebeb"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>Our Philosophy</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [/cl_text][/cl_column][cl_column width="1/3"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>Development Strategy</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [/cl_text][/cl_column][cl_column width="1/3"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>Our Business Logic</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );




// About Block 2
$data = array();
$data['name'] = __( 'About Block 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px','border-top-width':'0px'}_-_json" border_color="#eeeeee" col_responsive="full"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" width="1/2"][cl_gallery items_per_row="2" css_style="{'margin-top':'35px'}_-_json" images="__array__1774,1095,1806,79__array__end__" distance="4" carousel_view_items="4"][/cl_column][cl_column width="1/2"][cl_toggles css_style="{'margin-top':'15px'}_-_json" accordion="1"][cl_toggle is_active="1" title="Inline Edit With Only 1-click"][cl_text css_style="{'margin-top':'35px'}_-_json"]

Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.

[/cl_text][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item icon="cl-icon-check2"]<a href="#">Sample List Item with Custom Link &nbsp;</a>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p>

<mark class="highlight">Another One list item with Custom Icon

</mark></p>[/cl_list_item][cl_list_item icon="cl-icon-check2"]<p>

<mark class="highlight">Sample. Click to modify

</mark></p>[/cl_list_item][/cl_list][/cl_toggle][cl_toggle title="Work in Group"][cl_text css_style="{'margin-top':'35px'}_-_json"]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="Success &amp; Happy Customers"][cl_text css_style="{'margin-top':'10px'}_-_json"]

<b>Useful subtitle</b>

[/cl_text][cl_text css_style="{'margin-top':'0px'}_-_json"]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][/cl_toggles][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// About Block 3
$data = array();
$data['name'] = __( 'About Block 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'50px','padding-bottom':'30px'}_-_json" text_color="light-text" background_color="#1b1e1f"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="18" text_font_weight="100" text_letterspace="4" text_color="#bfbfbf" animation_delay="200" css_style="{'margin-top':'0px'}_-_json" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_768_bool="1" custom_responsive_768_size="17px" custom_responsive_768_line_height="24px"]
<p style="text-align: center;"><mark class="highlight">WORK WITH US</mark></p>
[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="34" text_transform="none" text_color="#ffffff" css_style="{'margin-top':'5px'}_-_json" text_line_height="42"]
<div style="text-align: center;">

Current Job Openings

</div>
[/cl_custom_heading][/cl_column][/cl_row][cl_row css_style="{'padding-top':'4px','padding-bottom':'100px'}_-_json" text_color="light-text" background_color="#1b1f1e" col_responsive="full"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px','border-top-width':'0px','border-left-width':'0px','border-bottom-width':'3px','border-right-width':'0px','padding-left':'20px','padding-right':'20px'}_-_json" border_color="#1fb4cc"][cl_custom_heading tag="h5" typography="h4" css_style="{'margin-top':'10px'}_-_json"]

Web Designer

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="14" text_font_weight="500" text_line_height="20" text_letterspace="1" text_color="#1fb4cc" css_style="{'margin-top':'0px'}_-_json"]

Full Time

[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json" custom_typography="1" text_line_height="22" text_color="#dbdbdb"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.

[/cl_text][/cl_column][cl_column width="1/3" css_style="{'padding-left':'20px','padding-right':'20px','border-top-width':'0px','border-bottom-width':'3px','padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading tag="h5" typography="h4" css_style="{'margin-top':'10px'}_-_json"]

UX / UI Designer

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="14" text_font_weight="500" text_line_height="20" text_letterspace="1" text_color="#1fb4cc" css_style="{'margin-top':'0px'}_-_json"]

Part-time

[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json" custom_typography="1" text_line_height="22" text_color="#dbdbdb"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.

[/cl_text][/cl_column][cl_column width="1/3" css_style="{'padding-left':'20px','padding-right':'20px','padding-top':'20px','border-bottom-width':'3px','padding-bottom':'20px'}_-_json"][cl_custom_heading tag="h5" typography="h4" css_style="{'margin-top':'10px'}_-_json"]

System Administrator

[/cl_custom_heading][cl_custom_heading typography="custom_font" text_font_size="14" text_font_weight="500" text_line_height="20" text_letterspace="1" text_color="#1fb4cc" css_style="{'margin-top':'0px'}_-_json"]

Full Time

[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json" custom_typography="1" text_line_height="22" text_color="#dbdbdb"]

I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.

[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// About Block 4
$data = array();
$data['name'] = __( 'About Block 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" columns_gap="35" col_responsive="full"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/2"][cl_media image="{'uploading':'false','date':'1493645148000','filename':'alessio-lin-225949.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fphotography%2Fwp-content%2Fuploads%2F2017%2F05%2Falessio-lin-225949.jpg','title':'alessio-lin-225949','caption':'','alt':'','description':'','id':'275','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fphotography%2F%3Fattachment_id%3D275','author':'1','name':'alessio-lin-225949','status':'inherit','modified':'1493645148000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fphotography%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%201%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fphotography%2Fwp-admin%2Fpost.php%3Fpost%3D275%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'48299','filesizeHumanReadable':'47%20KB','height':'980','width':'800','orientation':'portrait','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json"][/cl_column][cl_column width="1/2" vertical_align="middle"][cl_custom_heading typography="custom_font" text_font_size="38" text_line_height="60" text_transform="none" text_color="#0a0a0a" css_style="{'margin-top':'35px'}_-_json"]

about me.

[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu risus quis tortor laoreet condimentum sit amet rutrum sapien. Donec non dui ut ante fermentum finibus in sit amet libero. Vestibulum porttitor elit nec libero scelerisque faucibus. Aenean dictum ex in rhoncus sodales. Nunc at pulvinar arcu. Praesent placerat lacus gravida eros aliquam volutpat. Nullam sollicitudin euismod nunc at tristique.

Donec rhoncus ex fermentum tellus imperdiet, non eleifend risus vestibulum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed consectetur ipsum consectetur sapien dictum egestas quis in magna. Nulla sodales lacus eu facilisis eleifend. Nunc sodales, metus vel gravida facilisis, ex nulla ultricies nisi, in ullamcorper ante magna imperdiet justo. Nam ornare, mi eu lacinia mattis, turpis magna congue diam, eget accumsan lorem ante quis mauris. Nam nec vulputate justo. In hac habitasse platea dictumst. Etiam ut nibh pharetra, viverra neque eget, porta nulla. Phasellus id nisi vel arcu vulputate vulputate vel ac elit. Quisque at dui eu dolor elementum vestibulum ut ut enim.

Praesent non enim maximus, blandit risus nec, lacinia risus. Etiam fringilla accumsan nunc eu posuere. Sed id mattis erat. Ut cursus rhoncus lectus, eget luctus ipsum imperdiet in. Quisque id pellentesque nulla. Pellentesque id urna magna. Proin pellentesque sapien in odio iaculis efficitur.

[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// About Block 5
$data = array();
$data['name'] = __( 'About Block 5', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-5.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'35px'}_-_json"][cl_column width="2/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="34" text_font_weight="300" text_line_height="50" text_transform="none" text_color="#0f0f0f" css_style="{'margin-top':'35px'}_-_json"]

Folie started off as a hobby to make leather goods for personal use which then trickled out to leather goods for family and friends.

[/cl_custom_heading][cl_button btn_title="

Learn More About US

" css_style="{'margin-top':'6px'}_-_json"][/cl_column][cl_column width="1/3" col_disabled="1"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 6
$data = array();
$data['name'] = __( 'About Block 6', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-6.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'100px','padding-bottom':'100px'}_-_json"][cl_column width="1/2" css_style="{'margin-top':'13px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" typography="custom_font" text_font_size="40" text_font_weight="100" text_transform="none" text_font_family="Poppins" text_line_height="45"]<p>Innovative solutions to boost your project&nbsp;</p>
[/cl_custom_heading][cl_text margin_paragraphs="9" custom_typography="1" text_font_size="16" text_line_height="26" css_style="{'margin-top':'17px'}_-_json"]<p style="margin-top: 9px; margin-bottom: 9px;">Even core Calypso project team members had to get over our intimidation. None of us were strong JavaScript developers. But as each day passed our experience built, we made mistakes, we reviewed them, we fixed them, and we learned. Once we had the project moving, we set better examples.</p>
[/cl_text][cl_button btn_title="<p>Learn more</p>
" button_bg_color="#0cabd3" button_bg_color_hover="#0cabd3" button_border_color="" css_style="{'margin-top':'25px'}_-_json"][/cl_column][cl_column width="1/2" css_style="{'padding-top':'10px','padding-bottom':'20px'}_-_json" vertical_align="middle" horizontal_align="right"][cl_media position="right" image="{'id':'2788','title':'mockup2','filename':'mockup2.png','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-content%2Fuploads%2F2017%2F03%2Fmockup2.png','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2F%3Fattachment_id%3D2788','alt':'','author':'1','description':'','caption':'','name':'mockup2','status':'inherit','uploadedTo':'0','date':'Sat%20Mar%2025%202017%2011%3A01%3A18%20GMT%2B0100%20(Central%20Europe%20Standard%20Time)','modified':'Sat%20Mar%2025%202017%2011%3A01%3A18%20GMT%2B0100%20(Central%20Europe%20Standard%20Time)','menuOrder':'0','mime':'image%2Fpng','type':'image','subtype':'png','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'March%2025%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-admin%2Fpost.php%3Fpost%3D2788%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'133569','filesizeHumanReadable':'130%20KB','height':'449','width':'763','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" height="420" css_style="{'margin-top':'35px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 7
$data = array();
$data['name'] = __( 'About Block 7', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-7.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px','padding-right':'0px'}_-_json" background_image="{'uploading':'false','date':'1498125117000','filename':'bench-accounting-49907-compressed.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-content%2Fuploads%2F2017%2F06%2Fbench-accounting-49907-compressed.jpg','title':'bench-accounting-49907-compressed','caption':'','alt':'','description':'','id':'4370','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2F%3Fattachment_id%3D4370','author':'1','name':'bench-accounting-49907-compressed','status':'inherit','modified':'1498125117000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-admin%2Fpost.php%3Fpost%3D4370%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'244844','filesizeHumanReadable':'239%20KB','height':'2333','width':'3500','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay="color" overlay_color="#1e1e1e" overlay_opacity="0.4"][/cl_column][cl_column width="1/2" css_style="{'padding-left':'15%','padding-right':'15%','padding-top':'16%','padding-bottom':'16%'}_-_json" background_color="#f7f7f7"][cl_custom_heading tag="h1" typography="custom_font" text_font_family="Poppins" text_font_size="36" text_font_weight="100" text_line_height="47" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_color="#1c1c1c"]<p>Build visually live your website now with no effort&nbsp;</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'margin-top':'13px'}_-_json"]<p>WordPress Website building can be easier with Folie WordPress Theme. New kind of page builder, you will change everything in seconds and you will see it live.&nbsp;</p><p>The Codeless Page builder it is faster like no other builder on the market. You will&nbsp;<b>change everything on the fly</b>&nbsp;. It is intuitive and simple.</p>
[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 8
$data = array();
$data['name'] = __( 'About Block 8', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-8.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row custom_width_bool="1" custom_width="790" css_style="{'padding-top':'70px','padding-bottom':'0px'}_-_json" row_id="about"][cl_column css_style="{'padding-top':'20px','padding-bottom':'40px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]

About The Conference Event

[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]

It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.

[/cl_text][/cl_column][/cl_row][cl_row row_type="container-fluid" columns_gap="0" equal_height="1" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_image="{'uploading':'false','date':'1498509744000','filename':'background.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-content%2Fuploads%2F2017%2F06%2Fbackground.jpg','title':'background','caption':'','alt':'','description':'','id':'66','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2F%3Fattachment_id%3D66','author':'1','name':'background','status':'inherit','modified':'1498509744000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2026%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-admin%2Fpost.php%3Fpost%3D66%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'171959','filesizeHumanReadable':'168%20KB','height':'900','width':'1200','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" parallax="1" background_position="center bottom"][cl_column width="1/4" css_style="{'padding-top':'70px','padding-bottom':'70px','padding-left':'50px','padding-right':'50px'}_-_json" text_color="light-text" background_color="#0061ff"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]

Contact Info

[/cl_custom_heading][cl_text margin_paragraphs="5" css_style="{'margin-top':'11px'}_-_json"]
<p style="margin-top: 5px; margin-bottom: 5px;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
[/cl_text][cl_text margin_paragraphs="0" css_style="{'margin-top':'20px'}_-_json"]

+ (110) 114 558

info@conference.com

[/cl_text][/cl_column][cl_column width="1/4" background_image="{}_-_json"][/cl_column][cl_column width="1/4" background_color="#303133" text_color="light-text" css_style="{'padding-top':'70px','padding-left':'50px','padding-right':'50px','padding-bottom':'70px'}_-_json" vertical_align="middle"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]

22 - 27 May 2017

[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'20px'}_-_json"]
<p style="margin-top: 0px; margin-bottom: 0px;">445 Palace</p>
<p style="margin-top: 0px; margin-bottom: 0px;">6th Avenue, New York City</p>
<p style="margin-top: 0px; margin-bottom: 0px;">NH11445 NY</p>
[/cl_text][/cl_column][cl_column width="1/4"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 9
$data = array();
$data['name'] = __( 'About Block 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-9.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-bottom':'0px'}_-_json"][cl_column][cl_custom_heading typography="h1"]

<b>Carlos Dinka</b> my simple short story[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]

<span style="letter-spacing: 0px;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</span>

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.

[/cl_text][/cl_column][/cl_row][cl_row css_style="{'padding-top':'15px','padding-bottom':'80px'}_-_json"][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Branding" icon="cl-icon-noun_150444" box_border_color="rgba(0,0,0,0)" icon_font_size="72" wrapper_size="56" title_typography="h2"]

&nbsp;

[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Photography" icon="cl-icon-camera3" box_border_color="rgba(0,0,0,0)" icon_font_size="72" wrapper_size="56" title_typography="h2"]

&nbsp;

[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" title="Web Design &amp; Illustration" icon="cl-icon-sun" box_border_color="rgba(0,0,0,0)" icon_font_size="72" wrapper_size="55" title_typography="h2"]

&nbsp;

[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 10
$data = array();
$data['name'] = __( 'About Block 10', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-10.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row background_image="{'id':'81','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Ffolie%2Fphotography-masonry%2Fwp-content%2Fuploads%2F2018%2F09%2F12-min.jpg'}_-_json" overlay="color" overlay_color="rgba(10,10,10,0.63)" text_color="light-text" css_style="{'padding-top':'100px','padding-bottom':'100px'}_-_json" background_position="center top"][cl_column horizontal_align="middle"][cl_custom_heading typography="h1"]

I'm Jessy Carol

[/cl_custom_heading][cl_custom_heading]Photography is a way of feeling, of touching, of loving. What you have caught on film is captured forever. It remembers little things, long after you have forgotten everything.[/cl_custom_heading][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 11
$data = array();
$data['name'] = __( 'About Block 11', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-11.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" fullheight="1" content_pos="stretch" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_column width="1/2" css_style="{'padding-left':'0','padding-right':'0'}_-_json" background_image="{'id':'267','mime':'image%2Fjpeg','url':'https%3A%2F%2Fcodeless.co%2Ffolie%2Fportfolio-metro%2Fwp-content%2Fuploads%2F2018%2F09%2Fethan-haddox-484912-unsplash.jpg'}_-_json" background_position="center center"][/cl_column][cl_column width="1/2" vertical_align="middle" css_style="{'padding-left':'60px','padding-right':'40px'}_-_json"][cl_custom_heading typography="h1"]

Hey, I'm Johnny

[/cl_custom_heading][cl_text]

There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.

All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.

[/cl_text][cl_button btn_title="

Contact Me

"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 12
$data = array();
$data['name'] = __( 'About Block 12', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-12.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'55px','padding-bottom':'70px'}_-_json" equal_height="1" col_responsive="full"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" animation="left-t-right"][cl_media css_style="{'margin-top':'15px'}_-_json" image="{'uploading':'false','date':'1493113813000','filename':'peter-sjo-190966.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fportfolio-agency%2Fwp-content%2Fuploads%2F2017%2F04%2Fpeter-sjo-190966.jpg','title':'peter-sjo-190966','caption':'','alt':'','description':'','id':'213','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fportfolio-agency%2F%3Fattachment_id%3D213','author':'1','name':'peter-sjo-190966','status':'inherit','modified':'1493113813000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fportfolio-agency%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'April%2025%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fportfolio-agency%2Fwp-admin%2Fpost.php%3Fpost%3D213%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'209363','filesizeHumanReadable':'204%20KB','height':'1555','width':'1000','orientation':'portrait','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" animation="left-t-right"][/cl_column][cl_column width="1/2" vertical_align="middle" css_style="{'padding-left':'40px','padding-right':'42px','padding-top':'0px'}_-_json" animation="right-t-left"][cl_text custom_typography="1" text_font_size="32" text_font_weight="300" text_line_height="48" animation_delay="300" css_style="{'margin-top':'35px'}_-_json"]

Codeless is an experienced and passionate group of designers, developers, project managers, writers and artists.

[/cl_text][cl_custom_heading animation_delay="400" css_style="{'margin-top':'40px'}_-_json"]

What We do

[/cl_custom_heading][cl_text animation_delay="500" css_style="{'margin-top':'10px'}_-_json"]

There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.

[/cl_text][cl_row_inner css_style="{'margin-top':'35px'}_-_json"][cl_column_inner width="1/2"][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item custom_icon="0"]

<mark class="highlight">Web Design &amp; Branding</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">Logo &amp; Identity</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">Illustrations</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">WordPress Websites</mark>

[/cl_list_item][/cl_list][/cl_column_inner][cl_column_inner width="1/2"][cl_list css_style="{'margin-top':'15px'}_-_json"][cl_list_item custom_icon="0"]

<mark class="highlight">UI Design</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">Social Media Strategies</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">iOS Design</mark>

[/cl_list_item][cl_list_item custom_icon="0"]

<mark class="highlight">Web Design</mark>

[/cl_list_item][/cl_list][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// About Block 13
$data = array();
$data['name'] = __( 'Media 2 Image Block', 'folie' );
$data['cat_display_name'] = $cat_display_names['about']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'about block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/about-block-13.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row custom_width_bool="1" css_style="{'padding-top':'70px','padding-bottom':'70px','border-top-width':'1px'}_-_json" background_color="#fcfcfc" border_color="#ebebeb"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" animation_delay="300" animation_speed="300" css_style="{'margin-top':'8px'}_-_json" tag="h1" text_color="#262626" text_transform="none" text_font_size="28" text_line_height="47"]<p>We are really competing against ourselves</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'margin-top':'10px','padding-left':'70px','padding-right':'70px'}_-_json" text_color="#898989"]<p>This project it was a huge achievement for our team, working everyday with the same passion of the first day. Today Folie WordPress Theme it is ready with all the difficulties during the road, we have finished it. Send to us all your feedback to make this project better everyday</p><p><br></p>
[/cl_text][cl_row_inner css_style="{'margin-top':'61px'}_-_json"][cl_column_inner width="1/2"][cl_media image="{'id':'146','title':'cristina-munteanu-39306','filename':'cristina-munteanu-39306.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-content%2Fuploads%2F2017%2F04%2Fcristina-munteanu-39306.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2F%3Fattachment_id%3D146','alt':'','author':'1','description':'','caption':'','name':'cristina-munteanu-39306','status':'inherit','uploadedTo':'0','date':'Thu%20Apr%2027%202017%2017%3A29%3A30%20GMT%2B0200%20(CEST)','modified':'Thu%20Apr%2027%202017%2017%3A29%3A30%20GMT%2B0200%20(CEST)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'April%2027%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-admin%2Fpost.php%3Fpost%3D146%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'107418','filesizeHumanReadable':'105%20KB','height':'795','width':'1200','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json" lightbox="1" animation="left-t-right" animation_delay="200" animation_speed="300" image_size="small-business"][/cl_column_inner][cl_column_inner width="1/2"][cl_media image="{'uploading':'false','date':'1498338592000','filename':'felix-russell-saw-208019.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-content%2Fuploads%2F2017%2F06%2Ffelix-russell-saw-208019.jpg','title':'felix-russell-saw-208019','caption':'','alt':'','description':'','id':'295','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2F%3Fattachment_id%3D295','author':'1','name':'felix-russell-saw-208019-2','status':'inherit','modified':'1498338592000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2024%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fsmall-business%2Fwp-admin%2Fpost.php%3Fpost%3D295%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'75158','filesizeHumanReadable':'73%20KB','height':'933','width':'1400','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json" lightbox="1" animation="right-t-left" animation_delay="300" animation_speed="300" image_size="small-business"][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// FAQ 1
$data = array();
$data['name'] = __( 'FAQ 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['faq'];
$data['custom_class'] = 'faq';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/faq-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'border-top-width':'1px','padding-bottom':'0px'}_-_json" border_color="#e6e6ef" custom_width_bool="1" custom_width="1250" extra_class="overlap_map"][cl_column css_style="{'border-top-width':'0px','margin-top':'0px','padding-left':'70px','padding-right':'70px','padding-bottom':'50px'}_-_json" border_color="#e3e3ef" background_color="#ffffff" extra_class="overlap_map"][cl_custom_heading typography="custom_font" text_font_size="28" text_font_weight="300" text_line_height="38" text_letterspace="-1.5" text_transform="none" text_color="#454545"]

<p style="text-align: center;"><b>Frequently</b> asked questions</p>
[/cl_custom_heading][cl_divider width="80" color="#bdc9f9" color_icon="#222222" css_style="{'margin-top':'15px'}_-_json" width_full="0" align="center_divider"][cl_text css_style="{'margin-top':'10px'}_-_json" margin_paragraphs="0"]

	<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">At vero eos et accusamus et iusto odio dignissimos ducimus qui</p>
<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>

[/cl_text][cl_row_inner][cl_column_inner width="1/2"][cl_toggles accordion="1"][cl_toggle is_active="1" title="Why Choose Folie WordPress Theme?"][cl_text]

	<p>Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources.</p>

[/cl_text][/cl_toggle][cl_toggle title="How can i setup this theme?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="Can I purchase more than one license?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="When can I contact the support forum?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][/cl_toggles][/cl_column_inner][cl_column_inner width="1/2"][cl_toggles][cl_toggle is_active="1" title="Why Choose Folie WordPress Theme?"][cl_text]

	<p>Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources.</p>

[/cl_text][/cl_toggle][cl_toggle title="How can i setup this theme?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="Can I purchase more than one license?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="When can I contact the support forum?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][/cl_toggles][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// FAQ 2
$data = array();
$data['name'] = __( 'FAQ 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['faq'];
$data['custom_class'] = 'faq';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/faq-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row][cl_column width="2/3"][cl_toggles accordion="1"][cl_toggle is_active="1" title="WHERE TO PURCHASE THEME LICENSE?"][cl_text]<p>Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In posuere arcu sit amet nulla lobortis, quis fringilla erat semper. Donec pharetra nisi euismod viverra sodales. Fusce ac urna ipsum. Nullam hendrerit mauris ut mi aliquam, et hendrerit orci suscipit. Duis tempor lectus nunc, in accumsan sem convallis ut. Phasellus volutpat auctor mi, sed fringilla arcu viverra ut. Quisque tincidunt metus id egestas dapibus. Curabitur ultricies interdum diam eu ultricies. Fusce ultrices iaculis sapien id pharetra.</p>
[/cl_text][/cl_toggle][cl_toggle title="WHERE I CAN FIND THE PURCHASE CODE?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="I NEED MORE INFORMATIONS ABOUT INSTALLING THEME?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="HOW CAN I ACTIVATE THE THEME INTO WORDPRESS?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="HOW CAN I GET SUPPORT?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][cl_toggle title="HOW CAN I ACTIVATE MY WORDPRESS THEME?"][cl_text]Interactively underwhelm turnkey initiatives before high-payoff relationships. Holisticly restore superior interfaces before flexible technology. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services.[/cl_text][/cl_toggle][/cl_toggles][/cl_column][cl_column width="1/3"][cl_custom_heading typography="h4"]<p style="text-align: left;">More Help</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'15px'}_-_json"]<p>If &nbsp;you can't find your answer here contact us through support forum or call us directly to the phone number below</p>
<p><b>Tel:</b> +10020230023232</p>
<p><a href="#" class="customize-unpreviewable">Support Forum</a></p>
[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Gallery Block
$data = array();
$data['name'] = __( 'Gallery Block', 'folie' );
$data['cat_display_name'] = $cat_display_names['gallery'];
$data['custom_class'] = 'gallery';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/gallery-block-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_color="#16161c" text_color="light-text"][cl_column css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json"][cl_gallery distance="1" css_style="{'margin-top':'35px'}_-_json" images="__array__72,68,70,69__array__end__"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Events 1
$data = array();
$data['name'] = __( 'Events', 'folie' );
$data['cat_display_name'] = $cat_display_names['events']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'events block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/events-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_image="{'id':'70','title':'34213108661_3c8ff95b86_z','filename':'34213108661_3c8ff95b86_z.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-content%2Fuploads%2F2017%2F06%2F34213108661_3c8ff95b86_z.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2F%3Fattachment_id%3D70','alt':'','author':'1','description':'','caption':'','name':'34213108661_3c8ff95b86_z','status':'inherit','uploadedTo':'0','date':'Mon%20Jun%2026%202017%2022%3A52%3A45%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Mon%20Jun%2026%202017%2022%3A52%3A45%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2026%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-admin%2Fpost.php%3Fpost%3D70%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'82335','filesizeHumanReadable':'80%20KB','height':'427','width':'640','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" equal_height="1" row_id="schedule"][cl_column width="1/2" css_style="{'padding-top':'80px','padding-bottom':'80px','padding-left':'80px','padding-right':'80px'}_-_json" background_color="rgba(48,49,51,0.92)" text_color="light-text"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Day 1</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>20 May 2018</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
[/cl_text][cl_custom_heading typography="h4" css_style="{'margin-top':'35px'}_-_json"]<p>Schedule</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'15px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>11:00-12:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" text_font_size="21" css_style="{'margin-top':'10px'}_-_json"]<p>12:00-13:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>13:00-14:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>14:00-15:00</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Design Conference</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]Web Development[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Web Marketing</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Hosting platforms</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/2" background_color="#ffffff" css_style="{'padding-left':'80px','padding-right':'80px','padding-top':'80px','padding-bottom':'80px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Day 2</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>21 May 2018</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
[/cl_text][cl_custom_heading typography="h4" css_style="{'margin-top':'35px'}_-_json"]<p>Schedule</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'15px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>11:00-12:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" text_font_size="21" css_style="{'margin-top':'10px'}_-_json"]<p>12:00-13:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>13:00-14:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>14:00-15:00</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Design Conference</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]Web Development[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Web Marketing</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Hosting platforms</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row][cl_row row_type="container-fluid" columns_gap="0" css_style="{'padding-top':'0px','padding-bottom':'0px'}_-_json" background_image="{'id':'70','title':'34213108661_3c8ff95b86_z','filename':'34213108661_3c8ff95b86_z.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-content%2Fuploads%2F2017%2F06%2F34213108661_3c8ff95b86_z.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2F%3Fattachment_id%3D70','alt':'','author':'1','description':'','caption':'','name':'34213108661_3c8ff95b86_z','status':'inherit','uploadedTo':'0','date':'Mon%20Jun%2026%202017%2022%3A52%3A45%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Mon%20Jun%2026%202017%2022%3A52%3A45%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2026%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconference-event%2Fwp-admin%2Fpost.php%3Fpost%3D70%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'82335','filesizeHumanReadable':'80%20KB','height':'427','width':'640','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" equal_height="1"][cl_column width="1/2" css_style="{'padding-top':'80px','padding-bottom':'80px','padding-left':'80px','padding-right':'80px'}_-_json" background_color="#ffffff"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Day 3</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>22 May 2018</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
[/cl_text][cl_custom_heading typography="h4" css_style="{'margin-top':'35px'}_-_json"]<p>Schedule</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'15px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>11:00-12:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" text_font_size="21" css_style="{'margin-top':'10px'}_-_json"]<p>12:00-13:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>13:00-14:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>14:00-15:00</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Design Conference</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]Web Development[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Web Marketing</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Hosting platforms</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="1/2" background_color="rgba(0,174,214,0.89)" css_style="{'padding-left':'80px','padding-right':'80px','padding-top':'80px','padding-bottom':'80px'}_-_json" text_color="light-text"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Day 4</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>23 May 2018</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
[/cl_text][cl_custom_heading typography="h4" css_style="{'margin-top':'35px'}_-_json"]<p>Schedule</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'15px'}_-_json"][cl_column_inner width="1/3" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>11:00-12:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" text_font_size="21" css_style="{'margin-top':'10px'}_-_json"]<p>12:00-13:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>13:00-14:00</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>14:00-15:00</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Design Conference</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]Web Development[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Web Marketing</p>
[/cl_custom_heading][cl_custom_heading typography="h6" css_style="{'margin-top':'10px'}_-_json"]<p>Hosting platforms</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3"][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Services Medium 1
$data = array();
$data['name'] = __( 'Services Medium 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-medium-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'0px','padding-bottom':'45px'}_-_json" background_color="#ffffff"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" title="Idea" icon="cl-icon-lightbulb" css_style="{'margin-top':'35px'}_-_json" icon_color="#0a0a0a" layout_type="media_top" wrapper_size="36"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Project" icon="cl-icon-circle-compass" css_style="{'margin-top':'35px'}_-_json" icon_color="#0a0a0a" layout_type="media_top" wrapper_size="36"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" title="Construction" icon="cl-icon-tools-2" css_style="{'margin-top':'35px'}_-_json" icon_color="#0a0a0a" layout_type="media_top" wrapper_size="36"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Services Media 1
$data = array();
$data['name'] = __( 'Services Media 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-media-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/3" animation="bottom-t-top" animation_delay="100"][cl_media image="{'uploading':'false','date':'1498138769000','filename':'ok-compressed-600x600.png','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'png','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-content%2Fuploads%2F2017%2F06%2Fok-compressed-600x600.png','title':'ok-compressed-600x600','caption':'','alt':'','description':'','id':'148','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2F%3Fattachment_id%3D148','author':'1','name':'ok-compressed-600x600','status':'inherit','modified':'1498138769000','mime':'image%2Fpng','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-admin%2Fpost.php%3Fpost%3D148%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'233856','filesizeHumanReadable':'228%20KB','height':'395','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>We create careers and open new posibbilities for our clients</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'15px'}_-_json"]<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.&nbsp;</p><p>Galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
[/cl_text][cl_button overwrite_style="1" button_font="extra-small" button_bg_color="#303133" button_bg_color_hover="#238dff" button_border_color="" css_style="{'margin-top':'20px'}_-_json"][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="300"][cl_media image="{'uploading':'false','date':'1498138775000','filename':'shutterstock_107648306-600x600.png','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'png','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-content%2Fuploads%2F2017%2F06%2Fshutterstock_107648306-600x600.png','title':'shutterstock_107648306-600x600','caption':'','alt':'','description':'','id':'149','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2F%3Fattachment_id%3D149','author':'1','name':'shutterstock_107648306-600x600','status':'inherit','modified':'1498138775000','mime':'image%2Fpng','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-admin%2Fpost.php%3Fpost%3D149%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'247918','filesizeHumanReadable':'242%20KB','height':'395','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>We create careers and open new posibbilities for our clients</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'15px'}_-_json"]<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.&nbsp;</p><p>Galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
[/cl_text][cl_button overwrite_style="1" button_font="extra-small" button_bg_color="#303133" button_bg_color_hover="#238dff" button_border_color="" css_style="{'margin-top':'20px'}_-_json"][/cl_column][cl_column width="1/3" animation="bottom-t-top" animation_delay="500"][cl_media image="{'id':'79','title':'3','filename':'3.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-content%2Fuploads%2F2017%2F06%2F3.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2F%3Fattachment_id%3D79','alt':'','author':'1','description':'','caption':'','name':'3','status':'inherit','uploadedTo':'0','date':'Wed%20Jun%2021%202017%2012%3A58%3A51%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Wed%20Jun%2021%202017%2012%3A58%3A51%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2021%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fconsulting%2Fwp-admin%2Fpost.php%3Fpost%3D79%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'52854','filesizeHumanReadable':'52%20KB','height':'395','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>We create careers and open new posibbilities for our clients</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'15px'}_-_json"]<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.&nbsp;</p><p>Galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
[/cl_text][cl_button overwrite_style="1" button_font="extra-small" button_bg_color="#303133" button_bg_color_hover="#238dff" button_border_color="" css_style="{'margin-top':'20px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services Media 2
$data = array();
$data['name'] = __( 'Services Media 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-media-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'90px','padding-bottom':'110px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'0px','padding-bottom':'20px','border-left-width':'1px','border-top-width':'1px','border-right-width':'1px','border-bottom-width':'1px','margin-bottom':'20px'}_-_json" border_color="#ebebeb" border_rounded="1"][cl_media image="{'uploading':'false','date':'1498818784000','filename':'clem-onojeghuo-99399.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-content%2Fuploads%2F2017%2F06%2Fclem-onojeghuo-99399.jpg','title':'clem-onojeghuo-99399','caption':'','alt':'','description':'','id':'177','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2F%3Fattachment_id%3D177','author':'1','name':'clem-onojeghuo-99399','status':'inherit','modified':'1498818784000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2030%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-admin%2Fpost.php%3Fpost%3D177%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'41079','filesizeHumanReadable':'40%20KB','height':'387','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h4" css_style="{'margin-top':'30px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>Custom Service with Image</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'5px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. </p>
[/cl_text][cl_button overwrite_style="1" button_style="text_effect" button_bg_color="rgba(12,171,211,0)" button_bg_color_hover="rgba(255,255,255,0)" button_font_color="#8292ed" button_font_color_hover="#205fd6" button_border_color="" css_style="{'margin-top':'10px','padding-left':'30px'}_-_json"][/cl_column][cl_column width="1/3" css_style="{'padding-top':'0px','padding-bottom':'20px','border-left-width':'1px','border-bottom-width':'1px','border-right-width':'1px','border-top-width':'1px','margin-bottom':'20px'}_-_json" border_color="#ebebeb" border_rounded="1"][cl_media image="{'uploading':'false','date':'1498818812000','filename':'clem-onojeghuo-131009.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-content%2Fuploads%2F2017%2F06%2Fclem-onojeghuo-131009.jpg','title':'clem-onojeghuo-131009','caption':'','alt':'','description':'','id':'179','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2F%3Fattachment_id%3D179','author':'1','name':'clem-onojeghuo-131009','status':'inherit','modified':'1498818812000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2030%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-admin%2Fpost.php%3Fpost%3D179%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'54032','filesizeHumanReadable':'53%20KB','height':'387','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h4" css_style="{'margin-top':'30px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>Custom Service with Image</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'5px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. </p>
[/cl_text][cl_button overwrite_style="1" button_style="text_effect" button_bg_color="rgba(12,171,211,0)" button_bg_color_hover="rgba(255,255,255,0)" button_font_color="#8292ed" button_font_color_hover="#205fd6" button_border_color="" css_style="{'margin-top':'10px','padding-left':'30px'}_-_json"][/cl_column][cl_column width="1/3" css_style="{'padding-top':'0','padding-bottom':'20px','border-right-width':'1px','border-left-width':'1px','border-top-width':'1px','border-bottom-width':'1px','margin-bottom':'20px'}_-_json" border_rounded="1" border_color="#ebebeb"][cl_media image="{'uploading':'false','date':'1498818843000','filename':'clem-onojeghuo-122041.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-content%2Fuploads%2F2017%2F06%2Fclem-onojeghuo-122041.jpg','title':'clem-onojeghuo-122041','caption':'','alt':'','description':'','id':'180','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2F%3Fattachment_id%3D180','author':'1','name':'clem-onojeghuo-122041','status':'inherit','modified':'1498818843000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'June%2030%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding-classic%2Fwp-admin%2Fpost.php%3Fpost%3D180%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'61863','filesizeHumanReadable':'60%20KB','height':'387','width':'600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" shadow="0" css_style="{'margin-top':'15px'}_-_json"][cl_custom_heading typography="h4" css_style="{'margin-top':'30px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>Custom Service with Image</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'5px','padding-left':'30px','padding-right':'20px'}_-_json"]<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. </p>
[/cl_text][cl_button overwrite_style="1" button_style="text_effect" button_bg_color="rgba(12,171,211,0)" button_bg_color_hover="rgba(255,255,255,0)" button_font_color="#8292ed" button_font_color_hover="#205fd6" button_border_color="" css_style="{'margin-top':'10px','padding-left':'30px'}_-_json"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



// Services Large 1
$data = array();
$data['name'] = __( 'Services Large 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-large-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column width="1/3" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_icon icon="cl-icon-mobile2" size="39" color="#222222" align="center" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" css_style="{'margin-top':'15px'}_-_json" text_font_family="Source Code Pro" text_font_size="16" text_color="#0a0a0a" text_line_height="38"]<p style="text-align: center;">App Development</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'1px'}_-_json"]<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores </p>
[/cl_text][/cl_column][cl_column width="1/3"][cl_icon icon="cl-icon-tools" size="39" color="#222222" align="center" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" css_style="{'margin-top':'15px'}_-_json" text_font_family="Source Code Pro" text_font_size="16" text_color="#0a0a0a" text_line_height="38"]<p style="text-align: center;">WeB DEVELOPMENT</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'0px'}_-_json"]<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores </p>
[/cl_text][/cl_column][cl_column width="1/3"][cl_icon icon="cl-icon-megaphone" size="39" color="#222222" align="center" css_style="{'margin-top':'35px'}_-_json"][cl_custom_heading typography="custom_font" css_style="{'margin-top':'15px'}_-_json" text_font_family="Source Code Pro" text_font_size="16" text_color="#0a0a0a" text_line_height="38"]<p style="text-align: center;">Internet Marketing</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'0px'}_-_json"]<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores </p>
[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

// Services Large 2
$data = array();
$data['name'] = __( 'Services Large 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-large-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row equal_height="1"][cl_column][cl_row_inner css_style="{'margin-top':'40px'}_-_json"][cl_column_inner width="1/3" css_style="{'border-right-width':'','padding-right':''}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Live Chat Communication" icon="cl-icon-envelope2" box_border_color="rgba(0,0,0,0)" icon_font_size="60" wrapper_size="90" wrapper_distance="10" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_font_size="16" desc_color="#777777"]<p><i>Use Folie to create an awesome website.</i></p>
[/cl_service][cl_text css_style="{'margin-top':'10px'}_-_json"]<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.&nbsp;<br></p>[/cl_text][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Grow income from website" icon="cl-icon-linegraph" box_border_color="rgba(0,0,0,0)" icon_font_size="60" wrapper_size="90" wrapper_distance="10" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_font_size="16" desc_color="#777777"]<p><i>Use Folie to create an awesome website.</i></p>
[/cl_service][cl_text css_style="{'margin-top':'10px'}_-_json"]

	<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.&nbsp;</p>

[/cl_text][/cl_column_inner][cl_column_inner width="1/3"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Frequently Updates" icon="cl-icon-refresh2" box_border_color="rgba(0,0,0,0)" icon_font_size="60" wrapper_size="90" wrapper_distance="10" title_content_distance="3" title_typography="h4" custom_desc_typography="1" desc_font_size="16" desc_color="#777777"]<p><i>Use Folie to create an awesome website.</i></p>
[/cl_service][cl_text css_style="{'margin-top':'10px'}_-_json"]

	<p style="text-align: center;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.&nbsp;</p>

[/cl_text][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );





// Services Circle 1
$data = array();
$data['name'] = __( 'Services Circle 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-circle-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column width="1/4" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Top Live Builder" icon="cl-icon-globe-outline" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="42" icon_color="#3888e2" wrapper_bg_color="#ffffff" wrapper_border_color="#3888e2" wrapper_size="106" wrapper_distance="5" title_distance_top="2" title_content_distance="5" title_typography="h3" box_border_color="rgba(0,0,0,0)" hover_effect="wrapper_accent_color" service_link="#" custom_desc_typography="1" desc_line_height="26"]<p>Visual Drag &amp; Drop Page Builder with an intuitive, simple and easy to work interface. The first all-in-one Builder. Check Out the Codeless Builder</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Free Extensions" icon="cl-icon-layers" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="42" icon_color="#3888e2" wrapper_bg_color="#ffffff" wrapper_border_color="#3888e2" wrapper_size="106" wrapper_distance="5" title_distance_top="2" title_content_distance="5" title_typography="h3" box_border_color="rgba(0,0,0,0)" hover_effect="wrapper_accent_color" service_link="#" custom_desc_typography="1" desc_line_height="26"]<p>Folie Theme works also with Visual Composer plugin. The plugin its included within the Folie theme. Revolution Slider &amp; Etc Too.</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Live Changes" icon="cl-icon-eye2" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="42" icon_color="#3888e2" wrapper_bg_color="#ffffff" wrapper_border_color="#3888e2" wrapper_size="106" wrapper_distance="5" title_distance_top="2" title_content_distance="5" title_typography="h3" box_border_color="rgba(0,0,0,0)" hover_effect="wrapper_accent_color" service_link="#" custom_desc_typography="1" desc_line_height="26"]<p>We have developed the first Customizer 100% on the fly when you can see any change directly on front-end. Live Changes everywhere.</p>
[/cl_service][/cl_column][cl_column width="1/4"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Premium Support" icon="cl-icon-head" wrapper="wrapper_circle" css_style="{'margin-top':'35px'}_-_json" icon_font_size="42" icon_color="#3888e2" wrapper_bg_color="#ffffff" wrapper_border_color="#3888e2" wrapper_size="106" wrapper_distance="5" title_distance_top="2" title_content_distance="5" title_typography="h3" box_border_color="rgba(0,0,0,0)" hover_effect="wrapper_accent_color" service_link="#" custom_desc_typography="1" desc_line_height="26"]<p>Folie offers a premium support by more than 10 professional people that are online to help you finish the project with our Folie Theme.</p>
[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


// Services Circle 2
$data = array();
$data['name'] = __( 'Services Circle 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['services'];
$data['custom_class'] = 'services';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/services-circle-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/3"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Next Generation of WP" subtitle="

Drag &amp; Drop Page Builder

" wrapper="wrapper_circle" subtitle_bool="1" css_style="{'margin-top':'35px'}_-_json" icon_font_size="32" icon_color="#ffffff" wrapper_bg_color="#1fb4cc" wrapper_border_color="#1fb4cc" wrapper_box_shadow="1" wrapper_size="86" title_content_distance="8" icon="cl-icon-puzzle" animation="bottom-t-top" animation_delay="200"]

New generation of WordPress has just started

with Codeless Builder and Live Editing properties.

Building your website will be exciting

[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Portfolio Live Builder" subtitle="

Build with drag &amp; drop your portfolio

" wrapper="wrapper_circle" subtitle_bool="1" css_style="{'margin-top':'35px'}_-_json" icon_font_size="32" icon_color="#ffffff" wrapper_bg_color="#1fb4cc" wrapper_border_color="#1fb4cc" wrapper_box_shadow="1" wrapper_size="86" title_content_distance="8" icon="cl-icon-grid2" animation="bottom-t-top" animation_delay="300"]

Change portfolio images, options, styling and position with drag and drop. Easier way to showcase your portfolio to the world.

[/cl_service][/cl_column][cl_column width="1/3"][cl_service media="type_icon" layout_type="media_top" layout_align="align_center" title="Support is our secret" subtitle="

We work everyday to help clients

" wrapper="wrapper_circle" subtitle_bool="1" css_style="{'margin-top':'35px'}_-_json" icon_font_size="32" icon_color="#ffffff" wrapper_bg_color="#1fb4cc" wrapper_border_color="#1fb4cc" wrapper_box_shadow="1" wrapper_size="86" title_content_distance="8" icon="cl-icon-aperture" animation="bottom-t-top" animation_delay="400"]

We will be every step with you, no more headaches contact us, will resolve any difficulties you will confront with the theme and wordpress

[/cl_service][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );




//Counter 1
$data = array();
$data['name'] = __( 'Counter 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['counter']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/counter-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'100px','padding-bottom':'100px'}_-_json" text_color="light-text" background_image="{'id':'2123','title':'working-compressed','filename':'working-compressed.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-content%2Fuploads%2F2017%2F03%2Fworking-compressed.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fworking-compressed%2F','alt':'','author':'1','description':'','caption':'','name':'working-compressed','status':'inherit','uploadedTo':'0','date':'Wed%20Mar%2008%202017%2018%3A39%3A54%20GMT%2B0100%20(CET)','modified':'Wed%20Mar%2008%202017%2018%3A39%3A54%20GMT%2B0100%20(CET)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'March%208%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdefault%2Fwp-admin%2Fpost.php%3Fpost%3D2123%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'53889','filesizeHumanReadable':'53%20KB','height':'1067','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay="gradient" overlay_gradient="frost" overlay_opacity="0.65" background_position="center center" parallax="1"][cl_column width="1/4" horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_counter][cl_text custom_typography="1" text_font_size="20" text_font_weight="700" css_style="{'margin-top':'5px'}_-_json"]<p>Projects Finished</p>
[/cl_text][/cl_column][cl_column width="1/4" horizontal_align="middle"][cl_counter number="420"][cl_text custom_typography="1" text_font_size="20" text_font_weight="700" css_style="{'margin-top':'5px'}_-_json"]<p>Days of work</p>
[/cl_text][/cl_column][cl_column width="1/4" horizontal_align="middle"][cl_counter number="180"][cl_text custom_typography="1" text_font_size="20" text_font_weight="700" css_style="{'margin-top':'5px'}_-_json"]<p>Elements created</p>
[/cl_text][/cl_column][cl_column width="1/4" horizontal_align="middle"][cl_counter number="380"][cl_text custom_typography="1" text_font_size="20" text_font_weight="700" css_style="{'margin-top':'5px'}_-_json"]<p>Cups of coffee</p>
[/cl_text][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

//Counter 2
$data = array();
$data['name'] = __( 'Counter 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['counter']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/counter-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json" background_color="#238dff" text_color="light-text"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_text margin_paragraphs="0" custom_typography="1" text_font_size="26" text_font_weight="300" text_line_height="40" css_style="{'margin-top':'35px'}_-_json"]<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p><p>praesentium voluptatum deleniti atque corrupti quos dolores.</p>
[/cl_text][cl_row_inner css_style="{'margin-top':'35px'}_-_json"][cl_column_inner width="1/4" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json" animation_delay="100"][cl_counter number="120" custom_color="1" color="#ffffff" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>Businesses this year</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4" animation_delay="200"][cl_counter number="144" custom_color="1" color="#ffffff" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>Financial Issues</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4" animation_delay="300"][cl_counter number="189" custom_color="1" color="#ffffff" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>Top Performance</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4" animation_delay="400"][cl_counter number="211" custom_color="1" color="#ffffff" align="left"][cl_custom_heading typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>Advanced Systems</p>
[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

//Counter 3
$data = array();
$data['name'] = __( 'Counter 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['counter']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/counter-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row fullheight="1" css_style="{'padding-top':'45px','padding-bottom':'0px'}_-_json" background_color="#0a0808" background_image="{'id':'76','title':'mountain-parallax','filename':'mountain-parallax.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Fmountain-parallax.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D76','alt':'','author':'1','description':'','caption':'','name':'mountain-parallax','status':'inherit','uploadedTo':'0','date':'Tue%20May%2023%202017%2017%3A32%3A51%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Tue%20May%2023%202017%2017%3A32%3A51%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2023%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D76%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'77387','filesizeHumanReadable':'76%20KB','height':'1060','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay_opacity="0.9" equal_height="1" columns_gap="0" background_position="right center" custom_width_bool="1" custom_width="860" col_responsive="full" text_color="light-text" background_blend="overlay" overlay_color="#141414" anchor_label="About Us"][cl_column css_style="{'padding-top':'30px','padding-bottom':'30px','padding-right':'0px'}_-_json" horizontal_align="middle"][cl_custom_heading css_style="{'margin-top':'35px','margin-bottom':'35px'}_-_json" animation="bottom-t-top" animation_delay="100" custom_responsive_992_bool="1" custom_responsive_992_size="22px" custom_responsive_992_line_height="28px"]<p><font color="#1fb4cc">What we have done?</font></p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="28" css_style="{'margin-top':'20px'}_-_json" animation="bottom-t-top" animation_delay="300" custom_responsive_992_line_height="26px" custom_responsive_992_size="14px" custom_responsive_768_bool="1" custom_responsive_768_size="14px"]<p>With Folie its possible to save a lot of memory. Its not necessary to create for each image  different image sizes. &nbsp;Your website will load only the necessary files. This will make your website loads faster.</p>
<p style="text-align: justify;"><br></p>
[/cl_text][cl_row_inner css_style="{'margin-top':'60px'}_-_json"][cl_column_inner width="1/3" animation="zoom-in" animation_delay="400" overlay="gradient" overlay_gradient="solid_vault" overlay_opacity="0.75" background_image="{'id':'35','title':'tree','filename':'tree.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Ftree.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D35','alt':'','author':'1','description':'','caption':'','name':'tree','status':'inherit','uploadedTo':'0','date':'Tue%20May%2023%202017%2012%3A10%3A09%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Tue%20May%2023%202017%2012%3A10%3A09%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2023%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D35%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'354179','filesizeHumanReadable':'346%20KB','height':'962','width':'1414','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'padding-top':'30px','padding-bottom':'30px'}_-_json"][cl_counter number="147"][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>Cups Of Coffee</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3" animation="zoom-in" animation_delay="500" css_style="{'padding-top':'30px','padding-bottom':'30px'}_-_json" background_image="{'id':'22','title':'wall','filename':'wall.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Fwall.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D22','alt':'','author':'1','description':'','caption':'','name':'wall','status':'inherit','uploadedTo':'0','date':'Mon%20May%2022%202017%2016%3A05%3A44%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Mon%20May%2022%202017%2016%3A05%3A44%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D22%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'53067','filesizeHumanReadable':'52%20KB','height':'490','width':'735','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay="gradient" overlay_gradient="firewatch" overlay_opacity="0.9"][cl_counter][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>People Involved</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/3" animation="zoom-in" animation_delay="600" background_image="{'id':'16','title':'working','filename':'working.jpg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-content%2Fuploads%2F2017%2F05%2Fworking.jpg','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2F%3Fattachment_id%3D16','alt':'','author':'1','description':'','caption':'','name':'working','status':'inherit','uploadedTo':'0','date':'Mon%20May%2022%202017%2016%3A00%3A15%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','modified':'Mon%20May%2022%202017%2016%3A00%3A15%20GMT%2B0200%20(W.%20Europe%20Daylight%20Time)','menuOrder':'0','mime':'image%2Fjpeg','type':'image','subtype':'jpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'May%2022%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Flanding%2Fwp-admin%2Fpost.php%3Fpost%3D16%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'315853','filesizeHumanReadable':'308%20KB','height':'1067','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" css_style="{'padding-top':'30px','padding-bottom':'30px'}_-_json" overlay="gradient" overlay_gradient="mauve"][cl_counter number="487"][cl_custom_heading typography="h6" css_style="{'margin-top':'5px'}_-_json"]<p>Days Of Work</p>
[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

//Counter 4
$data = array();
$data['name'] = __( 'Counter 4', 'folie' );
$data['cat_display_name'] = $cat_display_names['counter']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/counter-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json" text_color="light-text" background_image="{'uploading':'false','date':'1500456397000','filename':'education-1.jpg','menuOrder':'0','uploadedTo':'0','type':'image','subtype':'jpeg','url':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-content%2Fuploads%2F2017%2F07%2Feducation-1.jpg','title':'education-1','caption':'','alt':'','description':'','id':'2115','link':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2F%3Fattachment_id%3D2115','author':'1','name':'education-1','status':'inherit','modified':'1500456397000','mime':'image%2Fjpeg','icon':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-includes%2Fimages%2Fmedia%2Fdefault.png','dateFormatted':'July%2019%2C%202017','nonces':'%5Bobject%20Object%5D','editLink':'http%3A%2F%2Fcodeless.co%2Ffolie%2Fdigital-agency%2Fwp-admin%2Fpost.php%3Fpost%3D2115%26action%3Dedit','meta':'false','authorName':'admin','filesizeInBytes':'157487','filesizeHumanReadable':'154%20KB','height':'1067','width':'1600','orientation':'landscape','sizes':'%5Bobject%20Object%5D','compat':'%5Bobject%20Object%5D'}_-_json" overlay="color" overlay_color="#121613" overlay_opacity="0.65"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p><span style="letter-spacing: 0px; display: inline !important;">Our Customers fall in love</span></p><p>with our robust design</p>
[/cl_custom_heading][cl_row_inner css_style="{'margin-top':'35px'}_-_json"][cl_column_inner width="1/4" css_style="{'padding-top':'10px','padding-bottom':'10px'}_-_json"][cl_counter number="250" custom_color="1" color="#ffffff"][cl_custom_heading typography="h3" css_style="{'margin-top':'0px'}_-_json"]<p>Portfolio Types</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="100"][cl_custom_heading typography="h3" css_style="{'margin-top':'0px'}_-_json"]<p>Predefined Elements</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="20" custom_color="1" color="#ffffff"][cl_custom_heading typography="h3" css_style="{'margin-top':'0px'}_-_json"]<p>Header Elements</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="180" custom_color="1" color="#ffffff"][cl_custom_heading typography="h3" css_style="{'margin-top':'0px'}_-_json"]<p>Content Blocks</p>
[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Counter 5
$data = array();
$data['name'] = __( 'Counter Black Background Block', 'folie' );
$data['cat_display_name'] = $cat_display_names['counter']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'counter block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/counter-5.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'70px','border-top-width':'1px'}_-_json" text_color="light-text" background_color="#1c1c1c" border_color="#ebebeb"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="28" text_line_height="36" text_transform="none" text_color="#ffffff" css_style="{'margin-top':'35px'}_-_json"]<p>What we have achieved</p>
[/cl_custom_heading][cl_text custom_typography="1" text_font_size="18" text_line_height="30" css_style="{'margin-top':'10px','padding-left':'20px','padding-right':'20px'}_-_json" text_color="#d1d1d1"]<p>This project it was a huge achievement for our team, working everyday with the same passion of the first day. Today Folie WordPress Theme it is ready with all the difficulties during the road, we have finished it.&nbsp;</p>
<p></p>
[/cl_text][cl_row_inner css_style="{'margin-top':'70px'}_-_json"][cl_column_inner width="1/4"][cl_counter][cl_custom_heading tag="h5" typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>SuccessFul Stories</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="247"][cl_custom_heading tag="h5" typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>Award Winning</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="531"][cl_custom_heading tag="h5" typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>New Clients this Year</p>
[/cl_custom_heading][/cl_column_inner][cl_column_inner width="1/4"][cl_counter number="24"][cl_custom_heading tag="h5" typography="h6" css_style="{'margin-top':'0px'}_-_json"]<p>MILLION DOLLAR in 2016</p>
[/cl_custom_heading][/cl_column_inner][/cl_row_inner][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );



//Contact Block 1
$data = array();
$data['name'] = __( 'Contact 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['contact']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'contact block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/contact-block-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json" background_color="#ffffff"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_size="30" text_transform="none" text_color="#1c1c1c" css_style="{'margin-top':'35px'}_-_json"]

Contact Us

[/cl_custom_heading][cl_text margin_paragraphs="2" custom_typography="1" text_font_size="16" css_style="{'margin-top':'17px'}_-_json"]

At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores[/cl_text][/cl_column][/cl_row][cl_row css_style="{'padding-top':'0px','padding-bottom':'45px'}_-_json" background_color="#ffffff"][cl_column width="2/3" css_style="{'padding-top':'0px','padding-bottom':'20px'}_-_json"][cl_contact_form7 css_style="{'margin-top':'35px'}_-_json" id="172"][/cl_column][cl_column width="1/3"][cl_map css_style="{'margin-top':'15px'}_-_json" api_key="AIzaSyDNS4R2BxpPspB31mZPnGvelSPSXvggI4I" lat_lon="37.757966, -122.475366" height="555" style="blue_water"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

//Contact Block 2
$data = array();
$data['name'] = __( 'Contact 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['contact']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'contact block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/contact-block-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/2"][cl_contact_form7 css_style="{'margin-top':'35px'}_-_json" id="305"][/cl_column][cl_column width="1/2"][cl_custom_heading typography="custom_font" text_font_size="26" text_font_weight="300" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_color="#0f0f0f"]<p style="text-align: left;">Contact Details</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px','margin-bottom':'15px'}_-_json" margin_paragraphs="3"]<p style="margin-top: 3px; margin-bottom: 3px;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores&nbsp;Morbi et lobortis nisi, in iaculis ex.&nbsp;</p>
[/cl_text][cl_text css_style="{'margin-top':'0px','margin-bottom':'20px'}_-_json"]<p><b>Address:</b> Inner Sunset, San Francisco 5th Ave</p><p><b>Phone:</b> +001003011456</p><p><b>Email:</b> info@foliethemes.com</p>
[/cl_text][cl_map css_style="{'margin-top':'20px'}_-_json" api_key="AIzaSyDNS4R2BxpPspB31mZPnGvelSPSXvggI4I" lat_lon="37.757966, -122.475366"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Contact Block 3
$data = array();
$data['name'] = __( 'Contact 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['contact']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'contact block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/contact-block-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'80px','padding-bottom':'80px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" width="1/2"][cl_custom_heading text_font_family="Poppins" text_font_weight="300" text_color="#303133" css_style="{'margin-top':'35px'}_-_json" text_font_size="25" text_transform="none"]

Where you can find us ?

[/cl_custom_heading][cl_text css_style="{'margin-top':'20px','margin-bottom':'35px'}_-_json" custom_typography="1" text_font_size="16" text_line_height="34"]<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit tincidunt euismod. Nulla convallis, mauris nec tempus congue, ex libero dictum libero, quis blandit neque nisi eu massa.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit tincidunt euismod.</p>
[/cl_text][cl_socialicon size="30" border="round" padding="53" line_height="49" css_style="{'margin-top':'35px'}_-_json" color="#222222" bcolor="#222222" bgcolor="" hover="#3888e2"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p><b>Address:</b> New York, West Street 16 Avenue Tiled Steps, Forest Knolls</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p><b>Phone:&nbsp;</b>+1445 1223 11455</p>
[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p><b>Email: </b>info@folieexamples.com</p>
[/cl_custom_heading][/cl_column][cl_column width="1/2" css_style="{'padding-top':'52px'}_-_json"][cl_contact_form7 css_style="{'margin-top':'35px'}_-_json" id="2209"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Contact Block 4
$data = array();
$data['name'] = __( 'Contact Left Text Block', 'folie' );
$data['cat_display_name'] = $cat_display_names['contact']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'contact block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/contact-block-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'33px','padding-bottom':'54px'}_-_json"][cl_column width="1/4" css_style="{'padding-top':'40px','padding-bottom':'20px'}_-_json"][cl_text margin_paragraphs="0" custom_typography="1" css_style="{'margin-top':'10px'}_-_json"]<p style="margin-top: 0px; margin-bottom: 0px;">You can find us through the office in two different big cities. Our work hours is 8am to 6 pm. Working days from Mon to Sat</p>
[/cl_text][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>New York</p>
[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'10px'}_-_json"]<p style="margin-top: 0px; margin-bottom: 0px;" class="">Find us through this address:</p><p style="margin-top: 0px; margin-bottom: 0px;" class="">PO Box 4668, New York, NY 10163-4668, US</p>
[/cl_text][cl_text margin_paragraphs="0" css_style="{'margin-top':'10px'}_-_json"]<p>+10011455223</p><p>newyork@officefolie.com</p>
[/cl_text][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>San Francisco</p>
[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'10px'}_-_json"]<p>Find us through this address:</p>
<p>548 Market St, San Francisco, CA 94104-5401, US</p>
<p></p>
[/cl_text][cl_text margin_paragraphs="0" css_style="{'margin-top':'10px'}_-_json"]<p>+10011455223</p><p>sanfrancisco@officefolie.com</p>
[/cl_text][cl_row_inner css_style="{'margin-top':'35px'}_-_json"][cl_column_inner][cl_socialicon add_email="0" add_linkedin="0" add_youtube="1" color="#ffffff" hover="#ffffff" border="round" bcolor="#1fb4cc" bgcolor="#1fb4cc" padding="33" margin="3" line_height="29" css_style="{'margin-top':'45px'}_-_json"][/cl_column_inner][/cl_row_inner][/cl_column][cl_column width="3/4"][cl_contact_form7 css_style="{'margin-top':'0px'}_-_json" id="231"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );




//Clients 1
$data = array();
$data['name'] = __( 'Clients 1', 'folie' );
$data['cat_display_name'] = $cat_display_names['clients']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'clients block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/clients-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row custom_width_bool="1" custom_width="790" css_style="{'padding-top':'45px','padding-bottom':'45px','border-top-width':'1px'}_-_json" background_color="#f7f7f7" border_color="#efefef" row_id="sponsors"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json"]<p>Our Sponsors</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'10px'}_-_json"]<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
[/cl_text][cl_clients items_per_row="3" css_style="{'margin-top':'35px'}_-_json" images="__array__118,119,120,121,122,123__array__end__"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Clients 2
$data = array();
$data['name'] = __( 'Clients 2', 'folie' );
$data['cat_display_name'] = $cat_display_names['clients']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'clients block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/clients-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json"][cl_column width="1/2" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="h3" css_style="{'margin-top':'35px'}_-_json"]<p>Our Story</p>
[/cl_custom_heading][cl_text css_style="{'margin-top':'20px'}_-_json"]<p>Codeless is an experienced and passionate group of designers, developers, project managers, writers and artists, of passages of Lorem Ipsum available. Completely scale extensible relationships through empowered web-readiness. Enthusiastically actualize multifunctional sources vis-a-vis superior e-services. </p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum molestie purus, sit amet euismod eros. Aenean sit amet leo id justo lacinia vehicula. Aliquam erat volutpat.&nbsp;<br></p>
[/cl_text][/cl_column][cl_column width="1/2"][cl_clients items_per_row="3" css_style="{'margin-top':'35px'}_-_json" images="__array__151,152,153,154,155,156__array__end__"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );

//Clients 3
$data = array();
$data['name'] = __( 'Clients 3', 'folie' );
$data['cat_display_name'] = $cat_display_names['clients']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'clients block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/clients-3.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'45px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading css_style="{'margin-top':'35px'}_-_json" custom_responsive_768_bool="1" custom_responsive_768_size="16px"]<p>Our lovely clients</p>
[/cl_custom_heading][cl_text margin_paragraphs="0" css_style="{'margin-top':'10px'}_-_json"]<p>Making something beautiful is the essence of what most designers want to do.&nbsp;</p><p>Here are some of our lovely clients. Do you want to be the next one?</p>
[/cl_text][cl_clients items_per_row="4" css_style="{'margin-top':'35px'}_-_json" images="__array__145,146,147,148,149,150,151,152__array__end__" clients_style="overlay_title"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Clients 4
$data = array();
$data['name'] = __( 'Clients with Text and Title block', 'folie' );
$data['cat_display_name'] = $cat_display_names['clients']. ', '. $cat_display_names['block'];
$data['custom_class'] = 'clients block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/clients-4.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'45px'}_-_json"][cl_column horizontal_align="middle" css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json"][cl_custom_heading typography="custom_font" text_font_family="Lora" text_font_weight="400" text_transform="none" css_style="{'margin-top':'35px'}_-_json" text_font_size="18" text_line_height="20"]<p><i>Build a Brand, Build the Future of your Business</i></p>
[/cl_custom_heading][cl_custom_heading css_style="{'margin-top':'20px'}_-_json" typography="custom_font" text_font_size="42" text_line_height="48" text_font_weight="800" text_letterspace="1.5" text_color="#1e1e1e" custom_responsive_768_line_height="36px" custom_responsive_768_bool="1" custom_responsive_768_size="28px"]<p>Our Lovely Clients</p>
[/cl_custom_heading][cl_clients carousel="1" carousel_view_items="5" items_per_row="4" overlay_color="rgba(34,34,34,0.73)" css_style="{'margin-top':'35px'}_-_json" images="__array__117,118,119,120,121,122,123,124__array__end__"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Blog 1
$data = array();
$data['name'] = __( 'Blog Timeline', 'folie' );
$data['cat_display_name'] = $cat_display_names['blog'];
$data['custom_class'] = 'blog';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-1.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'45px','padding-bottom':'0px'}_-_json" background_color="#f9f9f9" row_id="news"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" horizontal_align="middle"][cl_custom_heading typography="h5" css_style="{'margin-top':'35px'}_-_json"]

What's New

[/cl_custom_heading][cl_custom_heading typography="h3" css_style="{'margin-top':'20px','margin-bottom':'0px'}_-_json"]

Latest Thoughts

[/cl_custom_heading][/cl_column][/cl_row][cl_row custom_width_bool="1" custom_width="1020" css_style="{'padding-top':'0px','padding-bottom':'45px'}_-_json" background_color="#f9f9f9"][cl_column css_style="{'padding-top':'20px','padding-bottom':'20px'}_-_json" background_color="#f9f9f9"][cl_blog blog_simple_font="0" blog_remove_meta="1" css_style="{'margin-top':'35px'}_-_json" blog_style="timeline"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );


//Blog 2
$data = array();
$data['name'] = __( 'Blog minimal grid', 'folie' );
$data['cat_display_name'] = $cat_display_names['blog'];
$data['custom_class'] = 'blog';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-2.jpg' ); 
$data['content'] = <<<CONTENT
[cl_row css_style="{'padding-top':'70px','padding-bottom':'20px'}_-_json"][cl_column css_style="{'padding-top':'20px','padding-bottom':'0px'}_-_json"][cl_blog css_style="{'margin-top':'35px'}_-_json" text_font_size="26" text_line_height="32" text_font_weight="500" blog_remove_meta="1" blog_simple_font="0" blog_animation="bottom-t-top" posts_per_page="3"][/cl_column][/cl_row]
CONTENT;

vc_add_default_templates( $data );




}




?>