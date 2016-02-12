<div class="widget_tabbed">
    <!-- Nav tabs -->
    <ul class="nav wd-tab clearfix" role="tablist">
        <?php foreach($widgets as $index=>$widget) { ?>
            <li class="nav-item<?php if (!empty($widget['links'])) { ?> dropdown<?php } ?>">
                <a class="nav-link<?php if ($index==0) { ?> active<?php } ?>" data-toggle="tab" href="#link<?php echo $widget['id']; ?>" role="tab">
                    <?php echo $widget['title'] ? $widget['title'] : ($index+1); ?>
                </a>
                <?php if (!empty($widget['links'])) { ?>
                    <a class="wd-tab-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu">
                            <?php $links = string_parse_list($widget['links']); ?>
                            <?php foreach($links as $link){ ?>
                                <a class="dropdown-item" href="<?php echo (mb_strpos($link['value'], 'http://')===0) ? $link['value'] : href_to($link['value']); ?>"><?php echo $link['id']; ?></a>
                            <?php } ?>
                        </div>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <?php foreach($widgets as $index=>$widget) { ?>
            <div class="tab-pane fade<?php if ($index==0) { ?> in active<?php } ?>" id="link<?php echo $widget['id']; ?>" role="tabpanel">
                <?php echo $widget['body']; ?>
            </div>
        <?php } ?>
    </div>
</div>
