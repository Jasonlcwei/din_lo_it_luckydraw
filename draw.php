<?php
echo "Accepted Users: <br>";

$con = mysqli_connect("localhost","username","password","urban");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Error: " . mysqli_connect_error();
  }

// Perform queries
$list_contestants = mysqli_query($con, "SELECT id, username FROM luckdraw");
$list_prize = mysqli_query($con, "SELECT prizeid, prizename FROM draw");

//Get contestants name and list out
if (mysqli_num_rows($list_contestants) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($list_contestants)) {
        echo "id: " . $row["id"]. " - username: " . $row["username"]. "<br>";
        $winner_name[] = $row['username'];
    }
} else {
    echo "No contestants!";
}

//Get prize from list and count items (won't poutput)
if (mysqli_num_rows($list_prize) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($list_prize)) {
        $prize[] = $row['prizename'];
    }
} else {
    echo "No prizes!";
}
mysqli_close($con);
$prize_num = count($prize);


echo "<br><br>Lucky Draw Winners...<br>";
//Random by shuffling arrray
$ran = shuffle($winner_name);

for ($i = 0; $i < $prize_num ; $i++){
echo "Winner #" . $i . ":<br>";
echo "<b>" . $winner_name[$i] . "</b><br>";
echo "Prize : " . $prize[$i];
echo "<br><br>";
 }

$date = new DateTime();
echo "Timestamp:" . $date->getTimestamp();


?>
