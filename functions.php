<?php
register_nav_menus(array('menu'=>'principal'));

if(function_exists( 'add_theme_support' ))
add_theme_support( 'post-thumbnails' );

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
    wp_register_script( 'portal', get_template_directory_uri() . '/js/portal.js',array(),false,true);
    wp_register_script( 'jquery-scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js',array(),false,true);
    wp_register_script( 'ie-emulation', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js',array(),false,true);
    wp_enqueue_script( 'bootstrap-script' );   
    wp_enqueue_script( 'reflection' ); 
    wp_enqueue_script( 'carousel' ); 
    wp_enqueue_script( 'portal' ); 
    wp_enqueue_script( 'jquery-scrollto');      
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
    wp_enqueue_style( 'estilo-principal' );
    wp_enqueue_style( 'bootstrap-estilo' );
    wp_enqueue_style( 'bootstrap-tema-estilo' );
    wp_enqueue_style( 'reset-navegador' );
}
add_action('wp_enqueue_scripts','portal_cargar_estilos');


?>