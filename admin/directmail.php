<?php
// No direct access to this file
defined('_JEXEC') or die();
 
// import joomla controller library
//jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Directmails');
 
echo '1';
// Get the task
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR' );
 
echo '2';
// Perform the Request task
$controller->execute($task);

echo '3'; 
// Redirect if set by the controller
$controller->redirect();

echo '4';
?>