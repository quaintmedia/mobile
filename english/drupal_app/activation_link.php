<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
include('include/myclass.php');

if(isset($_GET['id'])) {
		$obj = new myclass();

		$uid=$_GET['id']; 

		echo $queryUser = "Update users set status='1' where uid='".$uid."'";
		$GetUserInfo = $obj->edit($queryUser);
			
		if($GetUserInfo !== false)
		{
			$response['status'] = 1;
			//$response['status_message'] = 'Register User Successful'; 
			header("Location: http://liveindiahindi.com/mobile-login");
		}
		else
		{
			$response['status'] = 0;
			$response['status_message'] = 'error'; 
			
			
		}
}

echo json_encode($response);exit;

?>