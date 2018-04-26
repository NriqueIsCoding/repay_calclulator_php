

<?php 


if (isset($_POST['submit'])){

	//Initializing variables from user input
	$start_date = $_POST['start_date'];
	$loan_amount = $_POST['loan_amount'];
	$ins_amount = $_POST['ins_amount'];
	$int_rate = $_POST['int_rate'];
	$ins_interval = $_POST['ins_interval'];
	$months = $_POST['months'];

	if 	(empty($start_date) || empty($loan_amount) || empty($ins_amount) || empty($int_rate) || empty($months)){
			header("Location: ../repay_calc/index.php?repay=empty");
			exit();
	}
	// else{
		
	// 	if(!is_numeric($loan_amount) || !is_numeric($ins_amount) || !is_numeric($int_rate) || !is_numeric($months)) {

	// 		header("Location: ../repay_calc/index.php?repay=numeric");
	// 		exit();

 //    		// $msg = '<span class="error"> Data entered was not numeric</span>';
	// 	}
	// }

	//Converting rate to decimal
	$final_rate = ($int_rate / 100);

	//Monthly payment calculations
	$monthly_payment =(($final_rate / 12) + ($final_rate / 12) / (pow(1+($final_rate / 12),$months) -1)) * $loan_amount;
	$total_interest = $monthly_payment * $months - $loan_amount;
	$total_tobepaid = $monthly_payment * $months;

	$newdate = strtotime("+ $months months", strtotime($start_date));
	$newdate = date("m-d-Y", $newdate);

	//Weekly payment calculation
	$weekly_payment =(($final_rate / 52) + ($final_rate / 12) / (pow(1+($final_rate / 52),$months) -1)) * $loan_amount;

	//Daily payment calculation
	$daily_payment =(($final_rate / 365) + ($final_rate / 365) / (pow(1+($final_rate / 365),$months) -1)) * $loan_amount;



	if ($ins_interval == "monthly"){

		setlocale(LC_MONETARY,"en_US");
		echo "Monthly Payments: " . money_format("US$ %i", $monthly_payment) . "<br>";
		echo "Loan Amount: " . money_format("US$ %i", $loan_amount) . "<br>";
		echo "Total Interest: " . money_format("US$ %i", $total_interest) . "<br>";
		echo "Total to be repaid: " . money_format("US$ %i", $total_tobepaid) . "<br>";
		echo "Estimated payoff date: " . $newdate. "<br>";

	}

	elseif ($ins_interval == "weekly") {

		echo "Weekly Payments: " . round($weekly_payment, 2). "<br>";
		echo "Loan Amount: " . $loan_amount . "<br>";
		echo "Total Interest: " . round($total_interest,2) . "<br>";
		echo "Total to be repaid: " . round($total_tobepaid, 2) . "<br>";
		echo "Estimated payoff date: " . $newdate. "<br>";
	}

	elseif ($ins_interval == "daily") {

		echo "Daily Payments: " . round($daily_payment, 2). "<br>";
		echo "Loan Amount: " . $loan_amount . "<br>";
		echo "Total Interest: " . round($total_interest,2) . "<br>";
		echo "Total to be repaid: " . round($total_tobepaid, 2) . "<br>";
		echo "Estimated payoff date: " . $newdate. "<br>";
	}

}

	// echo "Start Date: " . $start_date . "<br>";
	
	// echo "Installment amount: " . "<br>";
	
	// echo "Installment interval: " . $ins_interval . "<br>";


 ?>