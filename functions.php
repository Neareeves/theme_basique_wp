 
<?php
  $siteLocked = true; //Set to true/false to lock/unlock the site to only logged in users.
  if($siteLocked){
        //set session if not started
    if(!isset($_SESSION)){
        setcookie('testingForCookies', 1, time() + 3600);
        if(count($_COOKIE) > 0){
                //yes we can use cookies
            session_start();
            setcookie('testingForCookies', 1, time() - 3600);
        }
    }
        // Allows 'site.com/?tmpsession=tmplogin' to bypass the login restriction
    if(isset($_GET['tmpsession']) && $_GET['tmpsession'] == 'tmplogin'){
        $_SESSION['tmplogin'] = true;
        header('Location:' . get_bloginfo('url') . '/');
    }
    if(!preg_match('/(index.htm|sys|wp-login|wp-admin)/',$_SERVER['REQUEST_URI'])){
            //If not local test sites
        if((!preg_match('#wordpress.test|strutwordpress.dev|(aleth)wordpress(mu)?.co.uk#', $_SERVER['HTTP_HOST'])) && !is_user_logged_in()){
            if(!isset($_SESSION['tmplogin'])){
                /** if you have a index.html landing page use this **/
                header('Location: ' . get_bloginfo('url') . '/index.html'); exit;
                /** otherwise use this **/
                    //wp_die('Restricted');
            }
        }
    }
}
// Include custom navwalker
require_once('bs4navwalker.php');
// Register WordPress nav menu
register_nav_menu('top', 'Top menu');
function inverlochy_scripts() {
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
	wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
	wp_enqueue_style( 'inverlochy-style', get_stylesheet_uri() );
    // wp_enqueue_style('gallery',
    //     get_template_directory_uri() . '/public/css/gallery.css');
	wp_enqueue_style('style',
		get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('animate',
        get_template_directory_uri() . '/assets/css/animate.css');
    // wp_enqueue_style('defaultstyle',
    //     get_template_directory_uri() . '/public/css/default.css');
    wp_enqueue_script( 'inverlochy-skip-link-focus-fixd', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );
    wp_enqueue_script( 'inverlochy-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/script.js', array(), '20151215', true );
    wp_enqueue_script( 'inverlochy-midnight', get_template_directory_uri() . '/assets/js/midnight.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'inverlochy_scripts' );
function get_attachment_image() {
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
}
if ( ! function_exists( 'arriasal_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function arriasal_setup() {
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'main-menu' => esc_html__( 'Primary', 'aleth' ),
        ) );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        $defaults = array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        );
        add_theme_support( 'custom-logo', $defaults );
        add_theme_support( 'custom-footer' );
        add_theme_support( 'custom-header' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'arriasal_setup' );
// add_theme_support( 'custom-logo', array(
// 			'height'      => 250,
// 			'width'       => 250,
// 			'flex-width'  => true,
// 			'flex-height' => true,
// 		) );
// if (class_exists('MultiPostThumbnails')) :
// MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
// endif;
