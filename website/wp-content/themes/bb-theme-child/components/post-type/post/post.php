<?php 
add_shortcode('post_filter', 'filter_module');
function filter_module() {

    ob_start();
    $cats = get_categories();
?>
    <div class='cat-header'>
        <div class='cat-box'>
            <button class='cat-btn all active'>All</button>
<?php
            foreach($cats as $cat){
                if($cat->name!='Uncategorized'){
?>
                    <button class='cat-btn <?php echo $cat->slug; ?>' data-term='<?php echo $cat->term_id; ?>'>
                        <?php echo $cat->name; ?>
                    </button>
<?php
                }
            }
?>
        </div>
        <div class='cat-clear'>
            <button class='clear'>Clear Filters</button>
        </div>
    </div>
<?php

    return ob_get_clean();

}
add_shortcode('post_grid', 'post_module');
function post_module() {

    ob_start();
    $args = array(
            'post_type' => 'post',
            'numberposts' => -1,
            'order_by' => 'date',
            'order' => 'desc'
    );

    $posts = get_posts($args);
?>
    <h3 class='loading'>Loading<span>.</span><span>.</span><span>.</span></h3>
    <div class='post-lists'>
<?php
    foreach($posts as $key=>$post){
        $id = $post->ID;
        $date = date('M/j/Y', strtotime($post->post_date));
        $title = $post->post_title;
        $desc = $post->post_content;
        $tag = get_the_category( $id )[0]->name;
        $class = get_the_category( $id )[0]->slug;
        $link = get_field('link', $id);
?>  
        <div class='post-list <?php echo $class; echo (intval($key / 4) ==0) ? " active" : ""?> '>
            <div class='post-left'>
                <?php if($tag != 'Uncategorized'){ ?>
                    <div class='post-tag'>
                        <?php echo $tag; ?>
                    </div>
                <?php } ?>
                <span class='post-date'>
                    <?php echo $date; ?>
                </span>
            </div>
            <div class='post-right'>
                <h3 class='post-title h4'>
                    <a href='<?php echo $link; ?>' target='_blank'><?php echo $title; ?></a>
                </h3>
                <?php if(!empty($desc)){ ?>
                    <p class='post-desc'>
                        <?php echo $desc; ?>
                    </p>
                <?php } ?>
            </div>
        </div>
<?php

    }
?>
    </div>

    <div class="loadMore">
        <button class="loadMore_btn <?php echo $layout; ?> perpage_4">
            <?php echo 'Load More'; ?>
        </button>
    </div>
<?php

    return ob_get_clean();

}



function filter_projects() {

    $cat = $_POST['category'];

    $args = array(
            'post_type' => 'post',
            'numberposts' => -1,
            'order_by' => 'date',
            'order' => 'desc',
            'category' => $cat
    );

    $posts = get_posts($args);

    if (!count($posts)){
        echo "<p class='h2 noresult'>No results found. Please refine your search.</p>";
    }else{
        foreach($posts as $key=>$post){
            $id = $post->ID;
            $date = date('M/j/Y', strtotime($post->post_date));
            $title = $post->post_title;
            $desc = $post->post_content;
            $tag = get_the_category( $id )[0]->name;
            $class = get_the_category( $id )[0]->slug;
            $link = get_field('link', $id);

?>  
        <div class='post-list <?php echo $class; echo (intval($key / 4) ==0) ? " active" : ""?>'>
            <div class='post-left'>
                <?php if($tag != 'Uncategorized'){ ?>
                    <div class='post-tag'>
                        <?php echo $tag; ?>
                    </div>
                <?php } ?>
                <span class='post-date'>
                    <?php echo $date; ?>
                </span>
            </div>
            <div class='post-right'>
                <h3 class='post-title h4'>
                    <a href='<?php echo $link; ?>' target='_blank'><?php echo $title; ?></a>
                </h3>
                <?php if(!empty($desc)){ ?>
                    <p class='post-desc'>
                        <?php echo $desc; ?>
                    </p>
                <?php } ?>
            </div>
        </div>
<?php

        }
    }

    /*
    if($gridType=="list"){
        include('post-template/post_list.php');
    }elseif($gridType=="card"){
        include('post-template/post_card.php');
    }else{
        include('post-template/post_grid.php');
    }

    if(!count($posts)){
        echo "<p class='h2 noresult'>No results found. Please refine your search.</p>";
    }
    */
    

    exit();
  }
  add_action('wp_ajax_filter_projects', 'filter_projects');
  add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
