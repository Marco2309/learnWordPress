<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Marco1">
    <?php wp_head(); ?>
</head>

<body class="container-fluid">
    <?php wp_body_open(); ?>
    <header class="header bg-drk ">
        <nav class="container">
            <div class="logo">
                <?php the_custom_logo(); ?>
                <a href="<?php echo home_url(); ?>">
                    <h1>Marco1</h1>
                </a>
            </div>
            <div class="menu">
                <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/icons/burguerMenu30.svg" alt="menu">
                <?php wp_nav_menu(
                    array(
                        "menu" => 'menu-principal'
                    )
                ); ?>
            </div>
        </nav>
    </header>