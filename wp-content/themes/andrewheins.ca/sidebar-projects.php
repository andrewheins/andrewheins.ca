<ul class="project_link_list">
    <?php if(isset($meta['github_url'])) : ?>
    <li><a class="title source_link" href="<?php echo($meta['github_link'][0]); ?>">View Source on GitHub</a>
    <?php 
        endif; 
        $pattern = "/^http.+/i";
        if(preg_match($pattern, $meta['site_url'][0]) != NULL) { ?>
    <li><a class="title demo_link" href="<?php echo($meta['site_url'][0]); ?>">Proceed to Site</a></li>
    <?php }?>
       
</ul>
