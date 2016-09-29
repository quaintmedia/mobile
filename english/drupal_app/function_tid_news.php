<?php
ini_set('max_execution_time', 500);
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


//input lead id
/*
==========================================HOME==================================
NEW LIVE
********************************************
world(137)
sport(139)
delhi(138)
==========================================INDIA==================================
BHARAT
**********************************************************
India - Lead News(270)
India - Main News(271)
------------------------------
India - Slideshow(498)
-------------------------------
India - Uttar Pradesh Lead(353)
India - Uttar Pradesh Main(354)
India - Uttar Pradesh Listing Page(227)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page' 
------------------------------------------------------------------------------
India - Bengaluru Lead(391)
India - Bengaluru Main(390)
India - Bengaluru Listing Page(437)
raggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_15' 
-----------------------------------------------------------------------------------------
India - Chennai Lead(382)
India - Chennai Main(383)
India - Chennai Listing Page(242)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_11' 
-----------------------------------------------------------------------------------------------------
India - Lucknow Lead(387)
India - Lucknow Main(386)
India - Lucknow Listing Page(246)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_13' 
-------------------------------------------------------------------------------------------------------
India - Delhi Lead(380)
India - Delhi Main(381)
India - Delhi Listing Page(240)
 draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_10' 
----------------------------------------------------------------------------------------------
India - Chhatishgarh Lead(359)
India - Chhatishgarh Main(358)
India - Chhattisgarh Listing Page(232)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_3' 
-------------------------------------------------------------------------------------------------
India - Madhya Pradesh Lead(365)
India - Madhya Pradesh Main(366)
India - Madhya Pradesh Listing Page(231)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_4' 
--------------------------------------------------------------------------------------------------
India - India - Bihar Lead(360)
India - India -  Bihar Main(361)
India - India - Bihar Listing Page(410)
-----------------------------------------------------------------------------------------------
India - Jharkhand Lead(357)
India - Jharkhand Main(356)
India - Jharkhand Listing Page(229)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_2' 
-------------------------------------------------------------------------------------
India - Punjab Lead(372)
India - Punjab Main(371)
India - Punjab Listing Page(236)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_9'
------------------------------------------------------------------------------------------
India - Maharashtra Lead(368)
India - Maharashtra Main(367)
India - Maharashtra Listing Page(234)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_7' 
------------------------------------------------------------------------------------------------------------------------------
India - Uttarakhand Lead(370)
India - Uttarakhand Main(369)
India - Uttarakhand Listing Page(235)
 draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_6' 
-------------------------------------------------------------------------------------------------------------
India - Rajasthan Lead(364)
India - Rajasthan Main(362)
India - Rajasthan Listing Page(233)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_5' 
---------------------------------------------------------------------
India - Mumbai Lead(388)
India - Mumbai Main(389)
India - Mumbai Listing Page(247)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_14' 
----------------------------------------------------------------------------------------------------
India - Other states Lead(374)
India - Other states Main(373)

India - Others States Listing Page(237)
 draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_8' 
-------------------------------------------------------------------------------------------------------

India - Patna Lead(394)
India - Patna Main(395)
India - Patna Listing Page(209)
draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_17'
----------------------------------------------------------------------------------------------------------
India - Kolkata Lead(384)
India - Kolkata Main(385)
India - Kolkata Listing Page(241)
 draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_12' 
------------------------------------------------------------------------------------------------
India - Other News Lead(401)
India - Other News Main(400)
India - other news Listing Page(497)
 draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = 'page_18' 

================================SPORTS=====================================
Sports - Cricket Lead(349)
Sports - Cricket Main(351)
Cricket Listing Page(343)
-------------------------------
Sports - Football Lead(404)
Sports - Football Main(379)
Football Listing Page(262)
-----------------------------------
Sports - Hockey Lead(405)
Sports - Hockey Main(378)
Hockey Listing Page(260)
---------------------------------------
Sports - Tennis Lead(348)
Sports - Tennis Main(350)
Tennis Listing Page(253)
------------------------------------------
Sports - Other Sports block(263)
Sports Video(284)
Sports Slideshow(467)
----------------------------------------------
================================WORLD=====================================
World Lead News(274)
World Main News(275)
------------------------------
World - Neighbouring countries lead(276)
World - Neighbouring countries main(363)
Neighbouring Countries Listing Page(396)
------------------------------------------------
World - America Lead(280)
World - America Main(377)
America Listing Page(397)
--------------------------------------------------
World - Europe Lead(445)
World - Europe Main(446)
Europe Listing Page(442)
----------------------------------
World- Rest of the world Lead(466)
World- Rest of the world Main(448)
World- Rest of the world list(398)
------------------------------------
World Slideshow(291)
World Video(266)
----------------------------------------------
================================BOLLYWOOD============(2)=========================
Bollywood - Filmi Reviews(470)
Filmi Reviews Listing Page(315)
----------------------------------------------
Bollywood - Filmi Khabre(469)
Filmi Khabre Listing Page(316)
------------------------------------------
Bollywood - Filmi Gossip(302)
Filmi Gossip Listing Page(317)
---------------------------------
Bollywood - Chhota Parda(471)
Chhota Parda Listing Page(318)
---------------------------------------
//Bollywood - Filmi Interview(468)
//Filmi Interview Listing Page(319)
-----------------------------------
Bollywood Slideshow(310)
//Bollywood video(301)
------------------------------------------------------------
================================BUSINESS============(3)=========================
Business Lead News(248)
Business Main News(249)
------------------------------------
Business Others News(250)
Business slideshow(1404)
business video(289)
------------------------------------------------------------
================================Tech============(1)=========================
Tach main News(267)
Tech other News(268)
Tech Slideshow(334)
//Tech Video(269)
------------------------------------------------------------
================================life-style============(1,2)=========================

Lifestyle Slideshow(460)
---------------------------------------
Lifestyle - Expert Recommendations(464)
Lifestyle - Expert Recommendations listing(281)
------------------------------------------
Lifestyle - Lifestyle(461)
Lifestyle - Lifestyle listing(278)
-------------------------------------
Lifestyle - Sex and Relationships(463)
Lifestyle - Sex and Relationships listing(279)
---------------------------------------------
Lifestyle - Health and Fitness(465)
Lifestyle - Health and Fitness listing(283)
-------------------------------------------
Lifestyle- Yog Nirog(488)
Lifestyle- Yog Nirog listing(313)
==============================================================
=================================================Astrology================
Astrology-daily(322)
Astrology-monthly(323)
Astrology-yearly(324)
Astrology-Dharm-aadhyatama(325)
Astrology-mystery(326)
Astrology-vastushastra(327)
Astrology- photos(321)
==============================================================
===================================INDEPTH========================

-------------------------------------------------------------
Indepth Slideshow(174)
----------------------------------
Indepth - Politics(415)
Indepth - Politics listing (256)
----------------------------------
Indepth - Art and Culture(424)
Indepth - Art and Culture listing (1755)
--------------------------------------
Indepth - Literature(417)
Indepth - Literature listing(314)
-----------------------------------------
Indepth - Controversy(416)
Indepth - Controversy listing(258)
=========================================she-corner=============(1)========================
She Corner- My View(450)
She Corner- My View list(184)
------------------------
She Corner- Beauty Tips(451)
She Corner- Beauty Tips list(181)
----------------------------------
She Corner- Uljhan Suljhan(452)
She Corner- Uljhan Suljhan(182)
-------------------------------------
She Corner- Style Funda(453)
She Corner- Style Funda(183)
---------------------------------------
She Corner- Slideshow(449)
-----------------------------------
//She Corner- Video(297)
----------------------------------------
======================================Career=======================================
Career Slideshow(454)
------------------------------
Career Video(298)
------------------------
Career - Expert Views block(220)
---------------------------------------
Career - News block(219)
-------------------------------------------
==========================================Teen-world============(1)==============================
Teen World Slideshow(186)
//Teen world Video(455)

Teen world - Crime diary block(459)
//Teen world - Crime diary block list(190) 

---------------------------------------------
Teen world - Dating tips block(456)
//Teen world - Dating tips block list(187)

---------------------------------------------------
Teen world - My problem block(458)
//Teen world - My problem block list (188)


-----------------------------------------
Teen world - Trending hot block(457)
//Teen world - Trending hot block list (189)



--------------------------------------------------------------------------------------------
=========================================PROPERTY==================================================
Property Lead News(475)
Property Main News(476)
Property other News(304)


-------------------------------------------------------------------------------------------
=========================================PHOTO Gallery==================================================
Bharat(518)
Sport(521)
Duniya(1379)
Bollywood(522)
Business(523)
Tech(1409)
Auto(1387)
Lifestyle(1382)
she-corner(1384)
OMG(1931)



*/
/*
function gettotalrecord(){
$total_record=$total_record;
}*/

function getMainIDlist($tid)
	{
	
	switch ($tid) {
    case 270:
     return 271 ;
    break;
		
	case 353:
      return  354;
     break;
	 
	  case 357:
      return  356;
     break;
	 
	 case 359:
      return 358;
     break;
	 
	 case 360:
      return  361;
     break;
	 
	 case 364:
      return  362;
     break;
	 
	 case 365:
      return  366;
     break;
	 
	 case 368:
      return  367;
     break;
	 
	 case 370:
      return  369;
     break;
	 
	 case 372:
      return  371;
     break;
	 
	 case 374:
      return  373;
     break;
	 
	 case 380:
      return  381;
     break;
	 
	 case 382:
      return  383;
     break;
	 
	 case 384:
      return  385;
     break;
	 
	 case 387:
      return  386;
     break;
	 
	 case 388:
      return  389;
     break;
	 
	 case 391:
      return  390;
     break;
	 
	  case 392:
      return  393;
     break;
	 
	  case 394:
      return  395;
     break;
	 
	  case 401:
      return 400 ;
     break;
	 
	  case 498:
      return  ;
     break;
	 
	 
	 //sports
	 case 349:
      return 351 ;
     break;
	 
	 case 404:
      return  379;
     break;
	 
	 case 405:
      return  378;
     break;
	 
	 case 348:
      return 350 ;
     break;
	 
	 case 263:
      return  ;
     break;
	 
	 case 284:
      return  ;
     break;
	 
	 
	 case 467:
      return  ;
     break;
	 
	 //world
	 case 274:
      return 275 ;
     break;
	 
	 case 466:
      return 448 ;
     break;
	 
	 case 276:
      return 363 ;
     break;
	 
	 case 280:
      return  377;
     break;
	 
	 case 445:
      return  446;
     break;
	 
	  case 291:
      return  ;
     break;
	 
	 case 266:
      return  ;
     break;
	
//BOLLYWOOD 
	  case 470:
      return  ;
     break;
	 
	 case 469:
      return  ;
     break;
	 
	  case 302:
      return  ;
     break;
	 
	 case 471:
      return  ;
     break;
	 
	 case 468:
      return  ;
     break;
	 
	 case 310:
      return  ;
     break;
	 
	  case 301:
      return  ;
     break;
	 
 //BUSINESS
	 case 248:
      return  249;
     break;
	 
	  case 250:
      return  ;
     break;
	 
	 case 1404:
      return  ;
     break;
	 
	  case 289:
      return  ;
     break;

///Tech	 	 
	 case 267:
      return  ;
     break;
	 
	 case 268:
      return  ;
     break;
	 
	 case 334:
      return  ;
     break;
	 
	  case 269:
      return  ;
     break;
	
//life-style
	  case 461:
      return  ;
     break;
	 
	 case 464:
      return  ;
     break;
	 
	 case 463:
      return  ;
     break;
	 
	 case 465:
      return  ;
     break;
	 
	 case 488:
      return 488 ;
     break;
	 
	  case 460:
      return  ;
     break;
	 
	 case 300:
      return  ;
     break;
	 
//Astrology	 	
	 case 322:
      return  ;
     break;
	 
	  case 325:
      return  ;
     break;
	 
/*	 case 323:
      return  ;
     break;
	 
	  case 324:
      return  ;
     break;*/
	 
	 case 326:
      return  ;
     break;
	 
	  case 327:
      return  ;
     break;
	 
	 case 321:
      return  ;
     break;
	 
//INDEPTH	 
	 case 174:
      return  ;
     break;
	 
	  case 290:
      return  ;
     break;
	 
	 case 415:
      return  ;
     break;
	 
	 case 424:
      return  ;
     break;
	 
	 case 417:
      return  ;
     break;
	 
	  case 416:
      return  ;
     break;	 
	 
//she-corner
	 case 450:
      return  ;
     break;
	 
	 case 451:
      return  ;
     break;
	 
	  case 452:
      return  ;
     break;
	 
	 case 453:
      return  ;
     break;
	 
	  case 449:
      return  ;
     break;
	 
	 case 297:
      return  ;
     break;

//Career
	 
	 case 454:
      return  ;
     break;
	 
	  case 298:
      return  ;
     break;
	 
	 case 220:
      return  ;
     break;
	 
	  case 219:
      return  ;
     break;

//Teen-world	 
	  case 186:
      return  ;
     break;
	 
	 case 455:
      return  ;
     break;
	 
	 case 456:
      return  ;
     break;
	 
	 case 457:
      return  ;
     break;
	 
	  case 458:
      return  ;
     break;
	 
	 case 459:
      return  ;
     break;

//PROPERTY	 
	 case 475:
      return 476 ;
     break;
	 
	 case 304:
      return  ;
     break;
	 
//Phtogallery	 
	 case 518:
      return  ;
     break;
	 
	 case 521:
      return  ;
     break;
	 
	 case 1379:
      return  ;
     break;
	 
	 case 522:
      return  ;
     break;
	 
	 case 523:
      return  ;
     break;
	 
	 case 1387:
      return  ;
     break;
	 
	 case 1931:
      return  ;
     break;
	 
	 case 1409:
      return  ;
     break;
	 
	 case 1382:
      return  ;
     break;
	 
	 case 1384:
      return  ;
     break;
	 
	 //Breaking news
	case 137:
      return  ;
     break;	 
	 
	 case 138:
      return  ;
     break;	 
	 
	 case 139:
      return  ;
     break;	 
	 
	 
	  
		
		
    
}
}

//Return list Id
	function getListID($tid)
	{
	switch ($tid) {
    case 270:
       return ;
        break;
	
	case 353:
       return 227;
        break;
		
	case 357:
      return  229;
     break;
	 
	 case 359:
      return 232;
     break;
	 
	 case 360:
      return  410;
     break;
	 
	 case 364:
      return  233;
     break;
	 
	 case 365:
      return  231;
     break;
	 
	 case 368:
      return  234;
     break;
	 
	 case 370:
      return  235;
     break;
	 
	 case 372:
      return  236;
     break;
	 
	 case 374:
      return  237;
     break;
	 
	 case 380:
      return  240;
     break;
	 
	 case 382:
      return  242;
     break;
	 
	 case 384:
      return  241;
     break;
	 
	 case 387:
      return  246;
     break;
	 
	 case 388:
      return  247;
     break;
	 
	 case 391:
      return  437;
     break;
	 
	  case 392:
      return  244;
     break;
	 
	  case 394:
      return  209;
     break;
	 
	  case 401:
      return  497;
     break;
	 
	 case 498:
      return  ;
     break;
	 
	 
	 //sports
	 case 349:
      return 343 ;
     break;
	 
	 case 404:
      return  262;
     break;
	 
	 case 405:
      return 260 ;
     break;
	 
	 case 348:
      return  253;
     break;
	 
	 case 263:
      return  ;
     break;
	 
	 
	 case 284:
      return  ;
     break;
	 
	 case 467:
      return  ;
     break;
	 
	 //world
	 case 274:
      return  ;
     break;
	 
	  case 466:
      return  398;
     break;
	 
	 case 276:
      return  396;
     break;
	 
	 case 280:
      return  397;
     break;
	 
	 case 445:
      return  442;
     break;
	 
	 case 291:
      return  ;
     break;
	 
	  case 266:
      return  ;
     break;
	 
	 //BOLLYWOOD
	 case 470:
      return  315;
     break;
	 
	  case 469:
      return  316;
     break;
	 
	 case 302:
      return 317 ;
     break;
	 
	  case 471:
      return  318;
     break;
	 
	 case 468:
      return  319;
     break;
	 
	 case 310:
      return  ;
     break;
	 
	 case 301:
      return  ;
     break;
	 
	/* case 315 :
      return  315;
     break;
	 
	  case 316 :
      return  316;
     break;
	 
	 case 317 :
      return  317;
     break;
	 
	  case 318 :
      return  318;
     break;
	 
	 case 319:
      return  319;
     break;
	 
	 case 310:
      return  ;
     break;
	 
	 case 301:
      return  ;
     break;*/

//BUSINESS	 
	  case 248:
      return  ;
     break;
	 
	 case 250:
      return  ;
     break;
	 
	  case 1404:
      return  ;
     break;
	 
	 case 289:
      return  ;
     break;
///Tech	 
 case 267:
      return  ;
     break;
	 
	 case 268:
      return  ;
     break;
	 
	 case 334:
      return  ;
     break;
	 
	  case 269:
      return  ;
     break;
	 
//life-style
	  case 461:
      return 278 ;
     break;
	 
	 case 464:
      return  281;
     break;
	 
	 case 463:
      return  279;
     break;
	 
	 case 465:
      return  283;
     break;
	 
	 case 488:
      return 313 ;
     break;
	 
	  case 460:
      return  ;
     break;
	 
	 case 300:
      return  ;
     break;

//Astrology	 	
	 case 322:
      return  ;
     break;
	 
	  case 325:
      return  ;
     break;
	 
	/* case 323:
      return  ;
     break;
	 
	  case 324:
      return  ;
     break;*/
	 
	 case 326:
      return  ;
     break;
	 
	  case 327:
      return  ;
     break;
	 
	 case 321:
      return  ;
     break;	 

//INDEPTH	 
	 case 174:
      return  ;
     break;
	 
	  case 290:
      return  ;
     break;
	 
	  case 415:
      return 256 ;
     break;
	 
	 case 424:
      return 1755 ;
     break;
	 
	 case 417:
      return  314;
     break;
	 
	  case 416:
      return  258;
     break;

//she-corner
	 case 450:
      return 184;
     break;
	 
	 case 451:
      return  181;
     break;
	 
	  case 452:
      return 182 ;
     break;
	 
	 case 453:
      return 183 ;
     break;
	 
	  case 449:
      return  ;
     break;
	 
	 case 297:
      return  ;
     break;
	 
//Career
	 
	 case 454:
      return  ;
     break;
	 
	  case 298:
      return  ;
     break;
	 
	 case 220:
      return  ;
     break;
	 
	  case 219:
      return  ;
     break;

//Teen-world	 
	  case 186:
      return  ;
     break;
	 
	 case 455:
      return  ;
     break;
	 
	 case 456:
      return 187 ;
     break;
	 
	 case 457:
      return 189 ;
     break;
	 
	  case 458:
      return  188;
     break;
	 
	 case 459:
      return  190;
     break;
	 
//PROPERTY	 
	 case 475:
      return  ;
     break;
	 
	 case 304:
      return  ;
     break;

//Phtogallery	 
	 case 518:
      return  ;
     break;
	 
	 case 521:
      return  ;
     break;
	 
	 case 1379:
      return  ;
     break;
	 
	 case 522:
      return  ;
     break;
	 
	 case 523:
      return  ;
     break;
	 
	 case 1387:
      return  ;
     break;
	 
	 case 1931:
      return  ;
     break;
	 
	 case 1409:
      return  ;
     break;
	 
	 case 1382:
      return  ;
     break;
	 
	 case 1384:
      return  ;
     break;	 
	//Breaking news
	case 137:
      return  ;
     break;	 
	 
	 case 138:
      return  ;
     break;	 
	 
	 case 139:
      return  ;
     break;	 
	 
	}
}




//Return display page for list Id
	function getviewdisplay($tid)
	{
	switch ($tid) {
    
	
	case 353:
      return  'page' ;
     break;
	 
	  case 357:
      return  'page_2' ;
     break;
	 
	 case 359:
      return 'page_3';
     break;
	 
	/* case 360:
      return  361;
     break;*/
	 
	 case 364:
      return  'page_5' ;
     break;
	 
	 case 365:
      return  'page_4' ;
     break;
	 
	 case 368:
      return  'page_7' ;
     break;
	 
	 case 370:
      return  'page_6' ;
     break;
	 
	 case 372:
      return  'page_9';
     break;
	 
	 case 374:
      return  'page_8' ;
     break;
	 
	 case 380:
      return  'page_10';
     break;
	 
	 case 382:
      return  'page_11';
     break;
	 
	 case 384:
      return   'page_12' ;
     break;
	 
	 case 387:
      return  'page_13';
     break;
	 
	 case 388:
      return  'page_14';
     break;
	 
	 case 391:
      return  'page_15';
     break;
	 
	/*  case 392:
      return  393;
     break;*/
	 
	  case 394:
      return  'page_17';
     break;
	 
	  case 401:
      return 'page_18'  ;
     break;
	 
	/*  case 498:
      return  ;
     break;*/
	 
	 }
	}


//Return home page box news based on tid
function getNewslist($tid,$page,$per_page)
	{
			
		include_once('include/myclass.php');
		include_once('include/functions.php');

		$obj = new myclass();
		$func = new functions();


		global $conn;	
		global $path;	

		global $lpath;
		global $gallerypath;

	
		
		//First Query for get Lead News
		//mainid
			$mltidlist=getMainIDlist($tid); 
		//listid
			$list_tid=getListID($tid); 
		  
			 
			//if (($page==1)&&($mltidlist!="")&&($list_tid!=""))
			//if (($page==1)&&($mltidlist!=""))
			  
	if (($tid==270)||($tid==601)||($tid==248)||($tid==475)||($tid==274))
	{
				//bollywood category condition (here leadid and listid same & main id diffreent)
				if(empty($list_tid) && empty($mltidlist)){}else{
				
					$qb11="SELECT nd.nid, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title,
					   nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
							and  ti.tid='$tid' order by nd.nid desc limit 1";
					}	
					
					
						/*total_record*/
						$resdb1=mysqli_query($conn,$qb11);
						$total_rowsdb1 = mysqli_num_rows($resdb1);
						/*total_record*/   
				
						$rb11 = $obj->select($qb11);
						$db1 = array();
				
						//ARRAY DECLARE FOR NID DUPLICATION (LEAD_NEWS QUERY)	
							$nid1 = array();
						
				
					foreach($rb11 as $rwb1)
					{
					
						
							if(($tid==305)||($tid==306)||($tid==289)||($tid==301)||($tid==284)||($tid==307)||($tid==308)||($tid==309)||($tid==284)||($tid==266)||($tid==301)||($tid==289)||($tid==269)||($tid==300)||($tid==290)||($tid==297)||($tid==298)||($tid==455))
							{
						
						
								/*SMALL AND LARGE IMAGE CODE*/
										$qb1="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
								and nd.status=1 and nd.type='video' and nd.nid='".$rwb1['nid']."' ";
								 $rb = $obj->select($qb1);
								 $dib1 = '';
								 foreach($rb as $rib1)
									{
										
								  $dib1 = utf8_decode(str_replace("public://",$path,$rib1['field_video_thumbnail_path'])); 
								  
									$video_url1=$rib1['field_video_video_url'];
									}
									
								
								/*END SMALL AND LARGE IMAGE CODE*/
					
						
						
							}
						else{
						
								/*SMALL ANDLARGE IMAGE CODE*/
								$qb1="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid AND fm.uri LIKE '%articles%' and  fu.id='".$rwb1['nid']."' group by fu.id ";
								$rb = $obj->select($qb1);
								$dib1 = '';
								foreach($rb as $rib1)
								{
									$dib1 =  utf8_decode(str_replace("s3://",$lpath,$rib1['uri'])); 
									
								}
								/*END SMALL AND LARGE IMAGE CODE*/
							
						}
							$drb1 = array(
							
							"nid" => $rwb1['nid'],
							"title" => utf8_decode($rwb1['title']),
							"created" => $rwb1['created'],
							//"total_record" => $total_rows ,
							
							"large_image" =>$dib1,
							"video_url" => $video_url1,	
							);
							
								/* check array value is null if yes then set it to blank(must use php 5.3+) */
								$drb1 = array_map(function($v){
									return (is_null($v)) ? "" : $v;
								},$drb1);
								$db1[] = $drb1;
								
							
							
								//DATA ADD IN ARRAY FOR CHECK NID DUPLICATION (LEAD_NEWS QUERY)	
								$nidb1 = array("nid" => $rwb1['nid'],);
								/* check array value is null if yes then set it to blank(must use php 5.3+) */
								$nidb1 = array_map(function($v){
									return (is_null($v)) ? "" : $v;
								},$nidb1);
								$nid1[] = $nidb1['nid'];
								//END DATA ADD IN ARRAY FOR CHECK NID DUPLICATION (LEAD_NEWS QUERY)	

					}	
			//}		
					//==============================================
					// Query for get main news

					//echo $rwb1['nid']; exit;
					$mltidlist=getMainIDlist($tid);
					
					 if(!empty($mltidlist))	
					 {
					 
					 if($tid==270){
								
								$qb13="SELECT node.nid AS nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title, node.changed AS node_changed, node.created AS created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
									FROM 
									node as node
									INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
									LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'topic_business' AND draggableviews_structure.view_display = 'attachment_2' AND draggableviews_structure.args = '[]'
									WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '271') ))
									ORDER BY node_changed DESC, created DESC, draggableviews_structure_weight ASC
									LIMIT 4 OFFSET 0";
								
								
								}else if($tid==601){
								
								$qb13="SELECT node.nid AS nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title, node.changed AS node_changed, node.created AS created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
								FROM 
								node as node
								INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
								LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'business' AND draggableviews_structure.view_display = 'attachment_2' AND draggableviews_structure.args = '[]'
								WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '602') ))
								ORDER BY node_changed DESC, created DESC, draggableviews_structure_weight ASC
								LIMIT 4 OFFSET 0";
								
								}else if($tid==248){
								
								$qb13="SELECT node.nid AS nid, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title,node.changed AS node_changed, node.created AS created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
										FROM 
										node as node
										INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
										LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'business' AND draggableviews_structure.view_display = 'attachment_2' AND draggableviews_structure.args = '[]'
										WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '249') ))
										ORDER BY node_changed DESC, created DESC, draggableviews_structure_weight ASC
										LIMIT 4 OFFSET 0";
													
								
								
								}
								else if($tid==475){
								
								$qb13="SELECT node.nid AS nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title, node.changed AS node_changed, node.created AS created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
									FROM 
									node as node
									INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
									WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '476') ))
									ORDER BY node_changed DESC, created DESC
									LIMIT 4 OFFSET 0";
									}
									
									
									else if($tid==274){
								
								$qb13="SELECT node.nid AS nid,(SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title, node.changed AS node_changed, node.created AS created, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
										FROM 
										node as node
										INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
										LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'topic_travel' AND draggableviews_structure.view_display = 'attachment_2' AND draggableviews_structure.args = '[]'
										WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '275') ))
										ORDER BY node_changed DESC, created DESC, draggableviews_structure_weight ASC
										LIMIT 4 OFFSET 0";
									}
								
								
							/* $qb13="SELECT nd.nid, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
								 and  ti.tid='$mltidlist' order by nd.nid desc limit 4 ";*/
					 
						/*$qb13="SELECT nd.nid, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=nd.nid LIMIT 1 ) as title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
						 and  ti.tid='$mltidlist' order by nd.nid desc limit 4 ";*/
						 }
						 /*total_record*/
							$resdb3=mysqli_query($conn,$qb13);
							$total_rowsdb3 = mysqli_num_rows($resdb3);
						/*total_record*/   
							
						 $rb13 = $obj->select($qb13);
						 if(count($db1) > 0)
							$db3 = array(0=>'');
						 else
							$db3 = array();
							
							
							//ARRAY FOR CHECK NID DUPLICATION (MAIN_NEWS QUERY)	
								if(count($nid1) > 0)
								$nid3 = array(0=>'');
							 else
								$nid3 = array();
							//END ARRAY FOR CHECK NID DUPLICATION (MAIN_NEWS QUERY)			
					
						foreach($rb13 as $rwb3)
						{
							
							
									if(($tid==305)||($tid==306)||($tid==289)||($tid==301)||($tid==284)||($tid==307)||($tid==308)||($tid==309)||($tid==284)||($tid==266)||($tid==301)||($tid==289)||($tid==269)||($tid==300)||($tid==290)||($tid==297)||($tid==298)||($tid==455))
									{
							
									
										/*SMALL AND LARGE IMAGE CODE*/
												$qb3="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
										and nd.status=1 and nd.type='video' and nd.nid='".$rwb3['nid']."' ";
										 $rb3 = $obj->select($qb3);
										 $dib3 = '';
										 foreach($rb3 as $rib3)
											{
												
										  $dib3 = utf8_decode(str_replace("public://",$path,$rib3['field_video_thumbnail_path'])); 
										  
											$video_url3=$rib3['field_video_video_url'];
											}
											
										
											/*END SMALL AND LARGE IMAGE CODE*/
						
							
							
							}
							else{
							
										$qb3="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid AND fm.uri LIKE '%articles%' and  fu.id='".$rwb3['nid']."' group by fu.id ";
										$rb3= $obj->select($qb3);
										$dib3 = '';
										foreach($rb3 as $rib3)
										{
											$dib3 =  utf8_decode(str_replace("s3://",$lpath,$rib3['uri'])); 
										}
								}
							
							
								$drb3 = array(	
									"nid" => $rwb3['nid'],
								"title" => utf8_decode($rwb3['title']),
								"created" => $rwb3['created'],
								//"total_record" => $total_rows ,
								
								"large_image" =>$dib3,
								"video_url" => $video_url3,					
								);
								//check array value is null if yes then set it to blank(must use php 5.3+) 
								$drb3 = array_map(function($v){
									return (is_null($v)) ? "" : $v;
								},$drb3);
								$db3[] = $drb3;
								

							//DATA ADD IN ARRAY FOR CHECK NID DUPLICATION(MAIN_NEWS QUERY)				
								$nidb3 = array("nid" => $rwb3['nid'],);
								/* check array value is null if yes then set it to blank(must use php 5.3+) */
								$nidb3 = array_map(function($v){
									return (is_null($v)) ? "" : $v;
								},$nidb3);
								$nid3[] = $nidb3['nid'];
							//END DATA ADD IN ARRAY FOR CHECK NID DUPLICATION (MAIN_NEWS QUERY)			
						}
						
							$nida=$nid1 + $nid3;
							//echo "<pre>";
							//print_r($nida);
							
							 $nid_string= implode(",",$nida);
					//}
				 
					 /*FILE USE FOR FETCH DATA ON SECOND PAGE */
						 $fp = fopen('nid.txt','w+');
						 fwrite($fp,$nid_string);
						 fclose($fp);
					/*FILE USE FOR FETCH DATA ON SECOND PAGE */
						//exit;
						
							//$data11=$db1 + $db3;
							/* echo "<pre>";
							print_r($data11); */

				
	}
		//else
		{	
		/*======================================================*/				
		// Query for get News listing 
		/*======================================================*/
		//codition for listing



		if(empty($list_tid) && empty($mltidlist))
		{
			 $listtid=$tid;
			 /*Danik rahifal query*/
			if($listtid=='322')
			{
				
					$qb12="SELECT taxonomy_term_data_node.tid AS taxonomy_term_data_node_tid, node.nid AS nid,node.title AS title, node.changed AS node_changed, node.created AS created, 'taxonomy_term' AS field_data_field_astro_image_taxonomy_term_entity_type, 'node' AS field_data_field_astrologylist_node_entity_type, 'node' AS field_data_body_node_entity_type
						FROM 
						node AS node
						LEFT JOIN (SELECT td.*, tn.nid AS nid
						FROM 
						taxonomy_term_data AS  td
						LEFT JOIN taxonomy_vocabulary AS tv ON td.vid = tv.vid
						LEFT JOIN taxonomy_index AS tn ON tn.tid = td.tid
						WHERE  (tv.machine_name IN  ('astrology')) ) taxonomy_term_data_node ON node.nid = taxonomy_term_data_node.nid
						WHERE (( (node.status = '1') AND (node.type IN  ('astrologysection')) ))
						ORDER BY node_changed DESC, created DESC

					";
			}
			
			else if(($tid==518)||($tid==521)||($tid==1379)||($tid==522)||($tid==523)||($tid==1387)||($tid==1931)||($tid==1409)||($tid==1382)||($tid==1384)){
					
					/*$qb12="SELECT node.title AS title, node.nid AS nid, node.language AS node_language, node.created AS created, 'node' AS field_data_field_video_node_entity_type
									FROM 
									node AS node
									INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
									WHERE (( (node.status = '1') AND (node.type IN  ('video')) AND (field_data_field_topic.field_topic_tid = '$tid') ))
									ORDER BY created DESC";*/
									
					  $qb12="SELECT DISTINCT file_usage.id AS file_usage_id, (SELECT field_custom_title_value AS title FROM field_data_field_custom_title WHERE entity_id=node.nid LIMIT 1 ) AS title,node.nid AS nid,node.created AS created,  node.changed AS node_changed, 'node' AS field_data_field_artical_field_collection_node_entity_type, 'node' AS field_data_field_custom_title_node_entity_type
								FROM 
								node AS node
								INNER JOIN field_data_field_topic AS  field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
								LEFT JOIN  file_usage AS  file_usage ON node.nid = file_usage.id AND file_usage.type = 'node'
								WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$tid') ))
								ORDER BY node_changed DESC
								";
			
			
			}
			
			else if(($tid==137)||($tid==138)||($tid==139)){
			
			  $qb12="SELECT node.created AS created, node.nid AS nid,field_data_field_link_title.field_link_title_title  AS title ,field_data_field_link_title.field_link_title_url  AS field_url, node.changed AS node_changed, 'node' AS field_data_field_link_title_node_entity_type, 'node' AS field_data_field_video_node_entity_type, 'node' AS field_data_field_image_node_entity_type
					FROM 
					node AS node
					INNER JOIN field_data_field_live_news AS field_data_field_live_news ON node.nid = field_data_field_live_news.entity_id 

					INNER JOIN field_data_field_link_title AS field_data_field_link_title ON node.nid = field_data_field_link_title.entity_id

					AND (field_data_field_live_news.entity_type = 'node' AND field_data_field_live_news.deleted = '0')
					WHERE (( (node.status = '1') AND (field_data_field_live_news.field_live_news_tid = '$tid') AND (node.type IN  ('live_news')) AND (DATE_FORMAT(CONVERT_TZ(FROM_UNIXTIME(node.created), 'UTC', 'Asia/Kolkata'), '%Y-%m-%d') = DATE(UTC_TIMESTAMP())) ))
					ORDER BY node_changed DESC, created DESC ";
			
			}
			/*else if(($tid==138)||($tid==139)){
			
			  $qb12="SELECT node.created AS created, node.nid AS nid, node.title AS title, node.changed AS node_changed
						FROM 
						node as node
						INNER JOIN field_data_field_live_news as field_data_field_live_news ON node.nid = field_data_field_live_news.entity_id AND (field_data_field_live_news.entity_type = 'node' AND field_data_field_live_news.deleted = '0')
						WHERE (( (node.status = '1') AND (field_data_field_live_news.field_live_news_tid = '$tid') AND (node.type IN  ('live_news')) ))
						ORDER BY node_changed DESC, created DESC ";
			
			}*/
			
			/*else if($tid==323){
			
					
			$qb12="SELECT node.title AS title, node.nid AS nid, node.changed AS node_changed, node.created AS created, 'node' AS field_data_body_node_entity_type
					FROM 
					node AS node
					WHERE (( (node.status = '1') AND (node.type IN  ('monthly_astrology')) ))
					ORDER BY node_changed DESC, created DESC   
					";
		
		}
		
		else if($tid==324){
				
				$qb12="SELECT node.title AS title, node.nid AS nid, node.changed AS node_changed, node.created AS created, 'node' AS field_data_body_node_entity_type
					FROM 
					node AS node
					WHERE (( (node.status = '1') AND (node.type IN  ('yearly_astrology')) ))
					ORDER BY node_changed DESC, created DESC   
					";
		
		}*/
			
			else{
					if(($tid==284)||($tid==266)||($tid==289)||($tid==290)||($tid==298))
					{	
						/*all video listing*/
							/*$qb12="SELECT node.title AS title, node.nid AS nid, node.language AS node_language, node.created AS created, 'node' AS field_data_field_custom_title_node_entity_type, 'node' AS field_data_field_video_node_entity_type
									FROM 
									node AS node
									WHERE (( (node.status = '1') AND (node.type IN  ('video')) ))
									ORDER BY created DESC ";*/
							
							/*contect wise  video listing*/
							
							$qb12="SELECT node.title AS title, node.nid AS nid, node.language AS node_language, node.created AS created, 'node' AS field_data_field_video_node_entity_type
									FROM 
									node AS node
									INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
									WHERE (( (node.status = '1') AND (node.type IN  ('video')) AND (field_data_field_topic.field_topic_tid = '$tid') ))
									ORDER BY created DESC";
					}
					 else{
						
						
							$qb12="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
									and  ti.tid='$listtid' order by nd.nid desc ";
						 }
					 
				}

		}else{
				$listtid=getListID($tid);
				$getdisplay=getviewdisplay($tid);
				 
					 /*$qb12="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
						 and  ti.tid='$listtid' order by nd.nid desc ";*/
						
				/*FOR DATA DATA DUPLICATION ON FIRST PAGE*/
						 /*FILE USE FOR FETCH DATA ON SECOND PAGE */
								$fp = fopen('nid.txt','r');
								$nid_string = fgets($fp);
								fclose($fp);
						 /*FILE USE FOR FETCH DATA ON SECOND PAGE */
					 
					/* $qb12="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
						 and  ti.tid='$listtid' and nd.nid NOT IN ($nid_string) order by nd.nid desc ";*/
						
				/* END FOR DATA DATA DUPLICATION ON FIRST PAGE*/
				
				if(($tid==353)||($tid==391)||($tid==382)||($tid==387)||($tid==380)||($tid==365)||($tid==360)||($tid==357)||($tid==372)||($tid==368)||($tid==370)||($tid==364)||($tid==388)||($tid==374)||($tid==394)||($tid==384)||($tid==401))
				{
	
					/*$qb12="SELECT node.nid AS nid, node.title AS title, node.language AS node_language, draggableviews_structure.weight AS draggableviews_structure_weight, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
							FROM 
							node as node
							INNER JOIN field_data_field_topic as field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
							LEFT JOIN draggableviews_structure as draggableviews_structure ON node.nid = draggableviews_structure.entity_id AND draggableviews_structure.view_name = 'bihar_listing_page' AND draggableviews_structure.view_display = '$getdisplay' AND draggableviews_structure.args = '[]'
							WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$listtid') ))
							ORDER BY draggableviews_structure_weight ASC
							";*/
							
					$qb12="SELECT node.nid AS nid, node.title AS title, node.changed AS node_changed, node.created AS created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
							FROM 
							node AS node
							INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
							WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$listtid') ))
							ORDER BY node_changed DESC, created DESC  ";
											
				}
				else if($tid==359){
				$qb12="
						SELECT node.nid AS nid, node.title AS title, node.language AS node_language, node.created AS created, 'node' AS field_data_field_custom_image_thumbnill_node_entity_type, 'node' AS field_data_field_intro_node_entity_type
						FROM 
						node AS node
						INNER JOIN field_data_field_topic AS field_data_field_topic ON node.nid = field_data_field_topic.entity_id AND (field_data_field_topic.entity_type = 'node' AND field_data_field_topic.deleted = '0')
						WHERE (( (node.status = '1') AND (node.type IN  ('article')) AND (field_data_field_topic.field_topic_tid = '$listtid') ))
						ORDER BY node_created DESC ";
				}
				
				else{
				
				$qb12="SELECT nd.nid, nd.title, nd.created  FROM node nd INNER JOIN taxonomy_index  ti ON ti.nid = nd.nid 
						 and  ti.tid='$listtid' order by nd.nid desc ";
						 }
				 
			}
			
			//global $conn;

			$res1=mysqli_query($conn,$qb12);
		    $total_rows = mysqli_num_rows($res1); 
			//$per_page = 20;                           
		    $num_links = 10;                          	
			$cur_page = 1;                     


			if(isset($page))
			{
				/*condition for lead.main and listing id*/
						/*if(($list_tid=="") && ($mltidlist=="")){
							$cur_page = $page;
						}else{
							$cur_page = $page - 1;
						}*/
						$cur_page = $page;
					/*condition for lead.main and listing id*/
					
				  $cur_page = ($cur_page < 1)? 1 : $cur_page;            
			}
			
			//$offset = ((($json['page_number']*1)-(1*1))*($json['record_per_page']*1));
			$offset = ($cur_page-1)*$per_page;              
			//$offset = $cur_page;              
			//echo $cur_page;
			//echo $offset;
		   
			$pages = ceil($total_rows/$per_page);              
			//echo $pages;
			

			$start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
			$end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
			
			/*if($listtid=='322'){}
			//else if($listtid=='302'){}
			else{
					$qb12.="  LIMIT ".$offset ." , ".$per_page;
				//echo '(3)'. $qb12.="  LIMIT ".$per_page." OFFSET ".$offset;
			 }*/
			 if($listtid=='322')
			{
				 if($page!=1)
					{
						$qb12="";
					}
				else{
					$qb12.="  LIMIT ".'0' ." , ".'12';
					}
			}
			 
			else if(($tid==137)||($tid==138)||($tid==139)){
			
			if($page!=1)
					{
						$qb12="";
					}
				else{
					$qb12.="  LIMIT ".'0' ." , ".'20';
					}
			
			}
				/*else if(($tid==323)||($tid==324)){
			
			if($page!=1)
					{
						$qb12="";
					}
				else{
					$qb12.="  LIMIT ".'0' ." , ".'1';
					}
			
			}*/
				else{
							$qb12.="  LIMIT ".$offset ." , ".$per_page;
							//echo '(3)'. $qb12.="  LIMIT ".$per_page." OFFSET ".$offset;
					}
			 
			//echo $qb12;
				 $rb12 = $obj->select($qb12);
				 $cnt = (count($db3) - 1 );
				 if($cnt > -1) {
					$db2 = array($cnt=>'');
				 }
				 else {
					$db2 = array();
				 }
				
				$newb2=array();
			
				foreach($rb12 as $rwb2)
				{
					
					if(($tid==284)||($tid==266)||($tid==289)||($tid==290)||($tid==298))
					{			
				
							/*SMALL AND LARGE IMAGE CODE*/
						 $qb2="SELECT nd.nid, nd.title, fdfv.field_video_video_url, fdfv.field_video_thumbnail_path	 FROM node nd INNER JOIN field_data_field_video fdfv ON nd.nid = fdfv.entity_id 
						and nd.status=1 and nd.type='video' and nd.nid='".$rwb2['nid']."' ";
							 $rb2 = $obj->select($qb2);
							 $dib2 = '';
							 foreach($rb2 as $rib2)
								{
									
							  $dib2 = utf8_decode(str_replace("public://",$path,$rib2['field_video_thumbnail_path'])); 
							  
								$video_url2=$rib2['field_video_video_url'];
								}
								/*END SMALL AND LARGE IMAGE CODE*/
					
						
						
					}else if($tid==322){
					//SELECT fm.filename  field_data_field_astro_image fu INNER JOIN file_managed fm ON fu.field_astro_image_fid=fm.fid and  fu.id='".$rwb2['nid']."' group by fu.id
					  $qb2="SELECT fm.filename, fm.uri from field_data_field_astro_image fu INNER JOIN file_managed fm ON fu.field_astro_image_fid=fm.fid and  fu.entity_id='".$rwb2['taxonomy_term_data_node_tid']."' ";
							$rb2= $obj->select($qb2);
							$dib2 = '';
							foreach($rb2 as $rib2)
							{
								$dib2 =  utf8_decode(str_replace("s3://",$lpath,$rib2['uri'])); 
							}
					
					}
					
					else if(($tid==137)||($tid==138)||($tid==139)){
						$qb22="SELECT field_video_thumbnail_path,field_video_video_url FROM  field_data_field_video where entity_id='".$rwb2['nid']."'";
							$rb22= $obj->select($qb22);
							$video_url = '';
							foreach($rb22 as $rib22)
							{
								$video_thum_image= utf8_decode(str_replace("public://",$path,$rib22['field_video_thumbnail_path'])); 
								$video_url=$rib22['field_video_video_url'];
								
							}	
							
					$qb2="SELECT fm.filename , fm.uri FROM  field_data_field_image fu INNER JOIN file_managed fm ON fu.field_image_fid=fm.fid AND  fu.entity_id='".$rwb2['nid']."' ";
							$rb2= $obj->select($qb2);
							$dib2 = '';
							foreach($rb2 as $rib2)
							{
								$dib2 =  utf8_decode(str_replace("s3://",$lpath,$rib2['uri'])); 
							}
							
					
					}
					
					else if(($tid==518)||($tid==521)||($tid==1379)||($tid==522)||($tid==523)||($tid==1387)||($tid==1931)||($tid==1409)||($tid==1382)||($tid==1384))
					{
					
					 $qb2="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN field_data_field_artical_field_collection fdfafc ON fu.id=fdfafc.field_artical_field_collection_value  INNER JOIN file_managed fm ON fu.fid=fm.fid  AND fu.type='field_collection_item'  AND  fdfafc.entity_id='".$rwb2['nid']."' limit 1 ";
							$rb2= $obj->select($qb2);
							
							$dib2 = '';
							foreach($rb2 as $rib2)
							{
							
								$dib2 =  utf8_decode(str_replace("s3://",$gallerypath.'s3/',$rib2['uri']));
							}
			
					}
					
					
					else{
						
						 
							$qb2="SELECT fm.filename , fm.uri FROM  file_usage fu INNER JOIN file_managed fm ON fu.fid=fm.fid AND fm.uri LIKE '%articles%' and  fu.id='".$rwb2['nid']."' group by fu.id ";
							$rb2= $obj->select($qb2);
							$dib2 = '';
							foreach($rb2 as $rib2)
							{
								$dib2 =  utf8_decode(str_replace("s3://",$lpath,$rib2['uri'])); 
							}
						
						
						}
						
						
						if(($tid==137)||($tid==138)||($tid==139))
						{
								$drb2 = array(	
								"nid" => $rwb2['nid'],
								"title" => utf8_decode($rwb2['title']),
								"created" => $rwb2['created'],
								"url" => $rwb2['field_url'],
								"video_image"=>$video_thum_image,
								"video_url" => $video_url,
								"large_image" =>$dib2,
								
							//"url" => "https://youtu.be/oUl4S7Txz2Y",
							//"video_image"=>"http://d31p0ffza4ytus.cloudfront.net/styles/khelsliderimages/s3/3_20.jpg",
							//"video_url" =>  "https://youtu.be/oUl4S7Txz2Y",	
								
								
													
								);
						}else
						{
							$drb2 = array(	
							"nid" => $rwb2['nid'],
							"title" => utf8_decode($rwb2['title']),
							"created" => $rwb2['created'],
							
							
							"large_image" =>$dib2,
							"video_url" => $video_url2,					
							);
							}
							
							//check array value is null if yes then set it to blank(must use php 5.3+) 
							$drb2 = array_map(function($v){
								return (is_null($v)) ? "" : $v;
							},$drb2);
							$db2[] = $drb2;
				}
				
				
				
				//$data=$db2;
			
			/*if($page==1){
			
			 $total_record111=$total_rowsdb1+$total_rowsdb3+$total_rows;
			  echo $total_record111; exit;
			 }else{
			  echo $total_record111; exit;
			 }*/
			 
			
			 $total_record=$total_rowsdb1+$total_rowsdb3+$total_rows;
			 


					
					
				/*if((($list_tid=="") && ($mltidlist==""))||($page!=1)){
				$data['data']= $db2;
				}else{
				//$data=$total_record + $db1 + $db3 + $db2;
				$data['data']= $db1 + $db3 + $db2;
				}*/
				
			if (($tid==270)||($tid==601)||($tid==248)||($tid==475)||($tid==274))
			{
			$data['data']= $db1 + $db3;
			$total_record=$total_rowsdb1+$total_rowsdb3;
			}else{
			$data['data']= $db2;
			$total_record=$total_rows;
			}
				
				
				if($tid==322){
				$data['total_rec'] = 12;
				}
				else if(($tid==137)||($tid==138)||($tid==139)){
					if($total_record < 20){
					$data['total_rec'] = $total_record;
					}else{
					$data['total_rec'] = 20;
					}
				}
				else{
				$data['total_rec'] = $total_record;
				}
			
				}
				/*$news= array(
					
			
					'total_record'=>$total_record
					//'data'=>$data11
				);*/
		//echo "<pre>";
		//print_r($data);exit;

			
		return $data;


			//Return JSON
}

//print_r(getMainID(4));
//print_r(GetGroupTitle(4));
//echo "<pre>";
//print_r(getNewslist(353));exit;
?>