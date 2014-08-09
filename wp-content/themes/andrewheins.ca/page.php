<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="main <?php post_class(); ?>">
    
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
        <div  class="grid_9">
            <article>		
                <?php the_content();?>
            </article>
        </div>
            <aside class="grid_3">
                <?php get_sidebar(); ?>
            </aside>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>
