<?php

/*
	[UCenter] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: tag.php 1059 2011-03-01 07:25:09Z monkey $
*/

!defined('IN_UC') && exit('Access Denied');

class uc_tagcontrol extends uc_base {

	function __construct() {
		$this->uc_tagcontrol();
	}

	function uc_tagcontrol() {
		parent::__construct();
		$this->init_input();
		$this->load('uc_tag');
		$this->load('uc_misc');
	}

	function ongettag() {
		$appid = $this->input('appid');
		$tagname = $this->input('tagname');
		$nums = $this->input('nums');
		if(empty($tagname)) {
			return NULL;
		}
		$return = $apparray = $appadd = array();

		if($nums && is_array($nums)) {
			foreach($nums as $k => $num) {
				$apparray[$k] = $k;
			}
		}

		$data = $_ENV['uc_tag']->get_tag_by_name($tagname);
		if($data) {
			$apparraynew = array();
			foreach($data as $tagdata) {
				$row = $r = array();
				$tmp = explode("\t", $tagdata['data']);
				$type = $tmp[0];
				array_shift($tmp);
				foreach($tmp as $tmp1) {
					$tmp1 != '' && $r[] = $_ENV['uc_misc']->string2array($tmp1);
				}
				if(in_array($tagdata['appid'], $apparray)) {
					if($tagdata['expiration'] > 0 && $this->time - $tagdata['expiration'] > 3600) {
						$appadd[] = $tagdata['appid'];
						$_ENV['uc_tag']->formatcache($tagdata['appid'], $tagname);
					} else {
						$apparraynew[] = $tagdata['appid'];
					}
					$datakey = array();
					$count = 0;
					foreach($r as $data) {
						$return[$tagdata['appid']]['data'][] = $data;
						$return[$tagdata['appid']]['type'] = $type;
						$count++;
						if($count >= $nums[$tagdata['appid']]) {
							break;
						}
					}
				}
			}
			$apparray = array_diff($apparray, $apparraynew);
		} else {
			foreach($apparray as $appid) {
				$_ENV['uc_tag']->formatcache($appid, $tagname);
			}
		}
		if($apparray) {
			$this->load('uc_note');
			$_ENV['uc_note']->add('gettag', "id=$tagname", '', $appadd, -1);
		}
		return $return;
	}

}

?>