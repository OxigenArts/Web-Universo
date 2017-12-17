<div class="col-md-8 col-lg-9 text-left">
    <div class="container page">
        <div class="post">
            <div class="title px-p pt-p">
                <?php
                    foreach (get_the_category( $post->ID ) as $cat) {
                        ?>
                        <span class="categoria"><?php echo $cat->name; ?></span>
                        <?php
                    }
                ?>
                <h1><?php the_title(); ?></h1>
                <p class="text-muted mb-2"><?php echo get_the_date('l j \d\e F',$post->I);?></p>
            </div>
            <img class="title-img" src="<?php the_post_thumbnail_url('large');?>" alt="">

            <div class="autor px-p">
                <div class="row text-center">
                    <div class="col-md-6 text-md-right py-2">
                        <h4><i class="color fa fa-pencil"></i> Por <?php echo get_post_meta($post->ID, 'redaccion', true); ?></h4>
                    </div>
                    <div class="col-md-6 text-md-left py-2">
                        <h4><i class="color fa fa-camera"></i> Por <?php echo get_post_meta($post->ID, 'fotografia', true); ?></h4>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
            </div>
            <article class="px-p">
                <?php the_content(); ?>
            </article>
            <div class="container social">
                <div class="row text-center pb-0">
                    <div class="col-lg-4 col-12 bg-dark text-white p-0">
                        <div class="container full">
                            <p class="m-0">Si te gustó, compartila</p>
                        </div>

                    </div>
                    <div class="container m-0 col-12 col-lg-8 ">
                        <div class="row">
                            <div class="col-4 btn-fb p-0">
                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                                    <div class="container-fluid p-0">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 btn-tw p-0">
                                <a href="https://twitter.com/home?status=<?php the_title(); ?>%3A%20<?php the_permalink();?>" target="blank">
                                    <div class="container p-0">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 btn-gp p-0">
                                <a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="blank">
                                    <div class="container p-0">
                                        <i class="fa fa-google-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
