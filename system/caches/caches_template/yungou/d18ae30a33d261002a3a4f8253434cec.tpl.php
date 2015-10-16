<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/LotteryDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/header.css"/>
<div class="Current_nav">
	<a href="<?php echo WEB_PATH; ?>">首页</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>">
	<?php echo $category['name']; ?>
	</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>e<?php echo $item['brandid']; ?>">
	<?php echo $brand['name']; ?>
	</a> <span>&gt;</span>揭晓详情 
</div>
<div class="show_content">
	<!-- 商品期数 -->
	<div id="divPeriodList" class="show_Period">		
		<?php echo $loopqishu; ?>	
	</div>
	<!-- 商品信息 -->
	<div class="Pro_Details">
		<h1><span>(第<?php echo $item['qishu']; ?>期)</span><span ><?php echo $item['title']; ?></span><span style="<?php echo $item['title_style']; ?>"><?php echo $item['title2']; ?></span></h1>
		<div class="Pro_Detleft">
			<div class="Pro_Detimg">
				<div class="Pro_pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $item['id']; ?>" title="<?php echo $item['title']; ?>"><img width="398" height="398" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>"></a></div>
			</div>
			<?php if($itemzx): ?>
			<div class="Result_LConduct">
				<dl>
					<dt><span>第<?php echo $itemzx['qishu']; ?>期</span>正在进行</dt>
					<dd>
						<div class="Result_Progress-bar">
							<p><span style="width:<?php echo width($itemzx['canyurenshu'],$itemzx['zongrenshu'],208); ?>px;"></span></p>
							<ul class="Pro-bar-li">
								<li class="P-bar01"><em><?php echo $itemzx['canyurenshu']; ?></em>已参与人次</li>
								<li class="P-bar02"><em><?php echo $itemzx['zongrenshu']; ?></em>总需人次</li>
								<li class="P-bar03"><em><?php echo $itemzx['shenyurenshu']; ?></em>剩余人次</li>
							</ul>
						</div>
						<p><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $itemzx['id']; ?>" target="_blank" class="Result_LConductBut">查看详情</a></p>
					</dd>
				</dl>
			</div>
			<?php endif; ?>
		</div>
		<div class="Pro_Detright">
			<p class="Det_money">价值：<span class="rmbgray"><?php echo $item['money']; ?></span></p>
			
			<div class="Announced_Frame">
				<div class="Announced_FrameT">揭晓结果</div>
				<div class="Announced_FrameCode">
					<ul class="Announced_FrameCodeMal">	
                    	<?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?>
                        <li class="Code_<?php echo $q_code_num; ?>"><?php echo $q_code_num; ?><b></b></li>
                        <?php  endforeach; $ln++; unset($ln); ?>
					</ul>
				</div>
				<div class="Announced_FrameGet">
					<dl>
						<?php if($q_user!='0'): ?>
						<dd class="gray02">
							<p>恭喜<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" target="_blank" class="blue" title="Warm"><?php echo get_user_name($q_user); ?></a> 获得本期商品</p>
							<p>揭晓时间：<?php echo microt($item['q_end_time']); ?></p>
							<p>云购时间：<?php echo microt($user_shop_time); ?></p>
						</dd>
						<?php  else: ?>
						<dd class="gray02">
							<p><font style="color:red;">很遗憾，本次活动无人中奖 T.T</font></p>
							<p>揭晓时间：<?php echo microt($item['q_end_time']); ?></p>
						</dd>
						<?php endif; ?>
					</dl>
				</div>
				
                <div class="Announced_FrameBut">
					<a href="javascript:;"  class="Announced_But">本期详细计算结果</a>
					<a href="javascript:;"  class="Announced_But">看看有谁参与了</a>
					<!--<a href="javascript:;" class="Announced_But">看看有谁晒单</a>-->
				</div>
                
				<div class="Announced_FrameBm"></div>
			</div>
			<?php if($q_user!='0'): ?>
			<div class="MaCenter">
				<p>商品获得者本期总共云购了<em class="orange"><?php echo $user_shop_number; ?></em>人次</p>
                    <div id="userRnoId" class="MaCenterH"><dl>
                        <dt><?php echo microt($user_shop_time); ?>
                        <dd>
                            <?php echo yunma($user_shop_codes,$item['q_user_code'],"b"); ?>
                        </dd>
                    </dl>
                </div>
			</div>
			<div id="divOpen" class="MaOff" style=""><span>展开查看全部<s></s></span></div>
			<?php  else: ?>
			<div class="MaCenter">
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>



	<!-- 计算结果 所有参与记录 晒单 -->
	<div id="calculate" class="ProductTabNav">
	    <div id="divMidNav" class="DetailsT_Tit">
	        <div class="DetailsT_TitP">		     
                <ul>
			        <li class="Product_DetT DetailsTCur"><span class="DetailsTCur">计算结果</span></li>
			        <li class="All_RecordT"><span class="">所有参与记录</span></li>
			        <!--<li class="Single_ConT"><span class="">晒单</span></li>-->
		        </ul>
		    </div>
	    </div>
	</div>

	<div id="divCalResult" class="Product_Content">
		<div class="ygRecord hide" style="">
            <ul class="yghelp">
				<li>1、商品开始揭晓前，将公示本站所有商品的购买时间中最后50个参与时间。</li>
				<li>2、将最后50个参与时间进行求和（X值）（每个时间记录按时、分、秒、毫秒依次排列取数值，如：16:06:38.388 -> 160638388）。</li>
				<li>3、为了更加公平公正，本站在揭晓的时候还会获取最近一起中国福利彩票“重庆时时彩”的开奖号码（一个五位数的值，Y值）。</li>
				<li>4、（X值+Y值）% 当前商品总需人数取得余数(?) + 原始数 10000001，得出的结果就是最终幸运云购码，拥有该幸运号码者，直接获得该奖品。</li>
				<li><span>注：如遇福彩中心通讯故障，无法获取上述期数的中国福利彩票“重庆时时彩”开奖结果，且24小时内该期“重庆时时彩”开奖结果仍未公布，则默认“重庆时时彩”开奖结果为00000。</span></li>
                <?php if(!$item['q_content']): ?>
                <b>由于网站还未满100条购买记录。所以按照   10000001 + (揭晓时间求和结果*100/参与人数) 的余数   即为“幸运云购码”。</b>
                <?php endif; ?>
            </ul>
            
            <?php if($counts < 50): ?>
            <div class="RecordOnehundred"><h4> 由于未满50条时间记录，所以按照现有本站的所有时间记录进行计算。 </h4>
            </div>
			<ul class="Record_title">
                <li class="time">云购时间</li>
                <li class="nem">会员账号</li>
                <li class="name">商品名称</li>
                <li class="much">云购人次</li>
            </ul>
			<div class="RecordOnehundred"><h4>截止该商品揭晓购买时间【<?php echo microt($item['q_end_time']); ?>】最后 <?php echo $counts; ?> 条全站购买时间记录</h4>
			<div class="FloatBox"></div>	
               <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?>
               <?php 
               		$record_time = explode(".",$record['time']);
                    $record['time'] = $record_time[0];
                ?>		
			   <ul class="Record_content">
					<li class="time"><b><?php echo date("Y-m-d",$record['time']); ?></b><?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?></li>
					<li class="timeVal"><?php echo $record['timeadd']; ?></li>
					<li class="nem"><a class="gray02" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank"><?php echo get_user_name($record['uid']); ?></a></li>
					<li class="name"><a class="gray02" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank">（第<?php echo $record['shopqishu']; ?>期）<?php echo $record['shopname']; ?></a></li>
					<li class="much"><?php echo $record['gonumber']; ?>人次</li>
				</ul>	
				<?php  endforeach; $ln++; unset($ln); ?>
			</div>
            	
                <?php 
                	$shop_fmod = fmod($item['q_counttime']+$item['lottery_num'],$item['canyurenshu']);
                 ?>
                <div class="RecordOnehundred"><h4> <?php echo $counts; ?> 条计算结果 </h4>
           		 <div class="ResultBox"><h2>计算结果</h2>
					<dl class="jisuanjieguo">
						<dd>1、求和：<?php echo $item['q_counttime']; ?> (上面 <?php echo $counts; ?> 条云购参与时间取值相加之和)</dd>
						<dd>2、时时彩：第 <?php echo $item['lottery_period']; ?> 期重庆时时彩开奖号码：<?php echo $item['lottery_num']; ?></dd>
						<dd>3、取余数：(<?php echo $item['q_counttime']; ?> + <?php echo $item['lottery_num']; ?>) % <?php echo $item['canyurenshu']; ?>(商品所需人次) = <?php echo $shop_fmod; ?>(余数)</dd>
						<dd>4、最终结果：<?php echo $shop_fmod; ?>(余数) + 10000001(原始数) = <?php echo $item['q_user_code']; ?></dd>
					</dl>
					<b>幸运云购码：<?php echo $item['q_user_code']; ?></b>
				</div>
				<div style="width:100%;height:30px;clear:bolt;"></div>
               </div>

            <?php  else: ?>
          
            <ul class="Record_title">
                <li class="time">云购时间</li>
                <li class="nem">会员账号</li>
                <li class="name">商品名称</li>
                <li class="much">云购人次</li>
            </ul>
			<div class="RecordOnehundred"><h4>截止该商品揭晓购买时间【<?php echo microt($item['q_end_time']); ?>】最后 <?php echo $counts; ?> 条全站购买时间记录</h4>
			<div class="FloatBox"></div>	
               <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?>
               <?php 
               		$record_time = explode(".",$record['time']);
                    $record['time'] = $record_time[0];
                ?>		
			   <ul class="Record_content">
					<li class="time"><b><?php echo date("Y-m-d",$record['time']); ?></b><?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?></li>
					<li class="timeVal"><?php echo $record['timeadd']; ?></li>
					<li class="nem"><a class="gray02" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank"><?php echo get_user_name($record['uid']); ?></a></li>
					<li class="name"><a class="gray02" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank">（第<?php echo $record['shopqishu']; ?>期）<?php echo $record['shopname']; ?></a></li>
					<li class="much"><?php echo $record['gonumber']; ?>人次</li>
				</ul>	
				<?php  endforeach; $ln++; unset($ln); ?>
			</div>
            	
                <?php 
                	$shop_fmod = fmod($item['q_counttime']+$item['lottery_num'],$item['canyurenshu']);
                 ?>
                <div class="RecordOnehundred"><h4> <?php echo $counts; ?> 条计算结果 </h4>
           		 <div class="ResultBox"><h2>计算结果</h2>
					<dl class="jisuanjieguo">
						<dd>1、求和：<?php echo $item['q_counttime']; ?> (上面 <?php echo $counts; ?> 条云购参与时间取值相加之和)</dd>
						<dd>2、时时彩：第 <?php echo $item['lottery_period']; ?> 期重庆时时彩开奖号码：<?php echo $item['lottery_num']; ?></dd>
						<dd>3、取余数：(<?php echo $item['q_counttime']; ?> + <?php echo $item['lottery_num']; ?>) % <?php echo $item['canyurenshu']; ?>(商品所需人次) = <?php echo $shop_fmod; ?>(余数)</dd>
						<dd>4、最终结果：<?php echo $shop_fmod; ?>(余数) + 10000001(原始数) = <?php echo $item['q_user_code']; ?></dd>
					</dl>
					<b>幸运云购码：<?php echo $item['q_user_code']; ?></b>
				</div>
				<div style="width:100%;height:30px;clear:bolt;"></div>
               </div>
            <?php endif; ?>
            
		</div>
        
        
		<div name="bitem" class="AllRecordCon hide" style="display:none;">
        
        	<?php $ln=1;if(is_array($go_record_list)) foreach($go_record_list AS $user): ?>	
		<div class="AllRecW AllReclist"><div class="AllRecL fl"><?php echo microt($user['time']); ?><i></i></div>
			<div class="AllRecR fl">
			<p class="AllRecR_T">
				<span name="spCodeInfo" class="AllRecR_Over">
				<a class="Headpic" href="<?php echo WEB_PATH; ?>uname/<?php echo idjia($user['uid']); ?>" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $user['uphoto']; ?>" border="0" width="20" height="20"></a>
				<a href="<?php echo WEB_PATH; ?>uname/<?php echo idjia($user['uid']); ?>" target="_blank" class="blue"><?php echo _strcut($user['username'],6); ?></a>
				<?php if($user['ip']): ?>
				(<?php echo get_ip($user['id'],'ipcity'); ?> IP:<?php echo get_ip($user['id'],'ipmac'); ?>)
				<?php endif; ?>
				云购了<em class="Fb orange"><?php echo $user['gonumber']; ?></em>人次
				</span>
			</p>
			</div>
		</div>
		<?php  endforeach; $ln++; unset($ln); ?>
    	
        
		</div>
	</div>
<script>
$(function(){
var fouli=$(".DetailsT_TitP ul li");
	fouli.click(function(){
		var add=fouli.index(this);
		fouli.removeClass("DetailsTCur").eq(add).addClass("DetailsTCur");
		$("#divCalResult .hide").hide().eq(add).show();
	});
	$(".Announced_But").click(function(){
		fouli.removeClass("DetailsTCur").eq(1).addClass("DetailsTCur");
		$("#divCalResult .hide").hide().eq(1).show();
		$("html,body").animate({scrollTop:941},1500);
		$("#divMidNav").addClass("nav-fixed");
	});
	$(window).scroll(function(){
		if($(window).scrollTop()>=941){
			$("#divMidNav").addClass("nav-fixed");
		}else if($(window).scrollTop()<941){
			$("#divMidNav").removeClass("nav-fixed");
		}
	});
});
function divOpen(){
var height=$("#userRnoId").css("height");
	if(height=="90px"){
		$("#userRnoId").css("height","auto");
	}else{
		$("#userRnoId").css("height",90);
	};
}
$(function(){	
	$("#divOpen").click(divOpen);
});
</script>	
<?php include templates("index","footer");?>