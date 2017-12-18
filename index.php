<?php get_header();?>
 <main role="main">
        <div class="container no-mp">
            <div class="row text-center">
            	<div class="container slider">
				    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				        <div class="carousel-inner">
				            <div class="carousel-item active" style="background-image: url('http://portaluniverso.com/media/contents/067220b239212956ecca89de1218a8a3.jpg');">
				            </div>
				            <div class="carousel-item" style="background: url('http://portaluniverso.com/media/contents/067220b239212956ecca89de1218a8a3.jpg');">
				            </div>
				            <div class="carousel-item" style="background: url('http://portaluniverso.com/media/contents/067220b239212956ecca89de1218a8a3.jpg');">
				            </div>
				        </div>
				        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				            <span class="sr-only">Previous</span>
				        </a>
				        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				            <span class="carousel-control-next-icon" aria-hidden="true"></span>
				            <span class="sr-only">Next</span>
				        </a>
				    </div>
				</div>
				<div class="col-md-8 col-lg-9 text-left">
				    <div class="container page px-p py-p">
				    	 <h5><i class="color fa fa-clock-o color"></i> LO ÚLTIMO</h5>
						<div class="row row-tile text-center">

					        <?php 
							if ( have_posts() ){
								while ( have_posts() ){
								 the_post();
								 get_template_part( 'content', get_post_format() );
								}			         
							} 
					        ?>
					        </div>
					    </div>

					</div>

					<?php get_sidebar(); ?>
					<div class="container social p-4">
		                <div class="row text-center pb-0">
		                    <div class="col-lg-4 col-12 bg-dark text-white p-0">
		                        <div class="container full">
		                            <p class="m-0">Encontranos en</p>
		                        </div>

		                    </div>
		                    <div class="container m-0 col-12 col-lg-8 ">
		                        <div class="row">
		                            <div class="col-4 btn-fb p-0">
		                                <a href="<?php echo get_option('facebook_url');?>" target="blank">
		                                    <div class="container-fluid p-0">
		                                        <i class="fa fa-facebook"></i>
		                                    </div>
		                                </a>
		                            </div>
		                            <div class="col-4 btn-tw p-0">
		                                <a href="<?php echo get_option('twitter_url');?>" target="blank">
		                                    <div class="container p-0">
		                                        <i class="fa fa-twitter"></i>
		                                    </div>
		                                </a>
		                            </div>
		                            <div class="col-4 btn-ig p-0">
		                                <a href="<?php echo get_option('instagram_url');?>" target="blank">
		                                    <div class="container p-0">
		                                        <i class="fa fa-instagram"></i>
		                                    </div>
		                                </a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
					<?php get_footer(); ?>
