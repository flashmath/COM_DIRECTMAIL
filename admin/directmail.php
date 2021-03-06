<?php
// No direct access to this file
defined('_JEXEC') or die();
 
// import joomla controller library
//jimport('joomla.application.component.controller');
 
// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_directmail')) 
{        
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Directmail');

$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();

?>