<?php if ($tags){ ?>

    <div class="widget_tags_cloud">

        <ul class="list-inline tags_as_<?php echo $style; ?> ">
            <?php foreach($tags as $tag) { ?>

                <?php
                    $color = false;
                    if($colors){
                        $color = current($colors);
                        if(!next($colors)){reset($colors);}
                    }
                ?>

                <?php if ($style=='cloud'){ ?>
                    <?php
                        $size_percent = round(($tag['frequency'] * 100) / $max_freq);
                        $portion = round(100 / $size_percent, 2);
                        $step = round(($max_fs - $min_fs) / $portion);
                        $fs = $min_fs + $step;
                    ?>
                    <li  class="list-inline-item <?php if($color){ echo ' colored'; } ?>" style="font-size: <?php echo $fs; ?>px;<?php if($color){ echo ' color: '.$color; } ?>">
                        <i class="fa fa-tag"></i> <?php echo html_tags_bar($tag['tag']); ?>
                    </li>
                <?php } ?>

                <?php if ($style=='list'){ ?>
                    <li  class="list-inline-item" <?php if($color){ echo 'class="colored" style="color: '.$color.'"'; } ?>>
                        <i class="fa fa-tag"></i>
                        <?php echo html_tags_bar($tag['tag']); ?>
                        <span class="counter"><?php html($tag['frequency']); ?></span>
                    </li>
                <?php } ?>


            <?php } ?>
        </ul>

    </div>

<?php } ?>