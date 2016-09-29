<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);
if($values != "")
{
        $email = $values->username;
		//$password = $values->pass;
		//$password = md5($values->pass);
		$password = $values->pass;

		//Get drupals bootstrap to load for password
		$root = getcwd();
		define('DRUPAL_ROOT', dirname($root));
		
		require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
		drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
		
		require_once DRUPAL_ROOT . '/includes/password.inc';
				
       
	   if(!isset($values->fbtoken) || empty($values->fbtoken))  {
		 // $queryUser = "SELECT uid,name,mail FROM users WHERE mail = '$email' AND pass = '$password' ";
			$queryUser = "SELECT uid,name,mail,pass,status FROM users WHERE name = '{$email}'";
		   
			$GetUserInfo = $obj->select($queryUser);
			
			//Create a class to hold encrypted password
			class passCheck{}
			
			$data = array();
			foreach($GetUserInfo as $row1)
			{
				//Check password for the email entered
				$chkPass = new passCheck();
				$chkPass->pass = $row1['pass'];

				$check = user_check_password($password, $chkPass);

				//if password doesn't match then break loop
				if($check !== TRUE) {
					break;
				}
				
				//if($row1['status'] == '1'){
				
				$data_array = array(				
					"uid" => $row1['uid'],
					"name" => utf8_decode($row1['name']),
					"mail" => $row1['mail']);
					
					/* check array value is null if yes then set it to blank(must use php 5.3+) */
					$data_array = array_map(function($v){
						return (is_null($v)) ? "" : $v;
					},$data_array);
					$data[] = $data_array;
				

			}
		}
		else {
			
			$queryUser = "SELECT uid, name, mail,status FROM users WHERE name = '{$values->fbuser}'";
			$GetUserInfo = $obj->select($queryUser);
			
			$data = array();
			if(count($GetUserInfo) > 0)  {
				foreach($GetUserInfo as $row1)
				{	
					$data_array = array(				
						"uid" => $row1['uid'],
						"name" => utf8_decode($row1['name']),
						"mail" => $row1['mail']);
						
					/* check array value is null if yes then set it to blank(must use php 5.3+) */
					$data_array = array_map(function($v){
						return (is_null($v)) ? "" : $v;
					},$data_array);
					
					$data[] = $data_array;
				}
			}
			else {
				
				$newpassword = user_hash_password($password);
				
				$queryIns = "INSERT INTO `users`(`uid`, `name`, `pass`, `mail`, `signature_format`,`status`, `timezone`, `init`) 
					SELECT LAST_INSERT_ID(MAX(uid) + 1), '{$values->fbuser}','{$newpassword}','{$values->mail}','filtered_html','1','Asia/Kolkata','{$values->mail}' 
					FROM users";
				
				$insertedId = $obj->insert($queryIns);
				
				if($insertedId) {
					$data_array = array(				
						"uid" => $insertedId,
						"name" => utf8_decode($values->fbuser),
						"mail" => $values->mail);
					
					/* check array value is null if yes then set it to blank(must use php 5.3+) */
					$data_array = array_map(function($v){
						return (is_null($v)) ? "" : $v;
					},$data_array);
					
					$data[] = $data_array;
				}
			}
		}
	        
        //if(empty($GetUserInfo))
        if(empty($data))
        {
                $response['status'] = 0;
                $response['status_message'] = 'Username or Password Incorrect';
        }
        else
        {
			
					if($row1['status']==0){
						 $response['status'] = 0;
						 $response['status_message'] = 'Your account is not verified!';
					}else if($row1['status']==1){
						$response['status'] = 1;
						$response['status_message'] = 'Login Successful';
						$response['data'] = $data;
					}
				
                
        }
}
else
{
        $response['status'] = 0;
        $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>