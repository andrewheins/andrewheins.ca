<?php get_header(); ?>
<div class="main <?php post_class(); ?>">

    <header class="container_12 clearfix">
        <div class="grid_12">
            <div class="post_image"><img src="http://www.lorempixum.com/461/58" width="461" height="58"></div>
            <h1>Search Results</h1>
            <h3><?php ah_getnumberofsearchresults(); ?></h3>
        </div>
    </header>
    <hr />    
    <div class="container_12 clearfix">
    <div class="grid_9 clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
	<?php endwhile; ?>
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
