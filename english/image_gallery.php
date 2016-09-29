<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include('include/connection.php');


$obj = new connection();


//$bulk_data = rawurldecode($_REQUEST['bulk_data']);
//$values	= $func->jsondecode($bulk_data);

//if($values != "")
{
	//$page = $values->page;	
	

/*$query="select   tv.vid, tv.name , fm.filename, fm.uri , nd.created  from taxonomy_vocabulary tv INNER JOIN taxonomy_term_data ttd ON tv.vid=ttd.vid
INNER JOIN taxonomy_index ti ON ttd.tid=ti.tid 
INNER JOIN node nd ON ti.nid=nd.nid
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON  fu.fid=fm.fid group by tv.name  ";*/

$query="select   ttd.tid, ttd.name , fm.filename, fm.uri  from  taxonomy_term_data ttd 
INNER JOIN taxonomy_index ti ON ttd.tid=ti.tid 
INNER JOIN node nd ON ti.nid=nd.nid
INNER JOIN file_usage fu ON nd.nid=fu.id 
INNER JOIN file_managed fm ON  fu.fid=fm.fid group by ttd.name order by nd.created desc  ";



	/*$res1=mysql_query($query);
	$total_rows = mysql_num_rows($res1); 
	$per_page = 20;                           
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
	$query.="  LIMIT ".$per_page." OFFSET ".$offset;*/
	
	$res = $obj->select($query);
    
	//echo "<pre>";print_r($res);
	
	
	$data = array();
    foreach($res as $row)
	{
	
			
		$data_array = array(				
			"tid" => $row['tid'],
			"name" => utf8_decode($row['name']),
			//"small_image" => $spath.$row['filename'],
			 "large_image" => utf8_decode(str_replace("s3://",$lpath,$row['uri'])),
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
		$response['data'] = $data;
		
        //$response['nid'] = $res[0]['nid'];
		//$response['title'] = $res[0]['title'];
		//$response['created'] = $res[0]['created'];
		
		
		
		

		
    }
    else
    {
        $response['status'] = 0;
        $response['status_message'] = 'Data Not Found';
        $response['Image Gallery'] = array();
    }
}
/*else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}*/
echo json_encode($response);
/*echo '<br>';
 if(isset($pages))
                {  
                    if($pages > 1)        
                    {    if($cur_page > $num_links)     // for taking to page 1 //
                        {   $dir = "first";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1).'&tid='.$tid.'&bulk_data='.$bulk_data .'">'.$dir.'</a> </span>';
                        }
                       if($cur_page > 1) 
                        {
                            $dir = "prev";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1).'&tid='.$tid.'&bulk_data='.$bulk_data .'">'.$dir.'</a> </span>';
                        }                 
                        
                        for($x=$start ; $x<=$end ;$x++)
                        {
                            
                            echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?page='.$x.'&tid='.$tid.'&bulk_data='.$bulk_data .'">'.$x.'</a> ';
                        }
                        if($cur_page < $pages )
                        {   $dir = "next";
                            echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1).'&tid='.$tid.'&bulk_data='.$bulk_data .'">'.$dir.'</a> </span>';
                        }
                        if($cur_page < ($pages-$num_links) )
                        {   $dir = "last";
                       
                            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'&tid='.$tid.'&bulk_data='.$bulk_data .'">'.$dir.'</a> '; 
                        }   
                    }
                }*/

exit;
?>