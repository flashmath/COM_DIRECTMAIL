<?php
/**
 * @package     Joomla.Site
* @subpackage  com_users
*
* @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Registration controller class for Users.
 *
 * @package     Joomla.Site
 * @subpackage  com_users
 * @since       1.6
 */
class DirectMailControllerFormulaire extends DirectMailController
{
	public function submit()
	{
		/*
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		
		$app	= JFactory::getApplication();
		$model	= $this->getModel('Formulaire', 'DirectMail');
		
		// Get the user data.
		$requestData = $this->input->post->get('jform', array(), 'array');
		
		// Validate the posted data.
		$form	= $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		$data	= $model->validate($form, $requestData);
		
		// Check for validation errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();
		
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
			if ($errors[$i] instanceof Exception)
			{
			$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
			$app->enqueueMessage($errors[$i], 'warning');
				}
			}
		
			// Save the data in the session.
			$app->setUserState('com_directmail.formulaire.data', $requestData);
		
			// Redirect back to the registration screen.
			$this->setRedirect(JRoute::_('index.php?option=com_directmail&view=directmail', false));
			return false;
		}

		// Attempt to save the data.
		$return	= $model->submit($data);
		
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_directmail.directmail.data', $data);
		
			// Redirect back to the edit screen.
			$this->setMessage(JText::sprintf('COM_USERS_REGISTRATION_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_directmail&view=directmail', false));
			return false;
		}
		
		// Flush the data from the session.
		$app->setUserState('com_directmail.directmail.data', null);
		
		// Redirect to the profile screen.
		if ($return === 'adminactivate'){
			$this->setMessage(JText::_('COM_USERS_REGISTRATION_COMPLETE_VERIFY'));
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=registration&layout=complete', false));
		} elseif ($return === 'useractivate')
		{
			$this->setMessage(JText::_('COM_USERS_REGISTRATION_COMPLETE_ACTIVATE'));
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=registration&layout=complete', false));
		}
		else
		{
			$this->setMessage(JText::_('COM_USERS_REGISTRATION_SAVE_SUCCESS'));
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
		}
		
		return true;
		*/
		echo 'testFormulaire';
	    return true;
	}
}
?>