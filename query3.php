<?php


    $conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');

  $date = $_POST["date"];

  $stmt = $conn->prepare("SELECT cars.Name, vendors.Name AS Vendor, cars.Price FROM cars 
                          LEFT JOIN vendors ON cars.FID_Vendors = vendors.ID_Vendors 
                          WHERE cars.ID_Cars NOT IN (SELECT FID_Car FROM rent 
                          WHERE Date_start <= ? AND Date_end >= ?)");
  $stmt->bind_param("ss", $date, $date);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<h2>Список свободных автомобилей на $date:</h2>";
    echo "<table><tr><th>Модель</th><th>Производитель</th><th>Цена за сутки</th></tr>";
    while($row = $stmt->fetch_assoc()) {
      echo "<tr><td>".$row["Name"]."</td><td>".$row["Vendor"]."</td><td>".$row["Price"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "<h2>На выбранную дату все автомобили заняты</h2>";
  }



?>