<?php

include "dbconfig.php";
session_start();
$pid =$_SESSION['p'];

$sqlquery= "SELECT * FROM comment where id='$pid' ORDER BY cid DESC";
$run = $conn->prepare($sqlquery);
                    $run->execute();

while ($row = $run->fetch(PDO::FETCH_ASSOC)){
echo "<div class='comments_content'>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}


?>