<?php
include "config.php";
if($_POST['id'] == ""){
    $stmt = $db->prepare("SELECT room_categories.*,rooms.* FROM room_categories INNER JOIN rooms ON room_categories.id = rooms.category_id");
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
        if($value['status'] == 1){
            echo "<span class='spanone badge badge-primary'>available</span>";
            echo "</td>";
            echo "<td>". "<a href='#' class ='btn btn-primary mr-2 edit-btn pop2'> check-in </a>"; 
        }else{
            echo "<span class='spantwo badge badge-danger'>unavailable</span>";
            echo "</td>";
    
        }
      
        echo"</tr>";
      }
}else{
    $id = $_POST['id'];
    $stmt = $db->prepare("SELECT room_categories.*,rooms.* FROM room_categories INNER JOIN rooms ON room_categories.id = rooms.category_id WHERE room_categories.id = ? ");
    $stmt->execute(array($id));
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
        echo "<p class='text-center'>sorry there is rooms in this catagory</p> ";
    }
}
?>