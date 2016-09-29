<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/class.notification.php');

$obj = new myclass();

$selectNews = "SELECT ti.nid, nd.title, TIMESTAMPDIFF(SECOND, FROM_UNIXTIME(ti.created), NOW()) AS diff FROM taxonomy_index ti, node nd WHERE ti.nid=nd.nid AND ti.tid='406' AND TIMESTAMPDIFF(SECOND, FROM_UNIXTIME(ti.created), NOW()) < 300 ORDER BY ti.nid DESC LIMIT 1";

//$selectNews = "SELECT ti.nid, nd.title, TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(ti.created), NOW()) AS diff FROM taxonomy_index ti, node nd WHERE ti.nid=nd.nid AND ti.tid='406' ORDER BY ti.nid DESC LIMIT 1";

$res = $obj->select($selectNews);
//Create a file to write a log for sending push
$fp = fopen('push_' . date('Ymd') . '.txt','a+');

if(count($res) > 0) {
	
	$nid = $res[0]['nid'];
	$title = $res[0]['title'];
	
	//$selectDevice = "SELECT devicetoken, devicetype AS deviceType, deviceid AS deviceId FROM deviceregistration GROUP BY devicetoken";
$selectDevice = "SELECT devicetoken, devicetype AS deviceType, deviceid AS deviceId FROM deviceregistration GROUP BY devicetoken";
	$deviceRes = $obj->select($selectDevice);
	$objNotification = new NOTIFICATION();

	foreach($deviceRes AS $key => $value) {
			
			if(empty($value['devicetoken'])) continue;
			else if($value['deviceType'] == 1 && empty($value['deviceId'])) continue;
			
			$objNotification->deviceToken = $value['devicetoken'];
			$objNotification->nid = $nid;
			$objNotification->title = utf8_decode($title);
			
			//write device details to log file
			$deviceType = ($value['deviceType'] == 2 ? 'Iphone' : 'Android');
			
			fwrite($fp, '---------- New Push ------------' . "\r\n");
			fwrite($fp, 'Time => ' . date('d-m-Y H:i:s') . "\r\n");
			fwrite($fp, 'Device Type => ' . $deviceType . "\r\n");
			fwrite($fp, 'Device Token => ' . $objNotification->deviceToken . "\r\n");
			fwrite($fp, 'Nid => ' . $objNotification->nid . "\r\n");
			fwrite($fp, 'Title => ' . $objNotification->title . "\r\n");
			fwrite($fp, 'DeviceId => ' . $value['deviceId']. "\r\n");
			
			if($value['deviceType'] == 2) {
				$objNotification->sendToIphone();
			}
			else {
				$objNotification->sendToAndroid();
			}
	}
}
//Close connection
fclose($fp);

?>
