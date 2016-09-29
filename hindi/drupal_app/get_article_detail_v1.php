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
	
	$nid = $values->nid;
	$userid= $values->uid;
	
	$query="SELECT nd.nid,nd.title as long_title,fdfs.field_source_value, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created ,us.name,nd.uid, frb.body_value FROM node nd INNER JOIN field_data_body frb ON nd.nid = frb.entity_id 
	INNER JOIN users us ON nd.uid = us.uid 
	INNER JOIN field_data_field_source fdfs ON fdfs.entity_id = nd.nid 
	and nd.status=1 and nd.nid='".$nid."' ";
	
	
		
	$res = $obj->select($query);
    
	$data = array();
    foreach($res as $row)
	{
		/*code for link given for sharing*/
		$x='node/';
		$y="SELECT * FROM  url_alias   WHERE source LIKE '$x$nid'";
		$y1 = $obj->select($y);
		$y2 = '';
		foreach($y1 as $y2)
			{
				$y11 =  $y2['alias']; 
			}
							
		
		
		/*SMALL AND LARGE IMAGE CODE*/
		    $q1="SELECT fm.filename , fm.uri  FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and fm.uri LIKE '%articles%' and   fu.id='".$nid."'";
		     $r = $obj->select($q1);
				 $datai1 = array();
				 foreach($r as $rowi1)
					{
						$datai1[] =  utf8_decode(str_replace("s3://",$lpath,$rowi1['uri'])); 
					}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		/*TOTAL NUMBER OF COMMENT CODE*/
				 //$qry= "SELECT * FROM comment cn inner join field_data_comment_body fd on cn.cid = fd.revision_id and cn.cid = fd.entity_id  and cn.nid='".$nid."' and cn.status= '1' order by cn.cid desc";
				 if(isset($userid) && $userid!= ''){
					$qry=" SELECT * FROM `comment` cn INNER JOIN field_data_comment_body fd ON cn.cid = fd.revision_id AND cn.cid = fd.entity_id AND cn.nid='".$nid."' AND ((cn.status = 0 && cn.uid='".$userid."')) 
							UNION
							SELECT * FROM `comment` cn INNER JOIN field_data_comment_body fd ON cn.cid = fd.revision_id AND cn.cid = fd.entity_id AND cn.nid='".$nid."' AND cn.status = 1 ORDER BY cid DESC ";
				 }
				 else{
						$qry="SELECT * FROM comment cn inner join field_data_comment_body fd on cn.cid = fd.revision_id and cn.cid = fd.entity_id  and cn.nid='".$nid."' and cn.status= '1' order by cn.cid desc ";
				 }
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
							"name" => utf8_decode($row['name']),
							"source" => utf8_decode($row['field_source_value']),
							
							"body_value" => utf8_decode($row['body_value']),
							"link" => stripslashes(utf8_decode('http://www.liveindiahindi.com/'.$y11)),
							"total_num_comment" => $total_comment,
							"created"=>$row['created'],
							"large_image" => $datai1,
			
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