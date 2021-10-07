<?php
$sql = 'CREATE Database music_shop';
if ($queryResource=mysqli_query($dbConn,$sql))
{
echo "Базата данни е създадена. <br>";
}
else
{
echo "Грешка при създаване на базата данни:<br> ";
}
?>