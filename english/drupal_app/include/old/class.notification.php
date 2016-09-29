<?php
	
	CLASS NOTIFICATION {
		
		public $deviceToken;
		public $title;
		public $nid;
		
		//Function for sending push message to client
		function sendToAndroid() {
			$fp = fopen('androidpush' . date('dmy') . ".txt", 'a+');
			fwrite($fp, '------------------------ new record --------------------------------' . "\r\n");
			// API access key from Google API's Console
			//define('API_ACCESS_KEY', 'AIzaSyAatvtDp47IO1pEI1ha60HrMS0gk_BpwmY' );
			define('API_ACCESS_KEY', 'AIzaSyAbFPxpENDpe4UBsCZB7wkZPKXNuviL68s');
			 
			$registrationIds = array($this->deviceToken);
			 
			// prep the bundle
			$msg = array
			(
				'nid' => $this->nid,
				'title' => $this->title
			);
		
			$fields = array
			(
				'registration_ids' => $registrationIds,
				'data'	=> $msg
			);
			
			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			fwrite($fp, "Error : " .  curl_error($ch) . "\r\n");
			fwrite($fp, "Result : " .  json_encode($result) . "\r\n");
			curl_close($ch);
			
			if (!$result) {
				$jsondata['message'] = 'Message not delivered';
				$jsondata['status'] = 0;
			}
			else {
				$jsondata['message'] = 'Message successfully delivered';
				$jsondata['status'] = 1;
			}
			// Close the connection to the server
			fclose($fp);

			echo json_encode((object) $jsondata);
		}
	}
?>