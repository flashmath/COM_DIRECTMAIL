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
	
	public function getData()
	{
		if ($this->data === null)
		{
			$this->data=new stdClass;
			
			$app = JFactory::getApplication();
			$params = JComponentHelper::getParams('com_users');
			
			// Override the base user data with any data in the session.
			$temp = (array) $app->getUserState('com_directmail.formulaire.data', array());
			foreach ($temp as $k => $v)
			{
				$this->data->$k = $v;
			}
			
			$dispatcher = JEventDispatcher::getInstance();
			$results = $dispatcher->trigger('onContentPrepareData', array('com_directmail.formulaire', $this->data));
			
			// Check for errors encountered while preparing the data.
			if (count($results) && in_array(false, $results, true))
			{
				$this->setError($dispatcher->getError());
				$this->data = false;
			}
		}
		
		return $this->data;
	}
	
	public function submit($temp)
	{
		$config = JFactory::getConfig();
		$db = $this->getDbo();
		
		$data = (array) $this->getData();
		
		// Merge in the registration data.
		foreach ($temp as $k => $v)
		{
			$data[$k] = $v;
		}
		
		$data['fromname'] = $config->get('fromname');
		$data['mailfrom'] = $config->get('mailfrom');
		$data['sitename'] = $config->get('sitename');
		$data['siteurl'] = JUri::root();
	
	}
}