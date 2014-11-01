<?php
/**
*
* @package Random Topics
* @copyright (c) 2014 Ali Faraji <alifaraji.mail@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alifaraji\randomtopics\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['rtopics_version']) && version_compare($this->config['rtopics_version'], '2.0.0', '>=');
	}
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}
	public function update_data()
	{
		return array(
			array('config.add', array('rtopics_version', '1.0.0')),
			array('config.add', array('rtopics_active', 1)),
			array('config.add', array('rtopics_index', 1)),
			array('config.add', array('rtopics_viewtopic', 1)),
			array('config.add', array('rtopics_limit', 5)),
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_RANDOMTOPICS_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_RANDOMTOPICS_TITLE',
				array(
					'module_basename'	=> '\alifaraji\randomtopics\acp\randomtopics_module',
					'modes'				=> array('randomtopics_settings'),
				),
			)),
		);
	}
}