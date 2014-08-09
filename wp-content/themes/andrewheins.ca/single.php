<?php get_header(); ?>
<div class="main <?php post_class(); ?>">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <header class="container_12 clearfix">
        <div class="grid_12">
					<div class="post_image">  
						<?php ah_get_postimage(); ?>
           </div>
            <h1><?php the_title();?></h1>
            <h3><?php echo get_post_meta($post->ID, 'subtitle', true); ?></h3>

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
                <div class="read_more"><h3><a class="comments_link" href="#showcomments"><?php comments_number( 'No Comments', '1 Comment', '% Comments'); ?></a></h3></div>
                <hr/>
                <?php comments_template(); ?>
            </article>
        </div>
        <aside class="grid_3">
            <?php get_sidebar(); ?>
        </aside>
    </div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>
