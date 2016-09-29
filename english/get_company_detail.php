<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


include('include/connection.php');


$obj = new connection();


$bulk_data = rawurldecode($_REQUEST['bulk_data']);
$values	= $func->jsondecode($bulk_data);

if($values != "")
{
	$type = $values->type;	
	
	if($type==1){
		//About us
		/*$query = 'SELECT field_about_us_value FROM field_data_field_about_us WHERE revision_id = (SELECT MAX(revision_id) FROM field_data_field_about_us)';
		$res = $obj->select($query);
		
		$data = '';
			
		if(count($res) > 0){				
			$data = strip_tags($res[0]['field_about_us_value'], '<b>');		
			
			$response['status'] = 1;
			$response['status_message'] = 'Data Found';
			$response['data'] = $data;			
			
		}else{
			
			$response['status'] = 0;
			$response['status_message'] = 'No data found';
			$response['data'] = $data;
		}*/
			 $data='<div class="aboutUs">

<p>Broadcast Initiatives Ltd (BIL) is the one of the leading media houses in the country with its wide presence in all mediums. BIL brings you every day the most comprehensive bouquet of news and analysis through it news channels i.e  Live India (24 X7 Hindi News channel), Mimarathi (24X7 Marathi News Channel), Prajatantra Live (Hindi daily) and Live India monthly magazine.</p>
<br>
<p>BIL has re-launched its digital editions under the experienced and efficient leadership of Managing Editor, Mr Basant Jha, in February 2015 under the umbrella of Live India Digital. The three newssites of Live India Digital i.e www.liveindia.in, www.liveindiahindi.in and www.mimarathi.in are rapidly gaining popularity across the globe.</p>
<br>
<p>Live India Digital believes in fearless and unbiased journalism and it has established itself as a mature and dedicated readership from all over the world. And, it is growing. </p>
<br>
<p>At Live India Digital, visitors can get the news of their interest in Hindi, English and Marathi. As the mobile Apps of all the three news sites are available on Android and iOS, visitors can access the fastest news on the go after downloading it.</p>
<br>
<p>Live India Digital offers ranging from knowledge events, sporting events, entertainment news, education, Business, share market, lifestyle, Tech, Gadget and special dedicated categories for women and youths. People\'s hunger for news and knowledge end with the  Live India Digital as it is among the best destinations for your search.</p>
<br>
<p>Live India Digital is being updated 24X7 basis by experienced and qualified young journalists. 
<br>
<p>Live India Digital covers events from the national capital to remote areas of the country through the most effective and powerful combination of man and machine.</p>

 </div>';
			 $response['status'] = 1;
			 $response['status_message'] = 'Data Found';
			 $response['data'] = $data;
			 
		}
	else if($type==2)
	{
		// contactus
		//$data='<div class="contactusInfo"><p><strong>Registered Office:</strong> Broadcast Initiatives Limited</p><p>(CIN: L92130MH2004PLC144371)</p><p>101, Sumer Kendra Society, Pandurang Budhkar Marg,</p><p>Near Doordarshan Kendra, Behind Mahindra &amp; Mahindra Tower,</p><p>Worli, Mumbai- 400013</p><p>Tel.: 022-61709777</p><p><strong>Corporate Office: </strong></p><p>Broadcast Initiatives Limited</p><p>1st Floor, Vega Centre, A-Building,</p><p>Shankarseth Road, Next to Income Tax Office,</p><p>Swargate, Pune- 411 037</p><p>Tel.: 020-41255300</p><p><strong>News Centre:</strong></p><p>Broadcast Initiatives Limited (Live India)</p><br><p>1, Mandir Marg, Premnath Motors Complex, </p><br><p>New Delhi-110 001 </p><br><p>Tel. - 011 - 66664888 Fax - 011- 23744274, 23741523 </p><br><p style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">E-mail:&nbsp;<a href="mailto:liveindia.advt@gmail.com?subject=advertisement">liveindia.advt@gmail.com</a></p><p style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">Website:&nbsp;<a href="http://www.liveindia.tv">www.liveindia.tv</a></p><p><span style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">Broadcast Initiatives Limited (Live India)</span></p><p><span style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">D- 153, Sector- 63,</span></p><p><span style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">&nbsp;Noida, Uttar Pradesh- 201301</span></p><p><span style="font-size: 13.0080003738403px; line-height: 20.0063037872314px;">&nbsp;Tel. 0120- 4353761</span></p></div>';
			$data='<div class="contactusInfo">
		<p><strong>Live India</strong> </p>
		<p>Noida, Uttar Pradesh- 201301</p></div>';
			$response['status'] = 1;
			 $response['status_message'] = 'Data Found';
			 $response['data'] = $data;
	}
	else if($type==3){
			//How to use 
			 $data='';
			 $response['status'] = 1;
			 $response['status_message'] = 'Data Found';
			 $response['data'] = $data;
		}
	else{
			 $response['status'] = 0;
			 $response['status_message'] = 'Data Not Found';
		
		}
		
	
		

}
else
{
    $response['status'] = 0;
    $response['status_message'] = 'Request Not Found';
}


		
		
		
		
//echo ($data);
echo json_encode($response);



exit;
?>