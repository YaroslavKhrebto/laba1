<?php
		$pdo = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');

		
		$date = $_POST['date'];
		$query = "SELECT SUM(Cost) AS total_income FROM rent WHERE Date_start <= :date AND Date_end >= :date";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':date', $date);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		echo "<p>Доход на дату $date: " . $result['total_income'] . " грн.</p>";
		
	?>