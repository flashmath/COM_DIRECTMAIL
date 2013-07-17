<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of directmails.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmails
 * @since       3.1
 */
class DirectmailsViewDirectmails extends JViewLegacy{
	
	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   3.1
	 */
	public function display($tpl=null){
		echo 'display view';
		$items = $this->get('Items');
        $pagination = $this->get('Pagination');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(499, implode("\n", $errors));
			return false;
		}
		// Assign data to the view
                $this->items = $items;
                $this->pagination = $pagination;
 
                // Display the template
				parent::display($tpl);

	}
}
 
?>