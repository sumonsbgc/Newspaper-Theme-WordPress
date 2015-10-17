<div class="card">
    <a href="<?php the_permalink();?>">
        <div class = "card-wrapper">
            <div class="images-wrapper">
                <?php the_post_thumbnail('square'); ?>
            </div>
            <div class="card-content">
                <h2><a href="<?php the_permalink();?>"> <?php the_title();?></a></h2>
                <div class="card-cat">
                    <i class="triangle <?php echo strtolower(yv4_the_parent_category());?>"></i><?php echo yv4_the_category()[0]->name;?>
                </div>
            </div>
        </div>
    </a>
</div>
