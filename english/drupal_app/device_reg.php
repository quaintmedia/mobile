<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

$myfile = fopen("/tmp/amit_test.txt", "w") or die("Unable to open file amit_text.txt!");
fwrite($myfile, __FILE__ . print_r( $values, true ) );
fclose($myfile);


// if values is not empty or divice token is not empty then go to insert process
if($values != "" && !empty($values->devicetoken))
{
        $devicetype = $values->devicetype;
		$devicetoken=$values->devicetoken;
		//$fp = fopen('device_info.txt', 'w+');
		
		if(isset($values->deviceid)) {
			$deviceId = $values->deviceid;
		}
		else {
			$deviceId = '';
		}
		//fwrite($fp, 'DeviceId => ' . $deviceId . "\r\n");
		
		//fclose($fp);
		$cntDiv = 0;
		
		//Check if already a device is registered with the same deviceid
		if($values->devicetype == 1) {
			$selDevice = "SELECT COUNT(*) AS cnt FROM deviceregistration WHERE deviceid = '$deviceId'";
			$devicedata = $obj->select($selDevice);
			$cntDiv = $devicedata[0]['cnt'];
			//Delete device data from table if device is already there in database
			if($cntDiv > 0) {
				$delDevice = "DELETE FROM deviceregistration WHERE deviceid = '{$deviceId}'";					
				$devicedata = $obj->delete($delDevice);
			}
			
		}
		else {
			$selDevice = "SELECT COUNT(*) AS cnt FROM deviceregistration WHERE devicetoken = '$devicetoken'";
			$devicedata = $obj->select($selDevice);
			$cntDiv = $devicedata[0]['cnt'];			
			//Delete device data from table if device is already there in database
			if($cntDiv > 0) {
				$delDevice = "DELETE FROM deviceregistration WHERE devicetoken = '{$devicetoken}'";		
				$devicedata = $obj->delete($delDevice);
			}
		}
		
		//Add new entry for that device
		$insDevice="INSERT INTO deviceregistration(devicetype, devicetoken, deviceid ) VALUES('$devicetype', '$devicetoken', '$deviceId')";           
		$GetUserInfo = $obj->insert($insDevice);
      
		if($GetUserInfo)
        {
			$response['status'] = 1;
			$response['status_message'] = 'Device registered'; 
        }
        else
        {
			$response['status'] = 0;
			$response['status_message'] = 'Error in register Device';
        }
}
else
{
	$response['status'] = 0;
	$response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>
