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
 * Banners component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_directamil
 * @since       3.1
 */
class DirectmailHelper{
	
	public static $extension = 'com_directmail';
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string	The name of the active view.
	 *
	 * @return  void
	 * @since   3.1
	 */
	 public static function addSubmenu($vName)
	 {
		 $document=JFactory::getDocument();
		 JHtmlSidebar::addEntry(
			JText::_('COM_DIRECTMAIL_SUBMENU_DIRECTMAILS'),
			'index.php?option=com_directmail&view=directmails',
			$vName == 'directmails'
		);
		
		 JHtmlSidebar::addEntry(JText::_('COM_DIRECTMAIL_SUBMENU_CATEGORIES'),
                                         'index.php?option=com_categories&extension=com_directmail',
                                         $vName == 'categories');

		if ($vName == 'categories') 
                {
                        $document->setTitle(JText::_('COM_DIRECTMAIL_ADMINISTRATION_CATEGORIES'));
                }

	 }
	 
	 /**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   integer  The category ID.
	 *
	 * @return  JObject
	 * @since   1.6
	 */
	 public static function getActions($categoryId = 0, $routeId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;


		if (empty($categoryId) && empty($routeId))
		{
			$assetName = 'com_directmail';
			$level = 'component';
		}
		elseif (empty($routeId))
		{
			$assetName = 'com_directmail.category.'.(int) $categoryId;
			$level = 'category';
		}
		else
		{
			$assetName = 'com_directmail.route.'.(int) $routeId;
			$level = 'route';
		}


		$actions = JAccess::getActionsFromFile(
			JPATH_ADMINISTRATOR . '/components/com_directmail/access.xml',
			"/access/section[@name='" . $level . "']/"
		);


		if (!$actions){
    		JError::raiseError(500, 'fichier inexistant');
			return false;
		}
		
			
		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		
		/*$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action,	$user->authorise($action, $assetName));
		}*/

		return $result;
	}
	
}