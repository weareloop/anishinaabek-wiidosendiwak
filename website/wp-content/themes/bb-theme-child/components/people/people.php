<?php
add_shortcode('people', 'people_module');
function people_module($atts) {
    $param = shortcode_atts(array(
        'id'                => '',
        'columns'           => '',
        'toggle'            => '',
        'image-placeholder' => '',
    ),$atts);
    $people_id = (!empty($param['id'])) ? $param['id'] : '';
    $columns = (!empty($param['columns'])) ? $param['columns'] : 2;
    $toggle = (!empty($param['toggle'])) ? $param['toggle'] : false;
    $img_placeholder = (!empty($param['image-placeholder'])) ? $param['image-placeholder'] : '';

    ob_start();
        if( have_rows('people', $people_id) ): ?>
            <div class="people-container columncount<?= $columns; ?> <?= $toggle ? 'foldable' : ''; ?>">
                <ul class="people-list">

                <?php while(have_rows('people', $people_id) ) : the_row();
                    if( have_rows('people-card', $people_id) ):
                        while( have_rows('people-card', $people_id) ): the_row();

                        $img = get_sub_field('people-card_img',$people_id);
                        $name = get_sub_field('people-card_name',$people_id);
                        $title = get_sub_field('people-card_title',$people_id);
                        $desc = get_sub_field('people-card_desc',$people_id);
                        $url = get_sub_field('people-card_link',$people_id);
                        $link_text = get_sub_field('people-card_link-text',$people_id); ?>

                        <li class="people-list_item">

                            <div class="people--img">
                                <?php if ($img) : ?>
                                    <img src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>" />
                                <?php elseif ($img_placeholder) : ?>
                                    <img src="<?= $img_placeholder; ?>" alt="Image placeholder" />
                                <?php endif; ?>
                            </div>
                            <div class="item--details">
                                <h3 class="h4"><?= $name; ?></h2>
                                <p class="title"><?= $title; ?></h2>
								    
                                    
                                    
                            
                            </div>
                            <div>
                            <?php if($toggle=="true"): ?>
                                        <div class="moreDetails"><?= $desc; ?></div>
                                        <div>
                                            <button class="moreBtn">See Bio</button>
                                        </div>
                                    <?php endif; ?>
                                    
                            </div>
                            
                        </li>

                        <?php endwhile;
                    endif;
                endwhile;  ?>

                </ul>
            </div>
        <?php endif;
    return ob_get_clean();
}

add_shortcode('partner', 'partner_module');
function partner_module($atts) {
    $param = shortcode_atts(array(
        'id'                => '',
        'columns'           => '',
        'toggle'            => '',
        'image-placeholder' => '',
    ),$atts);
    $people_id = (!empty($param['id'])) ? $param['id'] : '';
    $columns = (!empty($param['columns'])) ? $param['columns'] : 2;
    $toggle = (!empty($param['toggle'])) ? $param['toggle'] : true;
    $img_placeholder = (!empty($param['image-placeholder'])) ? $param['image-placeholder'] : '';

    ob_start();
        if( have_rows('people', $people_id) ): ?>
            <div class="partner people-container columncount<?= $columns; ?> <?= $toggle ? 'foldable' : ''; ?>">
                <ul class="people-list">

                <?php while(have_rows('people', $people_id) ) : the_row();
                    if( have_rows('people-card', $people_id) ):
                        while( have_rows('people-card', $people_id) ): the_row();

                        $img = get_sub_field('people-card_img',$people_id);
                        $name = get_sub_field('people-card_name',$people_id);
                        $title = get_sub_field('people-card_title',$people_id);

                        $info_group = get_sub_field('info_group',$people_id);
                        $img = $info_group["people-card_img"];
                        $name = $info_group["people-card_name"];
                        $title = $info_group["people-card_title"];
                        $desc = get_sub_field('people-card_desc',$people_id); ?>

                        <li class="people-list_item">

                            <div class="people--img">
                                <?php if ($img) : ?>
                                    <img src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>" />
                                <?php elseif ($img_placeholder) : ?>
                                    <img src="<?= $img_placeholder; ?>" alt="Image placeholder" />
                                <?php endif; ?>
                            </div>
                            <div class="item--details">
                                <h3 class="h4"><?= $name; ?></h2>
                                <p class="title"><?= $title; ?></h2>
                            </div>
                            <?php if(!empty($desc)){ ?>
                            <div>
                                    <?php if($toggle=="true"): ?>
                                        <div class="moreDetails"><?= $desc; ?></div>
                                        <div>
                                            <button class="moreBtn">Learn More</button>
                                        </div>
                                    <?php endif; ?>
                                    
                            </div>
                            <?php } ?>
                            
                        </li>

                        <?php endwhile;
                    endif;
                endwhile;  ?>

                </ul>
            </div>
        <?php endif;
    return ob_get_clean();
}