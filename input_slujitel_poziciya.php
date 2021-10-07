<html>
<title>Въвеждане</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-family: "Montserrat", sans-serif;

}
th, td {
  padding: 5px;
  text-align: left;
}
form{    font-family: "Montserrat", sans-serif;
}
</style>
<body>
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="input_janr.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Жанр</a>
    <a href="input_izpalnitel.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Изпълнител</a>
    <a href="input_klient.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Клиент</a>
    <a href="input_slujitel_poziciya.php" class="w3-bar-item w3-button w3-padding-large w3-white">Позиция</a>
    <a href="input_slujitel.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Служител</a>
    <a href="input_musicco.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Музикална компания</a>
    <a href="input_stoki.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Стоки</a>
    <a href="input_prodajbi.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Продажби</a>
    <a href="input_broi_stoki.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Брой стоки</a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Назад</a>
  </div>
</div>
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Въвеждане на:</h1>
</header>
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
      <h1></h1>
      <h5 class="w3-padding-32 w3-center"><form action="#" method="POST">
        Позиция: <input type="text" name="poziciya"><br>
        <input type="submit" value="Въведи" name="submit">
    </form></h5>
      <p class="w3-text-grey"><?php
        $host = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "music_shop";
        $conn = new mysqli($host, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) die("Неуспешна връзка: " . $conn->connect_error);
        if (isset($_POST["submit"])) {
            $poziciya = $_POST["poziciya"];
            $sql = "INSERT INTO Slujitel_poziciya(Poziciya) VALUES('$poziciya')";
            if ($conn->query($sql) === TRUE) {
                echo "Успешно добавен запис.";
            } else {
                echo "Грешка: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql = "SELECT * FROM Slujitel_poziciya";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table style='width:100%' border=1>
        <tr>
            <th class='w3-container w3-red w3-center'>ID</th>
            <th class='w3-container w3-red w3-center'>Позиция</th> 
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><th>" . $row["Poziciya_id"] . "</th><th>" . $row["Poziciya"] . "</th></tr>";
        }
    }
    $conn->close();
    ?></p>
    </div>
</div>
</body>
</html>



