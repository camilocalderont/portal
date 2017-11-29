<?php
  global $wpdb;
  $sql="
  SELECT
  C.name AS 'valor', C.term_id AS 'codigo' 'Área' AS 'nombre',  '1' AS 'es_categoria'
  FROM ".$wpdb->prefix."term_taxonomy AS CT
  JOIN ".$wpdb->prefix."terms AS C ON C.term_id=CT.term_id
  WHERE CT.taxonomy='category' AND CT.count>0 
  UNION

  SELECT

  DISTINCT (PM.meta_value) AS 'valor' , '' AS 'codigo', PM.meta_key AS 'nombre', '0' AS 'es_categoria'
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
  ;";
  $results = $wpdb->get_results( $sql, OBJECT );
  $campos=array();
  $campos_visibles = array('Estudiante(s)','Crea','Área');
  foreach ($results as $clave => $valor) {
    //$campos[$valor->nombre]= array('items'=>array(),'es_categoria'=>$valor->es_categoria);
    $campos[$valor->nombre]['items'][]=$valor->valor;
    $campos[$valor->nombre]['es_categoria']=$valor->es_categoria;
  }
      
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
          
          foreach ($campos as $clave => $valor) {
            if(in_array($clave, $campos_visibles)){

              if(sizeof($valor['items'])<=35){              
                $elementos++;              
                echo "<fieldset class='sf-elemento select col-xs-12 col-sm-6 col-md-2 col-lg-2'>";
                echo "  <legend>".$clave."<span class='badge' data-toggle='tooltip' data-placement='top' title='Busca talento por ". $clave."' ><span class='fa fa-info'></span></span></legend>"; 
                echo "  <select data-busqueda='".$clave."' data-categoria='".$valor["es_categoria"]."' class='campo-busqueda'>"; 
                echo "    <option ='Todos'>Todos</option>";
                foreach ($valor["items"] as $key => $value) {
                  echo "    <option ='".$value."'>".$value."</option>";
                }
                echo "  </select>";
                echo "</fieldset>";
              }
              else{
                echo "<fieldset class='sf-elemento fulltext col-xs-12 col-sm-6 col-md-2 col-lg-2' >";
                echo "  <legend>".$clave." <span class='badge' data-toggle='tooltip' data-placement='top' title='Busca talento por ". $clave."' ><span class='fa fa-info'></span></span></legend>";
                echo "<div class='sf-fulltext-wrapper'>
                        <input placeholder='".$clave."' data-busqueda='".$clave."' data-categoria='".$valor["es_categoria"]."' class='campo-busqueda'>
                      </div>";
                echo "</fieldset>";  
              }   
            }
            else{
              if($legend=="")
                $legend=$clave;
              else
                $legend.=",".$clave;
            }           
          }
              echo "<fieldset id='contenedor-texto-general' class='sf-elemento fulltext col-xs-12 col-sm-6 col-md-5 col-lg-5' >";
              echo "  <legend>Busqueda General <span class='badge' data-toggle='tooltip' data-placement='top' title='Intenta buscar por ". $legend."'><span class='fa fa-info'></span></span></legend>";
              echo "<div class='sf-fulltext-wrapper'>
                      <input placeholder='Encuentra más contenidos'  data-busqueda='". $legend."' data-categoria='".$valor["es_categoria"]."' class='campo-busqueda texto-general'>
                    </div>";
              echo "</fieldset>";  

              echo "<fieldset  class='sf-elemento fulltext col-xs-12 col-sm-6 col-md-1 col-lg-1'>";
              echo "  <legend>Ordenar por</legend>";
              echo "  <select id='order-by' class='campo-busqueda' data-busqueda='order-by'>"; 
              echo "    <option ='Todos'>Todos</option>";
              if($hay_plugin_ratings)
              echo "    <option ='P'>Puntaje</option>";
              if($hay_plugin_visitas)
              echo "    <option ='V'>Visitas</option>";            
              echo "  </select>";
            
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
          background="#00A19A"; 
        else if(id_imagen==3) //Música
          background="#871628";
        else if(id_imagen==4) //Literatura
          background="#064150";  
        else if(id_imagen==5) //Teatro
          background="#96BE1F"; 
        else if(id_imagen==6) //Creación Digital
          background="#F5A71E"; 
        else if(id_imagen==7) //Artes Plásticas
          background="#2184C6"; 
        else if(id_imagen==8) //Audiovisuales
          background="#522671";   
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