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
class DirectmailViewDirectmail extends JViewLegacy{
/**
         * display method of Hello view
         * @return void
         */
        public function display($tpl = null) 
        {
                // get the Data
                $form = $this->get('Form');
                $item = $this->get('Item');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign the Data
                $this->form = $form;
                $this->item = $item;
 
 				// Set the toolbar
                $this->addToolBar();

                // Display the template
                parent::display($tpl);
        }
		
		        /**
         * Setting the toolbar
         */
        protected function addToolBar() 
        {
                $input = JFactory::getApplication()->input;
                //$input->set('hidemainmenu', true);
                $isNew = ($this->item->id == 0);
                JToolBarHelper::title($isNew ? JText::_('COM_DIRECTMAIL_MANAGER_DIRECTMAIL_NEW')
                                             : JText::_('COM_DIRECTMAIL_MANAGER_DIRECTMAIL_EDIT'));
        }


}