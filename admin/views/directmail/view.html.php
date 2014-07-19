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
 * View class for an item of directmail.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 * @since       3.1
 */
class DirectmailViewDirectmail extends JViewLegacy{
        protected $form;

		protected $item;

		protected $state;
	
		/**
         * display method of Direct Mail
         * @return void
         */
        public function display($tpl = null) 
        {
                // get the Data
                $form = $this->get('Form');
                $item = $this->get('Item');
 				$state = $this->get('State');
				
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign the Data
                $this->form = $form;
                $this->item = $item;
 				$this->state = $state;
				
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
			JFactory::getApplication()->input->set('hidemainmenu', true);
			
                $input = JFactory::getApplication()->input;
                //$input->set('hidemainmenu', true);
                $isNew = ($this->item->id == 0);
                JToolBarHelper::title($isNew ? JText::_('COM_DIRECTMAIL_MANAGER_DIRECTMAIL_NEW')
                                             : JText::_('COM_DIRECTMAIL_MANAGER_DIRECTMAIL_EDIT'));
				
				JToolBarHelper::apply('directmail.apply');							 
				JToolBarHelper::save('directmail.save');
				
				JToolbarHelper::save2new('directmail.save2new');
				
                JToolBarHelper::cancel('directmail.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');

        }


}