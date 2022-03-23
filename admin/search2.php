<?php
include "config.php";
$value = "%". $_POST['id']. "%";
echo $value;
$stmt = $db->prepare("SELECT room_categories.name AS cat,room_categories.price,rooms.*,checked.*,DATEDIFF(checked.date_out,checked.date_in) AS datediff FROM rooms INNER JOIN room_categories ON room_categories.id = rooms.category_id INNER JOIN checked ON rooms.id =checked.room_id WHERE checked.ref_no LIKE ?");
$stmt->execute(array($value));

$rows = $stmt->fetchAll();
$count = $stmt->rowCount();
if($count > 0){
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
}else{
    echo "there is no elements by this name";
}


?>