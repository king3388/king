<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "weipay/lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
$url1 = $notify->GetPrePayUrl($dingdannum);
$dingdannum = $_SESSION['wei_productid'];
$title_name = $_SESSION['title_name'];
//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody($title_name);
$input->SetAttach($title_name);
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($title_name);
$input->SetNotify_url("http://mm.lmcity.cn/weipay/example/notify.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id($dingdannum);
$result = $notify->GetPayUrl($input);
$out_trade_no = WxPayConfig::MCHID.date("YmdHis");
$url2 = $result["code_url"];
$_SESSION['wei_out_trade_no'] = $out_trade_no;
// require_once "system/libs/model.class.php";
// $a = "select * from go_member_addmoney_record where code = 'C14447124090462440'";
// $b = mysql_query($a);
// $c = mysql_fetch_array($b);
// $a = model::weitest();
// print_r($a);
// exit();
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>六豆云购-微信支付</title>
</head>
<body>
	<!--<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式一</div><br/>
	<img alt="模式一扫码支付" src="http://mm.lmcity.cn/weipay/example/qrcode.php?data=<?php echo urlencode($url1);?>" style="width:150px;height:150px;"/>
	<br/><br/><br/>-->
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">请使用微信扫描下方二维码</div><br/>
	<img alt="模式二扫码支付" src="http://mm.lmcity.cn/weipay/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
	
</body>
</html>