<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="registration<?php echo $this->pageclass_sfx?>">
<form id="form-sendmail" action="<?php echo JRoute::_('index.php?option=com_directmail&task=formulaire.submit'); ?>" 
	method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
	<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
		<?php $fields = $this->form->getFieldset($fieldset->name);?>
		<?php if (count($fields)):?>
			<fieldset>
				<?php foreach ($fields as $field) :// Iterate through the fields in the set and display them.?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
								<?php if (!$field->required && $field->type != 'Spacer') : ?>
									<span class="optional"><?php echo JText::_('COM_DIRECTMAIL_OPTIONAL');?></span>
								<?php endif; ?>
						</div>
						<div class="controls">
							<?php echo $field->input;?>
						</div>
					</div>
				<?php endforeach;?>
			</fieldset>
		<?php endif; ?>
	<?php endforeach; ?>
	<div class="form-actions">
			<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JSUBMIT');?></button>
			<a class="btn" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
			<input type="hidden" name="option" value="com_directmail" />
			<input type="hidden" name="task" value="formulaire.submit" />
			<?php echo JHtml::_('form.token');?>
		</div>
</form>
</div>