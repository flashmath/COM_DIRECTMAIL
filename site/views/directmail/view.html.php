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
                // Assign data to the view
                $this->msg = 'Directmail Component';
 
                // Display the view
                parent::display($tpl);
        }
}
?>
