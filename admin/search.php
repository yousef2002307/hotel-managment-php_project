<?php
include "config.php";
$value = "%". $_POST['id']. "%";
echo $value;
$stmt = $db->prepare("SELECT room_categories.*,rooms.* FROM room_categories INNER JOIN rooms ON rooms.category_id = room_categories.id WHERE rooms.room LIKE ? OR room_categories.name LIKE ?");
$stmt->execute(array($value,$value));

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
    if($value['status'] == 1){
        echo "<span class='spanone badge badge-primary'>available</span>";
        echo "</td>";
        echo "<td>". "<button class ='btn btn-primary mr-2 edit-btn pop2'> check-in </button>" ."</td>"; 
    }else{
        echo "<span class='spantwo badge badge-danger'>unavailable</span>";
        echo "</td>";

    }
  
    echo"</tr>";
  }
}else{
    echo "there is no elements by this name";
}


?>