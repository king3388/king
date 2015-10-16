<?php
 define('CRACK_BY_T','localhost,127.0.0.1,127.0.0.1:81,127.0.0.1:82');
 $EndTime = strtotime('2018-1-11 15:23');
 $Unauthorized = '您的网站已购买商业授权，！';
 $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ( isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'T');
 $tocode = '<?php !defined(\'CRACK_BY_T\') && die(\''.$Unauthorized.'\');
 class tocode {
 	private $go_list;
 	public $go_code;
 	public $go_content;
 	public $cyrs;
 	public $count_time = \'\';
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
 			$html[$key][\'time\'] = $v[\'time\'];
	 		$html[$key][\'username\'] = $v[\'username\'];
	 		$html[$key][\'uid\'] = $v[\'uid\'];
	 		$html[$key][\'shopid\'] = $v[\'shopid\'];
	 		$html[$key][\'shopname\'] = $v[\'shopname\'];
	 		$html[$key][\'shopqishu\'] = $v[\'shopqishu\'];
	 		$html[$key][\'gonumber\'] = $v[\'gonumber\'];
	 		$h = abs(date("H", $v[\'time\']));
	 		$i = date("i", $v[\'time\']);
	 		$s = date("s", $v[\'time\']);
	 		list($time, $ms) = explode(".", $v[\'time\']);
	 		$time = $h . $i . $s . $ms;
	 		$html[$key][\'timeadd\'] = $time;
	 		$count_time += $time;
	 	}
	 	$final_result = $count_time + $lottery;
	 	$this -> go_content = serialize($html);
	 	$this -> count_time = $count_time;
	 	$this -> go_code = 10000001 + fmod($final_result, $cyrs);
	 }
	 private function get_code_yibai($time = \'\', $money = \'\') {
		$h = abs(date("H", $time));
		$i = date("i", $time);
		$s = date("s", $time);
		$w = substr($time, 11, 3);
		$num = $h . $i . $s . $w;
		if (!$money)$money = 1;
		$this -> go_code = 10000001 + fmod($num * 100, $money);
		$this -> go_content = false;
	}
}';
@file_put_contents(dirname(__FILE__).'/../modules/pay/lib/tocode.class.php',$tocode);
unset($tocode); $configs['system']['gzip'] = '0';
function crack_by_T() { 
	if (defined('G_BANBEN_ERROR')) { $content = ob_get_contents();
		ob_end_clean();
		preg_match_all("/<title>(.*)<\/title>/", $content, $rusult, PREG_PATTERN_ORDER);
		if (!empty($rusult[1])) { 
			echo str_ireplace(base64_decode(G_BANBEN_ERROR) . "</html>", '</html>', $content); 
		}else{ 
			echo $content; 
		} 
	} 
} 
ob_start();
register_shutdown_function('crack_by_T');
return array('code'=>'crack_by_T');
?>