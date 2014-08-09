<?php get_header(); ?>
<section class="banner container_12 clearfix">
    <?php ah_getfeaturedpost(); ?>
</section>
<hr/>
<?php 
    $query = "SELECT * FROM wp_posts WHERE post_parent = 2 AND post_status = 'publish' ORDER BY menu_order";
    $sections = $wpdb->get_results($query);
?>
<section class="about container_12 clearfix">
    <div class="grid_3 title">
        <h2><a href="<?php bloginfo('url') ?>/about"><?php echo $sections[0]->post_title; ?></a></h2>
        <div class="description">
            <?php echo $sections[0]->post_content; ?>
        </div>
    </div>
    <div class="grid_9">
        <div class="photos">
            <div class="bg1"></div>
            <div class="bg2"></div>
            <img class="img1" src="<?php bloginfo('template_url') ?>/i/andrew_1.jpg">
            <img class="img2" src="<?php bloginfo('template_url') ?>/i/andrew_2.jpg">
            <img class="img3" src="<?php bloginfo('template_url') ?>/i/andrew_3.jpg">
            <img class="img4" src="<?php bloginfo('template_url') ?>/i/pixel-final.gif">
        </div>
    </div>
</section>
<hr/>
<section class="availability">
    <h3>I'm currently available for Freelance Projects, so <a href="<?php bloginfo('url') ?>/contact">Contact Me</a>, and let's get to work!</h3>
</section>
<hr/>
<section class="projects container_12 clearfix">

    <div class="grid_3 title">
        <h2><a href="<?php bloginfo('url') ?>/projects"><?php echo $sections[1]->post_title; ?></a></h2>
        <div class="description">
            <?php echo $sections[1]->post_content; ?>
        </div>
    </div>
      <?php
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'page',
            'post_parent' => 9,
            'orderby' => 'menu_order'
        );
        $page_query = new WP_Query($args);
        while ($page_query->have_posts()) :
        $page_query->the_post(); ?>

    <figure class="grid_3">
        <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()) {
                the_post_thumbnail('home-page-thumbnail');
            } ?></a>
        <figcaption>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php echo get_post_meta($post->ID, 'abstract', true); ?></p>
        </figcaption>
    </figure>
    <?php endwhile; ?>
</section>
<hr/>
<section class="blogs container_12 clearfix">
    <div class="grid_3 title">
        <h2><a href="<?php bloginfo('url') ?>/archives"><?php echo $sections[2]->post_title; ?></a></h2>
        <div class="description">
            <?php echo $sections[2]->post_content; ?>
        </div>
    </div>
    <div class="grid_6">
        <?php
        $q_args = array(
            'posts_per_page' => 1,
            'post__not_in' => get_option('sticky_posts')
        );
        $first_query = new WP_Query($q_args);
        while($first_query->have_posts()) : $first_query->the_post();
      ?>
        <article>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <?php the_excerpt() ?>
            <div class="read_more"><h3><a href="<?php the_permalink() ?>">Continue Reading(<?php comments_number( 'No Comments', '1 Comment', '% Comments'); ?>)</a></h3></div>
        </article>
        <?php endwhile; ?>
    </div>
    <div class="archives grid_3">
        <h3 class="knockout">Recent Blogs</h3>
        <ul>
        <?php 
        $args = array(
            'posts_per_page' => 5,
            'offset' => 1, 
            'post__not_in' => get_option('sticky_posts')
        );
        $post_query = new WP_Query($args);
        while($post_query->have_posts()) : $post_query->the_post();
      ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
            <?php endwhile; ?>
        </ul>
         <div class="read_more"><h3><a href="<?php bloginfo('url') ?>/archives">More...</a></h3></div>
    </div>
</section>


<?php get_footer(); ?>
