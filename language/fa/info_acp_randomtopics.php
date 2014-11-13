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
	'ACP_RANDOMTOPICS'				=> 'موضوعات اتفاقی',
	'ACP_RANDOMTOPICS_SETTINGS'		=> 'تنظیمات',
	'ACP_RTOPICS_LIMIT'				=> 'محدودیت تعداد موضوع',
	'ACP_LIMIT_ACTIVE_EXP'			=> 'تعداد موضوعی که در لیست نمایش داده شود',
	'ACP_RANDOMTOPICS_TITLE'		=> 'موضوعات اتفاقی',
	'ACP_RTOPICS_ACTIVE'			=> 'موضوعات اتفاقی فعال شود؟',
	'ACP_RTOPICS_ACTIVE_EXP'		=> 'فعال سازی/غیرفعال سازی افزونه',
	'ACP_RTOPICS_SETTING_SAVED'		=> 'تنظیمات با موفقیت بروز شدند.',
	'ACP_RTOPICS_INDEX'				=> 'نمایش موضوعات اتفاقی در صفحه اصلی',
	'ACP_RTOPICS_INDEX_EXP'			=> 'لیست موضوعات اتفاقی در صفحه اصلی نمایش داده خواهند شد.',
	'ACP_RTOPICS_VIEWTOPIC'			=> 'نمایش موضوعات اتفاقی در صفحه موضوعات',
	'ACP_RTOPICS_VIEWTOPIC_EXP'		=> 'موضوعات اتفاقی در صفحه موضوعات نمایش داده خواهند شد.',
));