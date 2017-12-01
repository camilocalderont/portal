<?php get_header(); ?>
<div class="row">
	<header class="container page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Resultados para : %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->	
	<?php $i=0; if(have_posts()): while(have_posts()): the_post(); ?>
	<article class="contenidoBusqueda col-xs-12 col-sm-12 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1">

		<div class="thumb-search col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php if(has_post_thumbnail())
					//the_post_thumbnail(array('class' => "thumbnail-100"));
					the_post_thumbnail('medium',array('class' => "thumbnail-100"));
			?>
		</div>
		<div class="contenido-search col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2><?php the_title();?></h2>
			<div class="date"><?php the_date(); ?><span><?php the_category(); ?></span></div>
			<div class="ratings">
				<?php if(function_exists('the_ratings')){ the_ratings(); } ?>
			</div>
			<?php the_excerpt();?>
		</div> 
	</article>
	<?php $i++; if($i%2==0): ?>
		<div class="clearfix"></div>
	<?php endif; ?>			 
	<?php endwhile; else: ?>
	<h2>No se encontraron Post</h2>
	<?php endif; ?>

	<div class="clearfix"></div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?> 
