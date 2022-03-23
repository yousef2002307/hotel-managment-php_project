<?php
ob_start();
session_start();


if(isset($_SESSION['user'])){
    include "init.php";
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $name = $_POST['name2'];
     $contact = $_POST['contact2'];
     $date = $_POST['date'];
    $ref = uniqid("");
    $id = $_POST['id'];
     $daysofstay = $_POST['daysofstay'];
     $outofdate = date('Y-m-d',strtotime($date . "+" . $daysofstay . "days"));
    
  $stmt = $db->prepare("INSERT INTO `checked` (`ref_no`, `room_id`, `name`, `contact_no`, `date_in`, `date_out`,`status`) VALUES (:zref,:zid,:zname,:zcontact,:zdatein,:zdateout,1)");
  $stmt->execute(array(
    "zref" => $ref,
    "zid" => $id,
    "zname" => $name,
    "zcontact" => $contact,
    "zdatein" => $date,
    "zdateout" => $outofdate
  ));
 
   }
 
  
?>
<div class='col-md-9'>
<div class='catagory-check'>
<span>catagory</span>
<div class='row'>
<div class='col-md-4'>
<select name = 'filter' class='check-select form-control'>
<option value = "">all </option>
<?php
$stmt = $db->prepare("SELECT * FROM `room_categories`");
$stmt->execute();
$rows = $stmt->fetchAll();
foreach($rows as $row){
echo "<option value = ". $row['id'] .">" . $row['name']. "</option>";
}
?>
</select>
</div>
<div class='col-md-8'>
<button class='btn btn-primary'>filter </button>
</div>
</div>

</div>
<div class='catagory-check'>
<b> search : </b>
<input type='text' name='search' class='search' />
<table class="table check-table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Room</th>
      <th scope="col" class='cat'>catagories</th>
      <th scope="col">avilability</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
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
        echo "<td>". "<button class ='btn btn-primary mr-2 edit-btn pop2'> check-in </button>" ."</td>"; 
    }else{
        echo "<span class='spantwo badge badge-danger'>unavailable</span>";
        echo "</td>";

    }
  
    echo"</tr>";
  }

?>
    <!--
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
   
    </tr>
    <tr>
      <th scope="row">3</th>
   <td>jkljkl</td>
      <td>@twitter</td>
    </tr>
-->
  </tbody>
</table>
</div>
</div>
</div>






</section>
<aside class='aside'>
<div>
<h2> check-in</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
  <label>name</label>
<input type='text' name='name2' class='form-control' />
<label>contact#</label>
<input type='text' name='contact2' class='form-control' />
<label>check-in-date</label>
<input class='form-control' type="datetime-local" id="birthdaytime" name="date">
<label>days of stay</label>
<input type='text' name='daysofstay' class='form-control' />
<input type='hidden' name='id' class='form-control hidden9' />
<input type='submit' name='save' class='btn btn-primary' />

</form>

<button class='btn btn-dark btn-block'>cancel</button>

</div>

</aside>
<?php

}else{
    echo "you not aurhorized to be here";
}















?>
<?php

include "includes/templates/footer.php";


ob_end_flush();




?>