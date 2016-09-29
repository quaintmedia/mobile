<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


//echo "<pre>";
//echo $_REQUEST['bulk_data'];exit;


$bulk_data = rawurldecode($_REQUEST['bulk_data']);

$values	= $func->jsondecode($bulk_data);
if($values != "")
{

        $nid = $values->nid;
		$uid=$values->uid;
		$subject = $values->subject;
		$name = $values->name;
		//$mail=$values->mail;
		$comment_body_value=$values->comment_body_value;
	
	
       
       //echo $queryUser = "INSERT INTO `users`(`uid`, `name`, `pass`, `mail`) VALUES ('$uid','$name','$password','$email') ";
	   
	   

$host = $_SERVER['REMOTE_ADDR'];
$t=time();
	   
   $queryUser="INSERT INTO `comment`( `nid`, `uid`, `subject`, `hostname`,`created`, `status`, `thread`, `name`, `mail`, `homepage`,`language`)
	 VALUES ('$nid','$uid','" . addslashes($subject) . "','$host','$t','0','','$name','','','und')";       
      
	  $GetUserInfo = $obj->insert($queryUser);
		
	 $rw="select * from  `comment` order by cid desc limit 1 ";
		$q11=mysqli_query($conn,$rw);
		
		$d11=mysqli_fetch_array($q11);
		
 $id= $d11['cid']; 
	
		
		
		
  $q1="INSERT INTO `field_data_comment_body`(`entity_type`, `bundle`, `deleted`, `entity_id`, `revision_id`, `language`, `delta`, `comment_body_value`, `comment_body_format`)
	VALUES ('comment','comment_node_article','0','$id','$id','und','0','" . addslashes($comment_body_value) . "','filtered_html')";
	$GetUserInfo1 = $obj->insert($q1);
	      
		 // print_r( $GetUserInfo); 
       if($GetUserInfo1!== false)
        {
               $response['status'] = 1;
                $response['status_message'] = 'Add comment'; 
				
        }
        else
        {
		$response['status'] = 0;
                $response['status_message'] = 'Error in add comment';
                
			
        }
}
else
{
        $response['status'] = 0;
        $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>