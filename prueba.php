<?php

/*=============================================
		VISTA: MOSTRAR CURSOS         
=============================================*/
$mostrarCursos = ControladorUdemy::ctrMostrarCursos();

$id=  "2iDxKD4VuHg";
$offerid = "507388";
	
foreach ($mostrarCursos->results as $key => $value) {
	//print_r($value);

	echo '<div>

	<h3>'.$value->title.'</h3>
	<img src="'.$value->image_480x270.'">

	<a href="https://click.linksynergy.com/link?id='.$id.'&offerid='.$offerid.'.'.$value->id.'&type=2&murl=https%3A%2F%2Fwww.udemy.com'.$value->url.'"><button>Ver curso</button></a>



	</div>';
}

/*=============================================
	CONTROLADOR: SOLICITUD A LA API UDEMY       
=============================================*/
		
class ControladorUdemy{

static public function ctrMostrarCursos(){


$idCliente = "0HN4DA22zgY0HjBZAomubVAnp4Yy6ds9pvm4Oi2M";
$claveSecreta = "avuVXaS5F2wxUrhOjtpD6WQTcB0zrx0KBnb3720BZNQ4ShsXBb8O6HvtujcUVPvysgyUZah22fnoOLoCaQnAXXJIdRzlSqZDYgj46FiyCk05Mir1k0cyRxWYjofRcOXu";

	$autorizacion = base64_encode($idCliente.':'.$claveSecreta);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.udemy.com/api-2.0/courses/?page=1&page_size=50&category=Development&price=price-paid&is_affiliate_agreed=True&is_fixed_priced_deals_agreed=True&is_percentage_deals_agreed=True&language=es&ordering=relevance",
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


