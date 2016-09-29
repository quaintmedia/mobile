<?php
header('Content-Type: text/html; charset=utf-8');
include('include/connection.php');

$obj 	= new connection();
$func 	= new common();

include('function_tid.php');
include('function_tid_news.php');

$bulk_data = rawurldecode( $_REQUEST['bulk_data'] );
$values	= $func->jsondecode($bulk_data);

if( $values != "" ) {
	$page = $values->page;	
	$tid = $values->tid;
	$per_page=$values->per_page;

	If( $tid == '' ) {
		// $arrintTids = array( 4, 179, 435, 440, 302, 338, 473, 491, 502, 337, 443, 339, 340, 422, 420 );
		$arrintTids = array( 4, 179, 4490, 4475, 4484, 4495, 4497, 4496, 491, 4532 );
		$final_data = getHomeNews( $arrintTids );
	 	$response['status'] = 1;
       		$response['status_message'] = 'Data Found';
		$response['data'] = $final_data;
	}else{
		$response['status'] = 0;
		$response['status_message'] = 'Data Not Found';
		
		$datalist = getNewslist($tid,$page,$per_page);
		$response['total_record'] = $datalist['total_rec']; 
		$response['data'] = $datalist['data'];
		
		if( $datalist['total_rec'] == 0 ){
			$response['status'] = 0;
			$response['status_message'] = 'Data Not Found';
		}else{
			$response['status'] = 1;
			$response['status_message'] = 'Data Found';
		}
	}
	
} else {
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode( $response, JSON_UNESCAPED_UNICODE );
exit;
?>
