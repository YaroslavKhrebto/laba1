<?php

  $conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');
  $vendor_id = $_POST["vendor"];
  $query = "SELECT * FROM cars WHERE FID_Vendors = :vendor_id";
  $stmt = $conn->prepare($query);
  $stmt->bindValue(':vendor_id', $vendor_id);
  $stmt->execute();

  echo "<table>";
  echo "<tr><th>ID_Cars</th><th>Name</th><th>Release_date</th><th>Race</th><th>State(new,old)</th><th>FID_Vendors</th><th>Price</th></tr>";
  foreach($stmt as $row) {
    echo "<tr><td>" . $row["ID_Cars"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Release_date"] . "</td><td>" . $row["Race"] . "</td><td>" . $row["State(new,old)"] . "</td><td>" . $row["FID_Vendors"] . "</td><td>" . $row["Price"] . "</td></tr>";
  }
  echo "</table>";
  
?>