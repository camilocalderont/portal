<?php
  global $wpdb;
  $sql="SELECT

  DISTINCT (PM.meta_value) AS 'valor' , PM.meta_key AS 'nombre', '0' AS 'es_categoria'
  FROM ".$wpdb->prefix."postmeta PM WHERE
  PM.meta_key IN
  (
  SELECT 
  DISTINCT(PM.meta_key) 
  FROM ".$wpdb->prefix."postmeta AS PM WHERE 
  PM.meta_value<> 'taxonomy' AND PM.meta_value IS NOT NULL AND 
  PM.meta_key NOT LIKE '%wp%' AND PM.meta_key NOT LIKE '%\_%' AND 
  ASCII(LEFT(PM.meta_key, 1)) BETWEEN ASCII('A') AND ASCII('Z')
  )
  GROUP BY meta_value

  UNION 
  SELECT
  C.name AS 'valor', 'categoria' AS 'nombre',  '1' AS 'es_categoria'
  FROM ".$wpdb->prefix."term_taxonomy AS CT
  JOIN ".$wpdb->prefix."terms AS C ON C.term_id=CT.term_id
  WHERE CT.taxonomy='category' AND CT.count>0 
  ;";
  $results = $wpdb->get_results( $sql, OBJECT );
  $campos=array();

  foreach ($results as $clave => $valor) {
    //$campos[$valor->nombre]= array('items'=>array(),'es_categoria'=>$valor->es_categoria);
    $campos[$valor->nombre]['items'][]=$valor->valor;
    $campos[$valor->nombre]['es_categoria']=$valor->es_categoria;
    # code...
  }
  //No mostar Campos que no se van a usar
  if(isset($campos['Año']))
  unset($campos['Año']);  
  
  if(isset($campos['Código']))
  unset($campos['Código']);  

  if(isset($campos['Participante(s)']))
  unset($campos['Participante(s)']);   
      
  $table_name = $wpdb->prefix.'page_visit';
  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name)
    $hay_plugin_visitas=true;
  else
    $hay_plugin_visitas=false;


  $table_name = $wpdb->prefix.'ratings';
  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name)
    $hay_plugin_ratings=true;
  else
    $hay_plugin_ratings=false;    

  //echo "hay_plugin_ratings: ".$hay_plugin_ratings."</br>";
  //echo "hay_plugin_visitas: ".$hay_plugin_visitas."</br>";

  //echo '<pre>'.print_r($campos,true).'</pre>'; 
?>


<?php get_header(); ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
      <div class="row">
        <div class="sf-filter">
          <?php 
          
          //echo '<pre>'.print_r($results).'</pre>';  
          $legend="";
          $elementos =1;

          foreach ($campos as $clave => $valor) {
            if(sizeof($valor['items'])<=35){
              $elementos++;
              echo "<fieldset class='sf-element select busqueda_elemento'>";
              echo "  <legend>".$clave."</legend>";
              echo "  <select class='".$clave."'>"; 
              echo "    <option ='T'>Todos</option>";
              foreach ($valor["items"] as $key => $value) {
                echo "    <option ='".$value."'>".$value."</option>";
              }
              echo "  </select>";
              echo "</fieldset>";
            }   
            else{
              if($legend=="")
                $legend=$clave;
              else
                $legend.=",".$clave;
            }           
          }
              echo "<fieldset id='contenedor-texto-general' class='sf-element fulltext busqueda_elemento' >";
              echo "  <legend>". /*$legend.*/"Busqueda General</legend>";
              echo "<div class='sf-fulltext-wrapper'>
                      <input placeholder='". $legend."' class='texto-general' data-busqueda='". $legend."'>
                    </div>";
              echo "</fieldset>";    
              //echo 'elementos: '.$elementos;
              if($elementos>0)
              $ancho=(100/$elementos)-2;
              echo "<style>.sf-filter > .busqueda_elemento{width:".$ancho."% !important;}</style>"          
          ?> 
        </div> 
      </div>    
    </div>  
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article>
    <div class="contenido col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
      <h2><?php the_title();?></h2>
      <div id="busqueda_responsive">         
        <button id="boton_busqueda">        
          <span class="fa fa-search"></span>
        </button>
      </div>
      <div class="date"><?php the_date(); ?><span><?php the_category(); ?></span></div>
      <?php the_content();?>
    </div>      
  </article>
  <?php endwhile; else: ?>
  <h2>No se encontro el Post</h2>
  <?php endif; ?>
</div>
<input type="hidden" id="template_url"  value="<?php bloginfo('template_url'); ?>">
<script type="text/javascript">
jQuery(document).ready(function(e){
    jQuery('.header-bg').removeClass('hidden');
    var template_url=jQuery("#template_url").val();
    //alert(jQuery("#template_url").val()); 
    //alert("hola");
    jQuery("#sf-field-1").on('change',function(e){
        var estilos=jQuery(".sf-wrapper style").html();

        
        //alert(jQuery("#sf-field-1").val());
        var background="#cccccc";
        var id_imagen=jQuery(this).val();
        //console.log(JSON.stringify(id_imagen));
        if(id_imagen==""){

          background="#ac1832";
          id_imagen=0; 
        }
        if(id_imagen==2) //Danza
          background="#eb5f46"; 
        else if(id_imagen==3) //Música
          background="#615da7";
        else if(id_imagen==4) //Literatura
          background="#6cbb7a";  
        else if(id_imagen==5) //Teatro
          background="#c5d62e"; 
        else if(id_imagen==6) //Creación Digital
          background="#ffc200"; 
        else if(id_imagen==7) //Artes Plásticas
          background="#1fbad8"; 
        else if(id_imagen==8) //Audiovisuales
          background="#eb597d";   
        var fondoContenidos=".sf-result li a h3{ color: "+background+" !important;} ul.sf-result > li:hover:before, ul.sf-result > li:hover:after{ border-color: "+background+";}";  
        //console.log(fondoContenidos.length);
        
        if(estilos.indexOf('.sf-result li a h3{ color:')==0)
          estilos = estilos.substring(fondoContenidos.length);
        estilos = fondoContenidos + estilos;
        //console.log(estilos);
        jQuery(".sf-wrapper style").html(estilos);

        //background=background+" !important";        
        var header_texto_src=template_url+"/imagenes/banners/"+id_imagen+"-t.png?v=321";
        var header_icono_src=template_url+"/imagenes/banners/"+id_imagen+"-i.png?v=321";
        jQuery('.header-bg').css('background',background);  
        jQuery('#header-texto').css({'background':'url('+ header_texto_src+') left top no-repeat'});        
        jQuery('#header-icono').css({'background':'url('+ header_icono_src+') right top no-repeat'}); 

        jQuery('.sf-filter').css('background',background);                    
    
        //alert("header_image_src:"+header_image_src+" - background: "+background);
    });
    jQuery("#sf-field-1").trigger('change');
});
</script>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>