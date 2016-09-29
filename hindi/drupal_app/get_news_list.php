<?php
ini_set('max_execution_time', 500);
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/myclass.php');
include('include/functions.php');
include('function_tid.php');

$obj = new myclass();
$func = new functions();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

$myfile = fopen("/tmp/amit_test.txt", "w") or die("Unable to open file amit_text.txt!");
fwrite($myfile, __FILE__ . print_r( $values, true ) );
fclose($myfile);

//echo "<pre>";
//print_r(getHomeNews(4));exit;


if($values != "")
{
	$page = $values->page;	
	$tid = $values->tid;
	$per_page=$values->per_page;
	
 
	If($tid=='')
	{
/*=============1===================home-lead news (tid:4)==================================*/
		//Todo - check how to provide breaking news
		$qb11="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='4' order by nd.nid desc limit 1";
		 $rb11 = $obj->select($qb11);
		 
		 $db1 = array();
	
	$newb1=array();
	
		foreach($rb11 as $rwb1)
		{
			
				
			/*SMALL ANDLARGE IMAGE CODE*/
			$qb1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rwb1['nid']."' group by fu.id ";
			$rb = $obj->select($qb1);
			$dib1 = '';
			foreach($rb as $rib1)
			{
				/*$dri1 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri1['uri']),
					"large_image" => str_replace("s3://",$lpath,$ri1['uri']),
				);*/
				
				$dib1 =  utf8_decode(str_replace("s3://",$lpath,$rib1['uri'])); 
				//$di1[] = $dri1; 
			}
			/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$drb1 = array(	
				//"name" =>'अन्य बड़ी खबरें',
				"nid" => $rwb1['nid'],
				"title" => utf8_decode($rwb1['title']),			
				"large_image" => $dib1,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$drb1 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$drb1);
			$db1[] = $drb1;
		}
		$newb1= array(
			'tid'=>'4',
			'title'=>'बड़ी खबरे',
			'data1'=>$db1
		);
		//echo "<pre>";print_r($d1);
		
		
//====================================================================================================================
/*=============1===================home-main news (tid:145)==================================*/
		//Todo - check how to provide breaking news
		$qb12="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='145' order by nd.nid desc limit 6";
		 $rb12 = $obj->select($qb12);
		 
		 $db2 = array();
	
	$newb2=array();
	
		foreach($rb12 as $rwb2)
		{
			
				
			
			$qb2="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rwb2['nid']."' group by fu.id ";
			$rb2= $obj->select($qb2);
			$dib2 = '';
			foreach($rb2 as $rib2)
			{
				
				
				$dib2 =  utf8_decode(str_replace("s3://",$lpath,$rib2['uri'])); 
				//$di1[] = $dri1; 
			}
			
		
		
			$drb2 = array(	
				//"name" =>'अन्य बड़ी खबरें',
				"nid" => $rwb2['nid'],
				"title" => utf8_decode($rwb2['title']),			
				"large_image" => $dib2,				
			);
			//check array value is null if yes then set it to blank(must use php 5.3+) 
			$drb2 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$drb2);
			$db2[] = $drb2;
		}
		$newb2= array(
			
			'tid'=>'4',
			'title'=>'बड़ी खबरे',
			'data1'=>$db1 + $db2
		);
		//echo "<pre>";print_r($d1);
		
		
//====================================================================================================================
		/*=============1===================home-orher news (tid:179)==================================*/
		//Todo - check how to provide breaking news
		$q11="SELECT nd.nid, nd.title, nd.created ,'अन्य बड़ी खबरें' FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='179' order by nd.nid desc limit 5";
		 $r11 = $obj->select($q11);
		 
		 $d1 = array();
	
	$new1=array();
	
		foreach($r11 as $rw1)
		{
			
				
			/*SMALL ANDLARGE IMAGE CODE*/
			$q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw1['nid']."' group by fu.id ";
			$r = $obj->select($q1);
			$di1 = '';
			foreach($r as $ri1)
			{
				/*$dri1 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri1['uri']),
					"large_image" => str_replace("s3://",$lpath,$ri1['uri']),
				);*/
				
				$di1 = utf8_decode( str_replace("s3://",$lpath,$ri1['uri'])); 
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
		
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw2['nid']."' group by fu.id";
			$r = $obj->select($q1);
			$di2 = '';
			foreach($r as $ri2)
			{
				/*$dri2 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri2['uri']),
					 "large_image" => str_replace("s3://",$lpath,$ri2['uri']),
				);*/
				//$di2[] = $dri2; 
				$di2 =  utf8_decode(str_replace("s3://",$lpath,$ri2['uri'])); 
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
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q3="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw3['nid']."' group by fu.id";
			$r = $obj->select($q3);
			$di3 = '';
			foreach($r as $ri3)
			{
				/*$dri2 = array(				
					//"small_image" => str_replace("s3://",$spath,$ri2['uri']),
					 "large_image" => str_replace("s3://",$lpath,$ri2['uri']),
				);*/
				//$di2[] = $dri2; 
				$di3 =  utf8_decode(str_replace("s3://",$lpath,$ri3['uri'])); 
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
	/*=====4===========================Home - patna Lead (tid:420)==================================*/
 
 
 
 
		$q14="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='420' order by nd.nid desc limit 5";
		$r14 = $obj->select($q14);		
		$d4 = array();
	
	$new4=array();
	
		foreach($r14 as $rw4)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q4="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw4['nid']."' group by fu.id";
			$r = $obj->select($q4);
			$di4 = '';
			foreach($r as $ri4)
			{
				
				$di4 =  utf8_decode(str_replace("s3://",$lpath,$ri4['uri'])); 
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
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q5="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw5['nid']."' group by fu.id";
			$r = $obj->select($q5);
			$di5 = '';
			foreach($r as $ri5)
			{
				
				$di5 =  utf8_decode(str_replace("s3://",$lpath,$ri5['uri'])); 
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
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q6="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw6['nid']."' group by fu.id";
			$r = $obj->select($q6);
			$di6 = '';
			foreach($r as $ri6)
			{
				
				$di6 =  utf8_decode(str_replace("s3://",$lpath,$ri6['uri'])); 
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
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q7="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw7['nid']."' group by fu.id";
			$r = $obj->select($q7);
			$di7 = '';
			foreach($r as $ri7)
			{
				
				$di7 =  utf8_decode(str_replace("s3://",$lpath,$ri7['uri'])); 
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
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q8="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw8['nid']."' group by fu.id";
			$r = $obj->select($q8);
			$di8 = '';
			foreach($r as $ri8)
			{
				
				$di8 =  utf8_decode(str_replace("s3://",$lpath,$ri8['uri'])); 
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
			'title'=>'खेल',
			'data1'=>$d8
		);
		
/*============9===================Home - People lead	 (tid:340)==================================*/
 
 
 
 
		$q19="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='340' order by nd.nid desc limit 5";
		$r19 = $obj->select($q19);		
		$d9 = array();
	
	$new9=array();
	
		foreach($r19 as $rw9)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q9="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw9['nid']."' group by fu.id";
			$r = $obj->select($q9);
			$di9 = '';
			foreach($r as $ri9)
			{
				
				$di9 =  utf8_decode(str_replace("s3://",$lpath,$ri9['uri'])); 
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
			'tid'=>'340',
			'title'=>'पीपुल',
			'data1'=>$d9
		);
		
		/*============10===================Home - Jokes Lead (tid:339)==================================*/
 
 
 
 
		$q110="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='339' order by nd.nid desc limit 5";
		$r110 = $obj->select($q110);		
		$d10 = array();
	
	$new10=array();
	
		foreach($r110 as $rw10)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q10="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw10['nid']."' group by fu.id";
			$r = $obj->select($q10);
			$di10 = '';
			foreach($r as $ri10)
			{
				
				$di10 =  utf8_decode(str_replace("s3://",$lpath,$ri10['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr10 = array(	
				
				"nid" => $rw10['nid'],
				"title" => utf8_decode($rw10['title']),				
				"large_image" => $di10,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr10 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr10);
			$d10[] = $dr10;
		}	
 		$new10= array(
			'tid'=>'339',
			'title'=>'जोक्स',
			'data1'=>$d10
		);
		
		/*============11===================Home - Business Lead (tid:443)==================================*/
 
 
 
 
		$q111="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='443' order by nd.nid desc limit 5";
		$r111 = $obj->select($q111);		
		$d11 = array();
	
	$new11=array();
	
		foreach($r111 as $rw11)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q11="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw11['nid']."' group by fu.id";
			$r = $obj->select($q11);
			$di11 ='';
			foreach($r as $ri11)
			{
				
				$di11 =  utf8_decode(str_replace("s3://",$lpath,$ri11['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr11 = array(	
				
				"nid" => $rw11['nid'],
				"title" => utf8_decode($rw11['title']),				
				"large_image" => $di11,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr11 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr11);
			$d11[] = $dr11;
		}	
 		$new11= array(
			'tid'=>'443',
			'title'=>'बिजनेस',
			'data1'=>$d11
		);
		/*============12===================Indepth - Politics  (tid:415)==================================*/
 
 
 
 
		$q112="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='415' order by nd.nid desc limit 5";
		$r112 = $obj->select($q112);		
		$d12 = array();
	
	$new12=array();
	
		foreach($r112 as $rw12)
		{
			
			/*SMALL ANDLARGE IMAGE CODE*/
			$q12="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw12['nid']."' group by fu.id";
			$r = $obj->select($q12);
			$di12 = '';
			foreach($r as $ri12)
			{
				
				$di12 =  utf8_decode(str_replace("s3://",$lpath,$ri12['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr12 = array(	
				
				"nid" => $rw12['nid'],
				"title" => utf8_decode($rw12['title']),				
				"large_image" => $di12,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr12 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr12);
			$d12[] = $dr12;
		}	
 		$new12= array(
			'tid'=>'415',
			'title'=>'इनडेफ्थ',
			'data1'=>$d12
		);
		
		/*============13===================Sshe-corner - beauty tips block  (tid:451)==================================*/
 
 
 
 
		$q113="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='451' order by nd.nid desc limit 5";
		$r113 = $obj->select($q113);		
		$d13 = array();
	
	$new13=array();
	
		foreach($r113 as $rw13)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q13="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw13['nid']."' group by fu.id";
			$r = $obj->select($q13);
			$di13 = '';
			foreach($r as $ri13)
			{
				
				$di13 =  utf8_decode(str_replace("s3://",$lpath,$ri13['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr13 = array(	
				
				"nid" => $rw13['nid'],
				"title" => utf8_decode($rw13['title']),				
				"large_image" => $di13,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr13 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr13);
			$d13[] = $dr13;
		}	
 		$new13= array(
			'tid'=>'451',
			'title'=>'शी-कॉर्नर ',
			'data1'=>$d13
		);
		
		/*============14===================Teen world - Trending hot block  (tid: 457)==================================*/
 
 
 
 
		$q114="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='457' order by nd.nid desc limit 5";
		$r114 = $obj->select($q114);		
		$d14 = array();
	
	$new14=array();
	
		foreach($r114 as $rw14)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q14="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw14['nid']."' group by fu.id";
			$r = $obj->select($q14);
			$di14 = '';
			foreach($r as $ri14)
			{
				
				$di14 =  utf8_decode(str_replace("s3://",$lpath,$ri14['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr14 = array(	
				
				"nid" => $rw14['nid'],
				"title" => utf8_decode($rw14['title']),				
				"large_image" => $di14,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr14 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr14);
			$d14[] = $dr14;
		}	
 		$new14= array(
			'tid'=>'457',
			'title'=>'टीन वर्ल्ड',
			'data1'=>$d14
		);
	/*============14===================Home - career lead  (tid: 489)==================================*/
 
 
 
 
		$q115="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
		 and  ti.tid='489' order by nd.nid desc limit 5";
		$r115 = $obj->select($q115);		
		$d15 = array();
	
	$new15=array();
	
		foreach($r115 as $rw15)
		{
			
		
			/*SMALL ANDLARGE IMAGE CODE*/
			$q15="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$rw15['nid']."' group by fu.id";
			$r = $obj->select($q15);
			$di15 = '';
			foreach($r as $ri15)
			{
				
				$di15 =  utf8_decode(str_replace("s3://",$lpath,$ri15['uri'])); 
			}
		/*END SMALL AND LARGE IMAGE CODE*/
		
		
			$dr15 = array(	
				
				"nid" => $rw15['nid'],
				"title" => utf8_decode($rw15['title']),				
				"large_image" => $di15,				
			);
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$dr15 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$dr15);
			$d15[] = $dr15;
		}	
 		$new15= array(
			'tid'=>'489',
			'title'=>'करिअर',
			'data1'=>$d15
		);
		
		//echo "<pre>";print_r(array_merge($d1,$d2));
		
		$final_data = array($newb2,$new1,$new2,$new3,$new4,$new5,$new6,$new7,$new8,$new9,$new10,$new11,$new12,$new13,$new14,$new15);
		
		
		/*$final_data = array(getHomeNews(4),
		getHomeNews(13),
		getHomeNews(20),
			,$new1,$new2,$new3,$new4,$new5,$new6,$new7,$new8,$new9,$new10,$new11,$new12,$new13,$new14,$new15);*/
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


	
	


	$data = array();
	
	
	
    foreach($res as $row)
	{
	
	
		if(($tid==305)||($tid==306)||($tid==289)||($tid==301)||($tid==284)||($tid==307)||($tid==308)||($tid==309)){
		
		$path="http://liveindiahindi-973115256.ap-southeast-1.elb.amazonaws.com/sites/default/files/";
		
			/*SMALL AND LARGE IMAGE CODE*/
	    $q1="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
and nd.status=1 and nd.type='video' and nd.nid='".$row['nid']."' ";
             $r = $obj->select($q1);
			 $datai1 = '';
			 foreach($r as $rowi1)
				{
				
				
				
				/*$data_arrayi1 = array(
				
				"large_image" =>str_replace("public://",$path,$rowi1['field_video_thumbnail_path']),
				);*/
				
				//$datai1[] =  str_replace("s3://",$lpath,$rowi1['field_video_thumbnail_path']); 
				//$datai1[] = $data_arrayi1; 
				
				
			  $datai1 = utf8_decode(str_replace("public://",$path,$rowi1['field_video_thumbnail_path'])); 
			  /*//echo $rowi1['field_video_thumbnail_path'];			  			  
			  //die;
			  if ($rowi1['field_video_thumbnail_path']=='')
					{
						$datai1='testelan';
					}
			*/
				$video_url=$rowi1['field_video_video_url'];
				}
	/*END SMALL AND LARGE IMAGE CODE*/
	
		
		
		}
		else{
		
		
			/*SMALL ANDLARGE IMAGE CODE*/
	    $q1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and  fu.id='".$row['nid']."'";
             $r = $obj->select($q1);
			 
			 
			 foreach($r as $rowi1)
				{
				if (empty($datai1))
					{
						$datai1= '';
					}
				/*
				$data_arrayi1 = array(
				
				//"small_image" => str_replace("s3://",$spath,$rowi1['uri']),
				 "large_image" => str_replace("s3://",$lpath,$rowi1['uri']),
				);*/
				
				//$datai1[] =  str_replace("s3://",$lpath,$rowi1['uri']); 
				//$datai1[] = $data_arrayi1; 
				 $datai1 =  utf8_decode(str_replace("s3://",$lpath,$rowi1['uri'])); 		
				 
				}
				
				
				
	/*END SMALL AND LARGE IMAGE CODE*/
	}
	
		$data_array = array(				
			"nid" => $row['nid'],
			"title" => utf8_decode($row['title']),
			"created" => $row['created'],
			"total_record" => $total_rows ,
			//"large_image" => $datai1,
			
			"large_image" =>$datai1,
			"video_url" => $video_url,
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
