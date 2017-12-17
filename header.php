<!DOCTYPE html>
<html>
<head>
    <?php
    require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
    ?>
    <title><?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/chunkfive.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/impact.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

    <?php
    if(is_user_logged_in()){
        ?>
            <style>
                .navbar{
                        top:30px;
                    }
                @media screen and (max-width: 782px){
                    
                    .navbar{
                        top:46px;
                    }
                }
            </style>
        <?php
    }?>
    <?php wp_head();?>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dgray">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>">
                <?php
                if(get_option('custom_logo') != "1"){
                ?>
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/img/logo-nav.svg" width="180px" height="35px">
                <?php
                }
                else{
                    ?>
                    <img src="<?php echo get_option('logo'); ?>" height="35px">
                    <?php
                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse text-center" id="nav1">
                <ul class="navbar-nav mr-auto m-auto text-uppercase">
                   <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'text-center',
                        'container_id'      => 'navbar1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );?>
                </ul>
                <div>
                    <ul class="navbar-nav d-inline-block d-md-none d-lg-inline-block">
                        <div class="dropdown  d-block d-lg-inline-block" >
                            <li class="nav-item social-links" data-toggle="dropdown" id="toggleSearch" aria-haspopup="true" aria-expanded="false">
                                <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                            <li class="dropdown-menu dropdown-menu-right" style="width: 250px;" aria-labelledby="toggleSearch">
                                <form method="GET" action="<?php echo home_url( '/' ); ?>" class="form-group px-2 form-inline my-2 my-lg-0 input-group">
                                  <input name="s" class="form-control" type="text" placeholder="Buscar" aria-label="Buscar">
                                  <button class="btn btn-outline-success input-group-addon" type="submit">Buscar</button>
                                </form>
                            </li>
                        </div>     
                        <li class="nav-item social-links d-inline-block">
                            <a class="nav-link" href="<?php echo get_option('facebook_url');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item social-links d-inline-block">
                            <a class="nav-link" href="<?php echo get_option('twitter_url');?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item social-links d-inline-block">
                            <a class="nav-link" href="<?php echo get_option('instagram_url');?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                                   
                    </ul>            
                </div>
            </div>
        </div>
    </nav>
   