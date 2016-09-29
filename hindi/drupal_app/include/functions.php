<?php
header('Access-Control-Allow-Origin: *');

$name = $_SERVER['HTTP_HOST'];
$name .= "/liveindia";

if(!defined('HOST_NAME')) {
		define(HOST_NAME , $name);
}
class functions {	
	function jsondecode($json_array){
		//echo $json_array;exit;                                                
		return json_decode(str_replace("\n", "<br />",($json_array)));
	}
	
	function pre($array){
		echo '<pre>';
		print_r($array);
		exit;
	}
	
	/* used to generate random string */
	function getToken($length){
	   
	   $token = "";
	   //$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	   $codeAlphabet= "abcdefghijklmnopqrstuvwxyz";
	   $codeAlphabet.= "0123456789";
	   for($i=0;$i<$length;$i++){
	       $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
	   }
	   /* check token exist or not */
	   $obj = new myclass();
	   $query = "SELECT * FROM user WHERE token = '$token' ";
	   $data = $obj->select($query);
	   
	   if (!empty($data)) 
	   {
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
?>
