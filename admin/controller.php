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
 * directmail master display controller.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 * @since       3.1
 */
 class DirectmailController extends JControllerLegacy{
 
	protected $default_view = 'directmails';
 	/**
	 * Method to display a view.
	 *
	 * @param   boolean			If true, the view output will be cached
	 * @param   array  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JControllerLegacy		This object to support chaining.
	 * @since   3.1
	 */
	 public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/directmail.php';
				
		$view   = $this->input->get('view', 'directmails');
		$layout = $this->input->get('layout', 'directmails');
		$id     = $this->input->getInt('id');
		
		//TODO attention peut-être erreur du fait de com_directmail.edit.directmail
		if ($view == 'directmails' && $layout == 'edit' && !$this->checkEditId('com_directmail.edit.directmail', $id))
		{
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_content&view=articles', false));
			return false;
		}
			
		$input = JFactory::getApplication()->input;
		$input->set('view', $view);
		
		parent::display();
		
		return $this;
	}
	
 }