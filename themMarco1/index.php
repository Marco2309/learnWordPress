<?php get_header() ?>
<!-- Si hay contenido para el post muestralo -->
<?php if (have_posts()) { ?>
    <?php while (have_posts()) {
        the_post(); ?>
        <?php the_content(); ?>
    <?php } ?>
<?php } ?>

<!-- crear instacia de postType -1 trae todos -->
<?php
$args = array(
    "post_type" => array("producto"),
    "posts_per_page" => -1
);
$productos = new WP_Query($args);
?>

<div class="card__container">
    <?php if ($productos->have_posts()) { ?>
        <!-- si hay productos -->
        <?php while ($productos->have_posts()) {
            $productos->the_post(); ?>
            <div class="card">
                <?php the_post_thumbnail('thumbnail'); ?>
                <div>
                    <a class="producto__link" href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <p> <?php the_content(); ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<?php get_footer() ?>