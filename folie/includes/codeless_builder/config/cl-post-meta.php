<?php


Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_options_title',
   'meta_key' => 'page_options_title',
   'control_type' => 'grouptitle',
   'label' => 'Page Options',
   'priority' => 1,
   'inline_control' => true,
   'id' => 'page_options_title',
   'transport' => 'auto', 
   'default' => 'default'
   
));


// ---------- Page Layout -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio'),
   'feature' => 'page_layout',
   'priority' => 2,
   'meta_key' => 'page_layout',
   'control_type' => 'kirki-select',
   'label' => 'Page Layout',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'folie' ),
      'fullwidth' => esc_attr__( 'Fullwidth', 'folie' ),
      'left_sidebar' => esc_attr__( 'Left Sidebar', 'folie' ),
      'right_sidebar' => esc_attr__( 'Right Sidebar', 'folie' ),
      'dual' => esc_attr__( 'Dual', 'folie' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_layout',
   'transport' => 'auto', 
   'default' => 'default'
   
));

// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'layout_modern',
   'meta_key' => 'layout_modern',
   'control_type' => 'kirki-select',
   'label' => 'Page Layout Modern',
   'tooltip' => 'Works only with layouts with sidebar. Adds a modern sidebar layout. Example: Default Demo Blog. Split the layout in two parts like in the example. Change color of sidebar part on Global Styling.',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'folie' ),
      '0' => esc_attr__( 'No', 'folie' ),
      '1' => esc_attr__( 'Yes', 'folie' )
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'layout_modern',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'page_fullwidth_content',
   'meta_key' => 'page_fullwidth_content',
   'control_type' => 'kirki-select',
   'label' => 'Page Fullwidth Content',
   'tooltip' => 'Remove container from page and show page content from left of the screen to the right',
   'choices'     => array(
      'off' => esc_attr__( 'Off', 'folie' ),
      'on'  => esc_attr__( 'On', 'folie' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_fullwidth_content',
   'transport' => 'postMessage', 
   'default' => 0
   
));


// ---------- Page BG Color -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'portfolio'),
   'priority' => 3,
   'feature' => 'page_bg_color',
   'meta_key' => 'page_bg_color',
   'control_type' => 'kirki-color',
   'tooltip' => 'Actual Page Content Background Color',
   'label' => 'Page Content BG Color',
   'default' => '',
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_bg_color',
   'transport' => 'postMessage'
   
));





// ---------- One Page -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'one_page',
   'priority' => 3,
   'meta_key' => 'one_page',
   'control_type' => 'kirki-select',
   'label' => 'Page as One Page',
   'tooltip' => 'Make this page acts as a one page. Please add a custom id for each section and connect it with a menu item.',
   'choices'     => array(
      'off' => esc_attr__( 'Off', 'folie' ),
      'on'  => esc_attr__( 'On', 'folie' ),
      
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'one_page',
   'transport' => 'auto', 
   'default' => 0
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_show_footer',
   'priority' => 4,
   'meta_key' => 'page_show_footer',
   'control_type' => 'kirki-select',
   'label' => esc_html__('Show Footer on this page', 'folie'),
   'choices'     => array(
      'yes' => esc_attr__( 'Yes', 'folie' ),
      'no'  => esc_attr__( 'No', 'folie' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_show_footer',
   'transport' => 'postMessage', 
   'default' => 'yes'
   
));




Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio'),
   'feature' => 'header_color',
   'priority' => 4,
   'meta_key' => 'header_color',
   'control_type' => 'kirki-select',
   'label' => 'Header Color',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'folie' ),
      'dark' => esc_attr__( 'Dark', 'folie' ),
      'light' => esc_attr__( 'Light', 'folie' ),
   ),
   'group_in' => 'general',
   'tooltip' => 'General Header Color for this page. If you use Codeless Slider and Header Transparent (on top of page), for each slide, you can select custom header color on: slide Row -> Design -> Text Color',
   'inline_control' => true,
   'id' => 'transparent_header',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Transparent Header -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio'),
   'feature' => 'transparent_header',
   'priority' => 4,
   'meta_key' => 'transparent_header',
   'control_type' => 'kirki-select',
   'label' => 'Header Over Content (Transparent)',
   'tooltip' => 'Show Header above (over) of page content, you can make it transparent or add a small opacity',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'folie' ),
      'transparent' => esc_attr__( 'Transparent Header', 'folie' ),
      'no_transparent' => esc_attr__( 'No Transparent', 'folie' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'transparent_header',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'divider_header_page',
   'meta_key' => 'divider_header_page',
   'control_type' => 'groupdivider',
   'label' => '',
   'priority' => 4,
   'inline_control' => true,
   'id' => 'divider_header_page',
   'transport' => 'auto', 
   'default' => 'default',
   
));

// --------- Header Color --------------------



// --------------------- Other Page dividers --------------------------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'other_page_options_divider',
   'meta_key' => 'other_page_options_divider',
   'control_type' => 'groupdivider',
   'label' => '',
   'priority' => 8,
   'inline_control' => true,
   'id' => 'other_page_options_divider',
   'transport' => 'auto', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   'priority' => 9,
   'post_type' => 'page',
   'feature' => 'other_page_options_title',
   'meta_key' => 'other_page_options_title',
   'control_type' => 'grouptitle',
   'label' => 'WP Default',
   'inline_control' => true,
   'id' => 'other_page_options_title',
   'transport' => 'auto', 
   'default' => 'default'
   
));



// Post


Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_masonry_layout',
   'meta_key' => 'post_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => 'Masonry Layout',
   'choices'     => array(
      'default'  => esc_attr__( 'Default (Automatically set by selected algorithm)', 'folie' ),
      'small'  => esc_attr__( 'Small (1 width / 1 height)', 'folie' ),
      'wide' => esc_attr__( 'Wide (2/1)', 'folie' ),
      'large' => esc_attr__( 'Large (2/2)', 'folie' ),
      'long' => esc_attr__( 'Long (1/2)', 'folie' ),
   ),
   'inline_control' => true,
   'group_in' => 'post_data',
   'id' => 'post_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   /*'cl_required'    => array(
         'setting'  => 'blog_style',
         'operator' => '==',
         'value'    => 'masonry',
   ),*/
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_style',
   'meta_key' => 'post_style',
   'control_type' => 'kirki-select',
   'label' => 'Post Style',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'folie' ),
      'classic'  => esc_attr__( 'Classic', 'folie' ),
      'modern'  => esc_attr__( 'Modern', 'folie' ),
      'custom'  => esc_attr__( 'Custom', 'folie' )
   ),
   'inline_control' => true,
   'group_in' => 'post_data',
   'id' => 'post_style',
   'transport' => 'refresh', 
   'default' => 'default',
   'tooltip' => 'The Custom Post Style can be used only with the fullwidth layout for now.',
   'priority' => 1,
));


// Single Portfolio


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_item_format',
   'meta_key' => 'portfolio_item_format',
   'control_type' => 'kirki-select',
   'label' => 'Portfolio Item Format',
   'priority' => 1,
   'choices'     => array(
      'thumbnail'  => esc_attr__( 'Thumbnail', 'folie' ),
      'slider' => esc_attr__( 'Slider', 'folie' ),
      'Video' => esc_attr__( 'Video', 'folie' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_item_format',
   'transport' => 'auto', 
   'default' => 'thumbnail',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_video_link',
   'meta_key' => 'portfolio_video_link',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => 'Portfolio Video Link (used on lightbox portfolio)',
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_video_link',
   'transport' => 'postMessage', 
   'default' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_masonry_layout',
   'meta_key' => 'portfolio_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => 'Masonry Layout',
   'priority' => 1,
   'choices'     => array(
      'default'  => esc_attr__( 'Default (Automatically set by selected algorithm)', 'folie' ),
      'small'  => esc_attr__( 'Small (1 width / 1 height)', 'folie' ),
      'wide' => esc_attr__( 'Wide (2/1)', 'folie' ),
      'large' => esc_attr__( 'Large (2/2)', 'folie' ),
      'long' => esc_attr__( 'Long (1/2)', 'folie' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_custom_link',
   'meta_key' => 'portfolio_custom_link',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => 'Custom Link',
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_custom_link',
   'transport' => 'postMessage', 
   'default' => '',
   
));




// Single Staff


Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_position',
   'meta_key' => 'staff_position',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => 'Staff Position',
   'priority' => 1,
   'id' => 'staff_position',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'default' => 'Developer',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_link',
   'meta_key' => 'staff_link',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => 'Custom Link',
   'priority' => 1,
   'id' => 'staff_link',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'default' => '',
   
));


$socials = codeless_get_team_social_list();
if( ! empty($socials) ):

   foreach($socials as $social):

      Cl_Post_Meta::map(array(
         
         'post_type' => 'staff',
         'feature' => $social['id'].'_link',
         'meta_key' => $social['id'].'_link',
         'control_type' => 'text',
         'label' => ucfirst($social['id']),
         'priority' => 1,
         'dynamic' => true,
         'group_in' => 'staff_social',
         'id' => $social['id'].'_link',
         'transport' => 'auto', 
         'default' => '',
         
      ));

   endforeach;

endif;

?>