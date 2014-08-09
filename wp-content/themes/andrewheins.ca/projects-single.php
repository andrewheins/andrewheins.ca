<?php
/*
Template Name: Projects-Single
*/
?>
<?php get_header(); ?>
<div class="main <?php post_class(); ?>">
    <div class="container_12 clearfix">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php $meta = get_post_custom(); ?>
            <header class="container_12 clearfix">
        <div class="grid_12">
            <div class="post_image">
            <?php if(has_post_thumbnail()) {
                the_post_thumbnail('single-post-thumbnail');
            } else{ ?>
                <img src="http://www.lorempixum.com/461/58" width="461" height="58">
           <?php } ?>
            </div>
            <h1><?php the_title();?></h1>
            <h3><?php echo get_post_meta($post->ID, "abstract", true); ?></h3>
        </div>
    </header>
    <hr />
        <div class="container_12 clearfix">
        <section class="meta grid_1">
            <?php ah_gettimeblock(); ?>
	</section>
        <div class="grid_8">
            <article>
            <?php the_content();?>
            </article>
	</div>
        <div class="grid_3">
            <?php include(locate_template('sidebar.php')); ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
