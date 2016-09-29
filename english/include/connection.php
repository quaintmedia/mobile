<?php

error_reporting(E_ALL);

header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: text/html; charset=utf-8' );
//var_dump( $_SERVER );
//$name  = $_SERVER['HTTP_HOST'];
$name = "http://english.liveindia.live";

if( !defined( 'HOST_NAME' ) ) define( 'HOST_NAME', $name );

//___________image_path__________________//
$spath="http://d31p0ffza4ytus.cloudfront.net/";
$lpath="http://d31p0ffza4ytus.cloudfront.net/";

//$gallerypath="http://d31p0ffza4ytus.cloudfront.net/styles/article_slideshow/";

$gallerypath="http://d31p0ffza4ytus.cloudfront.net/styles/khelsliderimages/";


/*========video_image_path================*/
$path="http://liveindiahindi-973115256.ap-southeast-1.elb.amazonaws.com/sites/default/files/";
	
class common {	
	function jsondecode($json_array){	                                            
		return json_decode(str_replace("\n", "<br />",($json_array)));
	}
	
	function pre($array){
		echo '<pre>';
		print_r($array);
		exit;
	}
	
	/* used to generate random string */
	function getToken($length){	
		global $conn;   
	   	$token = "";	   
	   	$codeAlphabet= "abcdefghijklmnopqrstuvwxyz";
	   	$codeAlphabet.= "0123456789";
	   	for($i=0;$i<$length;$i++){
	   	    $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
	   	}
	   	/* check token exist or not */
	   	$query = "SELECT * FROM user WHERE token = '$token' ";
	   	$data = $conn->select($query);
	   
	   	if( !empty( $data ) ) {
	       $this->getToken(10);
	   	}
	   	return $token;
	}
	
	/* used to generate random string */
         public function crypto_rand_secure($min, $max) {
              $range = $max - $min;
              if ($range < 0) return $min; // not so random...
              $log = log($range, 2);
              $bytes = (int) ($log / 8) + 1; // length in bytes
              $bits = (int) $log + 1; // length in bits
              $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
              do {
                  $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                  $rnd = $rnd & $filter; // discard irrelevant bits
              } while ($rnd >= $range);
              return $min + $rnd;
         }
	 
	public function upload_image($imageData,$folder='images') 
	{  
	   $imageName = base_convert(str_replace(' ', '', microtime()) . rand(), 10, 36) .".jpg";
	   
	   $file = fopen($folder."/".$imageName,"w");
	   fwrite($file,$imageData);
	   fclose($file);
	   
	   return $imageName;
	}
	
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; } 
	
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
	function SaveImageAsJpeg($name,$sourceFilename, $destFilename, $maxWidth = 0, $maxHeight = 0, $jpegQuality = 80)
	{
		list($width, $height, $type) = getimagesize($sourceFilename);
		
		$destFilename = "images/thumb/".$name;
		
		switch ($type) {
		    case IMAGETYPE_GIF:
			$sourceImage = imagecreatefromgif($sourceFilename); 
			break;
		    case IMAGETYPE_JPEG:
			$sourceImage = imagecreatefromjpeg($sourceFilename);
			break;
		    case IMAGETYPE_PNG:
			$sourceImage = imagecreatefrompng($sourceFilename);
			break;
		}
		
		// Resize image
		$scale = min($maxWidth / $width, $maxHeight / $height, 1);  // We only use downsampling, no upsampling! If you need upsampling remove the '1' parameter
	    
		$newWidth = min($width * $scale, $maxWidth);
		$newHeight = min($height * $scale, $maxHeight);
		    
		$destinationImage = imagecreatetruecolor($newWidth, $newHeight);
		
		imagecopyresampled($destinationImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		imagejpeg($destinationImage, $destFilename, $jpegQuality);
		imagedestroy($destinationImage);
		
	    
		imagedestroy($sourceImage);
	    
		return true;
	}
}

class connection {

	function connectDatabase() {
		
		global $conn;

		require_once( '/var/www/html/conf/loadMaster.php' );
	    	$objLoadMaster = new loadMaster();
		$arrconfServer = $objLoadMaster->getConfig('english');
	  	
	  	/*$arrconfServer['host'] = 'localhost';
	  	$arrconfServer['username'] = 'root';
	  	$arrconfServer['password'] = '';
	  	$arrconfServer['dbname'] = 'liveindialive_zend'; 
		$arrconfServer['charset'] = 'UTF-8';*/

		$conn = mysqli_connect( $arrconfServer['host'], $arrconfServer['username'], $arrconfServer['password'], $arrconfServer['dbname'] );
	    
	    if( !$conn ){
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

	function disconnectDatabase() {
		global $conn;
		mysqli_close( $conn );
	}

	//________select record__________________//	
	function select( $sql= "" ) {
		global $conn;
		$this->connectDatabase();
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;

        $results = @mysqli_query($conn, $sql);
        if( ( !$results ) || empty( $results ) ) return false;
            
		$data  = array();
        while( $row = mysqli_fetch_assoc($results))	{
        		$data[] = array_map('trim', $row);
        }
        mysqli_free_result($results);
        $this->disconnectDatabase();
        return $data;
	}
        
	//________insert record__________________//
	function insert( $sql = "" ) {
		global $conn;
        $this->connectDatabase();
        if( true == empty( $sql ) || true == empty( $conn ) ) return false;
	    $results = @mysqli_query( $conn, $sql );			
        if( $results === FALSE ){
			return false;		
		}
        $id = mysqli_insert_id($conn);
        $this->disconnectDatabase();
		return ( $id == 0 ) ? true : $id;
	}
        
	//___________edit and modify record___________________//
	function edit( $sql = "" ) {
		global $conn;
		$this->connectDatabase();
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;
        $results = @mysqli_query( $conn, $sql );
        $this->disconnectDatabase();
        return @mysqli_affected_rows( $conn );
	}
	
	//___________delete record___________________//
	function delete( $sql= "" ) {
		global $conn;
        $this->connectDatabase();
		if( true == empty( $sql ) || true == empty( $conn ) ) return false;
        $results = @mysqli_query( $conn, $sql );
        $this->disconnectDatabase();
        return @mysqli_affected_rows( $conn );
	}
}
?>
