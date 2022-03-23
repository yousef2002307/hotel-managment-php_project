<?php
include "config.php";
$value = $_POST['id'];
$value = $_POST['id'];
$stmt = $db->prepare("SELECT room_categories.name AS cat,room_categories.price,rooms.*,checked.*,DATEDIFF(checked.date_out,checked.date_in) AS datediff FROM rooms INNER JOIN room_categories ON room_categories.id = rooms.category_id INNER JOIN checked ON rooms.id =checked.room_id WHERE checked.id = ?");

  $stmt->execute(array($value));
  $rows = $stmt->fetch();
  echo "room : " .$rows['room'] . "<br/>";

  echo "catagory: " .$rows['cat'] . "<br/>";

  echo "price: " .$rows['price'] . "<br/>";
  echo "reference: " .$rows['ref_no'] . "<br/>";
  echo "checked-in: " .$rows['name'] . "<br/>";
  echo "contact: " .$rows['contact_no'] . "<br/>";
  echo "check-in-date: " .$rows['date_in'] . "<br/>";
  echo "check-in-out: " .$rows['date_out'] . "<br/>";
  echo "Days: " .$rows['datediff'] . "<br/>";
  echo "amount: " .$rows['datediff'] * $rows['price']. "$ " . "<br/>";

?>