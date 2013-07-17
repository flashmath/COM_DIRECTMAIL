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
 class DirectmailsController extends JControllerLegacy{
 
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
		$view   = $this->input->get('view', 'directmails');
		//$layout = $this->input->get('layout', 'default');
		//$id     = $this->input->getInt('id');
		
		$input = JFactory::getApplication()->input;
		$input->set('view', $view);
		
		parent::display();
		
		return $this;
	}
	
 }