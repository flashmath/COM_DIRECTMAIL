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
}
?>