<?php get_header(); ?>
<div class="row">
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
        var fondoContenidos=".sf-result li h3 a{ color: "+background+" !important;}";
        //console.log(fondoContenidos.length);
        
        if(estilos.indexOf('.sf-result li h3 a{ color:')==0)
          estilos = estilos.substring(fondoContenidos.length);
        estilos = fondoContenidos + estilos;
        //console.log(estilos);
        jQuery(".sf-wrapper style").html(estilos);

        //background=background+" !important";        
        var header_texto_src=template_url+"/imagenes/banners/"+id_imagen+"-t.png?v=123";
        var header_icono_src=template_url+"/imagenes/banners/"+id_imagen+"-i.png?v=123";
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