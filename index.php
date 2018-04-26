<!DOCTYPE html>
<html>
<head>
	<title>Repay Calculator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<h2>Schedule a Payment</h2>

<form action="repay.php" method="POST">

	Start date: <br><input type="date" name="start_date"> <br>
	<input type="text" name="loan_amount" class="formattedNumberField" placeholder="Loan amount"> <br>
	<input type="text" name="ins_amount" class="formattedNumberField" placeholder="Installment amount"> <br>
	<input type="text" name="int_rate" placeholder="Interest rate"> <br>
	<input type="text" name="months" placeholder="Months"> <br>
	<select name="ins_interval">
		<option value="">Select...</option>
		<option value="daily">Daily</option>
		<option value="weekly">Weekly</option>
		<option value="monthly">Monthly</option>
	</select><br>
	<button type="submit" name="submit">Submit</button>
	<input type="reset">
</form>


	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="repay.js"></script> -->
</body>
</html>