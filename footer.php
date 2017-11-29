  <a class="ancla ancla_inicio btn btn-success" href="#inicio">&#9650;</a>

  <div class="header-footer"></div>

  <footer>

  	<div class="container">

      <div class="row">
    		<div class="menu_footer_uno col-md-3 col-xs-6 col-sm-6">

    			<h2 class="block-title">Menú principal</h2>

            	<?php wp_nav_menu(

            		array(

            			'container'=>false,

            			'items_wrap'=>'<ul class="menu-bottom">%3$s</ul>',

            			'theme_location'=>'menu_footer_uno'

            			)

            		);
            	?>  			

    		</div>

    		<div class="menu_footer_dos col-md-3 col-xs-6 col-sm-6">

    			<h2 class="block-title">NOSOTROS</h2>
              <?php wp_nav_menu(

                array(

                  'container'=>false,

                  'items_wrap'=>'<ul class="menu-bottom">%3$s</ul>',

                  'theme_location'=>'menu_footer_dos'

                  )

                );
              ?>  

            <p>

            </p>        

    		</div>

    		<div class="col-md-6 col-xs-12 col-sm-12"> 	

    			<h2 class="block-title">CONTÁCTANOS</h2>

  		    <address>		     

  		      <strong>Dirección Carrera 8 # 15 - 46</strong><br>

  		      Teléfono (571) - 3795750<br>

  		      Email <a href="mailto:#">contactenos@idartes.gov.co</a><br>

  		      Horario de atención al público lunes a viernes 8:00am a 5:30pm<br>    

  		    </address>  
   

  
    		</div>  		
      </div>
    </div>
    <div class="row footer-color">
      <div class="container">
        <div class="col-md-3 col-xs-6 col-sm-6"></div>
        <div class="col-md-3 col-xs-6 col-sm-6"></div>
        <div class="col-md-6 col-xs-12 col-sm-12">
            <p>
              <a href="http://idartes.gov.co/" target="_blank" title="Idartes" id="enlace-alcaldia-footer"><img alt="" src="<?php bloginfo('template_url');?>/imagenes/menu/logo-alcaldia-header.png"></a>    
              <a class="navbar-brand" id="enlace-crea" href="http://www.crea.gov.co/" target="_blank">
                <img src="<?php bloginfo('template_url');?>/imagenes/menu/logo-crea-header.png" alt="Crea - Formación y Creación Artística"/>&nbsp;
              </a>           
          </p>          
        </div>
      </div>
    </div>



  </footer>

	<?php wp_footer(); ?>  

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>   

  <script src="<?php //bloginfo('template_url');?>/js/jquery.reflection.js"></script>

  <script src="<?php //bloginfo('template_url');?>/js/jquery.cloud9carousel.js"></script>  

  <script type="text/javascript" src="<?php //bloginfo('template_url');?>/js/portal.js"></script> -->

  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- <script src="<?php //bloginfo('template_url');?>/js/ie-emulation-modes-warning.js"></script> -->



  </body>

</html>