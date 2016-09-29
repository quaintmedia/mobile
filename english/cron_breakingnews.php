<?php
include('include/connection.php');
include('include/class.notification.php');

$obj = new connection();

$selectNews = 'SELECT
    p.post_id as nid,
    p.headline as title,
    category_id as tid,
    TIMESTAMPDIFF(SECOND, FROM_UNIXTIME(p.created), NOW()) AS diff
FROM
    post p join post_category pc ON (p.post_id = pc.post_id)
WHERE
        category_id = 4
AND TIMESTAMPDIFF(SECOND, FROM_UNIXTIME(p.created), NOW()) < 300
ORDER BY
        p.created DESC';

$res = $obj->select($selectNews);

if(count($res) > 0) {

	//Create a file to write a log for sending push
	$fp = fopen('push_' . date('Ymd') . '.txt','a+')	
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
fclose($fp);
}
?>
