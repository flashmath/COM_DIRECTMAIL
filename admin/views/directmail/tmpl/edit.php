<?php

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'directmail.cancel'  || document.formvalidator.isValid(document.id('route-form')))
		{
			Joomla.submitform(task, document.getElementById('route-form'));
		}
	}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_directmail&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="route-form" class="form-validate form-horizontal">
<div class="span10 form-horizontal">
<fieldset>
<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_DIRECTMAIL_DIRECTMAIL_DETAILS', true)); ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('name'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('name'); ?>
					</div>
				</div>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('catid'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('catid'); ?>
					</div>
				</div>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('answer'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('answer'); ?>
					</div>
				</div>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('email'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('email'); ?>
					</div>
				</div>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('info'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('info'); ?>
					</div>
				</div>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('id'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('id'); ?>
					</div>
				</div>
          <?php echo JHtml::_('bootstrap.endTab'); ?>
     <?php echo JHtml::_('bootstrap.endTabSet'); ?>           
</fieldset>
</div>
<div class="span2">
		<h4><?php echo JText::_('JDETAILS');?></h4>
		<hr />
        <fieldset class="form-vertical">
        	<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('state'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('state'); ?>
				</div>
			</div>
        </fieldset>
</div>
<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>