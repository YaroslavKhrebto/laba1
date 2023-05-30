<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Выберите дату (доход с проката):</h1>
	<form method="post" action = "query1.php">
		<label for="date">Дата:</label>
		<input type="date" name="date" id="date" required>
		<button type="submit">Отправить</button>
	</form>

    <h1>Выберите производителя</h1>  

    <form method="POST" action="query2.php">
    <label for="vendor">Выберите производителя:</label>
    <select name="vendor" id="vendor">
        <?php
		$conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');
        $query = "SELECT * FROM vendors";
        $result = $conn->query($query);

        foreach($result as $row) {
            echo "<option value=\"" . $row["ID_Vendors"] . "\">" . $row["Name"] . "</option>";
        }

        ?>
    </select>
    <br>
    <button type="submit">Отправить</button>
    <h1>Выберите дату (свободные авто)</h1>
    <form method="POST" action="query3.php">
        <label for="date">Выберите дату:</label>
        <input type="date" name="date" id="date">
        <button type="submit">Проверить доступность</button>
    </form>
</form>
</body>
</html>