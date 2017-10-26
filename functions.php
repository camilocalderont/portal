<?php


/**
 * Register our sidebars and widgetized areas.
 *
 */

// Remove WP Version From Styles    
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    $version=random_int(1, 9999);
    $src=$src.'?ver='.$version;
    return $src;
}

function widgets_quienes_Somos() {

    register_sidebar( array(
        'name'          => 'Quienes Somos',
        'id'            => 'quienes_somos',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'widgets_quienes_Somos' );

function widget_donde_estamos() {

    register_sidebar( array(
        'name'          => 'Donde Estamos',
        'id'            => 'donde_estamos',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'widget_donde_estamos' );


function widgets_contactenos() {

    register_sidebar( array(
        'name'          => 'Contáctenos',
        'id'            => 'contactenos',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'widgets_contactenos' );



register_nav_menus(array(
    'menu_principal'=>'principal',
    'menu_footer_uno'=>'areas',
    'menu_footer_dos'=>'nosotros'
));

if(function_exists( 'add_theme_support' ))
add_theme_support( 'post-thumbnails' );


function agregar_favicon(){ ?> 
    <!-- Custom Favicons -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri();?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri();?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri();?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri();?>/favicon/manifest.json">
    <link rel="mask-icon" href="<?= get_template_directory_uri();?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">    
    <?php 
}

add_action('wp_head','agregar_favicon');


function portal_cargar_scripts()
{
    // Register the script like this for a plugin:
    //wp_register_script( 'custom-script', plugins_url( '/js/custom-script.js', __FILE__ ) );
    // or
    // Register the script like this for a theme:
    //wp_enqueue_script('jquery');
    wp_register_script( 'bootstrap-script',  'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',array(),false,true);
    wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js',array(),false,true);
     //wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) ,false,true);
    //wp_register_script($handle, $src, $deps = array(), $ver = false, $in_footer = false )
    wp_register_script( 'reflection', get_template_directory_uri() . '/js/jquery.reflection.js',array(),false,true);
    wp_register_script( 'carousel', get_template_directory_uri() . '/js/jquery.cloud9carousel.js',array(),false,true);   
    wp_register_script( 'jquery-scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js',array(),false,true);
    wp_register_script( 'jquery-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed-min.js',array(),false,true);
    wp_register_script( 'jquerypp-custom', get_template_directory_uri() . '/js/jquerypp.custom.js',array(),false,true);
    wp_register_script( 'jquery-bookblock', get_template_directory_uri() . '/js/jquery.bookblock.min.js',array(),false,true);    
    wp_register_script( 'portal', get_template_directory_uri() . '/js/portal.js',array(),false,true);
    wp_register_script( 'flip-js', get_template_directory_uri() . '/js/flip.js',array(),false,true);
    wp_register_script( 'ie-emulation', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js',array(),false,true);
    wp_enqueue_script( 'bootstrap-script' );   
    wp_enqueue_script( 'reflection' ); 
    wp_enqueue_script( 'carousel' ); 
    wp_enqueue_script( 'jquery-scrollto');      
    wp_enqueue_script( 'jquery-scrolltofixed');       
    wp_enqueue_script( 'jquerypp-custom' ); 
    wp_enqueue_script( 'jquery-bookblock' ); 
    wp_enqueue_script( 'portal' ); 
     wp_enqueue_script( 'flip-js' ); 
    wp_enqueue_script( 'ie-emulation' );  
}
add_action( 'wp_enqueue_scripts', 'portal_cargar_scripts' );

function portal_cargar_estilos()
{
    wp_register_style('estilo-principal',get_template_directory_uri().'/style.css',array(),false,'all');
    //wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    wp_register_style( 'bootstrap-estilo', get_template_directory_uri() . '/css/bootstrap.css',array(),false,'all');
    wp_register_style( 'bootstrap-tema-estilo', get_template_directory_uri() . '/css/bootstrap-theme.min.css',array(),false,'all');
	wp_register_style( 'reset-navegador', get_template_directory_uri() . '/css/normalize.css', array(),false,'all');
    wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(),false,'all');
    wp_register_style( 'bookblock', get_template_directory_uri() . '/css/bookblock.css', array(),false,'all');
     wp_register_style( 'flip-css', get_template_directory_uri() . '/css/flip.css', array(),false,'all');
     wp_register_style( 'fa', get_template_directory_uri() . '/css/font-awesome-4.7.0/css/font-awesome.min.css', array(),false,'all');
    wp_enqueue_style( 'estilo-principal' );
    wp_enqueue_style( 'bootstrap-estilo' );
    wp_enqueue_style( 'bootstrap-tema-estilo' );
    wp_enqueue_style( 'reset-navegador' );
    wp_enqueue_style( 'animate' );
    wp_enqueue_style( 'bookblock' );
    wp_enqueue_style( 'flip-css' );
    wp_enqueue_style( 'fa' );
}
add_action('wp_enqueue_scripts','portal_cargar_estilos');



?>