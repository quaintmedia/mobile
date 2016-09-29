<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

$fp = fopen('text.txt', 'w+');
fwrite($fp, $bulk_data);
fclose($fp);

if($values != "")
{
	//$page = $values->page;	
	$nid = $values->nid;

 /*$query="SELECT nd.nid, nd.title, frb.body_value, fm.filename FROM node nd INNER JOIN field_data_body frb ON nd.nid = frb.entity_id 
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON fu.fid=fm.fid and nd.status=1 and nd.nid='".$nid."' ";*/

$query="SELECT nd.nid, nd.title, nd.created , frb.body_value FROM node nd INNER JOIN field_data_body frb ON nd.nid = frb.entity_id 
and nd.status=1 and nd.nid='".$nid."' ";
	
	
	$res = $obj->select($query);
    
	$data = array();
    foreach($res as $row)
	{
	/*SMALL AND LARGE IMAGE CODE*/
	    $q1="SELECT fm.filename , fm.uri  FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$nid."'";
             $r = $obj->select($q1);
			 $datai1 = array();
			 foreach($r as $rowi1)
				{
				
				
				/*$data_arrayi1 = array(
			//"small_image" =>  $spath.$rowi1['filename'],
			 "large_image" => str_replace("s3://",$lpath,$rowi1['uri']),
				);*/
				
				
				$datai1[] =  utf8_decode(str_replace("s3://",$lpath,$rowi1['uri'])); 
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	
	/*TOTAL NUMBER OF COMMENT CODE*/
			
             //$qry = "SELECT * FROM comment where nid='".$nid."'";
			 
			 $qry= "SELECT * FROM comment cn inner join field_data_comment_body fd on cn.cid = fd.revision_id and cn.cid = fd.entity_id  and cn.nid='".$nid."' order by cn.cid desc";
			 $r2 = $obj->select($qry);
			 $total_comment = 0;
			 if(count($r2) > 0) {
				$total_comment=count($r2);
			 }
			//$total_comment=$r2['totComm'];
			 
	/*END TOTAL NUMBER OF COMMENT CODE*/
	
		$data_array = array(				
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			//"body_value" => utf8_decode(strip_tags($row['body_value'])),
			"body_value" => utf8_decode($row['body_value']),
			 "total_num_comment" => $total_comment,
			"created"=>$row['created'],
			"large_image" => $datai1,
			
			//"image" => $datai1,
			//"filename" => $path.$row['filename'],
			
			);
			
			
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$data_array = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$data_array);
			$data[] = $data_array;
	}
    
    if(!empty($res))
    {   
        $response['status'] = 1;
        $response['status_message'] = 'Data Found';
		$response['data'] = $data;
		
		
       
		
    }
    else
    {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['News List'] = array();
    }
}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);


exit;
?>