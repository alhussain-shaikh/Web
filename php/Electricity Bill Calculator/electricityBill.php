<?php
// Function to calculate the electricity charges for each category
function calculateElectricityCharges($units) {
    $firstUnits = 50;
    $next100Units = 100;
    $next250Units = 250;
  
    $rateFirstUnits = 3.5;
    $rateNext100Units = 4;
    $rateNext250Units = 5.2;
    $rateAbove250Units = 6.5;
  
    $charges = array(
      "firstUnits" => 0,
      "next100Units" => 0,
      "next250Units" => 0,
      "above250Units" => 0
    );
  
    if ($units <= $firstUnits) {
      $charges["firstUnits"] = $units * $rateFirstUnits;
    } elseif ($units > $firstUnits && $units <= ($firstUnits + $next100Units)) {
      $charges["firstUnits"] = $firstUnits * $rateFirstUnits;
      $charges["next100Units"] = ($units - $firstUnits) * $rateNext100Units;
    } elseif ($units > ($firstUnits + $next100Units) && $units <= ($firstUnits + $next100Units + $next250Units)) {
      $charges["firstUnits"] = $firstUnits * $rateFirstUnits;
      $charges["next100Units"] = $next100Units * $rateNext100Units;
      $charges["next250Units"] = ($units - $firstUnits - $next100Units) * $rateNext250Units;
    } else {
      $charges["firstUnits"] = $firstUnits * $rateFirstUnits;
      $charges["next100Units"] = $next100Units * $rateNext100Units;
      $charges["next250Units"] = $next250Units * $rateNext250Units;
      $charges["above250Units"] = ($units - $firstUnits - $next100Units - $next250Units) * $rateAbove250Units;
    }
  
    return $charges;
  }
  
  if (isset($_GET["units"])) {
    $units = filter_input(INPUT_GET, "units", FILTER_VALIDATE_FLOAT);
  
    if ($units === false || $units === null || $units <= 0) {
      echo "<div class='text-danger'>Please enter a valid positive decimal value for electricity units.</div>";
    } else {
      $name = isset($_GET["name"]) ? $_GET["name"] : "";
      $address = isset($_GET["address"]) ? $_GET["address"] : "";
      $date = isset($_GET["date"]) ? $_GET["date"] : "";
      $payment = isset($_GET["payment"]) ? $_GET["payment"] : "";
  
      // Calculate the charges
      $charges = calculateElectricityCharges($units);
  
      // Calculate the total amount
      $totalAmount = array_sum($charges);
  
      // Display the bill in a tabular format
      echo "<div class='alert alert-success'>";
      echo "<h3>Electricity Bill</h3>";
      echo "<table class='table'>";
      echo "<tr><td><strong>Name:</strong></td><td>" . htmlspecialchars($name) . "</td></tr>";
      echo "<tr><td><strong>Address:</strong></td><td>" . htmlspecialchars($address) . "</td></tr>";
      echo "<tr><td><strong>Date:</strong></td><td>" . htmlspecialchars($date) . "</td></tr>";
      echo "<tr><td><strong>Electricity Units:</strong></td><td>" . $units . " units</td></tr>";
      echo "<tr><td><strong>First 50 units:</strong></td><td>Rs. " . $charges["firstUnits"] . "</td></tr>";
      echo "<tr><td><strong>Next 100 units:</strong></td><td>Rs. " . $charges["next100Units"] . "</td></tr>";
      echo "<tr><td><strong>Next 250 units:</strong></td><td>Rs. " . $charges["next250Units"] . "</td></tr>";
      echo "<tr><td><strong>Above 250 units:</strong></td><td>Rs. " . $charges["above250Units"] . "</td></tr>";
      echo "<tr><td><strong>Total Amount:</strong></td><td>Rs. " . $totalAmount . "</td></tr>";
      echo "<tr><td><strong>Payment Option:</strong></td><td>" . htmlspecialchars($payment) . "</td></tr>";
      echo "</table>";
      echo "</div>";
    }
  }
  ?>
  