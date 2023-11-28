<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electricity Bill Calculator</title>
		<!-- Bootstrap CSS -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container" style="background-color:#8A56B5; margin-top:25px" >
		<h1 style="text-align:center;">Electricity Bill Calculator</h1>
		<form action="" method="POST" role="form">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label for="">Total Unit / Kwh</label>
					<input type="text" class="form-control" name="unit" placeholder="Input total Unit">
				</div>
			</div>
            <div class="col-lg-12">
				<div class="form-group">
					<label for=""> Consumer No:</label>
					<input type="text" class="form-control" name="consumer No " placeholder="Enter Your Consumer No : ">
				</div>
			</div>
            <div class="col-lg-12">
				<div class="form-group">
					<label for=""> Month of Bill</label>
					<input type="Month" class="form-control" name="Month" placeholder="Enter the month ">
				</div>
			</div>

			<div class="col-lg-12">
				<div class="form-group">
					<label for="">Meter Type</label>
					<select class="form-control" name="meter">
						<option value="55">Single Phase</option>
						<option value="70">Two Phase</option>
					</select>
				</div>
			</div>
			
			<div class="col-lg-12" style="margin:auto;">
				<button type="submit" class="btn btn-primary text-right"> Calculate </button>
			</div>
		</div>
		</form>
		<hr>
		<?php
		if(isset($_POST['unit']))
		{   
			$total = 0;
			$unit = (int) $_POST['unit'];

			function calculate($unit,$range,$price)
			{
				$xunit = $range[1]-$range[0]+1;
				if($unit<=$xunit && $unit>0)
				{
					$bill = $unit  * $price;
					echo "
						<tr>
							<td>".implode("-", $range)."</td>
							<td>$price</td>
							<td>$unit</td>
							<td>$bill Rs</td>
						</tr>
						";
					return array($unit-$xunit, $bill);
				}
				elseif($unit>$xunit)
				{
					$bill = $xunit * $price;
					$newUnit = $unit - $xunit;
					echo "
						<tr>
							<td>".implode("-", $range)."</td>
							<td>$price</td>
							<td>".$xunit."</td>
							<td>$bill Rs</td>
						</tr>
						";
					return array($newUnit, $bill);
				}
			}

			echo "<h3>Bill for $unit Unit of Consumer name: Akshay Jadhav </h3>";

			echo "<table class=\"table table-hover\">
			<thead>
				<tr>
					<th>Range</th>
					<th>Price/Unit</th>
					<th>Unit</th>
					<th>Bill</th>
				</tr>
			</thead>
			<tbody>
				
			";

			$newUnit = 0;
			if($unit>0)
			{
				$rep = calculate($unit,array(1,50),3.50);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			if($newUnit>0)
			{
				$rep = calculate($newUnit,array(51,150),4.0);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			if($newUnit>0)
			{
				$rep = calculate($newUnit,array(151,250),5.20);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			if($newUnit>0)
			{
				$rep = calculate($newUnit,array(250,400),6.50);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			if($newUnit>0)
			{
				$rep = calculate($newUnit,array(401,600),8.51);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			if($newUnit>0)
			{
				$rep = calculate($newUnit,array(601,1000000),9.93);
				$newUnit = $rep[0];
				$total += $rep[1];
			}
			$meter = $_POST['meter'];
			$newTotal = $total + $meter;
			$vat = ($newTotal * 5)/100;
			$gTotal = $newTotal + $vat;
			echo "
				
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th>Bill</th>
					<th>$total Rs</th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th>Fixed Charges</th>
					<th>$meter Rs</th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th>Total</th>
					<th>$newTotal Rs</th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th>Vat</th>
					<th>$vat Rs</th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th>G. Total</th>
					<th>$gTotal Rs</th>
				</tr>
			</tfoot>
		</table>";
		}
		?>
        
        <div class="payment-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Choose Payment Option</h5>
                    <form id="paymentForm">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="creditCard"
                                value="creditCard" checked>
                            <label class="form-check-label" for="creditCard">
                                Credit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="debitCard"
                                value="debitCard">
                            <label class="form-check-label" for="debitCard">
                                Debit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="netBanking"
                                value="netBanking">
                            <label class="form-check-label" for="netBanking">
                                Net Banking
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="upi" value="upi">
                            <label class="form-check-label" for="upi">
                                UPI
                            </label>
                        </div>
                        <div class="payment-bycard" style="display: none;">
                            <!-- Credit/Debit Card Payment -->
                            <div class="form-group mt-3">
                                <label for="cardNumber">Card Number:</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="expiryDate">Expiry Date:</label>
                                <input type="text" class="form-control" id="expiryDate" name="expiryDate" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" required>
                            </div>
                        </div>
                        <div class="payment-bynetbanking" style="display: none;">
                            <!-- Net Banking Payment -->
                            <div class="form-group">
                                <label for="username">User Name:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="payment-byupi" style="display: none;">
                            <!-- UPI Payment -->
                            <div class="form-group">
                                <label for="upiId">UPI ID:</label>
                                <input type="text" class="form-control" id="upiId" name="upiId" required>
                            </div>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <button class="btn btn-info" style="text-align:right" >Proceed To Pay</button>
        </form>
        <br>
    </div>
    </div>
        <br>
       
	</div>	
    <script>
   
        </script>
	</body>
</html>