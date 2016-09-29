<?php
ini_set('max_execution_time', 500);
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


function GetGroupTitle($tid)
	{
	
	switch ($tid) {
    case 4:
     return 'बड़ी खबरें' ;
    break;
		
	case 179:
      return  'अन्य बड़ी खबरें';
     break;
	 
	  case 435:
      return  'दुनिया';
     break;
	 
	 case 440:
      return  'भारत';
     break;
	 
	 case 420:
      return  'पटना';
     break;
	 
	 case 337:
      return  'दिल्ली';
     break;
	 
	 case 473:
      return  'टेक';
     break;
	 
	  case 502:
      return  'ऑटो';
     break;
	 
	 case 422:
      return  'लखनऊ';
     break;
	 
	 case 338:
      return  'खेल';
     break;
	 
	 case 340:
      return  'पीपुल';
     break;
	 
	 case 339:
      return  'जोक्स';
     break;
	 
	 case 443:
      return  'बिजनेस';
     break;
	 
	 case 491:
      return  'ओएमजी';
     break;
	 
	 case 302:
      return  'बॉलीवुड';
     break;
	 
	 /*case 415:
      return  'इनडेफ्थ';
     break;
	 
	 case 451:
      return  'शी-कॉर्नर';
     break;
	 
	 case 457:
      return  'टीन वर्ल्ड';
     break;
	 
	 case 489:
      return  'करिअर';
     break;
	 */
	 default:
      return  'खबरे';
    
		
		
    
}
}

//Return main Id
	function getMainID($tid)
	{
	switch ($tid) {
    
	case 4:
       return 145;
        break;
		
	case 179:
      return  179;
     break;
	 
	 case 435:
      return 355;
     break;
	 
	 case 440:
      return  441;
     break;
	 
	 case 420:
      return  421;
     break;
	 
	 case 337:
      return  433;
     break;
	 
	 case 473:
      return  473;
     break;
	 
	  case 502:
      return 502;
     break;
	 
	 case 422:
      return  423;
     break;
	 
	 case 338:
      return  434;
     break;
	 
	 case 340:
      return  430;
     break;
	 
	 case 339:
      return  503;
     break;
	 
	 case 443:
      return  444;
     break;
	 
	  case 491:
      return  492;
     break;
	 
	 /*case 415:
      return  415;
     break;
	 
	 case 451:
      return  415;
     break;
	 
	 case 457:
      return  457;
     break;
	 
	 case 489:
      return  490;
     break;*/
	 
	 
	}
}

//Return view_name
	function view_name($tid)
	{
	switch ($tid) {
    /*case 4:
     return 'बड़ी खबरे' ;
    break;
		
	case 179:
      return  'अन्य बड़ी खबरे';
     break;*/
	 
	  case 435:
      return 'topic_travel' ;
     break;
	 
	 case 440:
      return  'topic_business';
     break;
	 
	 case 420:
      return 'patna';
     break;
	 
	 case 337:
      return  'topic_technology';
     break;
	 
	/* case 473:
      return  'टेक';
     break;*/
	 
	 case 422:
      return  'topic_sport';
     break;
	 
	 case 338:
      return 'topic_cuture';
     break;
	 
	 case 340:
      return 'people' ;
     break;
	 
	 case 339:
      return 'jokes' ;
     break;
	 
	 case 443:
      return  'business';
     break;
	 
	 /*case 415:
      return  'इनडेफ्थ';
     break;
	 
	 case 451:
      return  'शी-कॉर्नर';
     break;
	 
	 case 457:
      return  'टीन वर्ल्ड';
     break;
	 
	 case 489:
      return  'करिअर';
     break;
	 */
	 
    
	 
	 
	}
}



//Return view_display
	function view_display($tid)
	{
	switch ($tid) {
    /*case 4:
     return 'बड़ी खबरे' ;
    break;
		
	case 179:
      return  'अन्य बड़ी खबरे';
     break;*/
	 
	  case 435:
      return 'attachment_7'  ;
     break;
	 
	 
	case 440:
      return  'attachment_1';
     break;
	 
	 case 420:
      return 'attachment_1';
     break;
	 
	 case 337:
      return  'attachment_2';
     break;
	 
	/* case 473:
      return  'टेक';
     break;*/
	 
	 case 422:
      return  'attachment_1';
     break;
	 
	 case 338:
      return 'attachment_1';
     break;
	 
	 case 340:
      return  'attachment_1';
     break;
	 
	 case 339:
      return 'attachment_2';
     break;
	 
	 case 443:
      return 'attachment_1';
     break;
	 
	 /*case 415:
      return  'इनडेफ्थ';
     break;
	 
	 case 451:
      return  'शी-कॉर्नर';
     break;
	 
	 case 457:
      return  'टीन वर्ल्ड';
     break;
	 
	 case 489:
      return  'करिअर';
     break;
	 */
    
	 
	 
	}
}


//Return home page box news based on tid
	function getHomeNews($tid)
	{	
		include_once('include/myclass.php');
		include_once('include/functions.php');

		$obj = new myclass();
		$func = new functions();

		global $lpath;
	
			//$lpath="http://d31p0ffza4ytus.cloudfront.net/";

			//First Query for get Lead News
			if(($tid==473)||($tid==502)||($tid==179)||($tid==302)){}
			else{
	
					$qb11="SELECT nd.nid, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
						and  ti.tid='$tid' order by nd.nid desc limit 1";
			
				}	
		$rb11 = $obj->select($qb11);
		$db1 = array();
		$newb1=array();
	
		foreach($rb11 as $rwb1)
		{
				/*SMALL ANDLARGE IMAGE CODE*/
				$qb1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid and fm.uri LIKE '%articles%' and  fu.id='".$rwb1['nid']."' group by fu.id ";
				$rb = $obj->select($qb1);
				$dib1 = '';
				foreach($rb as $rib1)
				{
					$dib1 =  utf8_decode(str_replace("s3://",$lpath,$rib1['uri'])); 
					
				}
				/*END SMALL AND LARGE IMAGE CODE*/
			
			
				$drb1 = array(
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



		
			//Query for get Lead News


			$mtid=getMainID($tid);
			$view_name=view_name($tid);
			$attchment=view_display($tid);
 
		/*if($tid=='338')	{
			$query="SELECT node.nid AS nid, draggableviews_structure.weight AS draggableviews_structure_weight, node.changed AS node_changed, 'node' AS field_data_field_custom_title_node_entity_type
				FROM 
				node AS node
				INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
				LEFT JOIN draggableviews_structure AS draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = '$view_name' AND draggableviews_structure.view_display = '$attchment' AND draggableviews_structure.args = '[]'
				WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$mtid') ))
				ORDER BY draggableviews_structure_weight ASC, node_changed DESC
				LIMIT 4 OFFSET 0";
					}
					
					else*/
				if($tid=='4')
				{
					$query=" SELECT node.nid AS nid, node.changed AS node_changed, node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
							FROM 
							node AS node
							LEFT JOIN field_data_field_topic AS field_data_field_topic_value_0 ON node.nid = field_data_field_topic_value_0.entity_id AND field_data_field_topic_value_0.field_topic_tid = '145'
							WHERE (( (node.status = '1') )AND(( (node.type IN  ('article')) AND( (field_data_field_topic_value_0.field_topic_tid = '145') ))))
							ORDER BY node_changed DESC, node_created DESC
							LIMIT 4 OFFSET 0";
				}
				else if($tid==340)
				{
				
					$query="SELECT node.nid AS nid, node.created AS node_created, node.changed AS node_changed, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_title_node_entity_type
							FROM 
							node as node
							INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
							LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = '$view_name' AND draggableviews_structure.view_display = '$attchment' AND draggableviews_structure.args = '[]'
							WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$mtid') ))
							ORDER BY node_created DESC, node_changed DESC, draggableviews_structure_weight ASC
							LIMIT 4 OFFSET 0";
				
				
				}
				else if($tid==339)
				{
				
					$query="SELECT node.nid AS nid, node.changed AS node_changed, node.created AS node_created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_title_node_entity_type
						FROM 
						node as node
						INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
						LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'jokes' AND draggableviews_structure.view_display = 'attachment_2' AND draggableviews_structure.args = '[]'
						WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '503') ))
						ORDER BY node_changed DESC, node_created DESC, draggableviews_structure_weight ASC
						LIMIT 4 OFFSET 0";
				
				
				}
				
				else if($tid==302)
				{
				/*
				Bollywood - Filmi Reviews(470)
				Bollywood - Filmi Khabre(469)
				Bollywood - Filmi Gossip(302)
				Bollywood - Chhota Parda(471)
				Bollywood - Filmi Interview(468)
				*/
					 $query="SELECT * FROM (SELECT node.nid AS nid, node.title AS title,node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
											FROM 
											node AS node
											INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
											WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '302') ))
											ORDER BY node_created DESC
											LIMIT 1 OFFSET 0) t
							
							UNION

							SELECT * FROM (SELECT node.nid AS nid,node.title AS title, node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
												FROM 
												node AS node
												INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
												WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '468') ))
												ORDER BY node_created DESC
												LIMIT 1 OFFSET 0) t1
																	
																	
																	
							UNION 
																		

							SELECT * FROM (SELECT node.nid AS nid,node.title AS title,  node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
												FROM 
												node AS node
												INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
												WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '469') ))
												ORDER BY node_created DESC
												LIMIT 1 OFFSET 0) t2 
												
							UNION

							SELECT * FROM (SELECT node.nid AS nid,node.title AS title, node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
												FROM 
												node AS node
												INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
												WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '470') ))
												ORDER BY node_created DESC
												LIMIT 1 OFFSET 0) t3
																	
																	
																	
							UNION 
																		

							SELECT * FROM (SELECT node.nid AS nid,node.title AS title,  node.created AS node_created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
												FROM 
												node AS node
												INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
												WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '471') ))
												ORDER BY node_created DESC
												LIMIT 1 OFFSET 0) t4 ";

				
				}
				else
				{
					/*$query="SELECT node.nid AS nid, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_title_node_entity_type
					FROM 
					node AS node
					INNER JOIN field_data_field_topic AS  field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
					LEFT JOIN draggableviews_structure AS draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = '$view_name' AND draggableviews_structure.view_display = '$attchment' AND draggableviews_structure.args = '[]'
					WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$mtid') ))
					ORDER BY draggableviews_structure_weight ASC
					LIMIT 4 OFFSET 0";*/
					
					$query="SELECT node.nid AS nid, node.changed AS node_changed, node.created AS node_created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_title_node_entity_type
							FROM 
							node AS node
							INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
							LEFT JOIN draggableviews_structure AS draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = '$view_name' AND draggableviews_structure.view_display = '$attchment' AND draggableviews_structure.args = '[]'
							WHERE (( (node.status = '1') )AND(( (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$mtid') )))
							ORDER BY node_changed DESC, node_created DESC, draggableviews_structure_weight ASC
							LIMIT 4 OFFSET 0";
				}

			$res = $obj->select($query);
		
		
			
			//ARRAY DECLARE FOR NID DUPLICATION (LEAD_NEWS QUERY)	
			$nid1 = array();
		
				foreach($res as $row)
				{
					$nidb1 = array("nid" => $row['nid'],);
					
					/* check array value is null if yes then set it to blank(must use php 5.3+) */
					$nidb1 = array_map(function($v){
						return (is_null($v)) ? "" : $v;
					},$nidb1);
					$nid1[] = $nidb1['nid'];
				}
	
	
		 $nid_string= implode(",",$nid1);
	 
			 /*CONDITION FOR NOT DATA come USING drupal QUERY*/
			 if(($tid=='473')||($tid=='502'))
				{
					 $qb12="SELECT nd.nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
					 and  ti.tid='$mtid' and nd.nid!='".$rwb1['nid']."' ORDER BY nd.changed DESC, nd.created DESC limit 5";
				}
				else if($tid=='179')
				{
					 $qb12="SELECT nd.nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
					 and  ti.tid='$mtid' and nd.nid!='".$rwb1['nid']."' ORDER BY nd.changed DESC, nd.created DESC limit 5 ";
				}
				else if($tid=='491')
				{
					 $qb12="SELECT node.title AS title, node.nid AS nid, node.created AS created, 'node' AS field_data_field_custom_title_node_entity_type
							FROM 
							node AS node
							INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
							WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$mtid') ))
							ORDER BY created DESC
							LIMIT 4 OFFSET 0";
				}
				
				else{
						
						$qb12="SELECT nd.nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd where nd.nid in ($nid_string) and nd.nid!='".$rwb1['nid']."' ORDER BY nd.changed DESC, nd.created DESC ";
					}
			/*END CONDITION FOR NOT DATA come USING drupal QUERY*/
		
			 $rb12 = $obj->select($qb12);
			 //$db2 = array(0=>"");
			 if(count($db1) > 0){
					$db2 = array(0=>"");
				}
			else{
					$db2 = array();
				}
			
			$newb2=array();
	
		foreach($rb12 as $rwb2)
		{
			
			$qb2="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid AND fm.uri  LIKE '%articles%' and  fu.id='".$rwb2['nid']."' group by fu.id ";
			$rb2= $obj->select($qb2);
			$dib2 = '';
			foreach($rb2 as $rib2)
			{
				$dib2 =  utf8_decode(str_replace("s3://",$lpath,$rib2['uri'])); 
			}
			
		
		
			$drb2 = array(	
				"nid" => $rwb2['nid'],
				"title" => utf8_decode($rwb2['title']),			
				"large_image" => $dib2,				
			);
			//check array value is null if yes then set it to blank(must use php 5.3+) 
			$drb2 = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$drb2);
			
			
			$db2[] = $drb2;
			//echo "<pre>";
			//print_r($db2);
		}
			 
				
				/*$data=$db1 + $db2;
		
				//$dddd=$db1 + $db2;
				echo "<pre>";
				print_r($data);*/
				
		//}
		$newb2= array(
			
			'tid'=>$tid,
			'title'=>GetGroupTitle($tid),
			'data1'=>$db1 + $db2
		);

		
		return $newb2;

	
	}
?>