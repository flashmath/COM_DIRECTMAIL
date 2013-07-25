<?php
// No direct access to this file
defined('_JEXEC') or die('');
 
 
/**
 * HTML View class for the Directmail Component
 */
class DirectmailViewDirectmail extends JViewLegacy
{
        // Overwriting JView display method
        function display($tpl = null) 
        {
                // Get the view data.
				$this->data		= $this->get('Data');
				$this->form		= $this->get('Form');
				$this->state	= $this->get('State');
				$this->params	= $this->state->get('params');
 
 				// Check for errors.
				if (count($errors = $this->get('Errors')))
				{
					JError::raiseError(500, implode('<br />', $errors));
					return false;
				}
				
                // Display the view
                parent::display($tpl);
        }
}
?>
