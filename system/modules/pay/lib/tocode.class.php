<?php !defined('CRACK_BY_T') && die('您的网站已购买商业授权，！');
 class tocode {
 	private $go_list;
 	public $go_code;
 	public $go_content;
 	public $cyrs;
 	public $count_time = '';
 	public function __construct() {
 		$this -> db = System :: load_sys_class("model");
 	}
 	//$num 取所有参与记录的最后几条
 	//$cyrs 表示的是商品的总需人数
 	//$lottery 彩票开奖号码
 	public function run_tocode($num, $cyrs, $lottery) {
 		if (empty($num))return false;
 		if (empty($cyrs))return false;
 		if (empty($lottery))return false;
 		$num = $num;
 		$cyrs = $cyrs;
 		$lottery = $lottery;
 		return $this -> get_code_dabai($num, $cyrs, $lottery);
 	}
 	private function get_code_dabai($num, $cyrs, $lottery) {
		$this -> go_list = $this -> db -> GetList("select * from `@#_member_go_record` order by time desc limit 0,$num");
		$go_list = $this -> go_list;
 		$html = array();
 		$count_time = 0;
 		foreach($go_list as $key => $v) {
 			$html[$key]['time'] = $v['time'];
	 		$html[$key]['username'] = $v['username'];
	 		$html[$key]['uid'] = $v['uid'];
	 		$html[$key]['shopid'] = $v['shopid'];
	 		$html[$key]['shopname'] = $v['shopname'];
	 		$html[$key]['shopqishu'] = $v['shopqishu'];
	 		$html[$key]['gonumber'] = $v['gonumber'];
	 		$h = abs(date("H", $v['time']));
	 		$i = date("i", $v['time']);
	 		$s = date("s", $v['time']);
	 		list($time, $ms) = explode(".", $v['time']);
	 		$time = $h . $i . $s . $ms;
	 		$html[$key]['timeadd'] = $time;
	 		$count_time += $time;
	 	}
	 	$final_result = $count_time + $lottery;
	 	$this -> go_content = serialize($html);
	 	$this -> count_time = $count_time;
	 	$this -> go_code = 10000001 + fmod($final_result, $cyrs);
	 }
	 private function get_code_yibai($time = '', $money = '') {
		$h = abs(date("H", $time));
		$i = date("i", $time);
		$s = date("s", $time);
		$w = substr($time, 11, 3);
		$num = $h . $i . $s . $w;
		if (!$money)$money = 1;
		$this -> go_code = 10000001 + fmod($num * 100, $money);
		$this -> go_content = false;
	}
}