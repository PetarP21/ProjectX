<html>
<title>Справка 4</title>
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
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Назад</a>
  </div>
</div>
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Закупени стоки от клиент, подредени по вид и дата</h1>
</header>
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
  <h5 class="w3-padding-32 w3-center"><form action="#" method="POST">
        Име на клиент: <input type="text" name="name"><br>
        <input type="submit" value="Въведи" name="submit">
    </form></h5>
    <p class="w3-text-grey"><?php
    error_reporting(0);
        $host = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "music_shop";
        $conn = new mysqli($host, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) die("Неуспешна връзка: " . $conn->connect_error);
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
        }
        $sql = "SELECT KLIENT.IME_K,PRODAJBI.DATA_P,vid_st,godina_st,IZPALNITEL.IZPALNITEL,JANR.JANR,MUZIKALNA_KOMPANIYA.MUZIKALNA_KOMPANIYA from stoki 
        join IZPALNITEL on stoki.izpalnitel_id=IZPALNITEL.IZPALNITEL_ID
        join JANR on stoki.janr_id=Janr.janr_id 
        join MUZIKALNA_KOMPANIYA on STOKI.MUZIKALNA_KOMPANIYA_ID=MUZIKALNA_KOMPANIYA.MUZIKALNA_KOMPANIYA_ID
        join BROI_STOKI on stoki.STOKA_ID=BROI_STOKI.STOKA_ID
        join PRODAJBI on BROI_STOKI.PRODAJBA_ID=PRODAJBI.PRODAJBA_ID
        join SLUJITEL on PRODAJBI.SLUJITEL_ID=SLUJITEL.SLUJITEL_ID
        join KLIENT on PRODAJBI.CLIENT_ID=KLIENT.CLIENT_ID
        where KLIENT.IME_K='$name' order by stoki.VID_ST,PRODAJBI.DATA_P;
        ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table style='width:100%' border=1>
        <tr>
            <th class='w3-container w3-red w3-center'>Име на клиент</th>
            <th class='w3-container w3-red w3-center'>Дата</th> 
            <th class='w3-container w3-red w3-center'>Вид</th> 
            <th class='w3-container w3-red w3-center'>Година</th> 
            <th class='w3-container w3-red w3-center'>Изпълнител</th> 
            <th class='w3-container w3-red w3-center'>Жанр</th> 
            <th class='w3-container w3-red w3-center'>Музикална компания</th> 
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><th>" . $row["IME_K"] . "</th><th>" . $row["DATA_P"] . "</th><th>" . $row["vid_st"] . "</th><th>" . $row["godina_st"] ."</th><th>" . $row["IZPALNITEL"] ."</th><th>" . $row["JANR"] ."</th><th>" . $row["MUZIKALNA_KOMPANIYA"] ."</th></tr>";
        } 
    }
    $conn->close();
    ?></p>
    </div>
</div>
</body>
</html>