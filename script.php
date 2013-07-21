<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of HelloWorld component
 */
class com_DirectmailInstallerScript
{
        /**
         * method to install the component
         *
         * @return void
         */
        function install($parent) 
        {
             // Create categories for our component
    		$basePath = JPATH_ADMINISTRATOR . '/components/com_categories';
    		require_once $basePath . '/models/category.php';
   			$config = array( 'table_path' => $basePath . '/tables');
   			$catmodel = new CategoriesModelCategory( $config);
		    $catData = array( 'id' => 0, 'parent_id' => 0, 'level' => 1, 'path' => 'non-categorise', 'extension' => 'com_directmail'
    , 'title' => 'Non catégorisé', 'alias' => 'non-categorise', 'description' => '<p>Catégorie par défaut de directmail</p>', 'published' => 1, 'language' => '*');
    		$status = $catmodel->save( $catData);
  
		    if(!$status) 
   			{
		      JError::raiseWarning(500, JText::_('Unable to create default content category!'));
		    }    
        }
 
        /**
         * method to uninstall the component
         *
         * @return void
         */
        function uninstall($parent) 
        {
          		$db = JFactory::getDBO();
                $query = $db->getQuery(true);
                $query->select('id');
                $query->from('#__categories');
				$query->where('extension = "com_directmail"');
                $db->setQuery((string)$query);
				
				try
				{
					 $results = $db->loadObjectList();
				}
				catch (RuntimeException $e)
				{
					JError::raiseWarning(500, $e->getMessage());
				}
				
				$basePath = JPATH_ADMINISTRATOR . '/components/com_categories';
				require_once $basePath . '/models/category.php';
				$config = array( 'table_path' => $basePath . '/tables');
				$catmodel = new CategoriesModelCategory( $config);
				$catmodel->delete($results);      
        }
 
        /**
         * method to update the component
         *
         * @return void
         */
        function update($parent) 
        {
	        	$db = JFactory::getDBO();
                $query = $db->getQuery(true);
                $query->select('id');
                $query->from('#__categories');
				$query->where('extension = "com_directmail"');
                $db->setQuery((string)$query);
				
				try
				{
					 $results = $db->loadObjectList();
				}
				catch (RuntimeException $e)
				{
					JError::raiseWarning(500, $e->getMessage());
				}
				
				if (count($results)==0){
					 // Create categories for our component
					$basePath = JPATH_ADMINISTRATOR . '/components/com_categories';
					require_once $basePath . '/models/category.php';
					$config = array( 'table_path' => $basePath . '/tables');
					$catmodel = new CategoriesModelCategory( $config);
					$catData = array( 'id' => 0, 'parent_id' => 0, 'level' => 1, 'path' => 'non-categorise', 'extension' => 'com_directmail'
			, 'title' => 'Non catégorisé', 'alias' => 'non-categorise', 'description' => '<p>Catégorie par défaut de directmail</p>', 'published' => 1, 'language' => '*');
					$status = $catmodel->save( $catData);
		  
					if(!$status) 
					{
					  JError::raiseWarning(500, JText::_('Unable to create default content category!'));
					}
				}
				

		}
 
        /**
         * method to run before an install/update/uninstall method
         *
         * @return void
         */
        function preflight($type, $parent) 
        {
                
        }
 
        /**
         * method to run after an install/update/uninstall method
         *
         * @return void
         */
        function postflight($type, $parent) 
        {
                
        }
}