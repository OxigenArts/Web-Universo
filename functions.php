<?php
setlocale(LC_ALL,”es_ES”);
add_theme_support( 'post-thumbnails' );


//Popular Views


function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


//Image sizes

add_image_size( 'home-img', 340, 340,array( 'center', 'center') );
add_image_size( 'category-img', 540, 300,array( 'center', 'center') );
add_image_size( 'post-img', 850, 450,true);
add_image_size( 'slider-img', 1024, 1024);

//Theme settings















function add_theme_menu_item()
{
	add_menu_page("Universo", "Universo", "manage_options", "theme-panel", "theme_settings_page", null, 20);
	add_submenu_page("theme-panel", "Encuestas","Encuestas", "manage_options", "theme-encuentas", "theme_encuestas_page");
	$menuParent = null;
	if(get_option("devel_mode") == "1"){
		$menuParent = "theme-panel";
	}

	add_submenu_page($menuParent, "Desarrollador","Desarrollador", "manage_options", "devel", "theme_devel");
}

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );


function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_instagram_element()
{
	?>
    	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
    <?php
}
function display_footer_about()
{
	?>
		<textarea rows="4" cols="50" name="footer_about" id="footer_about" ><?php echo get_option('footer_about'); ?> </textarea>
    <?php
}
function logo_display()
{
	?>
        <input type="file" name="logo" /> </br>
        <?php echo get_option('logo'); ?>
   <?php
}
function flogo_display()
{
	?>
        <input type="file" name="flogo" /> </br>
        <?php echo get_option('flogo'); ?>
   <?php
}

function handle_logo_upload()
{
	if(!empty($_FILES["logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return get_option('logo');
}
function display_custom_logo_element()
{
	?>
		<input type="checkbox" name="custom_logo" value="1" <?php checked(1, get_option('custom_logo'), true); ?> /> 
	<?php
}
function handle_flogo_upload()
{
	if(!empty($_FILES["flogo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["flogo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	return get_option('flogo');
}
function display_custom_flogo_element()
{
	?>
			<input type="checkbox" name="custom_flogo" value="1" <?php checked(1, get_option('custom_flogo'), true); ?> /> 
	<?php
}
function change_form_enc() {
    echo "<script type='text/javascript'>
              jQuery(document).ready(function(){
                  jQuery('form').attr('enctype','multipart/form-data');
              });
          </script>";
}



if ( is_admin() ) {

    add_action('admin_head', 'change_form_enc');
}

function display_encuesta_opciones()
{
	?>
	<script type="text/javascript">
		var count = 3;
 		jQuery(document).ready(function() {
		    var max_fields      = 10; //maximum input boxes allowed
		    var wrapper         = jQuery(".campos_add"); //Fields wrapper
		    var add_button      = jQuery(".add_field_button"); //Add button ID
		   
		    var x = 1; //initlal text box count
		    jQuery(add_button).click(function(e){ //on add input button click
		        e.preventDefault();
		        if(x < max_fields){ //max input box allowed
		            x++; //text box increment
		            jQuery(wrapper).append('<div><input style="width:100%" type="text" placeholder="'+count+'º opción" name="encuesta_opciones['+(count-1)+']"/></div>'); //add input box
		            count++;
		        }
		    });
		});
 	</script>
 	<div  class="campos_add">
 		
	    <div><input style="width:100%" type="text" placeholder="1º opción" name="encuesta_opciones[0]"></div>
	    <div><input style="width:100%" type="text" placeholder="2º opción" name="encuesta_opciones[1]"></div>
	</div>
	<div align="center"><button class="add_field_button">Agregar</button></div>
	<?php
}
function display_devel()
{
	?>
			<input type="checkbox" name="devel_mode" value="1" <?php checked(1, get_option('devel_mode'), true); ?> /> 
	<?php
}
function display_theme_panel_fields()
{
	//Universo Menu

	//Social Options
	add_settings_section("section", "Redes Sociales", null, "social-options");
	
	add_settings_field("twitter_url", "Link del perfil de Twitter", "display_twitter_element", "social-options", "section");
    add_settings_field("facebook_url", "Link del perfil de Facebook", "display_facebook_element", "social-options", "section");
    add_settings_field("instagram_url", "Link del perfil de Instagram", "display_instagram_element", "social-options", "section");
    
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "instagram_url");


    //Footer Options
	add_settings_section("section", "Pie de pagina", null, "footer-options");

    add_settings_field("footer_about", 'Texto "Acerca de Universo"', "display_footer_about", "footer-options", "section");
 	add_settings_field("custom_flogo", "¿Usar otro logo?", "display_custom_flogo_element", "footer-options", "section");
    add_settings_field("flogo", "Logo", "flogo_display", "footer-options", "section");  
    
    register_setting("section", "footer_about");
    register_setting("section", "custom_flogo");
	register_setting("section", "flogo", "handle_flogo_upload");
    

    //Home Options
	add_settings_section("section", "Pagina principal", null, "home-options");
 	
 	add_settings_field("custom_logo", "¿Usar otro logo?", "display_custom_logo_element", "home-options", "section");
   	add_settings_field("logo", "Logo", "logo_display", "home-options", "section");  
   
    register_setting("section", "custom_logo");
    register_setting("section", "logo", "handle_logo_upload");

    //Encuestas Menu

    add_settings_section("enc_sec", "Nueva Encuesta", null, "encuestas-options");
 	add_settings_field("encuesta_opciones", "Opciones:", "display_encuesta_opciones", "encuestas-options", "enc_sec");

    register_setting("enc_sec", "encuesta_opciones");

    //Developer Menu

    add_settings_section("devel_sec", "Desarrollador", null, "devel-options");
 	add_settings_field("devel_mode", "Modo Desarrollador:", "display_devel", "devel-options", "devel_sec");

    register_setting("devel_sec", "devel_mode");

}

add_action("admin_init", "display_theme_panel_fields");

function theme_encuestas_page(){
	?>
	<form method="post" action="options.php">
		<?php
	$datos = get_option('encuesta_opciones');
	if(is_array($datos) || is_object($datos)){
		foreach ($datos as $key => $value) {
	 	?>
	 		<h1><?php echo $key+1; ?>º Opción: <?php echo $value?></h1>
	 	<?php
	 	}
	}
 	settings_fields("enc_sec");
	do_settings_sections("encuestas-options");
	submit_button(); 
	?>
	</form>
		<?php
}
function theme_devel(){
	?>
	<form method="post" action="options.php">
	<?php
 	settings_fields("devel_sec");
	do_settings_sections("devel-options");
	submit_button(); 
	?>
	</form>
	<?php
}

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	 	 <h1>Configurar tema Universo</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	             ?><hr><?php
	            do_settings_sections("home-options");  
	            ?><hr><?php
	            do_settings_sections("social-options"); 
	             ?><hr><?php 
	            do_settings_sections("footer-options");  
	             ?><hr><?php
	            submit_button(); 
	        ?>          
	    </form>
	    <hr>
	     
		</div>
	<?php
}

function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'tools.php' );                //Plugins
  remove_menu_page( 'upload.php' );   
  remove_menu_page( 'edit-tags.php?taxonomy=post_tag' );
}




function adjust_the_wp_menu() {
	remove_submenu_page( 'options-general.php', 'options-discussion.php');
	remove_submenu_page( 'options-general.php', 'options-media.php');
	remove_submenu_page( 'options-general.php', 'options-permalink.php');
}
add_action("admin_menu", "add_theme_menu_item");














//Post propieties
add_action( 'add_meta_boxes', 'crear_metabox_autores' );
function crear_metabox_autores()
{
  add_meta_box( 'autores-post', 'Autores del Post', 'crear_contenido_metabox_autores', 'post', 'normal', 'high' );
}
function crear_contenido_metabox_autores( $post )
{
$values = get_post_custom( $post->ID );
$redactor = isset( $values['redaccion'] ) ? esc_attr( $values['redaccion'][0] ) : '';
$fotografia = isset( $values['fotografia'] ) ? esc_attr( $values['fotografia'][0] ) : '';
    ?>
		<p>
		    <label for="my_meta_box_text">Redacción:</label>
		    <input type="text" name="meta_redactor" id="meta_redactor" value="<?php echo $redactor; ?>" />
        </p>
        <p>
		    <label for="my_meta_box_text">Fotograía:</label>
		    <input type="text" name="meta_fotografia" id="meta_fotografia" value="<?php echo $fotografia; ?>" />
        </p>
    <?php        
}
add_action( 'save_post', 'guardar_metabox_autores' );
function guardar_metabox_autores( $post_id )
{
    if( isset( $_POST['meta_redactor'] ) )
        update_post_meta( $post_id, 'redaccion', wp_kses( $_POST['meta_redactor'], $allowed ) );
    if( isset( $_POST['meta_fotografia'] ) )
        update_post_meta( $post_id, 'fotografia', wp_kses( $_POST['meta_fotografia'], $allowed ) );
}









//Admin bar 

function webriti_remove_admin_bar_links() {
global $wp_admin_bar;

$wp_admin_bar->remove_menu('wp-logo'); // Removes WP Logo and submenus completely, to remove individual items, use the below mentioned codes
$wp_admin_bar->remove_menu('themes'); // 'Themes'
$wp_admin_bar->remove_menu('widgets'); // 'Widgets'
$wp_admin_bar->remove_menu('menus'); // 'Menus'

// Remove Comments Bubble
$wp_admin_bar->remove_menu('comments');
// Remove Comments Bubble
$wp_admin_bar->remove_menu('customize');
//Remove Update Link if theme/plugin/core updates are available
$wp_admin_bar->remove_menu('updates');

$wp_admin_bar->remove_menu('new-content'); // Removes '+ New' and submenus completely, to remove individual items, use the below mentioned codes

// Remove 'Howdy, username' Menu Items
$wp_admin_bar->remove_menu('user-info'); // 'username'
$wp_admin_bar->remove_menu('edit-profile'); // 'Edit My Profile'
}


function replace_howdy( $wp_admin_bar ) {
$my_account=$wp_admin_bar->get_node('my-account');
$newtitle = str_replace( 'Hola,', '', $my_account->title );
$wp_admin_bar->add_node( array(
'id' => 'my-account',
'title' => $newtitle,
) );
}





function webriti_toolbar_link($wp_admin_bar) {
	$args = array(
	'title' => 'Nueva Entrada',
	'href' => get_site_url().'/wp-admin/post-new.php'
	);
	if(current_user_can("edit_posts"))
	$wp_admin_bar->add_node($args);


	$args = array(
	'title' => 'Nueva Pagina',
	'href' => get_site_url().'/wp-admin/post-new.php?post_type=page'
	);
	if(current_user_can("edit_pages"))
		$wp_admin_bar->add_node($args);
	
	$args = array(
	'title' => 'Configurar Tema',
	'href' => get_site_url().'/wp-admin/admin.php?page=theme-panel'
	);
	if(current_user_can("edit_theme_options"))
		$wp_admin_bar->add_node($args);
}

$devel_mode = get_option("devel_mode");
if($devel_mode != "1"){
	
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
	add_action( 'admin_menu', 'remove_menus' );
	add_action( 'wp_before_admin_bar_render', 'webriti_remove_admin_bar_links' );
	add_filter( 'admin_bar_menu', 'replace_howdy',25 );
	add_action('admin_bar_menu', 'webriti_toolbar_link', 50);
}

?>
