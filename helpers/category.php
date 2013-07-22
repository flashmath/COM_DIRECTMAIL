<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Contact Component Category Tree
 *
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @since       1.6
 */
class DirectmailCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__directmail';
		$options['extension'] = 'com_directmail';
		parent::__construct($options);
	}
}
