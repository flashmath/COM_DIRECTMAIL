<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die();
// import the Joomla modellist library
//jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of directmail records.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directmail
 * @since       3.1
 */
class DirectmailModelDirectmail extends JModelAdmin
{

/**
         * Returns a reference to the a Table object, always creating it.
         *
         * @param       type    The table type to instantiate
         * @param       string  A prefix for the table class name. Optional.
         * @param       array   Configuration array for model. Optional.
         * @return      JTable  A database object
         * @since       3.1
         */
        public function getTable($type = 'DirectMail', $prefix = 'DirectMailTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
		
        /**
         * Method to get the record form.
         *
         * @param       array   $data           Data for the form.
         * @param       boolean $loadData       True if the form is to load its own data (default case), false if not.
         * @return      mixed   A JForm object on success, false on failure
         * @since       3.1
         */
		public function getForm($data = array(), $loadData = true) 
        {
                // Get the form.
                $form = $this->loadForm('com_directmail.directmail', 'directmail',
                                        array('control' => 'jform', 'load_data' => $loadData));
                if (empty($form)) 
                {
                        return false;
                }
                return $form;
        }
		
		/**
         * Method to get the data that should be injected in the form.
         *
         * @return      mixed   The data for the form.
         * @since       3.1
         */
        protected function loadFormData() 
        {
                // Check the session for previously entered form data.
                $data = JFactory::getApplication()->getUserState('com_directmail.edit.directmail.data', array());
                if (empty($data)) 
                {
                        $data = $this->getItem();
                }
                return $data;
        }

		/**
         * Method to check if it's OK to delete a message. Overwrites JModelAdmin::canDelete
         */
        protected function canDelete($record)
        {
            if( !empty( $record->id ) ){
                $user = JFactory::getUser();
                return $user->authorise( "core.delete", "com_directmail.route." . $record->id );
            }
        }
}
?>