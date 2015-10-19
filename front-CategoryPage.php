<?php
/*
* Template Name: Category Front Page
*/
    get_header();
?>
<div class = "article-Column">
    <?php
        $slug = get_post($post)->post_name;
        $cat = get_category_by_slug($slug);
        $detect = new Mobile_Detect;
        if($slug == "sports" && $detect->isMobile()){?>
        <select class="menu" onChange="javascript:mobileMenu(this);">
            <option value = "sports">Sports - Menu</option>
        <?php
            $cats = get_sports_subCats();
            foreach ($cats as $cat){?>
                <option value="<?php echo $cat->slug ?>"><?php echo $cat->name; ?></option>
            <?php
            }
            ?>
        </select>
        <?php
        }
        $args = array(
            'child_of' => $cat->term_id,
        );
        $cats = get_categories($args);
        if(empty($cats)){
            get_template_part("template-parts/category","singular");
        }
        else{
            get_template_part("template-parts/category","subCats");
        }
    ?>
</div>
<aside class = "sidebar-Column">
    <?php
    $slug = get_category_by_slug('sports');
    if(post_is_in_descendant_category($slug->term_id)){
        get_template_part('template-parts/sports','sidebar');
    }
    else{
        get_sidebar();
    }
    ?>
</aside>

<?php
    if($detect->isMobile() && $slug == 'sports'){?>
        <script>
                // called whenever the select box is changed
                function mobileMenu(sel) {
                    var value = sel.options[sel.selectedIndex].value;
                    var URL = <?php echo '/' . get_option('category_base') . '/'; ?>;
                    //if the value of the select box is not sport then it
                    // is an actual sport therefore change pages
                    if (value === "sports") {
                        window.location.href = 'http://www.yorkvision.co.uk/sport';
                    }
                    else {
                        window.location.href = URL + value;
                    }
                }
            </script>

    <?php
    }
    get_footer();
?>
