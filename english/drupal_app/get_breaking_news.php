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
	//$nid = $values->nid; 
	
	
  $query="SELECT * FROM taxonomy_index ti, node nd  WHERE ti.nid=nd.nid AND  ti.tid='406' ORDER BY ti.nid DESC LIMIT 3";
 
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
            
			"nid" => $row['nid'],
			
            "title" => utf8_decode($row['title']),
           
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
        $response['Data'] = array();
    }
}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);exit;
?>