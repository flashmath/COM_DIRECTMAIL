<?php
// No direct access to this file
defined('_JEXEC') or die();
 
// import joomla controller library
//jimport('joomla.application.component.controller');
 
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