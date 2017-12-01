<?php get_header(); ?>
               
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <div id="showcase" class="noselect ">
        <a title='audiovisuales' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"8","search-id":"principal"}'>          
          <div class="cloud9-item imagenCategoria">            
            <img src="<?php bloginfo('template_url');?>/imagenes/1.jpg" alt="Item #1">
            <div class="tituloCategoria"><h2>Audiovisuales</h2></div>
            <span class="descripcionCategoria">Expresión artística a través de medios, técnicas y tecnologías del universo audiovisual. Exploración y creación de contenidos en video y fotografía a partir de las vivencias y los diferentes contextos culturales de la ciudad.</span>
          </div> 
        </a>
        <a title='danza' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"2","search-id":"principal"}'>          
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/2.jpg" alt="Item #2">
            <div class="tituloCategoria"><h2>Danza</h2></div>
            <span class="descripcionCategoria">La danza posibilita la exploración y el descubrimiento del lenguaje corporal propio.</span>
          </div>
        </a>
        <a title='artes_plasticas' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"6","search-id":"principal"}'>          
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/3.jpg" alt="Item #3">
            <div class="tituloCategoria"><h2>Creación Digital</h2></div>
            <span class="descripcionCategoria"></span> 
          </div>
        </a>
        <a title='literatura' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"4","search-id":"principal"}'>          
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/4.jpg" alt="Item #4">
            <div class="tituloCategoria"><h2>Literatura</h2></div>
            <span class="descripcionCategoria">La lectura de sueños, contextos y territorios imaginados invitan al juego con el símbolo.</span>
          </div>
        </a>
        <a title='musica' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"3","search-id":"principal"}'>          
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/5.jpg" alt="Item #5">
            <div class="tituloCategoria"><h2>Música</h2></div>
            <span class="descripcionCategoria">Acercarse a la música del mundo es acercarse a su cultura, a sus voces, a sus raíces, a sus
colores, a sus sabores, a su historia en pasado, presente y también futuro.</span>
          </div>
        </a>
        <a title='artes_plasticas' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"7","search-id":"principal"}'>
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/6.jpg" alt="Item #6">
            <div class="tituloCategoria"><h2>Ártes Plásticas</h2></div>
            <span class="descripcionCategoria">En las artes plásticas como lenguaje de expresión el predominio de la fantasía, el deseo, la
memoria  y la exploración acuden en el instante en el que siguiendo una voz, el material
sucumbe ante la habilidad del que modela la forma, el volumen, el plano y el color.</span>
          </div>
        </a>
        <a title='teatro' href='<?= get_home_url(); ?>/busqueda/#sf-{"1":"5","search-id":"principal"}'>
          <div class="cloud9-item imagenCategoria">   
            <img src="<?php bloginfo('template_url');?>/imagenes/7.jpg" alt="Item #7">
            <div class="tituloCategoria"><h2>Teatro</h2></div>
            <span class="descripcionCategoria">El juego dramático lo practican cotidianamente los niños en cualquier lugar, sin escenario
ni espectadores; ordenar este juego y organizarlo es un paso previo para que se convierta
en acción teatral.</span>
          </div>
        </a>
      </div>

      <div id="nav" class="noselect">
        <button class="btn btn-info left">
         &#9668;
        </button>
        <button class="btn btn-info right">
         &#9658;
        </button> 
      </div>    
    </div>                   
  </div>   
  <section class="contenedor-azul">
    <hr class="azul-arriba">
    <div class="azul row">
      <div class=" col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
        <?php if ( is_active_sidebar( 'destacados' ) ) : ?>        
            <?php dynamic_sidebar( 'destacados' ); ?>        
        <?php endif; ?>   
      </div>
    </div>
    <hr class="azul-abajo">
  </section>
  <section class="contenedor-morado">  
    <hr class="morado-arriba">
    <div class="morado row">
      <!--<div class="triangulo-morado-derecha"></div>-->
      <span class="ancla" id="portal"></span><br><br>
      <div class=" col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
        <div class="complementario-izq col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <?php if ( is_active_sidebar( 'quienes_somos_izq' ) ) : ?>        
            <?php dynamic_sidebar( 'quienes_somos_izq' ); ?>        
        <?php endif; ?>  
        </div> 
        <div class="complementario-der col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <?php if ( is_active_sidebar( 'quienes_somos_der' ) ) : ?>        
            <?php dynamic_sidebar( 'quienes_somos_der' ); ?>        
        <?php endif; ?>  
        </div>       
      </div>
    </div>
    <hr class="morado-abajo">
  </section>
  <section class="contenedor-verdeazul">
    <hr class="verdeazul-arriba">
    <div class="verdeazul row">  
      <!--<div class="triangulo-verdeazul-izquierda"></div>--> 
      <span class="ancla" id="nuestrosCrea"></span><br><br>
      <div class="  col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
        <h2 class="titulo">Encuentre su CREA más cercano</h2>
        <?php if ( is_active_sidebar( 'donde_estamos' ) ) : ?>
          <div id="donde-estamos">
            <?php dynamic_sidebar( 'donde_estamos' ); ?>
          </div>
        <?php endif; ?>         
      </div> 
    </div>
    <hr class="verdeazul-abajo"> 
  </section>
  <section class="contenedor-amarillo">
    <hr class="amarillo-arriba">
    <div class="amarillo row">
      <span class="ancla" id="contactenos"></span><br><br><br><br>
      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
        <h2  class="titulo">Contáctanos</h2>
        <?php if ( is_active_sidebar( 'contactenos' ) ) : ?>
          <div id="contactenos">
            <?php dynamic_sidebar( 'contactenos' ); ?>
          </div>
        <?php endif; ?>   
      </div>
    </div>
    <hr class="amarillo-abajo">
  </section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>