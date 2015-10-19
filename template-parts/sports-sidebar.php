<?php
    $detect = new Mobile_Detect;
    if(!$detect->isMobile()){
        $cats = get_sports_subCats();?>
        <div class = "widget sportsNav">
            <div class = "category-title">
                <h2 class = "widget-title">
                    <span class = "sports">
                        Sports Categories
                    </span>
                </h2>
            </div>
    <?php
        foreach ($cats as $cat) {?>
            <h4><a href = "<?php echo esc_url(get_category_link($cat->term_id));?>"><i class = "triangle sports"></i><?php echo esc_html($cat->name);?></a></h4>
        <?php
        }
        echo '</div>';
    }
 ?>
