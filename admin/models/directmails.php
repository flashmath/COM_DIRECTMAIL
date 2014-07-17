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
class DirectmailModelDirectmails extends JModelList
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
                $query->select('a.id as id,a.name as name,a.answer as answer,a.email as email,a.checked_out as checked_out,a.checked_out_time as checked_out_time,a.catid as catid,a.state as state,a.ordering as ordering');
                // From the hello table
                $query->from('#__directmail AS a');
				
				$query->select('uc.name AS editor')
			->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
			
			// Join over the categories.
		$query->select('c.title AS category_title')
			->join('LEFT', '#__categories AS c ON c.id = a.catid');
				
						
				// Filter by published state
				$published = $this->getState('filter.state');
				if (is_numeric($published))
				{
					$query->where('a.state = ' . (int) $published);
				}
				elseif ($published === '')
				{
					$query->where('(a.state IN (0, 1))');
				}
				
				
				// Filter by category.
				$categoryId = $this->getState('filter.category_id');
				if (is_numeric($categoryId))
				{
					$query->where('a.catid = ' . (int) $categoryId);
				}
				
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
			
			$state = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
			$this->setState('filter.state', $state);

			$categoryId = $this->getUserStateFromRequest($this->context.'.filter.category_id', 'filter_category_id', '');
			$this->setState('filter.category_id', $categoryId);
		
			// Load the parameters.
			$params = JComponentHelper::getParams('com_directmail');
			$this->setState('params', $params);
		
        	parent::populateState('name', 'ASC');
		}
}