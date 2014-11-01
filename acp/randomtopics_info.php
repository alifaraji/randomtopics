<?php
/**
*
* @package Random Topics
* @copyright (c) 2014 Ali Faraji <alifaraji.mail@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alifaraji\randomtopics\acp;

class randomtopics_info
{
	function module()
	{
		return array(
			'filename'	=> '\alifaraji\randomtopics\acp\randomtopics_module',
			'title'		=> 'ACP_RANDOMTOPICS_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'randomtopics_settings'	=> array('title' => 'ACP_RANDOMTOPICS_SETTINGS', 'auth' => 'ext_alifaraji/randomtopics && acl_a_board', 'cat' => array('ACP_RANDOMTOPICS_TITLE')),
			),
		);
	}
}
