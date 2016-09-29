<?php
include('include/connection.php');

$obj = new connection();
$func= new common();

$bulk_data = rawurldecode( $_REQUEST['bulk_data'] );
$values	= $func->jsondecode( $bulk_data );

// if values is not empty or divice token is not empty then go to insert process
if( $values != "" && !empty( $values->devicetoken ) ) {
        $devicetype = $values->devicetype;
		$devicetoken=$values->devicetoken;
		
		if( isset( $values->deviceid ) ) {
			$deviceId = $values->deviceid;
		} else {
			$deviceId = '';
		}
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
		} else {
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
      
		if( $GetUserInfo ) {
			$response['status'] = 1;
			$response['status_message'] = 'Device registered'; 
        	} else {
			$response['status'] = 0;
			$response['status_message'] = 'Error in register Device';
       		}
} else {
	$response['status'] = 0;
	$response['status_message'] = 'Request Not Found';
}
echo json_encode( $response, JSON_UNESCAPED_UNICODE );
exit;
?>
