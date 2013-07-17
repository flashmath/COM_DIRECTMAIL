<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

?>
<form action="<?php echo JRoute::_('index.php?option=com_directmail&view=directmailss'); ?>" method="post" name="adminForm" id="adminForm">
<?php
if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
<table class="table table-striped" id="articleList">
	<thead>
      	<tr>
        	<th width="1%" class="nowrap center hidden-phone">
						<?php  echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
			</th>
            <th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
			</th>
            <th>
				<?php  echo JHtml::_('grid.sort', 'COM_DIRECTMAIL_HEADING_NAME', 'name', $listDirn, $listOrder); ?>
			</th>
        </tr>
        
    </thead>
    <tfoot>
				<tr>
					<td colspan="3">
						<?php  echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
            <tbody>
            
            </tbody>
</table>
</div>
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
</form>
