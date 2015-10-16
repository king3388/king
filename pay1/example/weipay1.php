<?php
$con = mysql_connect("localhost","root","f983889361");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_query("set names 'utf8'",$con);

mysql_select_db("yungou", $con);

function weipay(){
	$sql = "select * from go_member_addmoney_record where code = 'C14449605095261361'";
	$query = mysql_query($sql);
	$res = mysql_fetch_array($query);
	return $res;
}

function WeiPayUpdate(){
	$sql = "update go_member_addmoney_record set status = '士大夫' where code = 'C14449605095261361'";
	$query = mysql_query($sql);
	if($query){
		return true;
	}else{
		return false;
	}
}