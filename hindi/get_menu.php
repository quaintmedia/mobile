<?php
include('include/connection.php');

$obj = new connection();
$strSql = 'SELECT
			  	c1.category_id as source_id,
			 	c1.category as source_name,
			  	c2.category_id as child_id,
			  	c2.category as child_name
			FROM 
				category c1 JOIN category c2 ON ( c1.category_id = c2.parentId )
			ORDER BY
				c1.sortappcategory ASC';
			
$res = $obj->select( $strSql );
$data = array( 'status' => 1,
				 'data' => array( 888 => array( 'mlid' => '888',
				 				  'name' => "होम",
				 				  'type' => 0,
								  'subCatList'=> array() )
				) );

foreach( $res as $mapping_data ) {
	if( true == array_key_exists( $mapping_data['source_id'], $data['data'] ) ) {
		$data['data'][$mapping_data['source_id']]['subCatList'][] = array( 'tid' 	=> $mapping_data['child_id'],
					 						 'name'	=> $mapping_data['child_name'],
					 						 'type'	=> 1 );
	} else {
		$data['data'][$mapping_data['source_id']] = array( 'mlid' => $mapping_data['source_id'],
					 'type' => 1,
					 'name' => $mapping_data['source_name'], 
					 'subCatList' => array( array( 'tid' 	=> $mapping_data['child_id'],
					 						 'name'	=> $mapping_data['child_name'],
					 						 'type'	=> 1
					 					) )
				);
	}
}
$data['data'] = array_values( $data['data'] );
echo json_encode( $data, JSON_UNESCAPED_UNICODE );
exit;
?>

