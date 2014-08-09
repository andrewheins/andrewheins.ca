<footer>
    <header>
        <div class="container_12 clearfix">
            <?php
            $args = array(
                'numberposts' => 4,
                'post_parent' => 372,
                'orderby' => 'menu_order',
                'post_type' => 'page',
                'order' => 'asc'
            );
            $footers = get_posts($args);
            foreach ($footers as $footer) : setup_postdata($footer); ?>
                <div class="grid_3"><h3><?php echo $footer->post_title; ?></h3></div>
            <?php endforeach; ?>
        </div>
    </header>
    <div class="footer_content container_12 clearfix">
        <?php foreach ($footers as $footer) : setup_postdata($footer); ?>
            <div class="grid_3">
                <?php the_content(); ?>
            </div>
        <?php endforeach;
        wp_reset_postdata();
        wp_footer(); ?>
    </div>
</footer>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/andrewheins.js" type="text/javascript"></script>

</body>
</html>
