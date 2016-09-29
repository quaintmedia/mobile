<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


include('include/myclass.php');
include('include/functions.php');

$obj = new myclass();
$func = new functions();
/*MONTHLY FORCASTE*/
		$query="SELECT node.title AS title, node.nid AS nid, node.changed AS node_changed, node.created AS created, 'node' AS field_data_body_node_entity_type
					FROM 
					node AS node
					WHERE (( (node.status = '1') AND (node.type IN  ('monthly_astrology')) ))
					ORDER BY node_changed DESC, created DESC  LIMIT 1 ";
				
					
				$res = $obj->select($query);
				foreach($res as $row)
				{
				$mnid1=$row['nid'];
				}
				if($mnid1==''){ $mnid='-1'; } else{ $mnid=$mnid1;}
/*END MONTHLY FORCASTE*/

/*YEARLY FORCASTE*/
			$query1="SELECT node.title AS title, node.nid AS nid, node.changed AS node_changed, node.created AS created, 'node' AS field_data_body_node_entity_type
					FROM 
					node AS node
					WHERE (( (node.status = '1') AND (node.type IN  ('yearly_astrology')) ))
					ORDER BY node_changed DESC, created DESC     LIMIT 1 ";
				
					
				$res1 = $obj->select($query1);
				foreach($res1 as $row1)
				{
				$ynid1=$row1['nid'];
				}
				if($ynid1==''){ $ynid='-1'; } else{ $ynid=$ynid1;}
/*END YEARLY FORCASTE*/


$data='{"status":"1","data":[{"mlid":"888","name":"होम","type":"0",
					"subCatList":[]
					},
									
				    
		{"mlid":"6589","name":"न्यूज़ लाइव", "type":"7",
				"subCatList":[
								{"tid":"137", "name":"देश दुनिया", "type":"7"},
								{"tid":"139", "name":"स्पोर्ट्स", "type":"7"},
								{"tid":"138", "name":" दिल्ली", "type":"7"}
				]},					
		
	 {
        "mlid": "1573",
        "type":"1",
        "name": "भारत",
		"subCatList":[
									{"tid":"270", "name":"मुख्य खबरें", "type":"1"},
									{"tid":"353", "name":"उत्तर प्रदेश", "type":"1"},
									{"tid":"357", "name":"झारखंड", "type":"1"},
									{"tid":"359", "name":"छत्तीसगढ़" ,"type":"1"},
									{"tid":"364", "name":"राजस्थान", "type":"1"},
									{"tid":"365", "name":"मध्य प्रदेश", "type":"1"},
									{"tid":"368", "name":"महाराष्ट्र", "type":"1"},
									{"tid":"360", "name":"बिहार", "type":"1"},
									{"tid":"372", "name":"पंजाब", "type":"1"},
									{"tid":"370", "name":"उत्तराखंड", "type":"1"},
									{"tid":"374", "name":"अन्य", "type":"1"},
									
									
									
									{"tid":"380", "name":"दिल्ली", "type":"1"},
									{"tid":"382", "name":"चेन्नई", "type":"1"},
									{"tid":"384", "name":"कोलकाता", "type":"1"},
									{"tid":"391", "name":"बेंगलुरु", "type":"1"},
									{"tid":"388", "name":"मुंबई", "type":"1"},
									{"tid":"387", "name":"लखनऊ", "type":"1"},
									{"tid":"394", "name":"पटना", "type":"1"},
									{"tid":"401", "name":"खबरें", "type":"1"},
									{"tid":"498", "name":"फोटो गैलरी ", "type":"2"}
								
									]
    },
	
		
	
		
		{"mlid":"1575","name":"खेल","type":"1",
					"subCatList":[
									
									{"tid":"349", "name":"क्रिकेट", "type":"1"},
									{"tid":"404", "name":"फुटबॉल", "type":"1"},
									{"tid":"405", "name":"हॉकी", "type":"1"},
									{"tid":"348", "name":"टेनिस", "type":"1"},
									{"tid":"263", "name":"अन्य खेल", "type":"1"},
									{"tid":"467", "name":"फोटो गैलरी ", "type":"2"},
									{"tid":"284", "name":"वीडियो","type":"3"}
									]},
		
		{"mlid":"1576","name":"दुनिया","type":"1",
						"subCatList":[
										{"tid":"274", "name":"मुख्य खबरें", "type":"1"},
										{"tid":"276", "name":"हमारे पड़ोसी", "type":"1"},
										{"tid":"280", "name":"अमेरिका", "type":"1"},
										{"tid":"445", "name":"यूरोप", "type":"1"},
										{"tid":"466", "name":"बाकी दुनिया ", "type":"1"},
										
										{"tid":"291", "name":"फोटो गैलरी ", "type":"2"},
										{"tid":"266", "name":"वीडियो","type":"3"}	
										
										]
									},
									
		
		{"mlid":"1380","name":"बॉलीवुड","type":"1",
				"subCatList":[{"tid":"470", "name":"रिव्यू", "type":"1"},
								{"tid":"469", "name":"खबरें", "type":"1"},
								{"tid":"302", "name":"गॉसिप्स", "type":"1"},
								{"tid":"471", "name":"छोटा पर्दा", "type":"1"},
								{"tid":"468", "name":"इंटरव्यू", "type":"1"},
								
								{"tid":"310", "name":"फोटो गैलरी ","type":"2"}
								
								
								]
							},
		
		
		
		{"mlid":"764","name":"बिजनेस", "type":"1",
					"subCatList":[
									{"tid":"248", "name":"मुख्य खबरें", "type":"1"},
									{"tid":"250", "name":"खबरें", "type":"1"},
									{"tid":"293", "name":"फोटो गैलरी ","type":"2"},
									{"tid":"289", "name":"वीडियो","type":"3"}
								
								]
								},
		
		{"mlid":"757","name":"टेक","type":"1",
					"subCatList":[{"tid":"267", "name":"मुख्य खबरें", "type":"1"},
								 {"tid":"268","name":"खबरें", "type":"1"},
								 {"tid":"334","name":"फोटो गैलरी", "type":"2"}
								
									
									]
							},
		
		{"mlid":"815","name":"लाइफस्टाइल", "type":"1",
						"subCatList":[{"tid":"464","name":"एक्सपर्ट सलाह", "type":"1"},
									{"tid":"461", "name":"बोल्ड एंड ब्यूटीफुल", "type":"1"},
									{"tid":"463", "name":"सेक्स एंड रिलेशनशिप", "type":"1"},
									{"tid":"465", "name":"हेल्थ एंड फिटनेस", "type":"1"},
									{"tid":"313", "name":"योग निरोग", "type":"1"},
									{"tid":"460", "name":"फोटो गैलरी ","type":"2"}								
									
									
									]
								},
		
		 {"mlid":"816","name":"राशिफल", "type":"1",
							"subCatList":[{"tid":"322", "name":"दैनिक राशिफल", "type":"1"},
							
										{"tid":"'.$mnid.'", "name":"मासिक राशिफल", "type":"8"},
										{"tid":"'.$ynid.'", "name":"वार्षिक राशिफल", "type":"8"},
										{"tid":"325", "name":"धर्म-अध्यात्म", "type":"1"},
										{"tid":"326", "name":"मिस्ट्री", "type":"1"},
										{"tid":"327", "name":"वास्तुशास्त्र", "type":"1"},
										{"tid":"321", "name":"फोटो गैलरी ","type":"2"}
										]
									},
		
		 {"mlid":"643","name":"इनडेफ्थ", "type":"1",
							"subCatList":[{"tid":"415", "name":"पॉलिटिक्स", "type":"1"},
										{"tid":"424","name":"आर्ट एंड कल्चर", "type":"1"},
										{"tid":"417", "name":"लिट्रेचर", "type":"1"},
										{"tid":"416", "name":"कंट्रोवर्सी", "type":"1"},
										{"tid":"174", "name":"फोटो गैलरी  ","type":"2"},
										{"tid":"290", "name":"वीडियो","type":"3"}
										
										]
									},
		
	{"mlid":"1677","name":"शी-कॉर्नर","type":"1",
						"subCatList":[{"tid":"450", "name":"माई व्यू", "type":"1"},
									{"tid":"451", "name":"ब्यूटी टिप्स", "type":"1"},
									{"tid":"452", "name":"उलझन सुलझन", "type":"1"},
								   {"tid":"453", "name":"स्टाइल फंडा", "type":"1"},
								   {"tid":"449", "name":"फोटो गैलरी ","type":"2"}
								   
									
									]
								},
		
		{"mlid":"899","name":"करिअर" ,"type":"1",
					"subCatList":[
								{"tid":"219","name":"करिअर न्यूज", "type":"1"},
								{"tid":"220","name":"एक्सपर्ट व्यूज", "type":"1"},
								{"tid":"454", "name":"फोटो गैलरी ","type":"2"},
								{"tid":"298", "name":"वीडियो","type":"3"}
		]
	},
		
		{"mlid":"1112","name":"टीन-वर्ल्ड","type":"1",
				"subCatList":[{"tid":"459", "name":"क्राइम डायरी", "type":"1"},
							{"tid":"456", "name":"डेटिंग टिप्स","type":"1"},
							{"tid":"458", "name":"मेरी प्रॉब्लम", "type":"1"},
							{"tid":"457", "name":"ट्रेंडिंग हॉट", "type":"1"},
							{"tid":"186", "name":"फोटो गैलरी ","type":"2"}
							
							
							]
					},
		
		
		{"mlid":"647","name":"प्रॉपर्टी", "type":"1",
						"subCatList":[{"tid":"475", "name":"मुख्य खबरें", "type":"1"},
										{"tid":"304", "name":"अन्य खबरें", "type":"1"}
									]},
									
		{"mlid":"649","name":"फोटो गैलरी ", "type":"4",
						"subCatList":[
									{"tid":"518", "name":"भारत", "type":"4"},
									{"tid":"521", "name":"खेल","type":"4"},
									{"tid":"1379", "name":"दुनिया", "type":"4"},
									{"tid":"522", "name":"बॉलीवुड", "type":"4"},
									{"tid":"523", "name":"बिजनेस", "type":"4"},
									{"tid":"1409", "name":"टेक","type":"4"},
									{"tid":"1387", "name":"ऑटो","type":"4"},
									{"tid":"1382", "name":"लाइफस्टाइल","type":"4"},
									{"tid":"1384", "name":"शी-कॉर्नर","type":"4"},
									{"tid":"1931", "name":"ओएमजी","type":"4"}
							]},
									
									
				
						{"mlid":"650","name":"Live India - Watch Live", "type":"5",
						"subCatList":[]},
						
						{"mlid":"651","name":"हमारी अन्य ऐप्स" ,"type":"6",
						"subCatList":[]}
								]
								}
								';
		
		
		
		
		
echo ($data);

exit;
?>
