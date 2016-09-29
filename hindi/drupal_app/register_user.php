<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');
require_once('include/PHPMailer.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

if($values != "")
{
        $email = $values->mail;
		$name=$values->name;
		//$password = $values->pass;
		$password = $values->pass;
		
	
		$query="SELECT * FROM users where name='{$name}'";
		$result = $obj->select($query);		
		
		if(count($result) > 0 ) {
			$response['status'] = 0;
			$response['status_message'] = 'Username already exist!';
			echo json_encode($response);exit;
		}
		
		//Get drupals bootstrap to load for password
		$root = getcwd();
		define('DRUPAL_ROOT', dirname($root));
		
		require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
		drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
		
		require_once DRUPAL_ROOT . '/includes/password.inc';
		
		$password = user_hash_password($password);
				
		
		$queryLastUser = "SELECT uid FROM users ORDER BY uid DESC LIMIT 1";
	    $dataLastUser = $obj->select($queryLastUser);

		$uid = $dataLastUser[0]['uid'] + 1;
       
       //echo $queryUser = "INSERT INTO `users`(`uid`, `name`, `pass`, `mail`) VALUES ('$uid','$name','$password','$email') ";
	   
		$queryUser="INSERT INTO `users`(`uid`, `name`, `pass`, `mail`, `signature_format`,`status`, `timezone`, `init`) 
					VALUES ('{$uid}','{$name}','{$password}','{$email}','filtered_html','1','Asia/Kolkata','{$email}')";
       
        $GetUserInfo = $obj->insert($queryUser);
		
		if($GetUserInfo) {
			
			$queryUser1="INSERT INTO `users_roles`(`uid`, `rid`) VALUES ('{$uid}','5')";
       
			$GetUserInfo1 = $obj->insert($queryUser1);
			
			$data = array();
			
			$data_array = array(				
				"uid" => $uid,
				"name" => utf8_decode($values->name),
				"mail" => $values->mail,
			);
			
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$data_array = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$data_array);
			
			$data[] = $data_array;
			
			$link= "http://" . HOST_NAME . "/ws2/activation_link.php?id=".$uid."&code=1";
			
			$body   = '<p>';
			$body   .= "Hello,";
			$body   .= '<br/>';
			$body   .= "Dear  ".$values->name.",";
			$body   .= '<br/><br/>';
			$body   .= "Please click on below for Activate your account";
			$body   .= '<br/><br/>';
			$body   .= "<a href='$link'>Activation Link</a>";
			
			
			$body   .= '<br/><br/>';
			$body   .= '</p>';
			
			$mail           = new PHPMailer();
			$mail->From     = "liveindiaeditor@gmail.com";
			//$mail->FromName = $values->name;
			$mail->FromName = "Liveindia";
			$mail->Subject  = 'Liveindia Email Verification';	// message subject
			$mail->AddAddress($email,$name);    
			$mail->Body     = $body;
			$mail->IsHTML(true);
				
			$mail->Mailer = "smtp";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth = true; // turn on SMTP authentication
			//$mail->setFrom('liveindiaeditor@gmail.com', 'Liveindia');     //Set who the message is to be sent from
			//$mail->addReplyTo('liveindiaeditor@gmail.com', 'Liveindia');  
			$mail->Username = "eetplvendor@gmail.com"; // SMTP username
			$mail->Password = "Krishna123"; // SMTP password
			
		/*  $mail->Username = "liveindiaeditor@gmail.com"; // SMTP username
			$mail->Password = "liveindiaeditor@_8"; // SMTP password
		*/

			try{
				$mail->Send();
				  $response['status'] = 1;
					$response['status_message'] = 'Register User Successful'; 
					$response['data'] = $data;
			   
			}catch(Exception $e){
				 $response['status'] = 0;
					$response['status_message'] = 'Mail not send'; 
					$response['data'] = $data;
			}
			
			
			$response['status'] = 0;
			$response['status'] = 1;
			$response['status_message'] = 'Register User Successful'; 
			$response['data'] = $data;
		}
		else {
			$response['status'] = 0;
			$response['status_message'] = 'Error in Register';
		}
	
		
		  
		  /*GET DATA*/
		/* $selquery = "SELECT uid,name,mail FROM users WHERE name = '$name' ";
       
        $UserInfo = $obj->select($selquery); */
		
		/* $data = array();
		foreach($UserInfo as $row1)
		{
			$data_array = array(				
					"uid" => $row1['uid'],
					"name" => utf8_decode($row1['name']),
					"mail" => $row1['mail'],
				);
				/* check array value is null if yes then set it to blank(must use php 5.3+) 
				$data_array = array_map(function($v){
					return (is_null($v)) ? "" : $v;
				},$data_array);
				$data[] = $data_array;
		}
		  
		  
		//  print_r( $GetUserInfo);
        if($GetUserInfo!== false)
        {	
			$response['status'] = 0;
			$response['status'] = 1;
			$response['status_message'] = 'Register User Successful'; 
			$response['data'] = $data;
        }
        else
        {
			$query="SELECT * FROM users where name='$name'";
			$res1=mysql_query($query);
			$num = mysql_num_rows($res1);
			
			if(num=='0'){
				$response['status'] = 0;
                $response['status_message'] = 'Error in Register';
			}else{
				$response['status'] = 0;
                $response['status_message'] = 'Username already exist!';
			
			}
        } */
}
else
{
        $response['status'] = 0;
        $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>