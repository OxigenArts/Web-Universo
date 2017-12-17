            </div>
        </div>
    </main>
    <footer class="bg-lgray text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">

                	<?php
	                if(get_option('custom_flogo') != "1"){
	                ?>
                    <img class="p-4" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo-footer.svg" width="220px" alt="">
	                <?php
	                }
	                else{
	                    ?>
	                    <img class="p-4" src="<?php echo get_option('flogo'); ?>" width="220px" alt="">
	                    <?php
	                }
	                ?>
                    <hr class="d-block d-sm-none">
                </div>
                <div class="col-md-5 text-center text-md-left">
                    <h5>Acerca de de Universo</h5>
                    <p><?php echo get_option('footer_about');?></p>
                    <hr class="d-block d-sm-none">
                </div>
                <div class="col-md-4">
                    <div class="container">
                    	<h5 class="d-block text-center text-md-left">Secciones</h5>
                        <div class="row ">
                            <div class="col-6 text-left">
                                <p><i class="fa fa-caret-right"></i> Historias</p>
                                <p><i class="fa fa-caret-right"></i> Creatividad</p>
                            </div>
                            <div class="col-6 text-right text-md-left">
                                <p><i class="fa fa-caret-right"></i> ¿Qué somos?</p>
                                <p><i class="fa fa-caret-right"></i> Contacto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer();?>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/popper.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
</body>

</html>