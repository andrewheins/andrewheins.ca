<?php

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'single-post-thumbnail', 461, 58, true);
    add_image_size( 'banner-image', 940, 300, true);
    add_image_size( 'home-page-thumbnail', 210, 100, true);
}

function ah_get_category_id($cat_name) {
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

function ah_gettimeblock() { ?>
    <time datetime="<?php the_time('Y-m-d'); ?>">
        <span class="month"><?php the_time('M'); ?></span>
        <span class="day"><?php the_time('d'); ?></span>
        <span class="year"><?php the_time('Y'); ?></span>
    </time>
<?php }

function ah_getfeaturedpost() {
    global $post;
    $sticky = get_option('sticky_posts');
    $f_args = array(
      'posts_per_page' => 1,
      'post__in' => $sticky,
      'ignore_sticky_posts' => 1
    );
    $f_posts = get_posts($f_args);
    foreach($f_posts as $post) {
    setup_postdata($post);
    ?>
    <figure class="grid_12">
        <?php if(has_post_thumbnail()) {
                the_post_thumbnail('banner-image');
            } else{ ?>
                <img src="<?php bloginfo('template_url') ?>/i/default-image.png" width="940" height="300">
           <?php } ?>
        <figcaption>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <h3><?php echo get_post_meta($post->ID, 'subtitle', true); ?></h3>
        </figcaption>
    </figure>
    <?php } 
    }

function ah_gettags() {
    wp_tag_cloud('smallest=8&largest=8&format=list');
}

function ah_get_postimage() {
    if(has_post_thumbnail()) {
        the_post_thumbnail('single-post-thumbnail');
    } else { 
        echo get_the_post_thumbnail(312, 'single-post-thumbnail');
    } 
}

function ah_getnumberofsearchresults() {
    global $wp_query;
    $tmp_search = new WP_Query('s=' . wp_specialchars($_GET['s']) . '&show_posts=-1&posts_per_page=-1');
    $count = $tmp_search->post_count;
    if($count > 1) {
       echo $count." results found for <span class='emph'>".get_search_query()."</span>";
    } else if ($count == 1) {
       echo $count." result found for <span class='emph'>".get_search_query()."</span>";
    } else {
        echo "No results found for <span class='emph'>".get_search_query()."</span>";
    }
}

function ah_getURL() {
	$url = $_SERVER['REQUEST_URI'];
	return $url;
}

function ah_getarchivesubtitle() {
	$url = ah_getURL();
	$archives_regex = "/\/\d{4}\/\d{2}\/?/";
	$tags_regex = "/\/tag\/[^\/]+\/?/";
	$categories_regex = "/\/category\/[^\/]+\/?/";
	$date_range = "";

	if(preg_match($archives_regex, $url) === 1) {
		$arr = split("/", $url);
		$month = array_pop($arr);
		if ($month === "") {
			$month = array_pop($arr);
		}
		$year = array_pop($arr);
		$date_range = "from <span class='emph'>".ah_month_numtoword($month)." ".$year."</span>";
	} else if (preg_match($tags_regex, $url) === 1) {
		$arr = split("/", $url);
		$tag = array_pop($arr);
		if ($tag === "") {
			$tag = array_pop($arr);
		}
		$date_range = "tagged with <span class='emph'>".$tag."</span>";
	} else if (preg_match($categories_regex, $url) === 1) {
		$arr = split("/", $url);
		$category = array_pop($arr);
		if ($category === "") {
			$category = array_pop($arr);
		}
		$date_range = "in <span class='emph'>".$category."</span>";
	}
	return $date_range;
}

function ah_month_numtoword($num) {
	$months = array(
		'01' => 'January',
		'02' => 'February',
		'03' => 'March',
		'04' => 'April',
		'05' => 'May',
		'06' => 'June',
		'07' => 'July',
		'08' => 'August',
		'09' => 'September',
		'10' => 'October',
		'11' => 'November',
		'12' => 'December'
	);
	return $months[$num];
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

add_theme_support( 'menus' );

function wpe_excerptlength_news($length) {
    return 15;
}

function wpe_excerptlength_teaser($length) {
    return 35;
}
function wpe_excerptlength_index($length) {
    return 160;
}
function wpe_excerptmore($more) {
    return '...<a href="'. get_permalink().'">Read More ></a>';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


register_post_type('floorplans', array(
	'label' => __('Floorplans'),
	'singular_label' => __('Floorplans'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author'),
));

register_post_type('design', array(
	'label' => __('Design Center'),
	'singular_label' => __('Design Center'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author'),
));

add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'plans', 'floorplans', array( 'hierarchical' => true, 'label' => 'Plans', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'options', 'design', array( 'hierarchical' => true, 'label' => 'Options', 'query_var' => true, 'rewrite' => true ) );
}


?>
