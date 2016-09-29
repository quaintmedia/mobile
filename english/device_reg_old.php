<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);



if($values != "")
{

         $devicetype = $values->devicetype;
		$devicetoken=$values->devicetoken;
		
		
	/*Already exit token then delete and make new entry*/
		$queryUser1="Delete from deviceregistration where devicetoken = '$devicetoken'";    
		$GetUserInfo1 = $obj->delete($queryUser1);
       
  //echo $queryUser = "INSERT INTO `users`(`uid`, `name`, `pass`, `mail`) VALUES ('$uid','$name','$password','$email') ";
	   
	   

//$host = $_SERVER['REMOTE_ADDR'];
//$t=time();
	   
 $queryUser="INSERT INTO deviceregistration(devicetype, devicetoken ) VALUES('$devicetype', '$devicetoken');";           
      
	  $GetUserInfo = $obj->insert($queryUser);
		
	
	      
		 // print_r( $GetUserInfo); 
        if($GetUserInfo!== false)
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