<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


//$bulk_data = rawurldecode($_REQUEST['bulk_data']);
//$values	= $func->jsondecode($bulk_data);

//if($values != "")
{
	//$page = $values->page;	
	//$tid = $values->tid;
	
 

 

  /*$query="SELECT nd.nid, nd.title, nd.created, fm.uri,fm.filename FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON fu.fid=fm.fid and nd.status=1 and ti.tid='315' ";*/

 $query="SELECT nd.nid, nd.title, nd.created FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
 and nd.status=1 and ti.tid='315' ";


	
	$res = $obj->select($query);
    
	//echo "<pre>";print_r($res);
	

	$data = array();
    foreach($res as $row)
	{
	 
			/*SMALL AND LARGE IMAGE CODE*/
	    $q1="SELECT fm.filename ,  fm.uriFROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$row['nid']."'";
             $r = $obj->select($q1);
			 $datai1 = array();
			 foreach($r as $rowi1)
				{
				
				/*$data_arrayi1 = array(
				//"small_image" => $spath.$rowi1['filename'],
				 "large_image" => str_replace("s3://",$lpath,$rowi1['uri']),
				);
				$datai1[] = $data_arrayi1; */
				
				$datai1[] =  utf8_decode(str_replace("s3://",$lpath,$rowi1['uri'])); 
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	
			
		$data_array = array(				
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			"created" => $row['created'],
			"large_image" => $datai1,
			
			//"image" => $datai1,
			//"uri" => $row['uri'],		
			
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
		
        //$response['nid'] = $res[0]['nid'];
		//$response['title'] = $res[0]['title'];
		//$response['created'] = $res[0]['created'];
		
		
		
		

		
    }
    else
    {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['News List'] = array();
    }
}/*
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}*/
echo json_encode($response);


exit;
?>