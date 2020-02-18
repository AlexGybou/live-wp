<?php
/**
 * Add a sidebar.
 */
function devlab_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Article Sidebar', 'devlab' ),
        'id'            => 'sidebar-devlab',
        'description'   => __( 'Display info', 'devlab' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'devlab_sidebar' );


/**
 * Create title widget
 */

class Devlab_Title_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'devlab-title-widget',  // Base ID
            'Devlab - Titre principal'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Devlab_Title_Widget' );
        });

    }

    public $args = array(
        'before_title'  => '<h3 class="widgetdevlab">',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="devlab-widget-title">',
        'after_widget'  => '</div>'
    );

    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo $args['after_widget'];

    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'devlab' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'devlab' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}
$my_widget = new Devlab_Title_Widget();


add_action( 'init', 'devlab_projets' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function devlab_projets() {
    $labels = array(
        'name'               => _x( 'Projets', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Projet', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Projets', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Projets', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Ajouter un projet', 'book', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add un projet', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Nouveau projet', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editer un projet', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Voir un projet', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'listing-projet' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'projets', $args );
}