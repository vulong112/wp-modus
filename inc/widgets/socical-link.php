<?php

class Socical_Footer extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'socical_link',
            'Socical Footer',
            array('description' => 'Socical for footer')
        );
    }

    function form($instance)
    {

        $default = array(
            'theme_name' => 'ModusVersus',
            'fb' => 'google.com',
            'gplus' => 'google.com',
            'tumblr' => 'google.com',
            'rss' => 'google.com'

        );
        $instance = wp_parse_args((array)$instance, $default);

        $theme_name = esc_attr($instance['theme_name']);
        $fb = esc_attr($instance['fb']);
        $gplus = esc_attr($instance['gplus']);
        $tumblr = esc_attr($instance['tumblr']);
        $rss = esc_attr($instance['rss']);

        echo '<p>Copyright <input type="text" class="footer-below" name="' . $this->get_field_name('theme_name') . '" value="' . $theme_name . '"/></p>';
        echo '<p>Facebook Link <input type="text" class="footer-below" name="' . $this->get_field_name('fb') . '" value="' . $fb . '" /></p>';
        echo '<p>Google Plus Link <input type="text" class="footer-below" name="' . $this->get_field_name('gplus') . '" value="' . $gplus . '" /></p>';
        echo '<p>Tumblr Link <input type="text" class="footer-below" name="' . $this->get_field_name('tumblr') . '" value="' . $tumblr . '" /></p>';
        echo '<p>RSS Link <input type="text" class="footer-below" name="' . $this->get_field_name('rss') . '" value="' . $rss . '" /></p>';

    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['theme_name'] = strip_tags($new_instance['theme_name']);
        $instance['fb'] = strip_tags($new_instance['fb']);
        $instance['gplus'] = strip_tags($new_instance['gplus']);
        $instance['tumblr'] = strip_tags($new_instance['tumblr']);
        $instance['rss'] = strip_tags($new_instance['rss']);

        return $instance;
    }

    function widget($args, $instance)
    {
//        extract($args);
        $theme_name = $instance['theme_name'];
        $fb = $instance['fb'];
        $gplus = $instance['gplus'];
        $tumblr = $instance['tumblr'];
        $rss = $instance['rss'];

        echo $args['before_widget'];
        /*echo $before_title . $title . $after_title;*/

        echo "<div class='col-md-3'>
                <div class='footer-below-left'>
                    ".$theme_name."
                </div>
              </div>
              
              <div class='col-md-6'>
              </div>
              
              <div class='col-md-3 text-right socical-icon'>
                <a href='".$fb."'><i class='fa fa-facebook' aria-hidden='true'></i></a>
                <a href='".$gplus."'><i class='fa fa-google-plus' aria-hidden='true'></i></a>
                <a href='".$tumblr."'><i class='fa fa-tumblr' aria-hidden='true'></i></a>
                <a href='".$rss."'><i class='fa fa-rss' aria-hidden='true'></i></a>
              </div>
             ";

        echo $args['after_widget'];

    }

}

add_action('widgets_init', 'create_socical_widget');
function create_socical_widget()
{
    register_widget('Socical_Footer');
}