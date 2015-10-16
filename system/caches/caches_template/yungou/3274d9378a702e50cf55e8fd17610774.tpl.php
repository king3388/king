<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>我的云购记录 - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" /><link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css" rel="stylesheet" type="text/css" /><script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script><script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/userbuylist.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>我的云购记录</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/home" class="z-Member"></a>
        </div>
    </header>

    <div id="navBox" class="g-snav m_listNav">
		    <div class="g-snav-lst z-sgl-crt" state="-1"><a href="javascript:;" class="gray9">全部</a><b></b></div>
		    <div class="g-snav-lst" state="1"><a href="javascript:;" class="gray9">进行中</a><b></b></div>
		    <div class="g-snav-lst" state="3"><a href="javascript:;" class="gray9">已揭晓</a></div>
    </div>
    <section class="clearfix g-Record-lst">
        <ul class="z-minheight">
	        <div id="divGoodsLoading" class="loading" style="display:none;"><b></b>正在加载</div>
	        <a id="btnLoadMore" class="loading" href="javascript:;" style="display:none;">点击加载更多</a>
			
			<!-- <?php $ln=1;if(is_array($record)) foreach($record AS $rt): ?>
			<?php 
				$jiexiao = get_shop_if_jiexiao($rt['shopid']);
				$shops=$mysql_model->GetOne("select * from `@#_shoplist` where `id`='$rt[shopid]' and `q_uid`='$rt[uid]'");
			 ?>
			<?php if($jiexiao['q_uid']): ?>
				<li onclick="location.href='<?php echo WEB_PATH; ?>/mobile/user/buyDetail/<?php echo $rt['shopid']; ?>'"><a class="fl z-Limg"><span class="z-Imgbg z-ImgbgC02"></span><em class="z-Imgtxt">已揭晓</em><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shops['thumb']; ?>" border="0" alt=""></a><div class="u-sgl-r "><p class="z-sgl-tt"><a class="gray6">(第<?php echo $rt['shopqishu']; ?>期)<?php echo $rt['shopname']; ?></a></p><p>获得者：<em class="blue"><?php echo get_user_name($jiexiao['q_user']); ?></em></p><p>揭晓时间：<em class="gray6"><?php echo $shops['q_end_time']; ?></em></p></div><b class="z-arrow"></b></li>
			<?php  else: ?>
				<li onclick="location.href='<?php echo WEB_PATH; ?>/mobile/user/buyDetail/<?php echo $rt['shopid']; ?>'"><a class="fl z-Limg"><span class="z-Imgbg z-ImgbgC01"></span><em class="z-Imgtxt">进行中...</em><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shops['thumb']; ?>" border="0" alt=""></a><div class="u-sgl-r "><p class="z-sgl-tt"><a class="gray6">(第<?php echo $rt['shopqishu']; ?>期)<?php echo $rt['shopname']; ?></a></p><p>参与了<em class="orange"><?php echo $rt['gonumber']; ?></em>人次</p><div class="Progress-bar"><p class="u-progress"><span style="width:6.508875739644971%;" class="pgbar"><span class="pging"></span></span></p><ul class="Pro-bar-li"><li class="P-bar01"><em><?php echo $shops['canyurenshu']; ?></em>已参与</li><li class="P-bar02"><em><?php echo $shops['zongrenshu']; ?></em>总需人次</li><li class="P-bar03"><em><?php echo $shops['shenyurenshu']; ?></em>剩余</li></ul></div></div><b class="z-arrow"></b></li>
			<?php endif; ?>
			<?php  endforeach; $ln++; unset($ln); ?> -->
			
			<!-- <li onclick="location.href='http://localhost/yungou/?mobile/user/buyDetail/5'"><a class="fl z-Limg"><span class="z-Imgbg z-ImgbgC01"></span><em class="z-Imgtxt">进行中...</em><img src="http://localhost/yungou/statics/uploads/shopimg/20150919/45789049648342.jpg" border="0" alt=""></a><div class="u-sgl-r "><p class="z-sgl-tt"><a class="gray6">(第2期)小米手机</a></p><p>已参与<em class="orange">11</em>人次</p><div class="Progress-bar"><p class="u-progress"><span style="width:6.508875739644971%;" class="pgbar"><span class="pging"></span></span></p><ul class="Pro-bar-li"><li class="P-bar01"><em>11</em>已参与</li><li class="P-bar02"><em>169</em>总需人次</li><li class="P-bar03"><em>158</em>剩余</li></ul></div></div><b class="z-arrow"></b></li>
			
			<li onclick="location.href='http://localhost/yungou/?mobile/user/buyDetail/2'"><a class="fl z-Limg"><span class="z-Imgbg z-ImgbgC02"></span><em class="z-Imgtxt">已揭晓</em><img src="http://localhost/yungou/statics/uploads/shopimg/20150919/45789049648342.jpg" border="0" alt=""></a><div class="u-sgl-r "><p class="z-sgl-tt"><a class="gray6">(第1期)小米手机</a></p><p>获得者：<em class="blue">king1</em></p><p>揭晓时间：<em class="gray6">2015-09-20 11:12:35.918</em></p></div><b class="z-arrow"></b></li> -->
        </ul>
    </section>
    
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_WEB_PATH; ?>/statics/templates/yungou";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  Path.imgpath = "<?php echo G_WEB_PATH; ?>/statics";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());
</script>
 
</div>
</body>
</html>
