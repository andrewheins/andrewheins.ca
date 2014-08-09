<?php
/*
Template Name: Blog
*/
?>

<?php 
    get_header(); 
    $args = array(
        'post_type' => 'post', 
        'order' => 'DESC',
        'numberposts'=> 9999
    );
    $posts = get_posts($args)
?>


<div class="main <?php post_class(); ?>">

    <header class="container_12 clearfix">
        <div class="grid_12">
            <div class="post_image"><?php ah_get_postimage(); ?></div>
            <h1>Blog Posts</h1>
            <h3><?php echo count($posts) ?>  Posts found since <span class="emph">the beginning of time</span></h3>

        </div>
    </header>
    <hr />    
    <div class="container_12 clearfix">
    <div class="grid_9 clearfix">
    <?php if($posts) : foreach($posts as $post) : setup_postdata($post); ?>
    <div class="grid_9 clearfix alpha omega">
	<section class="meta grid_1 alpha">
            <?php ah_gettimeblock(); ?>
	</section>
        <div class="grid_8 omega">
            <article>	
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
                <?php the_excerpt();?>
                <div class="read_more"><h3><a href="<?php the_permalink() ?>"><?php comments_number( 'No Comments', '1 Comment', '% Comments'); ?></a></h3></div>
                <hr/>
            </article>
        </div>
    </div>
	<?php endforeach; ?>
        <?php else : ?>
        <p>No posts found. Try a different search?</p>
		<?php get_search_form(); ?>
        <?php endif; ?>
    </div>
    <div class="grid_3">
        <?php get_sidebar(); ?>
    </div>
	
</div>
		
</div>
	


<?php get_footer(); ?>
