<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

if($values != "")
{
$tid = $values->tid;
$title=$values->title;
 
  //$page = $values->page;	 
		
	
	
	
	
	
mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');
	
	 /*$query="SELECT nd.nid, nd.title, nd.created, fm.uri, fm.filename FROM node nd
	INNER JOIN  taxonomy_index ti ON nd.nid=ti.nid 
	 INNER JOIN  file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON fu.fid=fm.fid and nd.status=1 and nd.title like '%$title%' and ti.tid='".$tid."'  ";*/

 $query="SELECT nd.nid, nd.title, nd.created FROM node nd  INNER JOIN  taxonomy_index ti ON nd.nid=ti.nid 
     and nd.status=1 and nd.title like '%$title%' and ti.tid='".$tid."'  ";




	
	
     $res = $obj->select($query);
	 
	 //echo "<pre>";print_r($res);
	 
	
	
	 $data = array();
    foreach($res as $row)
	{
	
			/*SMALL AND LARGE IMAGE CODE*/
	    $q1="SELECT fm.filename,  fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$row['nid']."'";
             $r = $obj->select($q1);
			 $datai1 = array();
			 foreach($r as $rowi1)
				{
				
				
				
				$datai1[] =  utf8_decode(str_replace("s3://",$lpath,$rowi1['uri'])); 
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	
	
	$data_array = array(
            
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			"created" => $row['created'],
			"large_image" => $datai1,
			
			//"image" => $datai1,
			//"filename" => $path.$row['filename'],
			//"uri" => $row['uri'],
			
           
        );
        /* check array value is null if yes then set it to blank(must use php 5.3+) */
        $data_array = array_map(function($v){
            return (is_null($v)) ? "" : $v;
        },$data_array);
        $data[] = $data_array;
	}
	//print_r($res);
    
    if(!empty($res))
    {   
        $response['status'] = 1;
        $response['status_message'] = 'Data Found';
	 //print "<pre>" ; print_r($response['Search Data'] = $data);
	 $response['data'] = $data;
		
		
		
    }
    else
    {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['Search Data'] = array();
    }
}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>