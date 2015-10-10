<div class="card">
    <div class = "card-wrapper">
        <div class="images-wrapper">
            <?php the_post_thumbnail('square'); ?>
        </div>
        <div class="card-content">
            <h2><a href="<?php the_permalink();?>"> <?php the_title();?></a></h2>
            <div class="card-cat">
                <i class="triangle news"></i><?php the_category(', ');?>
            </div>
        </div>
    </div>
</div>
