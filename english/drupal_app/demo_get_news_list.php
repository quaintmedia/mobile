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
	$page = $values->page;	
	$tid = $values->tid;
	$per_page=$values->per_page;
	
 
	If($tid=='')
	{

		/*=============1===================home-orher news (tid:179)==================================*/
		
		$q11="SELECT nd.nid, nd.title, nd.created ,'अन्य बड़ी खबरें' FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='179' order by nd.nid desc limit 5";
		 $r11 = $obj->select($q11);
		 
		 $d1 = array();
	
	$new1=array();
	
		foreach($r11 as $rw1)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
				
			/*SMALL ANDLARGE IMAGE CODE*/
			$q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw1['nid']."' group by fu.id ";
			$r = $obj->select($q1);
			$di1 = array();
			foreach($r as $ri1)
			{
				/*$dri1 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri1['uri']),
					"large_image" => str_replace("s3://",$lpath,$ri1['uri']),
				);*/
				
				$di1 =  str_replace("s3://",$lpath,$ri1['uri']); 
				//$di1[] = $dri1; 
			}
			/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr1 = array(	
				//"name" =>'अन्य बड़ी खबरें',
				"nid" => $rw1['nid'],
				"title" => utf8_decode($rw1['title']),			
				"large_image" => $di1,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr1 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr1);
			$d1[] = $dr1;
		}
		$new1= array(
			'tid'=>'179',
			'title'=>'अन्य बड़ी खबरें',
			'data1'=>$d1
		);
		//echo "<pre>";print_r($d1);
		
		
//====================================================================================================================
 /*=======2=========================Home - world lead (tid:435)==================================*/
 
 
 
		$q12="SELECT nd.nid, nd.title, nd.created, 'दुनिया' FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='435' order by nd.nid desc limit 5";
		$r12 = $obj->select($q12);		//print_r($r12);exit;
		$d2 = array();
	
	$new2=array();
	
		foreach($r12 as $rw2)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw2['nid']."' group by fu.id";
			$r = $obj->select($q1);
			$di2 = array();
			foreach($r as $ri2)
			{
				/*$dri2 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri2['uri']),
					 "large_image" => str_replace("s3://",$lpath,$ri2['uri']),
				);*/
				//$di2[] = $dri2; 
				$di2 =  str_replace("s3://",$lpath,$ri2['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr2 = array(	
				//"name" =>'दुनिया',
				"nid" => $rw2['nid'],
				"title" => utf8_decode($rw2['title']),				
				"large_image" => $di2,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr2 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr2);
			$d2[] = $dr2;
		}	
 		$new2= array(
			'tid'=>'435',
			'title'=>'दुनिया',
			'data1'=>$d2
		);
		
		
		
/*======3==========================Home - India Lead (tid:440)==================================*/
 
 
 
 
		$q13="SELECT nd.nid, nd.title, nd.created, 'दुनिया' FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='440' order by nd.nid desc limit 5";
		$r13 = $obj->select($q13);		//print_r($r12);exit;
		$d3 = array();
	
	$new3=array();
	
		foreach($r13 as $rw3)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q3="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw3['nid']."' group by fu.id";
			$r = $obj->select($q3);
			$di3 = array();
			foreach($r as $ri3)
			{
				/*$dri2 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri2['uri']),
					 "large_image" => str_replace("s3://",$lpath,$ri2['uri']),
				);*/
				//$di2[] = $dri2; 
				$di3 =  str_replace("s3://",$lpath,$ri3['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr3 = array(	
				//"name" =>'दुनिया',
				"nid" => $rw3['nid'],
				"title" => utf8_decode($rw3['title']),				
				"large_image" => $di3,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr3 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr3);
			$d3[] = $dr3;
		}	
 		$new3= array(
			'tid'=>'440',
			'title'=>'भारत',
			'data1'=>$d3
		);
	/*=====4===========================Home - Patna Lead (tid:420)==================================*/
 
 
 
 
		$q14="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='440' order by nd.nid desc limit 5";
		$r14 = $obj->select($q14);		
		$d4 = array();
	
	$new4=array();
	
		foreach($r14 as $rw4)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q4="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw4['nid']."' group by fu.id";
			$r = $obj->select($q4);
			$di4 = array();
			foreach($r as $ri4)
			{
				
				$di4 =  str_replace("s3://",$lpath,$ri4['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr4 = array(	
				
				"nid" => $rw4['nid'],
				"title" => utf8_decode($rw4['title']),				
				"large_image" => $di4,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr4 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr4);
			$d4[] = $dr4;
		}	
 		$new4= array(
			'tid'=>'420',
			'title'=>'पटना',
			'data1'=>$d4
		);
	/*================================Home - Delhi lead (tid:337)==================================*/
 
 
 
 
		$q15="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='337' order by nd.nid desc limit 5";
		$r15 = $obj->select($q15);		
		$d5 = array();
	
	$new5=array();
	
		foreach($r15 as $rw5)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q5="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw5['nid']."' group by fu.id";
			$r = $obj->select($q5);
			$di5 = array();
			foreach($r as $ri5)
			{
				
				$di5 =  str_replace("s3://",$lpath,$ri5['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr5 = array(	
				
				"nid" => $rw5['nid'],
				"title" => utf8_decode($rw5['title']),				
				"large_image" => $di5,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr5 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr5);
			$d5[] = $dr5;
		}	
 		$new5= array(
			'tid'=>'337',
			'title'=>'दिल्ली',
			'data1'=>$d5
		);
		
		/*============6====================Home - Tech slider (tid:473)==================================*/
 
 
 
 
		$q16="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='473' order by nd.nid desc limit 5";
		$r16 = $obj->select($q16);		
		$d6 = array();
	
	$new6=array();
	
		foreach($r16 as $rw6)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q6="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw6['nid']."' group by fu.id";
			$r = $obj->select($q6);
			$di6 = array();
			foreach($r as $ri6)
			{
				
				$di6 =  str_replace("s3://",$lpath,$ri6['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr6 = array(	
				
				"nid" => $rw6['nid'],
				"title" => utf8_decode($rw6['title']),				
				"large_image" => $di6,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr6 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr6);
			$d6[] = $dr6;
		}	
 		$new6= array(
			'tid'=>'473',
			'title'=>'टेक',
			'data1'=>$d6
		);
		
		/*============7====================Home - Lucknow Lead (tid:422)==================================*/
 
 
 
 
		$q17="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='422' order by nd.nid desc limit 5";
		$r17 = $obj->select($q17);		
		$d7 = array();
	
	$new7=array();
	
		foreach($r17 as $rw7)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q7="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw7['nid']."' group by fu.id";
			$r = $obj->select($q7);
			$di7 = array();
			foreach($r as $ri7)
			{
				
				$di7 =  str_replace("s3://",$lpath,$ri7['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr7 = array(	
				
				"nid" => $rw7['nid'],
				"title" => utf8_decode($rw7['title']),				
				"large_image" => $di7,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr7 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr7);
			$d7[] = $dr7;
		}	
 		$new7= array(
			'tid'=>'422',
			'title'=>'लखनऊ',
			'data1'=>$d7
		);
		/*============8===================Home - Sports lead (tid:338)==================================*/
 
 
 
 
		$q18="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='338' order by nd.nid desc limit 5";
		$r18 = $obj->select($q18);		
		$d8 = array();
	
	$new8=array();
	
		foreach($r18 as $rw8)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q8="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw8['nid']."' group by fu.id";
			$r = $obj->select($q8);
			$di8 = array();
			foreach($r as $ri8)
			{
				
				$di8 =  str_replace("s3://",$lpath,$ri8['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr8 = array(	
				
				"nid" => $rw8['nid'],
				"title" => utf8_decode($rw8['title']),				
				"large_image" => $di8,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr8 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr8);
			$d8[] = $dr8;
		}	
 		$new8= array(
			'tid'=>'338',
			'title'=>'लखनऊ',
			'data1'=>$d8
		);
		
/*============9===================Home - auto slider (tid:482)==================================*/
 
 
 
 
		$q19="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='482' order by nd.nid desc limit 5";
		$r19 = $obj->select($q19);		
		$d9 = array();
	
	$new9=array();
	
		foreach($r19 as $rw9)
		{
			$spath="http://d31p0ffza4ytus.cloudfront.net/";
			$lpath="http://d31p0ffza4ytus.cloudfront.net/";
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q9="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw9['nid']."' group by fu.id";
			$r = $obj->select($q9);
			$di9 = array();
			foreach($r as $ri9)
			{
				
				$di9 =  str_replace("s3://",$lpath,$ri9['uri']); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr9 = array(	
				
				"nid" => $rw9['nid'],
				"title" => utf8_decode($rw9['title']),				
				"large_image" => $di9,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr9 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr9);
			$d9[] = $dr9;
		}	
 		$new9= array(
			'tid'=>'482',
			'title'=>'लखनऊ',
			'data1'=>$d9
		);
		
		//echo "<pre>";print_r(array_merge($d1,$d2));
		
		$final_data = array($new1,$new2,$new3,$new4,$new5,$new6,$new7,$new8,$new9);
		//echo "<pre>";print_r($final_data);exit;
		//echo "<pre>";print_r(array_merge($new1,$new2)); exit;
		
		//$data=array_merge($d1,$d2);

 

	 $response['status'] = 1;
        $response['status_message'] = 'Data Found';
		//$response['total_record']= $total_rows ;
		$response['data'] = $final_data;
	

}else{


 

 /*$query="SELECT nd.nid, nd.title, nd.created, fm.uri,fm.filename FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON fu.fid=fm.fid and nd.status=1 and ti.tid='".$tid."' ";*/

 $query="SELECT nd.nid, nd.title, nd.created FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
 and  ti.tid='".$tid."' order by nd.nid desc";
 
 
 
	
	$res1=mysql_query($query);
	$total_rows = mysql_num_rows($res1); 
	//$per_page = 20;                           
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
	$query.="  LIMIT ".$per_page." OFFSET ".$offset;
	
	$res = $obj->select($query);
	
    
	//echo "<pre>";print_r($res);
	
	/*$spath="http://192.168.1.44/liveindia/sites/default/files/styles/small_news_image/public/articles/";
	$lpath="http://192.168.1.44/liveindia/sites/default/files/styles/large/public/articles/";*/
	
	$spath="http://d31p0ffza4ytus.cloudfront.net/";
	$lpath="http://d31p0ffza4ytus.cloudfront.net/";
	

	
	


	$data = array();
	
	
	
    foreach($res as $row)
	{
	
	
		if(($tid==305)||($tid==306)||($tid==289)||($tid==301)||($tid==284)||($tid==307)||($tid==308)||($tid==309)){
		
		$path="http://liveindiahindi-973115256.ap-southeast-1.elb.amazonaws.com/sites/default/files/";
		
			/*SMALL AND LARGE IMAGE CODE*/
	    $q1="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
and nd.status=1 and nd.type='video' and nd.nid='".$row['nid']."' ";
             $r = $obj->select($q1);
			 $datai1 = array();
			 foreach($r as $rowi1)
				{
				
				
				
				$data_arrayi1 = array(
				
				"large_image" =>str_replace("public://",$path,$rowi1['field_video_thumbnail_path']),
				);
				$datai1[] = $data_arrayi1; 
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	
		
		
		}
		else{
		
			/*SMALL ANDLARGE IMAGE CODE*/
	    $q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$row['nid']."'";
             $r = $obj->select($q1);
			 $datai1 = array();
			 foreach($r as $rowi1)
				{
				
				
				
				$data_arrayi1 = array(
				
				//"small_image" => str_replace("s3://",$spath,$rowi1['uri']),
				 "large_image" => str_replace("s3://",$lpath,$rowi1['uri']),
				);
				$datai1[] = $data_arrayi1; 
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	}
	
		$data_array = array(				
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			"created" => $row['created'],
			"total_record" => $total_rows ,
			"image" => $datai1,
			//"filename" => $path.$row['filename'],
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
		//$response['total_record']= $total_rows ;
		$response['data'] = $data;
		
        //$response['nid'] = $res[0]['nid'];
		//$response['title'] = $res[0]['title'];
		//$response['created'] = $res[0]['created'];
		
		
		
		

		
    }
    else
    {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['data'] = array();
    }
	
	}////tid null condition
	
}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode($response);


exit;
?>