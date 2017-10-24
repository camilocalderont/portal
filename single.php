<?php get_header(); ?>
<div class="row">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<article class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
		<div class="contenedorAtras col-xs-12">
			<button onclick="window.history.back()" class="botonAtras btn btn-success">
				<span class="fa fa-reply"></span>
			</button>			
		</div>
		<div class="thumb col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php if(has_post_thumbnail())
					//the_post_thumbnail(array('class' => "thumbnail-100"));
					the_post_thumbnail('medium_large',array('class' => "thumbnail-100"));
			?>
		</div>
		<!-- <d iv class="contenido col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
			<h2><?php the_title();?></h2>
			<div class="date"><?php the_date(); ?><span><?php the_category(); ?></span></div>
			<div class="ratings">
				<?php if(function_exists('the_ratings')){ the_ratings(); } ?>
			</div>
			<?php the_content();?>
		<!-- </div>			 -->
	</article>
	<?php endwhile; else: ?>
	<h2>No se encontro el Post</h2>
	<?php endif; ?>
	<div id="comentarios" class="row">
		
		<div id="cajaComentarios" class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
			<h3>Comentarios</h3>
			<?php comments_template(); ?>
		</div> 
	</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?> 