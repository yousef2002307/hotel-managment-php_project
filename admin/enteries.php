<?php
include "config.php";
$value = $_POST['id'];
$statment = $_POST['stat'];
$stmt = $db->prepare("SELECT room_categories.*,rooms.*,checked.* FROM rooms INNER JOIN room_categories ON room_categories.id = rooms.category_id INNER JOIN checked ON rooms.id =checked.room_id $statment LIMIT $value");

  $stmt->execute();
  $rows = $stmt->fetchAll();
  foreach ($rows as  $value) {
    echo "<tr>";
    echo "<th scope='row'>" . $value['id'] . "</th>";
    echo "<td>" .  $value['room']  . "</td>";
    echo "<td>" ;
    
    echo $value['name'];
    
    echo "</td>";
    echo "<td>";
 echo $value['ref_no'];
        echo "</td>";
        echo "<td>";
        echo "checked-out";
               echo "</td>";


        echo "<td>" . "<button class='btn btn-primary pop2'> view </button>";
        echo "</td>";
  
    echo"</tr>";
  }



?>