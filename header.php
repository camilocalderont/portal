<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Portal de Contenidos Clan</title>
  <meta name="viewport" content="witdh=device-width, initial-scale=1.0">
  <meta name="description" content="Portal de Contenidos CREA">

  <?php wp_head(); ?>
  
  <!-- Le styles -->

  <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css">  --> 
  <!-- <link rel="stylesheet" type="text/css" href="<?php //bloginfo('stylesheet_url');?>?v=1.1">   
  <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_url');?>/css/bootstrap.css?v=1.0">
  <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_url');?>/css/bootstrap-theme.min.css"> -->
  <!--<link href="css/bootstrap-responsive.css" rel="stylesheet">-->
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->  

</head>
<body>
  <header class="row">
    <span class="ancla" id="inicio"></span>
    <div class="banner">
      <div class="container">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
              <img src="<?php bloginfo('template_url');?>/imagenes/menu/logo-portal-header.png" alt="Portal de Contenidos"/>&nbsp;
            </a>   
            <a class="navbar-brand" href="https://www.clan.gov.co">
              <img src="<?php bloginfo('template_url');?>/imagenes/menu/logo-crea-header.png" alt="Crea - Formación y Creación Artística"/>&nbsp;
            </a>    
            <div class="social">
            <a  class="icono" href="https://www.facebook.com/creaidartes/">
              <img src="<?php bloginfo('template_url');?>/imagenes/menu/sociales-02.png" alt="Facebook de Crea - Formación y Creación Artística"/>&nbsp;
            </a>  
            <a  class="icono" href="https://twitter.com/CreaIdartes">
              <img src="<?php bloginfo('template_url');?>/imagenes/menu/sociales-03.png" alt="Twitter de Crea - Formación y Creación Artística"/>&nbsp;
            </a>                            
            </div>             
      </div>
    </div>
    <div id="menu_responsive">
      <h2>Menu</h2>
      <button id="boton_menu">        
        <span class="linea"></span>
        <span class="linea"></span>
        <span class="linea"></span>
      </button>
    </div>
    <div id="contenedorMenu">
      <nav class="navbar" role="navigation">
        <div class="container">
            	<?php wp_nav_menu(
            		array(
            			'container'=>false,
            			'items_wrap'=>'<ul id="menu-top" class="nav navbar-nav multi-level">%3$s</ul>',
            			'theme_location'=>'menu'
            			)
            		);

            	?>
        </div>
      </nav>
    </div>
    <div class="container header-bg">
    </div>
  </header>