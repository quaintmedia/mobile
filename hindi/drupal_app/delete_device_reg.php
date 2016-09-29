<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

//Create a file to write a log for sending push
//$fp = fopen('devicetoken_' . date('Ymd') . '.txt','a+');


if($values != "")
{
	//$devicetype = $values->devicetype;
	$devicetoken=$values->devicetoken;
	
	

if(	strlen($devicetoken)>=64){

	

	$queryUser="Delete from deviceregistration where devicetoken = '$devicetoken'";    
	$GetUserInfo = $obj->delete($queryUser);
	
	//fwrite($fp, '---------- Devicetoken delete------------' . "\r\n");
	//fwrite($fp, 'Time => ' . date('d-m-Y H:i:s') . "\r\n");
	//fwrite($fp, 'DeviceToken => ' . $devicetoken . "\r\n");
} 
          
		
        if($GetUserInfo1!== false)
        {
               $response['status'] = 1;
                $response['status_message'] = 'Device deleted'; 
				
        }
        else
        {
		$response['status'] = 0;
                $response['status_message'] = 'Error in deleted Device';
                
			
        }
}
else
{
        $response['status'] = 0;
        $response['status_message'] = 'Request Not Found';
}
//Close connection
//fclose($fp);

echo json_encode($response);exit;
?>