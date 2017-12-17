<?php get_header(); ?>
<div class="container-fluid bg-dgray text-white text-center py-1">
	<h1 class="titulo-pagina"><?php the_title(); ?></h1>
</div>
<main role="main">
        <div class="container no-mp">
            <div class="row text-center">
				<div class="col-md-8 col-lg-9 text-left">
				    <div class="container page px-p py-p">
						<?php 
							if ( have_posts() ) : while ( have_posts() ) : the_post();	
 							the_content(); 
							endwhile; endif; 
						?>
					</div>
				</div>
				<?php get_sidebar(); ?>
				<?php get_footer(); ?>