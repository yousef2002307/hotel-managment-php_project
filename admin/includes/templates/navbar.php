<?php
 include "config.php";
$stmt = $db->prepare("SELECT * FROM `system_settings`");
$stmt->execute();
$row = $stmt->fetch();

?>
<nav>
<div class='d-flex'>
<h2><?php echo $row['hotel_name'];  ?></h2>


<h6><a href='logout.php'>log out</a></h6>


</div>

</nav>
<section class='dashboard'>
<div class='row'>
<div class='col-md-3'>
<div class='menu'>
<ul class='list-unstyled'>
<li> <a href='dashboard.php'> Home</a></li>
<li> <a href='catagories.php'> catagories</a></li>
<li> <a href='rooms.php'> rooms</a></li>
<li> <a href='checkin.php'> check-in</a></li>
<li> <a href='checkout.php'>  check-out</a></li>
<li> <a href='booked.php'> booked</a></li>
<li> <a href='site.php'> site setting</a></li>
</ul>

</div>
</div>
