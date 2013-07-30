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
	protected $data;
	
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
	
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		$data = $this->getData();
	
		$this->preprocessData('com_directmail.formulaire', $data);
	
		return $data;
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
		
		$query=$db->getQuery(true);
		$query->select('email, answer');
		$query->from('#__directmail');
		$query->where('id = ' . (int) $data['question']);
		
		$db->setQuery($query);
		
		$dest = $db->loadObject();
		
		if (empty($dest))
		{
			return JError::raiseError(404, JText::_('COM_DIRECTMAIL_ERROR_DESTINATAIRE_NOT_FOUND'));
		}
		
		$emailSubject = JText::_('COM_DIRECTMAIL_MAIL_SUBJECT') . '-' . $dest['answer'];		
		
		$data['fromname'] = $config->get('fromname');
		$data['mailfrom'] = $config->get('mailfrom');
		$data['sitename'] = $config->get('sitename');
		$data['siteurl'] = JUri::root();
		
		// Send the registration email.
		//$return = JFactory::getMailer()->sendMail($data['mailfrom'], $data['fromname'], $dest['email'], $emailSubject, $data['message']);
	$return=true;
		if ($return !== true)
		{
			$this->setError(JText::_('COM_DIRECTMAIL_SEND_MAIL_FAILED'));
			return false;
		}
		
		return true;
	}
}