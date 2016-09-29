<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

if($values != "")
{
	//$page = $values->page;	
	$nid = $values->nid;
	
 


 



 /*$query="SELECT nd.nid, nd.title, frb.body_value, fm.filename FROM node nd INNER JOIN field_data_body frb ON nd.nid = frb.entity_id 
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON fu.fid=fm.fid and nd.status=1 and nd.nid='".$nid."' ";*/

$query="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
and nd.status=1 and nd.type='video' and nd.nid='".$nid."' ";
	
	/*$res1=mysql_query($query);
	$total_rows = mysql_num_rows($res1); 
	$per_page = 20;                           
	$num_links = 10;                          	
	$cur_page = 1;                          


    if(isset($page))
    {
      $cur_page = $page;
      $cur_page = ($cur_page < 1)? 1 : $cur_page;            
    }

    $offset = ($cur_page-1)*$per_page;                
   
    $pages = ceil($total_rows/$per_page);              


    $start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
    $end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
	$query.="  LIMIT ".$per_page." OFFSET ".$offset;*/
	
	$res = $obj->select($query);
    
	//echo "<pre>";print_r($res);
	
	//$path="23.21.226.54/web/liveindia/sites/default/files/styles/small_news_image/public/articles/";
	//$spath="http://192.168.1.44/liveindia/sites/default/files/styles/small_news_image/public/articles/";
	$path="http://liveindiahindi-973115256.ap-southeast-1.elb.amazonaws.com/sites/default/files/";

	$data = array();
    foreach($res as $row)
	{
	
	
	
	
		$data_array = array(				
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			"video" => $row['field_video_video_url'],
			"image" => str_replace("public://",$path,$row['field_video_thumbnail_path']),
			
			
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