<div class="card">
    <a href="<?php the_permalink();?>">
        <div class = "card-wrapper">
            <div class="images-wrapper">
                <?php the_post_thumbnail('square'); ?>
            </div>
            <div class="card-content">
                <h2><a href="<?php the_permalink();?>"> <?php the_title();?></a></h2>
                <?php
                $detect = new Mobile_Detect;
                if(! $detect->isMobile()){?>
                    <div class="card-cat">
                        <i class="triangle <?php echo strtolower(news_cjk508_the_parent_category());?>"></i><?php echo news_cjk508_the_category()[0]->name;?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </a>
</div>
