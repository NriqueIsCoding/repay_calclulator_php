<?php

		if (isset($_POST['submit'])){

			//Initializing variables from user input
			$start_date = $_POST['start_date'];
			$loan_amount = $_POST['loan_amount'];
			// $ins_amount = $_POST['ins_amount'];
			$int_rate = $_POST['int_rate'];
			$ins_interval = $_POST['ins_interval'];
			$months = $_POST['months'];

			if (empty($start_date) || empty($loan_amount) || empty($int_rate) || empty($months)){
					header("Location: ../repay_calc/index.php?repay=empty");
					exit();
			}
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



		}
	?>
