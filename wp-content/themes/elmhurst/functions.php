<?php
/**
 * Elmhurst Family Dentistry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lesa_Ukman
 */

if ( ! function_exists( 'elmhurst_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function elmhurst_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Elmhurst Family Dentistry, use a find and replace
     * to change 'elmhurst' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'elmhurst', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

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
      'menu-1' => esc_html__( 'Primary', 'elmhurst' ),
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

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'elmhurst_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'elmhurst_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elmhurst_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'elmhurst_content_width', 640 );
}
add_action( 'after_setup_theme', 'elmhurst_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function elmhurst_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'elmhurst' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'elmhurst' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'elmhurst_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elmhurst_scripts() {
  wp_enqueue_style( 'elmhurst-style', get_stylesheet_uri() );
  // EXAMPLE
  wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri().'/js/slick-carousel/slick.css' );


  wp_enqueue_script( 'elmhurst-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'elmhurst-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_script( 'elmhurst-scripts', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'elmhurst_scripts' );


// Add Custom Menus Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' ),
      'mobile-menu' => __( 'Mobile Menu' ),
      'top-left-nav' => __( 'Top Left Nav' ),
      'top-right-nav' => __( 'Top Right Nav' )
    )
  );
}



add_action( 'init', 'register_my_menus' );


// Add Theme Options
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  acf_set_options_page_menu('Theme Options');
  acf_add_options_sub_page('Footer');
  acf_add_options_sub_page('Header');


  acf_add_options_sub_page(array(
    'page_title'  => 'Footer',
    'menu_title'  => 'Footer',
    'menu_slug'   => 'theme-options-footer',
    'capability'  => 'edit_posts',
    'parent_slug' => 'theme-options',
    'position'    => false,
    'icon_url'    => false,
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Header',
    'menu_title'  => 'Header',
    'menu_slug'   => 'theme-options-header',
    'capability'  => 'edit_posts',
    'parent_slug' => 'theme-options',
    'position'    => false,
    'icon_url'    => false,
  ));
  
}


// Add Font Awesome
function themeslug_enqueue_script() {
    wp_enqueue_script( 'fontawesome-js', 'https://use.fontawesome.com/c8aea47d38.js', false );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );


// Google Fonts
function wpb_add_google_fonts() {
  wp_enqueue_style( 'wpb-google-fonts-lora', 'http://fonts.googleapis.com/css?family=Lato:300,400,700', false );
  wp_enqueue_style( 'wpb-google-fonts-roboto', 'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );



// Add post excerpt limit

function custom_excerpt_length( $length ) {
        return 20;
    }
 add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Changing excerpt more

function new_excerpt_more($more) {
       global $post;
  return '.<br /> <a href="'. get_permalink($post->ID) . '" class="lu-readmore">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}
