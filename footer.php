<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container-fluid footer-wrap">

        <div class="row">
            <div class="container">
            <div class="col-xs-12 col-md-4">
                <?php if (is_active_sidebar('footer-about-contact')) {
                    dynamic_sidebar('footer-about-contact');
                } ?>
            </div>

            <div class="col-xs-12 col-md-2">
                <?php
                $menu_location = 'footer-menu-1';
                $menu_locations = get_nav_menu_locations();
                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                echo "<h3 class='header-menu-footer'>" . esc_html($menu_name) . "</h3>";
                ?>
                <?php wp_nav_menu(array('theme_location' => 'footer-menu-1', 'menu_class' => 'footer-menu')); ?>
            </div>

            <div class="col-xs-12 col-md-2">
                <?php
                $menu_location = 'footer-menu-2';
                $menu_locations = get_nav_menu_locations();
                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                echo "<h3 class='header-menu-footer'>" . esc_html($menu_name) . "</h3>";
                ?>
                <?php wp_nav_menu(array('theme_location' => 'footer-menu-2', 'menu_class' => 'footer-menu')); ?>
            </div>

            <div class="col-xs-12 col-md-4">
                <h3 class="from-the-blog"><i>from the</i><b>BLOG</b></h3>
                <?php if (is_active_sidebar('last-post')) {
                    dynamic_sidebar('last-post');
                } ?>
            </div>

            </div>
        </div>
    </div>
    <div class="container-fluid end-footer">
        <div class="row">
            <div class="container">
            <?php if (is_active_sidebar('socical-footer')) {
                dynamic_sidebar('socical-footer');
            } ?>
            </div>

        </div>
    </div>


</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
