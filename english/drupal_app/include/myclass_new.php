<?php
date_default_timezone_set('Asia/kolkata');  //UTC
header('Access-Control-Allow-Origin: *');
//error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
class myclass
{
	
	function myclass()
	{
	
//	  $user = "root";
//      $pass = "";
//      $server = "localhost";
//      $dbase = "554928_travelmate";

	// Local server
	//$host = "192.168.1.67";
	//$host = "localhost";
	//$user = "root";
	//$pass =	"";
	//$dbase = "liveindia";
	
	//ONLINE
	//$host = "192.168.1.44";
	//$user = "liveindia";
	//$pass =	"x883T8Y4Fg";
	//$dbase = "liveindia";
	
	/*$host = "liveindiahindi-prod1002.cappxcszfqyt.ap-southeast-1.rds.amazonaws.com";
	$user = "liveindia";
	$pass =	"A*COZq@(8f+6a>d";
	$dbase = "livehindiprod";
	 */
	 
	/*$host = "liveindia.cappxcszfqyt.ap-southeast-1.rds.amazonaws.com";
	$user = "liveindia";
	$pass =	"x883T8Y4Fg";
	$dbase = "livehindiprodtest";
	*/
	
	$host = "liveindia.cappxcszfqyt.ap-southeast-1.rds.amazonaws.com";
	$user = "liveindia";
	$pass =	"x883T8Y4Fg";
	$dbase = "livehindidevdb";

	//    $user = "spiritfu_test";
      //$pass = "Griffin01!";
      //$pass ="test123";
      //$server = "192.185.56.106";
     // $dbase = "spiritfu_test";
	  
	  

//	  $user = "554928_travelma";
//      $pass = "Griffin01!";
//	  //$server = "mysql.dfw1-2.websitesettings.com/?server=mysql51-004.wc2";
//      $server = "mysql51-004.wc2.dfw1.stabletransit.com";
//	  //$server = "172.17.70.16";
//      $dbase = "554928_travelmate";
	  
	  
	  global $conn;
	  //$conn = mysql_connect($server,$user,$pass);
	  $conn = mysqli_connect($host,$user,$pass,$dbase);
            if(!$conn){
                    //$this->error("Connection attempt failed");
                    echo "Connection attempt failed"; exit;
            }
			
			mysqli_query($conn,'SET character_set_results=utf8');
mysqli_query($conn,'SET names=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
mysqli_query($conn,'SET collation_connection=utf8_general_ci');

            /*if(!mysqli_select_db($dbase,$conn)){
                    //$this->error("Database Selection failed");

                    echo "Database Selection failed"; exit;
            }*/
			
			
	}
	
	function select ($sql=""){
            if(empty($sql)) { return false; }
            global $conn;
            /*if(!eregi("^select",$sql)){
              echo "Wrong Query<hr>$sql<p>";
                            return false;
            }*/
            if(empty($conn)) { return false; }

            $results = @mysqli_query($conn, $sql);
            if((!$results) or empty($results))	{	return false;		}
            $count = 0;
            $data  = array();
            while ( $row = mysqli_fetch_assoc($results))	{
                    $data[$count] = array_map('utf8_encode', $row);
                    //$data[$count] = $row;
                    $count++;
                    }
            mysqli_free_result($results);
            return $data;
	}
        
	//________insert record__________________//
	function insert ($sql=""){
            global $conn;
            if(empty($sql)) { return false; }
            //if(!eregi("^insert",$sql)){	return false; }
            if(empty($conn)){	return false;		}
            //$conn = $this->CONN;
            $results = @mysqli_query($conn,$sql);			
            if($results === FALSE){
				//$this->error("Insert Operation Failed..<hr>$sql<hr>");
				return false;		
			}
            $id = mysqli_insert_id($conn);
			if($id == 0) {
				return true;
			}
			else {
				return $id;
			}
	}
        
	//___________edit and modify record___________________//
	function edit($sql="")	{
            global $conn;
            if(empty($sql)) { 	return false; 		}
            //if(!eregi("^update",$sql)){	return false;		}
            if(empty($conn)){	return false;		}
            //$conn = $this->CONN;
            $results = @mysqli_query($conn,$sql);
            $rows = 0;
            $rows = @mysqli_affected_rows($conn);

            return $rows;
	}
	
	//___________delete record___________________//
	function delete($sql="")	{	
            global $conn;
            if(empty($sql)) { 	return false; 		}
            if(empty($conn)){	return false;		}
            $results = @mysqli_query($conn,$sql);
            $rows = 0;
            $rows = @mysqli_affected_rows($conn);
            return $rows;
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