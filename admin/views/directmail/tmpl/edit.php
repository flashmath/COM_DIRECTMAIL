<?php

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'directmail.cancel')
		{
			Joomla.submitform(task, document.getElementById('adminForm'));
		}
	}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_directmail&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
<?php
echo 'test new';
?>
<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>