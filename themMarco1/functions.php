<?php

//* Add scripts and styles
function marco_assets()
{
    wp_enqueue_style("estilos", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts", "marco_assets");

//* Add to body
function marco_analytics()
{
?>
    <!-- html -->
<?php
}
add_action("wp_body_open", "marco_analytics");

//* Disable Admin bar
add_filter('show_admin_bar', '__return_false');

// theme_supports


//* Add to theme supoorts 
function marco_theme_supportd()
{
    add_theme_support('title-tag'); //Añade titulo desde wp-admin
    add_theme_support('post-thumbnails'); 
    add_theme_support(
        'custom-logo',
        array(
            "width" => 40,
            "height" => 170,
            "flex-width" => true,
            "flex-height" => true,
        )
    );
}

add_action("after_setup_theme", marco_theme_supportd());

//* Add menu to theme supoorts
function marco_add_menus()
{
    register_nav_menus(
        array(
            'menu-principal' => "Menu principal"
        )
    );
}
add_action("after_setup_theme", "marco_add_menus");

//* Add sidebar in footer
function marco_add_sidebar()
{
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}
add_action("widgets_init", "marco_add_sidebar");

//* Add custom post type
function marco_add_custom_post_type()
{
    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos',
        'add_new' => 'Añadir producto'
    );
    $args = array(
        'labels'             => $labels, //Array de etiquetas para el post type
        'description'        => 'Productos para listar en un catálogos.', //descripcion
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true, // si se puede añadir en el menu
        'query_var'          => true,
        'rewrite'            => array('slug' => 'producto'), // slug para url
        'capability_type'    => 'post', // sipuedes editar post pedes editar este
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5, // En que posicion de menu va a estar
        'supports'           => array('title', 'editor', 'author', 'thumbnail'),
        'taxonomies'         => array('category'),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-cart' // icono que va a user
    );
    register_post_type('producto', $args);
}
add_action("init", "marco_add_custom_post_type");
