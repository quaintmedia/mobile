<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/class.notification.php');

$obj = new myclass();

$selectNews = "SELECT ti.nid, nd.title, TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(ti.created), NOW()) AS diff FROM taxonomy_index ti, node nd WHERE ti.nid=nd.nid AND ti.tid='406' AND TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(ti.created), NOW()) <= 5 ORDER BY ti.nid DESC LIMIT 1";
//$selectNews = "SELECT ti.nid, nd.title, TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(ti.created), NOW()) AS diff FROM taxonomy_index ti, node nd WHERE ti.nid=nd.nid AND ti.tid='406' ORDER BY ti.nid DESC LIMIT 1";

$res = $obj->select($selectNews);

if(count($res) > 0) {
	$nid = $res[0]['nid'];
	$title = $res[0]['title'];
	
	$selectDevice = "SELECT devicetoken FROM deviceregistration";

	$deviceRes = $obj->select($selectDevice);
	
	$objNotification = new NOTIFICATION();

	foreach($deviceRes AS $key => $value) {
			$objNotification->deviceToken = $value['devicetoken'];
			$objNotification->nid = $nid;
			$objNotification->title = utf8_decode($title);
			$objNotification->sendToAndroid();
	}
}
?>
