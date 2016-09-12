<?php

class Last_Post extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'last_post',
            'Last Post',
            array('description' => 'Last Post Widget')
        );
    }

    function form($instance)
    {

        $default = array(
            'title' => 'Tiêu đề widget',
            'quantum' => 2

        );
        $instance = wp_parse_args((array)$instance, $default);
        $title = esc_attr($instance['title']);
        $quantum = esc_attr($instance['quantum']);

//        echo '<p>Nhập tiêu đề <input type="text" class="lastpost" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
        echo '<p>Number of Post <input type="number" class="lastpost" name="' . $this->get_field_name('quantum') . '" value="' . $quantum . '" /></p>';

    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['quantum'] = strip_tags($new_instance['quantum']);
        return $instance;
    }

    function widget($args, $instance)
    {
//        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $quantum = $instance['quantum'];

        echo $args['before_widget'];
        /*echo $before_title . $title . $after_title;*/
        $query = new WP_Query(array(
            'posts_per_page' => $quantum,
            'orderby' => 'date'
        ));
        if ($query->have_posts()):
            echo "<ul>";
            while( $query->have_posts() ) :
                $query->the_post();

                ?>

                <li>
                    <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(),array(70,70)); ?> </a>
                    <p>
                        <?php echo get_the_title(); ?><br>
                        <span><?php echo get_the_date(); ?></span>
                    </p>

                </li>

            <?php endwhile;
            echo "</ul>";
        endif;
        wp_reset_postdata();
        echo $args['after_widget'];

    }

}

add_action('widgets_init', 'last_post_widget');
function last_post_widget()
{
    register_widget('Last_Post');
}