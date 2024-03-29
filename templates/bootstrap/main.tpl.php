<?php $core = cmsCore::getInstance(); ?>
<!DOCTYPE html>
<html<?php if (!empty($this->options['site_languages'])){ ?> lang="<?php echo $this->options['site_languages']; ?>"<?php } ?>>
<head>
    <title><?php $this->title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $this->addMainCSS("templates/{$this->name}/css/theme-layout.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/theme-gui.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/theme-widgets.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/theme-content.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/theme-modal.css"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/jquery.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/jquery-modal.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/core.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/modal.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/messages.js"); ?>
    <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <?php $this->addMainCSS("templates/{$this->name}/addons/font-awesome-4.5.0/css/font-awesome.min.css"); ?>

    <?php $this->head(); ?>

    <style><?php include('options.css.php'); ?></style>
</head>
<body>

    <div id="layout">
        <?php if (!$config->is_site_on){ ?>
            <div id="site_off_notice" class="alert alert-danger"><?php printf(ERR_SITE_OFFLINE_FULL, href_to('admin', 'settings', 'siteon')); ?></div>
        <?php } ?>
        <header style="margin-bottom: 14px; margin-top: 15px;">
            <div class="container">
                <nav class="navbar navbar-light bg-faded">
                    <?php $this->widgets('top', false, 'wrapper_plain'); ?>
                </nav>
            </div>
        </header>
        <div id="body">
            <div class="container">
                <?php if ($config->show_breadcrumbs && $this->isBreadcrumbs()){ ?>
                    <div id="breadcrumbs">
                        <?php $this->breadcrumbs(array('strip_last'=>false)); ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <?php
                        $messages = cmsUser::getSessionMessages();
                        if ($messages){
                            ?>
                            <div class="sess_messages">
                                <?php
                                    foreach($messages as $message){
                                        echo $message;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>

                    <section class="col-xs-8">

                        <?php $this->widgets('left-top'); ?>

                        <?php if ($this->isBody()){ ?>
                            <article>
                                <?php $this->body(); ?>
                            </article>
                        <?php } ?>

                        <?php $this->widgets('left-bottom'); ?>

                    </section>

                    <aside class="col-xs-4">
                        <?php $this->widgets('right-top'); ?>

                        <?php $this->widgets('right-center'); ?>

                        <?php $this->widgets('right-bottom'); ?>
                    </aside>
                </div>
            </div>
        </div>

        <?php if ($config->debug && cmsUser::isAdmin()){ ?>
            <div id="sql_debug" style="display:none">
                <div id="sql_queries">
                    <?php foreach($core->db->query_list as $sql) { ?>
                        <div class="query">
                            <div class="src"><?php echo $sql['src']; ?></div>
                            <?php echo nl2br($sql['sql']); ?>
                            <div class="query_time"><?php echo LANG_DEBUG_QUERY_TIME; ?> <span class="<?php echo (($sql['time']>=0.1) ? 'red_query' : 'green_query'); ?>"><?php echo number_format($sql['time'], 5); ?></span> <?php echo LANG_SECOND10 ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <footer class="footer">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="nav-item" id="copyright">
                    <a class="nav-link" href="<?php echo $this->options['owner_url'] ? $this->options['owner_url'] : href_to_home(); ?>">
                        <?php html($this->options['owner_name'] ? $this->options['owner_name'] : cmsConfig::get('sitename')); ?>
                        &copy;
                        <?php echo $this->options['owner_year'] ? $this->options['owner_year'] : date('Y'); ?>
                    </a>
                </li>
                <li class="nav-item" id="info">
                    <span class="nav-link">
                        <?php echo LANG_POWERED_BY_INSTANTCMS; ?>
                    </span>

                    <?php if ($config->debug && cmsUser::isAdmin()){ ?>
                        <span class="item">
                            SQL: <a href="#sql_debug" class="ajax-modal"><?php echo $core->db->query_count; ?></a>
                        </span>
                        <?php if ($config->cache_enabled){ ?>
                            <span class="item">
                                Cache: <?php echo cmsCache::getInstance()->query_count; ?>
                            </span>
                        <?php } ?>
                        <span class="item">
                            Mem: <?php echo round(memory_get_usage()/1024/1024, 2); ?> Mb
                        </span>
                        <span class="item">
                            Time: <?php echo number_format(cmsCore::getTime(), 4); ?> s
                        </span>
                    <?php } ?>
                </li>
            </ul>
            <div class="pull-sm-right">
                <?php $this->widgets('footer', false, 'wrapper_plain'); ?>
            </div>
        </div>
    </footer>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

</body>
</html>
