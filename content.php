<a href="<?php the_permalink(); ?>" class="col-12 col-lg-6 tile square my-none mx-auto" style="background:url('<?php echo get_bloginfo('template_directory'); ?>/img/post-overlay.png'), url('<?php the_post_thumbnail_url('thumbnail');?>');background-size: cover;background-position: center;">
	<div >
		<div class="title-content">
			<?php
			if(strlen(get_the_title($post->ID)) >= 58){
				$class="relargo";
			}else if(strlen(get_the_title($post->ID)) >= 40){
				$class="largo";
			}else if(strlen(get_the_title($post->ID)) >= 20){
				$class="medio";
			}else{
				$class="corto";
			}
			?>
			<div class="text <?php echo $class; ?>">
				<p class="categoria"><?php echo get_the_category( $post->ID )[0]->name; ?></p>
				<h1 ><?php the_title(); ?></h1>
				<p class="autor">Por <?php echo get_post_meta( $post->ID,'redaccion',true); ?></p>
			</div>
		</div>
	</div>
</a>