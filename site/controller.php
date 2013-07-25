<?php
// No direct access to this file
defined('_JEXEC') or die('');
 
 
/**
 * Directmail Component Controller
 */
class DirectMailController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{
		// Get the document object.
		$document	= JFactory::getDocument();

		// Set the default view name and format from the Request.
		$vName   = $this->input->getCmd('view', 'directmail');
		$vFormat = $document->getType();
		$lName   = $this->input->getCmd('layout', 'default');
		
		if ($view = $this->getView($vName, $vFormat))
		{
			switch ($vName){
				case 'directmail':
				default :
				  $model=$this->getModel('formulaire');				  
				break;
			}
		}
		
	}
}
?>
