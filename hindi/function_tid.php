<?php
function GetGroupTitle($tid){
	
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

	function getRelationalTids( $tid ) {
		$arrRelationalTids = array(
			4 	=> array( 145 ),
			302	=> array( 302, 468, 469, 470, 471 ),

		);
		return ( true == array_key_exists( $tid, $arrRelationalTids ) ) 
			? 
				$arrRelationalTids[$tid] 
			: 
				array();
	}

	//Return home page box news based on tid
	function getHomeNews( $arrintTids ) {	
		$obj = new connection();		
		$arrintExtraTids = array();
	
		foreach( $arrintTids as $value ) {
			$arrintExtraTids += getRelationalTids( $value );
		}

		$arrintTids = array_merge( $arrintTids, $arrintExtraTids );
		
		$strSql = 'SELECT 
					    p.post_id as nid,
					    p.headline as title,
					    CONCAT( "http://liveindia.live/public/products/image/", p.thumb_image ) as large_image,	
				            category_id as tid,
					    p.created as created
					FROM
					    post p join post_category pc ON (p.post_id = pc.post_id)
					WHERE
						category_id IN ( ' . implode ( ',', $arrintTids ) . ')
					ORDER BY
						p.created DESC';
		
		$res = $obj->select( $strSql );		
		$arrData = array();
		foreach( $res as $fetched_data ) {
			$current_data = ( true == isset( $arrData[$fetched_data['tid']]['data1'] ) ) ? $arrData[$fetched_data['tid']]['data1'] : array();
			if( 4 < count( $current_data ) ) continue;
			$current_data[] = $fetched_data;
			$arrData[$fetched_data['tid']] = array(		
				'tid'	=>	$fetched_data['tid'],
				'title'	=>	GetGroupTitle( $fetched_data['tid'] ),
				'data1'	=>	$current_data
			);
		}

		return array_values($arrData);
	}
?>
