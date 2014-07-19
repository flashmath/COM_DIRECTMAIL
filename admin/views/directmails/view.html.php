<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of directmails.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmails
 * @since       3.1
 */
class DirectmailViewDirectmails extends JViewLegacy{
	
	protected $state;
	protected $items;
	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   3.1
	 */
	public function display($tpl=null){
		$items = $this->get('Items');
        $pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		// Assign data to the view
                $this->items = $items;
                $this->pagination = $pagination;
 											
				DirectmailHelper::addSubmenu('directmails');
				
				// Set the toolbar
                $this->addToolBar();
				
				$this->sidebar = JHtmlSidebar::render();
                // Display the template
				parent::display($tpl);

	}
	
	public function addToolBar(){		
		require_once JPATH_COMPONENT.'/helpers/directmail.php';
		
		$canDo = DirectmailHelper::getActions($this->state->get('filter.category_id'));
		$user  = JFactory::getUser();
		
		JToolBarHelper::title(JText::_('COM_DIRECTMAIL_MANAGER_DIRECTMAILS'));
		
		if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_content', 'core.create'))) > 0 )
		{
    		JToolBarHelper::addNew('directmail.add');
		}
		
		if (($canDo->get('core.edit')) || ($canDo->get('core.edit.own')))
		{
			JToolbarHelper::editList('directmail.edit');
		}
		
		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('directmails.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('directmails.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::checkin('directmails.checkin');
		}
		
		if ($this->state->get('filter.published') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'directmails.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('directmails.trash');
		}
		
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_directmail'), 'value', 'text', $this->state->get('filter.category_id'))
		);

	}
	
	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.1
	 */
	protected function getSortFields()
	{
		return array(
			'ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'name' => JText::_('COM_DIRECTMAIL_HEADING_NAME')
		);
	}
	
}
 
?>