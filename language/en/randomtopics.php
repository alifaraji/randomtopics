<?php
/**
*
* @package Random Topics
* @copyright (c) 2014 Ali Faraji <alifaraji.mail@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'RANDOM_TOPICS'			=> 'Random Topics',
));