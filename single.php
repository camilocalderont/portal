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

	<div class="clearfix"></div>
	<!--<aside class="row complementario">
		<div class="container"> 
		<h3>Contenido Relacionado</h3>
			<?php 
				/*$orig_post = $post;
				global $post;
				//$tags = wp_get_post_tags($post->ID);
				//var_dump($tags);
				//if ($tags) {
				  //$tag_ids = array();
				  //foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				  $args=array(
				  //'tag_in' => $tag_ids,  
				  'post_not_in' => array($post->ID),
				  'posts_per_page'=>3, // Number of related posts to display.
				  'caller_get_posts'=>1
				  ); 
				//}		  
				$my_query = new wp_query( $args ); */
			?>

			<?php //while($my_query->have_posts()): $my_query->the_post(); ?>
				<div class="relatedthumb col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<a rel="external" href="<?php //the_permalink(); ?>">
						<?php //if(has_post_thumbnail())
								//the_post_thumbnail(array('class' => "thumbnail-100"));
								//the_post_thumbnail('medium_large',array('class' => "thumbnail-100"));
						?><br /> 
						<?php //the_title(); ?>
					</a>
				</div>   
			<?php //endwhile; ?>
			<?php //$post = $orig_post; wp_reset_query();  ?> 		
		</div>
	</aside>--> 
	<div id="comentarios" class="alternativo row">
		
		<div id="cajaComentarios" class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
			<h3>Comentarios</h3>
			<?php comments_template(); ?>
		</div> 
	</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>