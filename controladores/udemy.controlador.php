
<?php

class ControladorUdemy{


static public function ctrMostrarCursos($idCliente, $claveSecreta, $page, $page_size, $type, $category,$price, $language, $ordering){


		

		$autorizacion = base64_encode($idCliente.':'.$claveSecreta);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.udemy.com/api-2.0/courses/?page=".$page."&page_size=".$page_size."&".$type."=".$category."&price=".$price."&is_affiliate_agreed=True&is_fixed_priced_deals_agreed=True&is_percentage_deals_agreed=True&language=".$language."&ordering=".$ordering,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "accept: application/json, text/plain, */*",
		    "authorization: Basic ".$autorizacion,
		    "cache-control: no-cache",
		    "content-type: application/json;charset=utf-8",
		    "postman-token: b85ac802-45d9-9b21-4b0d-03e93bb17a1d"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {

		  // echo $response;

		  $respuesta = json_decode($response);

		  return $respuesta;
		}

	}


}