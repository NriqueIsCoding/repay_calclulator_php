
$(document).ready(function(){

/*
	---this part needs work  - trying to hide the results at index.php---
*/
    // if( $("#check-empty").val() == ""){
    //       console.log("what the hell?");
    //       $(".result-containers").hide();
    // }
	// $(".result-containers").hide();
	// $(".formattedNumberField").keyup(function(event){


/*
	---this part needs work  - trying to show commas as use is typing the amount---
*/
	// 	// skip for arrow keys
	// 	if(event.which >= 37 && event.which <= 40){
	// 		event.preventDefault();
	// 	}

	// 	$(this).val(function(index, value) {
	// 	  value = value.replace(/,/g,''); // remove commas from existing input
	// 	  return numberWithCommas(value); // add commas back in
 	//  		});
	// });

/*
	computing current Date
*/
	var date = new Date();

	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	var today = year + "-" + month + "-" + day;       
	document.getElementById("datePicker").value = today;


/*
	show the result container
*/
	$("#send").click(function(event){
		// event.preventDefault();
  		console.log( "Handler for .click() called.");
  		$(".result-containers").show();

  		// $(".formattedNumberField") = $(".formattedNumberField").value.replace(/,/g,'');

	});

	$("#reset").click(function(){
  		console.log( "Handler for .click() called.");
  		$(".result-containers").hide();

	});
});


function numberWithCommas(x) {
	    var parts = x.toString().split(".");
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	    return parts.join(".");
}