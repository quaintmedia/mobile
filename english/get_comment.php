<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

if($values != "")
{
    
    //$page = $values->page;	
	$nid = $values->nid; 
	
	
 //$query="SELECT * FROM comment cn inner join field_data_comment_body fd on cn.cid = fd.revision_id and cn.cid = fd.entity_id   and cn.nid='".$nid."' order by cn.cid desc";
 
	$query="SELECT * FROM comment cn 
			INNER JOIN field_data_comment_body fd ON cn.cid = fd.revision_id 
													AND cn.cid = fd.entity_id   
													AND cn.nid='".$nid."' 
			WHERE cn.status = 1
			ORDER BY cn.cid desc";
 
 /*$res1=mysql_query($query);
	echo $total_rows = mysql_num_rows($res1); 
	$per_page = 2;                           
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
	
	 $data = array();
    foreach($res as $row)
	{
	$data_array = array(
            
			"cid" => $row['cid'],
			"name" => utf8_decode($row['name']),
            "subject" => stripcslashes(utf8_decode($row['subject'])),
            "thread" => utf8_decode($row['thread']),
            "status" => utf8_decode($row['status']),
			"comment_body_value" =>  stripcslashes(utf8_decode($row['comment_body_value'])),
            "created" => $row['created'],
           
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
        $response['Comment List'] = array();
    }
}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>