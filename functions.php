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
    //wp_register_script( 'jquery-internet',  'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',array(),false,true);
    /*wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,true);
     //wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) ,false,true);
    //wp_register_script($handle, $src, $deps = array(), $ver = false, $in_footer = false )
    wp_register_script( 'no-conflict', get_template_directory_uri() . '/js/no-conflict.js',array('jquery'),false,true);
    wp_register_script( 'reflection', get_template_directory_uri() . '/js/jquery.reflection.js',array('jquery'),false,true);
    wp_register_script( 'carousel', get_template_directory_uri() . '/js/jquery.cloud9carousel.js',array('jquery'),false,true);   
    wp_register_script( 'jquery-scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js',array('jquery'),false,true);
    wp_register_script( 'jquery-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed-min.js',array('jquery'),false,true); 
    wp_register_script( 'portal', get_template_directory_uri() . '/js/portal.js',array('jquery'),false,true);
    wp_register_script( 'ie-emulation', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js',array(),false,true);
    //wp_enqueue_script( 'jquery-internet');   
    wp_enqueue_script( 'bootstrap-script');  
    wp_enqueue_script( 'no-conflict' );   
    wp_enqueue_script( 'reflection' ); 
    wp_enqueue_script( 'carousel' ); 
    wp_enqueue_script( 'jquery-scrollto');      
    wp_enqueue_script( 'jquery-scrolltofixed');       
    wp_enqueue_script( 'portal' );
    wp_enqueue_script( 'ie-emulation' );  */

  
    wp_register_script( 'no-conflict', get_template_directory_uri() . '/js/no-conflict.js',array('jquery'),false,false);
    wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,false);
    wp_register_script( 'reflection', get_template_directory_uri() . '/js/jquery.reflection.js',array('jquery'),false,false);
    wp_register_script( 'carousel', get_template_directory_uri() . '/js/jquery.cloud9carousel.js',array('jquery'),false,false);   
    wp_register_script( 'jquery-scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js',array('jquery'),false,false);
    wp_register_script( 'jquery-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed-min.js',array('jquery'),false,false);  
    wp_register_script( 'portal', get_template_directory_uri() . '/js/portal.js',array('jquery'),false,false);
    wp_register_script( 'busqueda', get_template_directory_uri() . '/js/busqueda.js',array('jquery'),false,false);
    wp_register_script( 'ie-emulation', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js',array(),false,false);
    wp_enqueue_script( 'no-conflict' );   
    wp_enqueue_script( 'bootstrap-script' );   
    wp_enqueue_script( 'reflection' ); 
    wp_enqueue_script( 'carousel' ); 
    wp_enqueue_script( 'jquery-scrollto');      
    wp_enqueue_script( 'jquery-scrolltofixed');        
    wp_enqueue_script( 'portal' );
    wp_enqueue_script( 'busqueda' ); 
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



/*function checkUser() {

    $userid = $_POST['user']; //validation also :)
    $oMySQL = new MySQL();
    $query = "Select * FROM videotable WHERE uid = '$userid'";
    $oMySQL->ExecuteSQL($query);
    $bb = $oMySQL->iRecords;
    $aa = $oMySQL->aResult;
    echo $bb;

    if ($bb == 0){
    $query = "INSERT INTO videotable VALUES ('','$userid','true')";
    $oMySQL->ExecuteSQL($query);
    echo 'true';
        exit();

    } else {
    $sharing = mysql_result($aa,0,"share");
    echo $sharing;
    exit();

    }
}*/

add_action('wp_head','ajaxurl');
function ajaxurl() {
?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}

add_action('wp_ajax_busqueda', 'busqueda');
add_action('wp_ajax_nopriv_busqueda', 'busqueda');

function busqueda(){
    $datos=$_POST['campos'];
    echo print_r($_POST,true);
    $selectOrderBy="";
    $orderBy="";
    $where="";
    $having="";
    global $wpdb;
    foreach ($datos as $campo) {
        # code...
        if($campo["campo"]=="order-by"){
            if($campo["valor"]=="Puntaje"){
                $selectOrderBy=",(SELECT AVG(PR.rating_rating) FROM portal_ratings AS PR WHERE PR.rating_postid=P.ID) AS 'puntaje'";
                $orderBy="ORDER BY puntaje DESC";
            }else{ //Visitas
                $selectOrderBy="(SELECT SUM(PV.page_visit) FROM portal_page_visit AS PV WHERE PV.page_id=P.ID) AS 'visitas'";
                $orderBy="ORDER BY visitas DESC";
            }
        }else{
            if($campo['categoria']){
                $where=" AND TR.term_taxonomy_id=".$campo['valor'];
            }
            else{
                if($having=="")
                    $having=" HAVING SUM(FIND_IN_SET(PM.meta_key,'".$campo['campo']."')) > 0  AND SUM(PM.meta_value=".$campo['valor'].") > 0  ";  
                else 
                    $having=" AND SUM(FIND_IN_SET(PM.meta_key,'".$campo['campo']."')) > 0 AND SUM(PM.meta_value=".$campo['valor'].") > 0  ";  
            }
        } 
    }

    $sql="  SELECT P.* ".$selectOrderBy."
            FROM portal_posts AS P
            JOIN portal_postmeta AS PM ON PM.post_id=P.ID
            JOIN portal_term_relationships AS TR ON TR.object_id=P.ID
            WHERE P.post_type='post' ".$where."
            GROUP BY P.ID ".$having." ".$orderBy.";";
    echo $sql;            
    //$posts= $wpdb->get_results( $sql, OBJECT );    
    //echo print_r($_POST,true);
}

?>