<!DOCTYPE html>
<html>
<head>
	<title>Repay Calculator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="repay.js"></script>

</head>
<body>



 <?php
 	$output = NULL;

	if(isset($_POST['submit'])){

		//Initializing variables from user input
		$start_date = $_POST['start_date'];
		$loan_amount = $_POST['loan_amount'];
		// $ins_amount = $_POST['ins_amount'];
		$int_rate = $_POST['int_rate'];
		$ins_interval = $_POST['ins_interval'];
		$months = $_POST['months'];

		// if(strlen($loan_amount) > 6){
		// 	$output = "You have entered a value that is not numeric";
    //
		// }

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

	if(isset($_POST['reset'])){
			header("Location: ../repay_calc/index.php");

		}

  ?>


<div class="jumbotron banner">
	<div class="container">
		  <h1 class="display-3">Loan Repayment Calculator</h1>
		  <p class="lead">Caculate your Monhly payments for your Loans in matter of seconds.</p>
	 </div>
</div>

<div class="jumbotron">
	<div class ="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">

				<form method="post" id="my-form">
					<div class="form-group row">
							<label for="start_date" class="col-3 col-form-label">Loan Start date:</label>
							<div class="col-9">
								<input class="form-control" type="date" id="datePicker" name="start_date" value="<?php if(isset($start_date)) {echo $start_date; }?>">
							</div>
					</div>
					<div class="form-group row">
						<label for="loan_amount" class="col-3 col-form-label">Loan Amount: (US$)</label>
						<div class="col-9">
						<input class="form-control" id="check-empty" type="text" name="loan_amount" value="<?php if(isset($loan_amount)) {echo $loan_amount; }?>">
						</div>
					</div>

					<!-- <div class="form-group row">
						<label for="ins_amount" class="col-3 col-form-label">installment Amount</label>
						<div class="col-9">
						<input class="form-control" type="text" name="ins_amount">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="int_rate" class="col-3 col-form-label">Annual Interest: (%)</label>
						<div class="col-9">
						<input class="form-control" type="text" name="int_rate" value="<?php if(isset($int_rate)) {echo $int_rate; }?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="months" class="col-3 col-form-label">Months</label>
						<div class="col-9">
						<input class="form-control" type="text" name="months" value="<?php if(isset($months)) {echo $months; }?>">
						</div>
					</div>
					 <div class="form-group row">
					 	<label for="ins_interval" class="col-3 col-form-label">Installment Interval</label>
					 	<div class="col-9">
						    <select class="form-control" name="ins_interval" id="interval" value="<?php if(isset($ins_interval)) {echo $ins_interval; }?>">
						      <option>Daily</option>
						      <option>Weekly</option>
						      <option>Monthly</option>
						    </select>
					    </div>
					 </div>
					 <br>

					 <div class="form-group row">
					 	<div class="col-4"></div>
						<div class="col-6">
						 <button type="submit" name="submit" class="btn btn-primary btn-lg" id="send">Submit</button>
						 <button type="reset" name="reset" class="btn btn-danger btn-lg" id="reset">Reset</button>
						</div>
						<div class="col-2"></div>
					 </div>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</div>

<div class="container result-containers" id="particularDivision">
 <div class="jumbotron results pt-1 pb-1 text-center">
 	<h2 class="display-4">Results</h2>
 </div>
	<div class="wrapper">
		<div class="one">
			<p>
				Monthly payments
			</p>
			<p>
				<span>
					<?php
						echo money_format("US$ %i", $monthly_payment);
					?>
				</span>
			</p>
		</div>
		<div class="two">
			<p>
				Loan amount
			</p>
			<p>
				<span>
					<?php
						echo money_format("US$ %i", $loan_amount);
					?>
				</span>
			</p>
		</div>
		<div class="three">
			<p>
				Total interest
			</p>
			<p>
				<span>
					<?php
						echo money_format("US$ %i", $total_interest);
					?>
				</span>
			</p>
		</div>
		<div class="four">
			<p>
				Total to be repaid
			</p>
			<p>
				<span>
					<?php
						echo money_format("US$ %i", $total_tobepaid);
					?>
				</span>
			</p>
		</div>
		<div class="five">
			<p>
				Annual rate
			</p>
			<p>
				<span>
					<?php
						echo round($int_rate,2) . " %";
					?>
				</span>
			</p>
		</div>
		<div class="six">
			<p>
			Estimated payoff date
			</p>
			<p>
				<span>
					<?php
						echo $newdate;
					?>
				</span>
			</p>
		</div>
	</div>

</div>



</body>
</html>
