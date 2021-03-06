<?php


/**
 * Register our sidebars and widgetized areas.
 *
 */

// Remove WP Version From Styles    
//add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
//add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 ); 

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    $version=random_int(1, 9999);
    $src=$src.'?ver='.$version;
    return $src;
}

//Modificar el botón de busqueda
add_filter('get_search_form', 'estilo_busqueda');
 
function estilo_busqueda($text) {
     $text = str_replace('id="searchsubmit"', 'id="searchsubmit" class="fa fa-input"', $text); 
     $text = str_replace('value="Buscar"', 'value="&#xf002"', $text); 
     return $text; 
}

//Modificar el botón de leer más
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function modify_read_more_link() {
    return '<div class="clearfix"></div><a class="more-link btn btn-info" href="' . get_permalink() . '">Leer más</a>';
}


function widgets_portal() {


    register_sidebar( array(
        'name'          => 'Busqueda Header',
        'id'            => 'busqueda-header',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );    

    register_sidebar( array(
        'name'          => 'Contenido Destacado',
        'id'            => 'destacados',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );


    register_sidebar( array(
        'name'          => 'Donde Estamos',
        'id'            => 'donde_estamos',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Quienes Somos Izquierda',
        'id'            => 'quienes_somos_izq',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="titulo-complementario-izq">',
        'after_title'   => '</h2>',
    ) ); 

    register_sidebar( array(
        'name'          => 'Quienes Somos Derecha',
        'id'            => 'quienes_somos_der',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="titulo-complementario-der">',
        'after_title'   => '</h2>',
    ) );   

    
    register_sidebar( array(
        'name'          => 'Contáctenos',
        'id'            => 'contactenos',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );     

}
add_action( 'widgets_init', 'widgets_portal' );



register_nav_menus(array(
    'menu_principal'=>'principal',
    'menu_footer_uno'=>'areas',
    'menu_footer_dos'=>'nosotros'
));

if(function_exists( 'add_theme_support' ))
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 50, true );

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
    wp_register_script( 'busqueda', get_template_directory_uri() . '/js/busqueda.js',array('jquery'),'11',false); 
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
    wp_register_style('estilo-principal',get_template_directory_uri().'/style.css',array(),'3','all');
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
    
    //$total_posts=0;
    $posts = new WP_Query(array ('post_type'=> 'post','post_status'=>'publish'));  
    $total_posts =$posts->found_posts;
    

    $datos=$_POST['campos'];
    //echo print_r($_POST,true);
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
                    $having=" HAVING SUM(FIND_IN_SET(PM.meta_key,'".$campo['campo']."')) > 0  AND SUM(PM.meta_value='".$campo['valor']."') > 0  ";  
                else 
                    $having=" AND SUM(FIND_IN_SET(PM.meta_key,'".$campo['campo']."')) > 0 AND SUM(PM.meta_value='".$campo['valor']."') > 0  ";   
            }
        } 
    }
    $items_per_page = 9;
    $page = isset( $_POST['pagina'] ) ? abs( (int) $_POST['pagina'] ) : 1;  
    $sql="  SELECT P.* ".$selectOrderBy."
            FROM portal_posts AS P
            JOIN portal_postmeta AS PM ON PM.post_id=P.ID
            JOIN portal_term_relationships AS TR ON TR.object_id=P.ID
            WHERE P.post_type='post' ".$where."
            GROUP BY P.ID ".$having." ".$orderBy; 
    //echo $sql;            
    $sqlTotal=" SELECT COUNT(1) as total FROM (".$sql.") AS t;";
    $sql.=" LIMIT ".($page-1)*$items_per_page.",".$items_per_page." ;";
    $contenidos= $wpdb->get_results( $sql, OBJECT ); 
    $totalContenidos=$wpdb->get_results( $sqlTotal, OBJECT );  
    //$count_posts =sizeof($contenidos);
    //echo print_r( $totalContenidos,true);
     $totalContenidos=$totalContenidos[0]->total;
    
    $html = "<div class='sf-result-head'><span class='sf-foundcount'>".$totalContenidos." Resultados</span> de <span class='sf-totalcount'>".$total_posts." contenidos<span></div>";
    $html.= "<ul class='sf-result'>";
    foreach ($contenidos as $contenido) {
        $html.= "<li class='col-xs-12 col-sm-6 col-md-3 col-lg-3'>";
        $html.= "<a href='".get_permalink($contenido->ID)."'>";
        $html.= "   <h3>".get_the_title($contenido->ID)."</h3>"; 
        $html.= "   <div style='float:left; width: 100%' class='text-center'>";
        $html.=            get_the_post_thumbnail($contenido->ID,array('class' => "thumbnail-search"));
        $html.= "   </div>";
        $html.= "   <p><small>".get_the_date( 'D M j',$contenido->ID)."</small><br>". get_the_excerpt($contenido->ID)."</p>";
        $html.= "</a>";
        $html.= "</li>";
    }
    //$html.= get_the_posts_pagination();       
    $html.= "</ul>";      
    echo $html; 
    echo '<div class="pagination">';
    echo paginate_links( array(
            'base' => add_query_arg( 'pagina', '%#%' ),
            'format' => '', 
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'total' => ceil($totalContenidos / $items_per_page),  
            'current' => $page
        ));  
    echo '</div>';
    wp_die();
}

?>