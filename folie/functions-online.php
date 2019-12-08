<?php

class CodelessOnline{

    var $data = array();
    var $allowed_list = array();

    function __construct(){

        $this->data_for_pages();
        add_action( 'init', array( $this, 'export' ), 9 );
        add_action( 'init', array( $this, 'modify_get_mod' ), 9 );
        add_action( 'template_redirect', array( $this, 'add_extra_blogs' ), 9 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_files' ), 9 );
        add_action( 'codeless_hook_viewport_before', array( $this, 'output' ) );
 
    }

    function export(){
        if( isset( $_GET['export_data'] ) && $_GET['export_data'] == 'widgets' ){

            global $wp_registered_widgets;
            $data = array();
            $data['sidebars'] = get_option("sidebars_widgets");
            $data['sidebars'] = $this->exclude_sidebar_keys($data['sidebars']); 

            $widgets = array();
            $data['final_widget'] = array();
            foreach ($wp_registered_widgets as $widget => $widget_params) 
                $widgets[] = $widget_params['callback'][0]->id_base; 

            foreach ($widgets as $widget) {
                $widget_ = get_option( 'widget_' . $widget ); 
                if ( !empty($widget_) ) 
                    $data['final_widget'][ $widget ] = $widget_;
            }

            $encoded = base64_encode(serialize($data));
            echo $encoded;
            die();

        }


        if( isset( $_GET['export_data'] ) && $_GET['export_data'] == 'customizer' ){

            $theme_mods = get_theme_mods();
            unset($theme_mods['cl_page_content']);
            $encoded = base64_encode(serialize($theme_mods));
            echo $encoded;
            die();
        }

        if( isset( $_GET['export_data'] ) && $_GET['export_data'] == 'options' ){

            $options['page_on_front'] = get_option('page_on_front');
            $options['page_for_posts'] = get_option('page_for_posts');
            $options['show_on_front'] = get_option('show_on_front');

            $encoded = base64_encode(serialize($options));
            echo $encoded;
            die();
        }

        if( isset( $_GET['export_data'] ) && $_GET['export_data'] == 'menu' ){

            global $wpdb;
            
            $data = array();
            $locations = get_nav_menu_locations();
 
            $terms_table = $wpdb->prefix . "terms";
            foreach ((array)$locations as $location => $menu_id) {
                $menu_slug = $wpdb->get_results("SELECT * FROM $terms_table where term_id={$menu_id}", ARRAY_A);
                $data[ $location ] = $menu_slug[0]['slug'];
            }
            var_dump($data);
            $output = base64_encode(serialize( $data ));
            echo $output;
            die();
        }
    }

    private function exclude_sidebar_keys( $keys = array() ){
        if ( ! is_array($keys) )
            return $keys;

        unset($keys['wp_inactive_widgets']);
        unset($keys['array_version']);
        return $keys;
    }

    function modify_get_mod(){
        global $codeless_online_mods;

        $codeless_online_mods = array();
        
        if( ! isset( $_GET['cl_on'] ) || empty( $_GET ) )
            return;
  
        foreach( $_GET as $cl_option => $new_value ){

            $option = substr( $cl_option, 3 );

            if( $option == 'on' )
                continue;

            if( ! in_array( $option, $this->allowed_list ) )
                continue;

            $codeless_online_mods[$option] = $new_value;

        }
    }


    function add_extra_blogs(){
        global $codeless_online_mods;

        $codeless_online_mods_new = array();

        if( codeless_get_post_id() == 173 ){
            $codeless_online_mods_new['layout_modern'] = 0;
            $codeless_online_mods_new['blog_style'] = 'alternate';
            $codeless_online_mods_new['page_bg_color'] = '#f5f5f5';
            $codeless_online_mods_new['blog_boxed'] = 1;
            $codeless_online_mods_new['blog_animation'] = 'top-t-bottom';
            $codeless_online_mods_new['blog_pagination_style'] = 'load_more';
            $codeless_online_mods_new['blog_excerpt_length'] = 40;
        }

        if( codeless_get_post_id() == 305 ){
            $codeless_online_mods_new['layout_modern'] = 0; 
            $codeless_online_mods_new['page_layout'] = 'fullwidth';
            $codeless_online_mods_new['blog_style'] = 'grid';
            $codeless_online_mods_new['blog_grid_layout'] = 3;
            $codeless_online_mods_new['blog_animation'] = 'top-t-bottom';
            $codeless_online_mods_new['blog_pagination_style'] = 'infinite_scroll';
            $codeless_online_mods_new['blog_entry_meta_author'] = false;
            $codeless_online_mods_new['blog_entry_meta_categories'] = false;
            $codeless_online_mods_new['blog_entry_tools_share'] = false;
            $codeless_online_mods_new['blog_entry_tools_comments_count'] = false;
            $codeless_online_mods_new['blog_button_style'] = 'text-effect';
            $codeless_online_mods_new['blog_article_distance'] = '30';
            $codeless_online_mods_new['blog_entry_title'] = array(
                'letter-spacing' => '0.08em',
                'font-weight' => '600',
                'text-transform' => 'uppercase',
                'font-size' => '13px',
                'line-height' => '20px',
                'color' => '#303133'
            );
            $codeless_online_mods_new['blog_entry_readmore'] = array(
                'letter-spacing' => '0.00em',
                'font-weight' => '600',
                'text-transform' => 'uppercase',
                'font-size' => '12px',
                'line-height' => '20px',
                'color' => '#303133'
            );
            $codeless_online_mods_new['blog_overlay'] = 'zoom_color';
            $codeless_online_mods_new['blog_entry_overlay_icon'] = 'lightbox';
            $codeless_online_mods_new['blog_overlay_color'] = 'rgba(0,0,0,0.8)';
        }

        if( codeless_get_post_id() == 363 ){
            $codeless_online_mods_new['layout_modern'] = 0; 
            $codeless_online_mods_new['blog_style'] = 'masonry';
            $codeless_online_mods_new['page_layout'] = 'fullwidth';
            $codeless_online_mods_new['page_fullwidth_content'] = 1;
            $codeless_online_mods_new['blog_grid_layout'] = 5;
            $codeless_online_mods_new['blog_entry_meta_author'] = false;
            $codeless_online_mods_new['blog_entry_meta_categories'] = false;
            $codeless_online_mods_new['blog_entry_title'] = array(
                'letter-spacing' => '0.00em',
                'font-weight' => '800',
                'text-transform' => 'uppercase',
                'font-size' => '14px',
                'line-height' => '24px',
                'color' => '#303133'
            );
            $codeless_online_mods_new['blog_excerpt_length'] = 30;
            $codeless_online_mods_new['blog_animation'] = 'zoom-in';
            $codeless_online_mods_new['blog_pagination_style'] = 'next_prev';
            $codeless_online_mods_new['blog_filters'] = 'fullwidth';
            $codeless_online_mods_new['blog_article_distance'] = 0;

            add_filter( 'codeless_posts_per_page', function(){
                return 13;
            } );
        }

        if( codeless_get_post_id() == 432 ){
            $codeless_online_mods_new['layout_modern'] = 0; 
            $codeless_online_mods_new['page_layout'] = 'fullwidth';
            $codeless_online_mods_new['blog_style'] = 'timeline';
            $codeless_online_mods_new['blog_grid_layout'] = 3;
            $codeless_online_mods_new['blog_animation'] = 'top-t-bottom';
            $codeless_online_mods_new['blog_pagination_style'] = 'load_more';
            $codeless_online_mods_new['blog_entry_meta_author'] = false;
            $codeless_online_mods_new['blog_entry_meta_categories'] = false;
            $codeless_online_mods_new['blog_entry_tools_share'] = false;
            $codeless_online_mods_new['blog_entry_tools_comments_count'] = false;
            $codeless_online_mods_new['blog_button_style'] = 'text-effect';
            $codeless_online_mods_new['blog_article_distance'] = '30';
            $codeless_online_mods_new['blog_entry_title'] = array(
                'letter-spacing' => '0.08em',
                'font-weight' => '600',
                'text-transform' => 'uppercase',
                'font-size' => '13px',
                'line-height' => '20px',
                'color' => '#303133'
            );
            $codeless_online_mods_new['blog_boxed'] = 1;
            $codeless_online_mods_new['blog_overlay'] = 'zoom_color';
            $codeless_online_mods_new['blog_entry_overlay_icon'] = 'lightbox';
            $codeless_online_mods_new['blog_overlay_color'] = 'rgba(0,0,0,0.8)';
        }

         if( codeless_get_post_id() == 3774 ){
            $codeless_online_mods_new['layout_modern'] = 0;
            $codeless_online_mods_new['blog_style'] = 'alternate';
            $codeless_online_mods_new['page_bg_color'] = '#f5f5f5';
            $codeless_online_mods_new['page_layout'] = 'fullwidth';
            $codeless_online_mods_new['blog_pagination_style'] = 'infinite_scroll'; 
            $codeless_online_mods_new['blog_boxed'] = 1;
            $codeless_online_mods_new['blog_animation'] = 'top-t-bottom';
            $codeless_online_mods_new['blog_pagination_style'] = 'load_more';
            $codeless_online_mods_new['blog_excerpt_length'] = 50;
        }



        foreach( $codeless_online_mods_new as $opt => $value ){
            if( ! isset( $codeless_online_mods[ $opt ] ) )
                $codeless_online_mods[ $opt ] = $value;
        } 

        //return $codeless_online_mods;
    }


    function enqueue_files(){
        wp_enqueue_style( 'codeless-online', CODELESS_BASE_URL.'css/codeless-online.css' );
        wp_enqueue_script( 'codeless-online', CODELESS_BASE_URL.'js/codeless-online.js', array('jquery') );
    }

    function data_for_pages(){
        $data = array();


        // Blog Page
        $data[8] = array(
            'options' => array(
                
                array( 
                    'id' => 'page_layout',
                    'name' => 'Blog Layout',
                    'values' => array(
                        array('fullwidth', 'Fullwidth', 'cl_page_layout=fullwidth'),
                        array('left_sidebar', 'Left & Simple', 'cl_page_layout=left_sidebar&cl_sidebar_sticky=0&cl_layout_modern=0'),
                        array('right_sidebar', 'Right Sticky & Modern Style', 'cl_page_layout=right_sidebar&cl_sidebar_sticky=1'),
                        array('dual_sidebar', 'Dual', 'cl_page_layout=dual_sidebar')
                    )
                ),
                array( 
                    'id' => 'blog_pagination_style',
                    'name' => 'Blog Pagination',
                    'values' => array(
                        array('numbers', 'Numbers', 'cl_blog_pagination_style=numbers'),
                        array('next_prev', 'Next / Prev', 'cl_blog_pagination_style=next_prev'),
                        array('load_more', 'Load More', 'cl_blog_pagination_style=load_more'),
                        array('infinite_scroll', 'Infinite Scroll', 'cl_blog_pagination_style=infinite_scroll')
                    )
                ),
                array( 
                    'id' => 'blog_animation',
                    'name' => 'Blog Animation',
                    'values' => array(
                        array('none', 'None', 'cl_blog_animation=none'),
                        array('bottom-t-top', 'Bottom To Top', 'cl_blog_animation=bottom-t-top'),
                        array('alpha-anim', 'Fade In', 'cl_blog_animation=alpha-anim')
                    )
                )
            ),
            'desc' => '<b>Blog Page</b> - Folie offers an unlimited number of customizations
                        for your blog page. Select from various page layouts, blog styles, <b>the new modern sidebar</b>,
                        6 types of different <b>media overlays</b>, <b>lazy loading</b> of images.<br />
                        Possibility to select from simple, load more or <b>infinite scroll</b> pagination. Create a grid or a <b>modern masonry</b> blog. Make a <b>fixed sidebar</b> and <b>animate</b> blog entries.'
        );

        $this->data = $data;

        $this->allowed_list = array(
            'blog_style',
            'blog_boxed',
            'blog_layout',
            'blog_pagination_style',
            'blog_animation',
            'sidebar_sticky',
            'layout_modern',
            'page_bg_color',
            'page_layout',
            'blog_overlay',
            'page_fullwidth_content'

        );
    }

    function output(){
        $id = codeless_get_post_id();
        if( $id == 173 || $id == 305 || $id ==  432 || $id == 363 || $id == 3442)
            $id = 8;

        if( isset( $this->data[ $id ] ) ):
            $page_opt = $this->data[ $id ];
        ?>

        <div class="cl-page-panel cl-panel">
            <div class="cl-panels-buttons">
                <div class="cl-panel-button settings">
                    <i class="cl-icon-gears"></i>
                    <span>Settings</span>
                </div>
                
            </div>
            <div class="cl-panel-container" style="display: none;">
                <div class="page_info">
                    <span>
                        <?php echo $page_opt['desc'] ?>
                    </span>
                </div>

                <?php foreach( $page_opt['options'] as $option ): ?>

                <div class="block">
                    <h6><?php echo $option['name'] ?></h6>

                    <ul>
                        <?php foreach( $option['values'] as $value ): ?>
                            <?php  
                                $selected = '';
                                if( codeless_get_mod( $option['id'] ) == $value[0] )
                                    $selected = 'selected';
                            ?>
                            <li class="<?php echo $selected ?>"><a href="<?php $this->generateLink( $value[2], $option['id'] ) ?>"><?php echo $value[1] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <?php endforeach; ?>

            </div>


        </div>


        <?php

        endif;

    }

    function generateLink( $value, $actual ){        
        $link = get_permalink( codeless_get_post_id() ).'&cl_on&'.$value;
        echo $link;
    }
}

if( ! is_customize_preview() )
    new CodelessOnline();

?>