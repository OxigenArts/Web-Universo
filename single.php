<?php get_header(); ?>
 <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 text-center p-0">
                    <div class="container ad m-auto">
                        <a href="#"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/ad01.png"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container no-mp">
            <div class="row text-center">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content-single', get_post_format() );
				endwhile; endif; 
			?>
<?php get_sidebar(); ?>

<?php get_footer();setPostViews(get_the_ID()); ?>
