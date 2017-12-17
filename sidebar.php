<div class="col-md-4 col-lg-3 mx-auto text-left pl-md-0">
    <div class="container page sidebar">
        <article>
            <a href="#"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/acds.png" alt="anuncio"></a>
            <hr>
        </article>
        <article>
            <h4><i class="color fa fa-bar-chart"></i> Encuestas</h4>
            <p>¿Estás de acuerdo con el aumento del menú? </p>
            <form class="form ">
                <div class="form-check pl-4">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio"  name="rad" id="rad1" checked>
                        Si. Estoy de acuerdo.
                    </label></br>

                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="rad" id="rad2">
                        No. Me parece una locura.
                    </label></br>

                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="rad"  id="rad3">
                        Me da igual.
                    </label>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Votar">
                </div>
            </form>
            <hr>
        </article>
        <article>
            <h4><i class="color fa fa-users"></i> Mas visitadas</h4>
            <?php
            $popmaxcount = 3;
            $popcount = 0;
			query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
			if (have_posts()) : while (have_posts() && $popcount < $popmaxcount) : the_post();
			?>
				<div class="sidebar-post">
	                <a href="<?php the_permalink(); ?>">
	                    <img src="<?php the_post_thumbnail_url('large');?>" class="mb-2">
	                    <i class="fa fa-caret-right"></i>
	                    <p><?php the_title(); ?></p>
	                </a>
	            </div>
			<?php
			$popcount++;
			endwhile; endif;
			wp_reset_query();
			?>     
        </article>
    </div>
</div>