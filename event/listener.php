<?php
/**
*
* @package Random Topics
* @copyright (c) 2014 Ali Faraji <alifaraji.mail@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alifaraji\randomtopics\event;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'		=> 'load_language_on_setup',
			'core.page_header'		=> 'get_topic_list',
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;


	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\auth\auth $auth, $root_path, $phpEx)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->config = $config;
		$this->db = $db;
		$this->user = $user;
		$this->auth = $auth;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name'	=> 'alifaraji/randomtopics',
			'lang_set'	=> 'randomtopics',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function count_posts($id)
	{
	$sql = 'SELECT COUNT(post_id) as posts_count
			FROM ' . POSTS_TABLE . '
			WHERE topic_id = ' . $id . '
				AND post_visibility =  1 ';

		$result = $this->db->sql_query($sql);
		$posts_count = (int) $this->db->sql_fetchfield('posts_count');

		return $posts_count;
	}

	public function get_topic_list()
	{
		$sql = 'SELECT forum_id, topic_title, topic_time, topic_visibility, topic_views, topic_poster, topic_first_poster_name, topic_first_poster_colour, topic_last_poster_id, topic_last_poster_name, topic_last_poster_colour, topic_last_post_time, topic_last_post_id, topic_id, forum_id
				FROM ' . TOPICS_TABLE . ' AS data
				JOIN (SELECT (FLOOR(RAND() * (SELECT MAX(topic_id) FROM '.TOPICS_TABLE.'))) AS random_id) as random
				WHERE '. $this->db->sql_in_set('forum_id', array_keys($this->auth->acl_getf('f_read', true))) .'
					AND data.topic_id >= random.random_id';

		$limit = $this->config['rtopics_limit'];
		$result = $this->db->sql_query_limit($sql, $limit);

		$total = 1;

		while ($row = $this->db->sql_fetchrow($result))
		{
			if($row['topic_visibility'] != 2) { //Filter soft deleted topiccs
			$this->template->assign_block_vars('randomtopics', array(
				'TOPIC_TITLE'					=> censor_text($row['topic_title']),
				'TOPIC_VIRTUAL_ID'				=> $total++,
				'TOPIC_TIME'					=> $this->user->format_date($row['topic_time']),
				'TOPIC_VIEWS'					=> $row['topic_views'],
				'TOPIC_FIRST_POSTER_FULL'		=> get_username_string('full', $row['topic_poster'], $row['topic_first_poster_name'], $row['topic_first_poster_colour']),
				'TOPIC_LAST_POST_AUTHOR_FULL'	=> get_username_string('full', $row['topic_last_poster_id'], $row['topic_last_poster_name'], $row['topic_last_poster_colour']),
				'TOPIC_LAST_POST_TIME'			=> $this->user->format_date($row['topic_last_post_time']),
				'FORUM_NAME'					=> $this->count_posts($row['topic_id']),

				'U_LAST_POST'					=> append_sid("{$this->root_path}viewtopic.$this->phpEx", 'f=' . $row['forum_id'] . '&amp;p=' . $row['topic_last_post_id']) . '#p' . $row['topic_last_post_id'],
				'U_VIEW_TOPIC'					=> append_sid("{$this->root_path}viewtopic.$this->phpEx", 'f=' . $row['forum_id'] . '&amp;t=' . $row['topic_id']),
			));
			}
		}

		$this->template->assign_var('S_RANDOMTOPICS_ACTIVE',	$this->config['rtopics_active'] == 1 ? true : false);
		$this->template->assign_var('S_RANDOM_TOPICS_INDEX',	$this->config['rtopics_index'] == 1 ? true : false);
		$this->template->assign_var('S_RANDOMTOPICS_VIEWTOPIC',	$this->config['rtopics_viewtopic'] == 1 ? true : false);

	}

}
