<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Registration model class for Users.
 *
 * @package     Joomla.Site
 * @subpackage  com_directmail
 * @since       3.1
 */
class DirectmailModelFormulaire extends JModelForm
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_directmail.formulaire', 'formulaire', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}

		return $form;
	}
	
	protected function populateState()
	{
		// Get the application object.
		$app = JFactory::getApplication();
		$params = $app->getParams('com_directmail');

		// Load the parameters.
		$this->setState('params', $params);
	}
}