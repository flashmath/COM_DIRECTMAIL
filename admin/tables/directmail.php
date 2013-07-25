<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

 
/**
 * Directmail Table class
 */
class DirectMailTableDirectMail extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('#__directmail', 'id', $db);
        }
		
		 public function bind($array, $ignore = '') 
        {
			if (isset($array['params']) && is_array($array['params'])) 
                {
                        // Convert the params field to a string.
                        $parameter = new JRegistry;
                        $parameter->loadArray($array['params']);
                        $array['params'] = (string)$parameter;
                }
                // Bind the rules.                
				if (isset($array['rules']) && is_array($array['rules']))                
				{                        
				   $rules = new JAccessRules($array['rules']);                        
				   $this->setRules($rules);                
				}                 
				   return parent::bind($array, $ignore);
		}
		
		/**         
		  * Method to compute the default name of the asset.         
		  * The default name is in the form `table_name.id`        
		  * where id is the value of the primary key of the table.         
		  *         
		  * @return      string         
		  * @since       2.5         
		  */        
		  protected function _getAssetName()        
		  {                
		        $k = $this->_tbl_key;                
				return 'com_directmail.route.'.(int) $this->$k;        
		  }         
		  
		  /**         
		   * Method to return the title to use for the asset table.         
		   *         
		   * @return      string         
		   * @since       2.5         
		   */        
		   protected function _getAssetTitle()        
		   {                
		        return $this->name;        
			}         
			
			/**         
			 * Method to get the asset-parent-id of the item         
			 *         
			 * @return      int        
			 */        
			 protected function _getAssetParentId($table = NULL, $id = NULL)        
			 {                
			    // We will retrieve the parent-asset from the Asset-table
				$assetParent = JTable::getInstance('Asset');                
				// Default: if no asset-parent can be found we take the global asset
				$assetParentId = $assetParent->getRootId();                 
				// Find the parent-asset                
				if (($this->catid)&& !empty($this->catid))                
				{                        
				  // The item has a category as asset-parent
				  $assetParent->loadByName('com_directmail.category.' . (int) $this->catid);                }                
				 else {                        
				   // The item has the component as asset-parent
				   $assetParent->loadByName('com_directmail');                
				}                 
				// Return the found asset-parent-id                
				if ($assetParent->id)                
				{                        
				  $assetParentId=$assetParent->id;                
				}                
				return $assetParentId;        
		}
}
?>