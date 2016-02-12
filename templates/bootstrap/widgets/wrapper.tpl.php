<div class="widget<?php if ($widget['class_wrap']) { ?> <?php echo ltrim($widget['class_wrap'], '.');  } ?>">

    <?php if ($widget['title'] && $is_titles){ ?>
        <div class="title<?php if ($widget['class_title']) { ?> <?php echo ltrim($widget['class_title'], '.');  } ?>">
            <?php echo $widget['title']; ?>
            <?php if (!empty($widget['links'])) { ?>
                <div class="links dropdown">
                    <a id="dLabel<?php echo $widget['id']; ?>" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="dropdown-toggle"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel<?php echo $widget['id']; ?>">
                        <?php $links = string_parse_list($widget['links']); ?>
                        <?php foreach($links as $link){ ?>
                            <a class="dropdown-item" href="<?php echo (mb_strpos($link['value'], 'http://')===0) ? $link['value'] : href_to($link['value']); ?>"><?php echo $link['id']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="body<?php if ($widget['class']) { ?> <?php echo ltrim($widget['class'], '.');  } ?>">
        <?php echo $widget['body']; ?>
    </div>

</div>
