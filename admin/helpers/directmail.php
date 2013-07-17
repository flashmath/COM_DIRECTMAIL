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
		 JHtmlSidebar::addEntry(
			JText::_('COM_DIRECTMAIL_SUBMENU_DIRECTMAILS'),
			'index.php?option=com_directmail&view=directmails',
			$vName == 'directmails'
		);
	 }
}