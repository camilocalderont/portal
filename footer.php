  <a class="ancla_inicio btn btn-success" href="#inicio">&#9650;</a>
  <div class="header-footer"></div>
  <footer>
  	<div class="container">
  		<div class="col-md-3 col-xs-12 col-sm-6">
  			<h2 class="block-title">Menú principal</h2>
          	<?php wp_nav_menu(
          		array(
          			'container'=>false,
          			'items_wrap'=>'<ul id="menu-bottom">%3$s</ul>',
          			'theme_location'=>'menu_footer'
          			)
          		);

          	?>  			
  		</div>
  		<div class="col-md-3 col-xs-12 col-sm-6">
  			<h2 class="block-title">NOSOTROS</h2>
  		</div>
  		<div class="col-md-6 col-xs-12 col-sm-12"> 	
  			<h2 class="block-title">CONTÁCTANOS</h2>
		    <address>		     
		      <strong>Dirección Carrera 8 # 15 - 46</strong><br>
		      Teléfono (571) - 3795750<br>
		      Email <a href="mailto:#">contactenos@idartes.gov.co</a><br>
		      Horario de atención al público lunes a viernes 8:00am a 5:30pm<br>    
		    </address>  
		    <p><a href="http://idartes.gov.co/" target="_blank" title="Idartes"><img alt="" src="<?php bloginfo('template_url');?>/imagenes/logo_web_footer.png" style="height:133px; width:300px"></a></p>				
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