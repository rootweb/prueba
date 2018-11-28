/*=============================================
CONTADOR DE TIEMPO
=============================================*/
if(idioma == "es"){

	var dia = "Días";
	var hora = "Horas";
	var min = "Min";
	var seg = "Seg";

}else if(idioma == "en"){

	var dia = "Days";
	var hora = "Hours";
	var min = "Min";
	var seg = "Seg";

}else{
	var dia = "Dias";
	var hora = "Horas";
	var min = "Min";
	var seg = "Seg";

}

var finOferta = $('.countdown').attr("finOferta");

$(".countdown").dsCountDown({

	endDate: new Date(finOferta),
	theme : "black",
	titleDays: dia,
	titleHours: hora,
	titleMinutes: min,
	titleSeconds: seg


});


/*=============================================
VALIDAR OFERTAS
=============================================*/


var valorDescuento = $(".valorDescuento");
var precioFinal = $(".precioFinal span");
var precioReal = $(".precioReal small");

var precioRealArray = [];
var precioFinalArray = [];
var valorDescuentoArray = [];

var precioFinalConDescuento = [];

for(var i = 0; i < precioReal.length; i++){

	precioRealArray[i] = Number($(precioReal[i]).html().substr(1));
	
	precioFinalArray[i] = Number($(precioFinal[i]).html());

	valorDescuentoArray[i] = Number($(valorDescuento[i]).html());

	if(valorDescuentoArray[i] == 0){

		$(valorDescuento[i]).html(100-(precioFinalArray[i]*100/precioRealArray[i]).toFixed());

	}else{

		precioFinalConDescuento[i] = precioRealArray[i] - (precioRealArray[i]*valorDescuentoArray[i]/100).toFixed();

		if(precioFinalConDescuento[i] < 10){

			$(precioFinal[i]).html(9.99);

			$(valorDescuento[i]).html(100-(9.99*100/precioRealArray[i]).toFixed());

		}else{

			$(precioFinal[i]).html(precioFinalConDescuento[i].toFixed(2));

		}

	}
	

}


/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"

});