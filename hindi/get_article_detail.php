<?php
include('include/connection.php');

$obj = new connection();
$func= new common();

$bulk_data = rawurldecode($_REQUEST['bulk_data']);
//$file = fopen("/tmp/test.txt","w");
//fwrite($file,print_r( $bulk_data, true ) );
//fclose( $file );
$values	= $func->jsondecode( $bulk_data );

if( $values != "" ) {
	
	$nid = $values->nid;
	
	$query = 'SELECT
			p.*,
  			COUNT(pc.post_id) AS comment_count
		    FROM
  			post p LEFT JOIN postcomment pc	ON (p.post_id = pc.post_id)
		   WHERE
			p.post_id = ' . $nid;
			
	$res = $obj->select($query);
    
	$data = array();
    foreach( $res as $row ) {		
		$data_array = array(				
							"nid" 			=> $row['post_id'],
							"title" 		=> $row['headline'],
							"long_title" 		=> $row['intro'],
							"name" 			=> $row['user_name'],
							"body_value" 		=> $row['content'],
							"link" 			=> stripslashes( 'http://liveindia.live/postdetail/index/id/' . $row['post_id'] ),
							"total_num_comment" 	=> $row['comment_count'],
							"created"		=> strtotime( $row['created'] ),
							"large_image" 		=> array( "http://liveindia.live/public/products/image/" .$row['thumb_image'] )			
			);
			
			
			/* check array value is null if yes then set it to blank(must use php 5.3+) */
			$data_array = array_map(function($v){
				return (is_null($v)) ? "" : $v;
			},$data_array);
			$data[] = $data_array;
	}
    if( !empty( $res ) ) {   
        $response['status'] = 1;
        $response['status_message'] = 'Data Found';
	$response['data'] = $data;
	
    } else {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['News List'] = array();
    }
} else {
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}
echo json_encode( $response, JSON_UNESCAPED_UNICODE );
exit;
?>
