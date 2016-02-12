<div class="widget_search">
    <form action="<?php echo href_to('search'); ?>" method="get">
		<div class="input-group">
        	<?php echo html_input('text', 'q', '', array('placeholder'=>LANG_WD_SEARCH_QUERY_INPUT, 'class'=>'form-control-sm')); ?>
		    <span class="input-group-btn">
		        <button type="submit" name="submit" class="btn btn-secondary btn-sm">Поиск</button>
		    </span>
		</div>
    </form>
</div>
