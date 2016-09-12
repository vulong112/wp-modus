<?php
/**
 * mytheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mytheme
 */

if (!function_exists('my_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function my_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on mytheme, use a find and replace
         * to change 'my-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('my-theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'my-theme'),
        ));

        register_nav_menus(array(
            'footer-menu-1' => esc_html__('Footer Menu 1', 'my-theme'),
        ));

        register_nav_menus(array(
            'footer-menu-2' => esc_html__('Footer Menu 2', 'my-theme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('my_theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support( 'custom-logo',array(
            'height' => 21,
            'width' => 191,
            'flex-width' => true,
        ) );
    }
endif;
add_action('after_setup_theme', 'my_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('my_theme_content_width', 640);
}

add_action('after_setup_theme', 'my_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_theme_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Search', 'my-theme'),
        'id' => 'search-icon',
        'description' => esc_html__('Add widgets here.', 'my-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        /*'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',*/
    ));

    register_sidebar(array(
    'name' => esc_html__('Footer About and Contact', 'my-theme'),
    'id' => 'footer-about-contact',
    'description' => esc_html__('Add widgets here.', 'my-theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    /*'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',*/
));
    register_sidebar(array(
    'name' => esc_html__('Last Post', 'my-theme'),
    'id' => 'last-post',
    'description' => esc_html__('Add widgets here.', 'my-theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    /*'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',*/
));
    register_sidebar(array(
        'name' => esc_html__('Socical Footer', 'my-theme'),
        'id' => 'socical-footer',
        'description' => esc_html__('Add widgets here.', 'my-theme'),
        'before_widget' => '',
        'after_widget' => '',
        /*'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',*/
    ));
}

add_action('widgets_init', 'my_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
//function my_theme_scripts()
//{
////	wp_enqueue_style( 'my-theme-style', get_stylesheet_uri() );
//
//    wp_enqueue_script('my-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
//
//    wp_enqueue_script('my-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
//
//    if (is_singular() && comments_open() && get_option('thread_comments')) {
//        wp_enqueue_script('comment-reply');
//    }
//}
//
//add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * @ Chèn CSS và Javascript vào theme
 * @ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
 **/
function my_styles()
{
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */
//    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/app/css/owl.carousel.css','all');
    wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/app/css/owl.theme.css','all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/app/css/bootstrap.min.css', 'all');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/app/css/bootstrap-theme.min.css', 'all');
    wp_enqueue_style('font-as', get_template_directory_uri(). '/font/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css','all');
}

add_action('wp_enqueue_scripts', 'my_styles');

function theme_prefix_the_custom_logo() {

    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }

}

function my_theme_scripts(){
    wp_enqueue_script('library-owl-carousel', get_template_directory_uri() .'/js/owl.carousel.min.js', array(), 1.0, true);
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/myscript.js', array(), 1.0, true);
}

add_action('wp_enqueue_scripts', 'my_theme_scripts');

/*-------------Create new widget--------------*/
require get_template_directory() . '/inc/widgets/footer-contact.php';
require get_template_directory() . '/inc/widgets/last-post.php';
require get_template_directory() . '/inc/widgets/socical-link.php';


function add_my_awesome_widgets_collection($folders){
    $folders[] = 'inc/widgets/widgets-siteorigin/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_my_awesome_widgets_collection');

