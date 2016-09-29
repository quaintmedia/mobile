<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

class myclass {
	function __construct() {
		require_once( '/var/www/html/conf/loadMaster.php' );
	        $objLoadMaster = new loadMaster();
		$arrconfServer = $objLoadMaster->getConfig('hindi');	
	  	global $conn;
		$conn = mysqli_connect($arrconfServer['host'],$arrconfServer['username'],$arrconfServer['password'],$arrconfServer['dbname']);
	        if(!$conn){
          		echo "Connection attempt failed";
			exit;
            	}
			
		mysqli_query( $conn,'SET character_set_results=' . $arrconfServer['charset']);
		mysqli_query( $conn,'SET names=' . $arrconfServer['charset'] );
		mysqli_query( $conn,'SET character_set_client=' . $arrconfServer['charset'] );
		mysqli_query( $conn,'SET character_set_connection=' . $arrconfServer['charset'] );
		mysqli_query( $conn,'SET character_set_results=' . $arrconfServer['charset'] );
		mysqli_query( $conn,'SET collation_connection=utf8_general_ci');
	}

	//________select record__________________//	
	function select( $sql= "" ) {
		global $conn;
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;

            	$results = @mysqli_query($conn, $sql);
            	if( ( !$results ) || empty( $results ) ) return false;
            
		$data  = array();
            	while ( $row = mysqli_fetch_assoc($results))	{
               		$data[$count] = array_map('utf8_encode', $row);
            	}
            	mysqli_free_result($results);
            	return $data;
	}
        
	//________insert record__________________//
	function insert( $sql = "" ) {
            	global $conn;
            	if( true == empty( $sql ) || true == empty( $conn ) ) return false;
	    	$results = @mysqli_query( $conn, $sql );			
            	if( $results === FALSE ){
			return false;		
		}
            	$id = mysqli_insert_id($conn);
		return ( $id == 0 ) ? true : $id;
	}
        
	//___________edit and modify record___________________//
	function edit( $sql = "" ) {
            	global $conn;
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;
            	$results = @mysqli_query( $conn, $sql );
            	return @mysqli_affected_rows( $conn );
	}
	
	//___________delete record___________________//
	function delete( $sql= "" ) {	
            	global $conn;
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;
            	$results = @mysqli_query( $conn, $sql );
            	return @mysqli_affected_rows( $conn );
	}
}	
	//___________image_path__________________//
	$spath="http://d31p0ffza4ytus.cloudfront.net/";
	$lpath="http://d31p0ffza4ytus.cloudfront.net/";
	
	//$gallerypath="http://d31p0ffza4ytus.cloudfront.net/styles/article_slideshow/";
	
	$gallerypath="http://d31p0ffza4ytus.cloudfront.net/styles/khelsliderimages/";
	
	
	/*========video_image_path================*/
	$path="http://liveindiahindi-973115256.ap-southeast-1.elb.amazonaws.com/sites/default/files/";
?>
