<?php

class Contact_Footer extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'contact_footer',
            'Contact For Footer',
            array('description' => 'Contact for footer')
        );
    }

    function form($instance)
    {

        $default = array(
            'title' => 'Tiêu đề widget',
            'phone' => 123456789,
            'email' => 'abc@gmail.com'

        );
        $instance = wp_parse_args((array)$instance, $default);
        $title = esc_attr($instance['title']);
        $phone = esc_attr($instance['phone']);
        $email = esc_attr($instance['email']);

        echo '<p>Nhập tiêu đề <input type="text" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
        echo '<p>Phone Number <input type="number" class="widefat" name="' . $this->get_field_name('phone') . '" value="' . $phone . '" /></p>';
        echo '<p>Email <input type="email" class="widefat" name="' . $this->get_field_name('email') . '" value="' . $email . '" /></p>';

    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);
        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $phone = $instance['phone'];
        $email = $instance['email'];

        echo $before_widget;
        /*echo $before_title . $title . $after_title;*/

        echo "<div class='contact'>
                Phone: <span><a href='tel:".$phone."'>".$phone."</a> </span>
              </div>
              
              <div class='contact'>
                Email: <span><a href='mailto:".$email."'>".$email."</a> </span>
              </div>
              ";

        echo $after_widget;

    }

}

add_action('widgets_init', 'create_randompost_widget');
function create_randompost_widget()
{
    register_widget('Contact_Footer');
}