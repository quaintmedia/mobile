<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

global $gallerypath;	

if($values != "")
{
	
	$nid=$values->nid;

// $query="SELECT fm.filename , fm.uri FROM  file_usage fu LEFT JOIN field_data_field_artical_field_collection fdfafc ON fu.id=fdfafc.field_artical_field_collection_value  INNER JOIN file_managed fm ON fu.fid=fm.fid  AND  fdfafc.entity_id='$nid' ";
$query ="SELECT fm.fid, fm.filename , fm.uri, fd.field_image_description_value as title FROM  file_usage fu INNER JOIN field_data_field_artical_field_collection fdfafc ON fu.id=fdfafc.field_artical_field_collection_value  INNER JOIN file_managed fm ON fu.fid=fm.fid
		INNER  JOIN field_data_field_image_description fd ON fd.entity_id=fdfafc.field_artical_field_collection_value  AND fu.type='field_collection_item' 
		  AND  fdfafc.entity_id='$nid' ";
$res = $obj->select($query);
 
	$data = array();
    foreach($res as $row)
	{
	

		$data_array = array(				
			"nid" => $nid,
			"title" => "",
			//"title" =>utf8_decode($row['title']),
			"large_image" => utf8_decode(str_replace("s3://",$gallerypath.'s3/',$row['uri'])),
			
			
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
        $response['data'] = array();
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