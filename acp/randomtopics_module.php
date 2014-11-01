<?php
/**
*
* @package Random Topics
* @copyright (c) 2014 Ali Faraji <alifaraji.mail@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alifaraji\randomtopics\acp;

class randomtopics_module
{
	var $u_action;
	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		$user->add_lang_ext('alifaraji/randomtopics', 'info_acp_randomtopics');
		$this->tpl_name = 'acp_rtopics_settings';
		$this->page_title = $user->lang('ACP_RANDOMTOPICS');
		add_form_key('alifaraji/randomtopics');
		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('alifaraji/randomtopics'))
			{
				trigger_error('FORM_INVALID');
			}
			$config->set('rtopics_active', $request->variable('rtopics_active', 0));
			$config->set('rtopics_index', $request->variable('rtopics_index', 0));
			$config->set('rtopics_viewtopic', $request->variable('rtopics_viewtopic', 0));
			$config->set('rtopics_limit', $request->variable('rtopics_limit', 0));

			trigger_error($user->lang('ACP_RTOPICS_SETTING_SAVED') . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
			'U_ACTION'			=> $this->u_action,
			'RTOPICS_ACTIVE'	=> $config['rtopics_active'],
			'RTOPICS_INDEX'		=> $config['rtopics_index'],
			'RTOPICS_VIEWTOPIC'	=> $config['rtopics_viewtopic'],
			'RTOPICS_LIMIT'		=> $config['rtopics_limit'],
		));
	}
}