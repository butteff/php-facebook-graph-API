<?php

/* 
	$endpoint - additional part of the URL address for the API call
	$items - array of get or post parameters with values
	$method - can be 'POST' or 'GET'
	$fb - config data from the config.php file
*/

function go_facebook($endpoint, $items, $method, $fb) {

	$getparams = '';

	if ($method == 'GET') {
		$getitems = $items;

		if (count($getitems) > 0) {
			$prefix = '?';
			$i = 0;
			foreach ($getitems as $param => $value) {
				if ($i > 0) {
					$prefix = '&';
				} 
				$getparams .= $prefix.$param.'='.$value.'';
				$i++;
			}
		}
		//echo $url.$endpoint.$getparams; die();
	}

	$ch = curl_init($fb['url'].$endpoint.$getparams);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json', //application/x-www-form-urlencoded
		'Authorization: Bearer '.$fb['access_token']
	]);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSLVERSION, 'CURL_SSLVERSION_TLSv1_2');

	if ($method == 'POST') {
		if (count($items) > 0) {
			$postitems = json_encode($items);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postitems);
		}
	}

	$response = curl_exec($ch);
	$response = json_decode($response);
	curl_close($ch);
	return $response;

}
?>