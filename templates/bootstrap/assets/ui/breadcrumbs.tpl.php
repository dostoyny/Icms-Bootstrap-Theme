<?php $listed = array(); ?>
<ol class="breadcrumb">
    <li class="home">
        <a href="<?php echo $options['home_url']; ?>" title="<?php echo LANG_HOME; ?>"><i class="fa fa-home"></i></a>
    </li>
    <?php if ($breadcrumbs) { ?>
        <?php foreach($breadcrumbs as $id=>$item){ ?>
            <?php if (in_array($item['href'], $listed)){ continue; } ?>
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" <?php if (isset($item['is_last'])) {echo 'class="active"';} ?> > 
                <?php if (!isset($item['is_last'])){ ?>
                    <a href="<?php html($item['href']); ?>"><span><?php html($item['title']); ?></span></a>
                <?php } else { ?>
                    <span><?php html($item['title']); ?></span>
                <?php } ?>
            </li>
            <?php $listed[] = $item['href']; ?>
        <?php } ?>
    <?php } ?>
</ol>
