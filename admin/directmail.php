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

// Get the task
$jinput = JFactory::getApplication()->input;

$task = $jinput->get('task', "", 'STR' );

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();

?>