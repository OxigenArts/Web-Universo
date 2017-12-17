<?php get_header();?>
 <main role="main">
        <div class="container no-mp">
            <div class="row text-center">
            	
				<div class="col-md-8 col-lg-9 text-left">
				    <div class="container page px-p py-p">
						<div class="row row-tile text-center">
					        <?php 
					        if ( have_posts() ) : while ( have_posts() ) : the_post();

					            get_template_part( 'content', get_post_format() );

					        endwhile; endif; 
					        ?>
					        </div>
					    </div>
					</div>
					<?php get_sidebar(); ?>
					<?php get_footer(); ?>
