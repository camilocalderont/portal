<?php get_header(); ?>
<div class="row">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<article>
		<div class="thumb col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php if(has_post_thumbnail())
					//the_post_thumbnail(array('class' => "thumbnail-100"));
					the_post_thumbnail('medium_large',array('class' => "thumbnail-100"));
			?>
		</div>
		<div class="contenido col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h2><?php the_title();?></h2>
			<div class="date"><?php the_date(); ?><span><?php the_category(); ?></span></div>
			<?php the_content();?>
		</div>			
	</article>
	<?php endwhile; else: ?>
	<h2>No se encontro el Post</h2>
	<?php endif; ?>
	<div id="comentarios" class="row">
		
		<div id="cajaComentarios" class="col-xs-12 col-sm-12col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
			<h3>Comentarios</h3>
			<?php comments_template(); ?>
		</div> 
	</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>