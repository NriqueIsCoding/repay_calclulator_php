
$(document).ready(function(){
	// $(".result-containers").hide();
	console.log("Begin jquery");

  if($('input').val() == ""){
        console.log("Checking if Loan is Empty, Also will hide results");
        $(".result-containers").hide();
  }

	$("#send").click(function(){
			// event.preventDefault();
	  		console.log( "Submit Button Pressed.");
				$(".result-containers").slideDown("slow");

				$('html, body').animate({
    scrollTop: $("#particularDivision").offset().top - document.body.clientHeight + $("#particularDivision").height()
}, 200);
			});



	$("#reset").click(function(){
	  		console.log( "Handler for .click() called.");
	  		$(".result-containers").slideUp("slow");

		});


});
