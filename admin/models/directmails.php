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
class DirectmailsModelDirectmails extends JModelList
{
	
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 
				'name'				
			);
		}

		parent::__construct($config);
	}
        /**
         * Method to build an SQL query to load the list data.
         *
         * @return      string  An SQL query
         */
        protected function getListQuery()
        {
                // Create a new query object.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                // Select some fields
                $query->select('id');
                // From the hello table
                $query->from('#__directmail');
				
				// Add the list ordering clause.
				$orderCol = $this->state->get('list.ordering', 'ordering');
				$orderDirn = $this->state->get('list.direction', 'ASC');
				if ($orderCol == 'ordering'){
				  $orderCol='name';
				}
				$query->order($db->escape($orderCol.' '.$orderDirn));
				
                return $query;
        }
		
		protected function populateState($ordering = null, $direction = null) {
        	parent::populateState('name', 'ASC');
		}
}