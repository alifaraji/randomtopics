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
	'ACP_RANDOMTOPICS'				=> 'Random Topics',
	'ACP_RANDOMTOPICS_SETTINGS'		=> 'Settings',
	'ACP_RTOPICS_LIMIT'				=> 'Topic number limit',
	'ACP_LIMIT_ACTIVE_EXP'			=> 'Number of topics to show',
	'ACP_RANDOMTOPICS_TITLE'		=> 'Random Topics',
	'ACP_RTOPICS_ACTIVE'			=> 'Enable Random Topics?',
	'ACP_RTOPICS_ACTIVE_EXP'		=> 'Enable/disable Random Topics extention',
	'ACP_RTOPICS_SETTING_SAVED'		=> 'Settings successfully updated.',
	'ACP_RTOPICS_INDEX'				=> 'Show Random topics in index page',
	'ACP_RTOPICS_INDEX_EXP'			=> 'Enabling this option will show random topics in index page',
	'ACP_RTOPICS_VIEWTOPIC'			=> 'Show Random topics in index viewtopic page',
	'ACP_RTOPICS_VIEWTOPIC_EXP'		=> 'Enabling this option will show random topics in viewtopic page',
));