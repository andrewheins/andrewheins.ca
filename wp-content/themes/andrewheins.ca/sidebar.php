<div class="sidebar">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1')) : ?>
        <?php if ($meta) { ?>
            <h3 class="knockout">Project Links</h3>
            <?php include(locate_template('sidebar-projects.php')); ?>
        <?php } ?>

        <h3 class="title search">Search</h3>
        <?php get_search_form(); ?>

        <h3 class="title subscribe"><a href="http://feeds.feedburner.com/AndrewHeins">Subscribe</a></h3>

        <h3 class="title archives">Archives</h3>
        <ul>
            <?php wp_get_archives(); ?>
        </ul>
        <?php if (count(get_the_category()) > 0) { ?>

            <h3 class="title tags">Tags</h3>
            <ul>
                <?php ah_gettags(); ?>
            </ul>
        <?php } ?>
    <?php endif; ?>
</div>
