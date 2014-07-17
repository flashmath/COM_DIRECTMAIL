<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 // No direct access to this file
defined('_JEXEC') or die();

/**
 * directmail controller for a route.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 * @since       3.1
 */
 class DirectmailControllerDirectmail extends JControllerForm
{	

	protected function allowAdd($data = array()){
		echo 'testAdd';
		return true;
	}
	
	protected function allowEdit($data = array(), $key = 'id'){
		echo 'testEdit';
		return true;
	}
	
	public function batch($model = null)
	{
		echo 'testB';
		//JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Set the model
		$model	= $this->getModel('Directmail', '', array());

		// Preset the redirect
		$this->setRedirect(JRoute::_('index.php?option=com_directmail&view=directmails' . $this->getRedirectToListAppend(), false));

		return parent::batch($model);
	}
}