<?php
ob_start();
session_start();


if(isset($_SESSION['user'])){
    include "init.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add'])){
      $name = $_POST['catagory'];
      $price = $_POST['price'];
      $stmt3 = $db->prepare("SELECT * FROM `room_categories` WHERE name = ?");
      $stmt3->execute(array($name));
      $count = $stmt3->rowCount();
      if($count == 1){
        echo "<div class='red'>name already excist, try again</div>";
      }else{
     $stmt2 = $db->prepare("INSERT INTO `room_categories` ( `name`, `price`) VALUES(:zname,:zprice)");
     $stmt2->execute(array(
       "zname" => $name,
       "zprice" => $price
     ));
   echo "<div class='green'>data successfully added</div>";
    }
  }elseif(isset($_POST['edit'])){
    $name = $_POST['catagory'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $stmt3 = $db->prepare("SELECT * FROM `room_categories` WHERE name = ? AND $id != ?");
    $stmt3->execute(array($name,$id));
    $count = $stmt3->rowCount();
    if($count == 1){
      echo "<div class='red'>name already excist, try again</div>";
    }else{
   $stmt2 = $db->prepare("UPDATE `room_categories` SET `name` = ?, `price` = ? WHERE `room_categories`.`id` = ?");
   $stmt2->execute(array($name,$price,$id));
 echo "<div class='green'>data successfully edited</div>";
  }
  }
    }


    /////////////////////
    $do = '';
    if(isset($_GET['do'])){
      $do = $_GET['do'];
    }else{
      $do = 'manage';
    }
    if($do == 'manage'){
    ?>

    
<div class='col-md-9'>

<div class='row'>
<div class='col-md-4'>
<div class="card" style="width: 18rem;">
  <div class="card-header">
   add new catagory
  </div>
  <form method='POST' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
 <label> catagory </label>
 <input type='text' name='catagory' class='form-control name' required/>
 <label> price </label>
 <input type='number' name='price' class='form-control price' required/>
 <input type='hidden' name='id' class='form-control hidden' />
 <hr class='custom-hr'/>
 <input type ='submit' name='add' class='btn btn-primary add' value='save' />
 <input type ='submit' name='edit' class='btn btn-success edit d-none' value='edit' />
</form>
<button class='btn btn-white'>cancel</button>
</div>
</div>
<div class='col-md-8'>
  <div class='tables'>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Room</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
  $stmt = $db->prepare("SELECT * FROM `room_categories`");
  $stmt->execute();
  $rows = $stmt->fetchAll();
  foreach ($rows as  $value) {
    echo "<tr>";
    echo "<th scope='row'>" . $value['id'] . "</th>";
    echo "<td>" . " name : " . "<span>" .$value['name']   ."</span>". "<br/>" . " price : " .  "<span>" . $value['price'] ."</span>". "</td>";
    echo "<td>". "<a href='#' class ='btn btn-primary mr-2 edit-btn'> edit </a>" . "<a href='catagories.php?do=delete&id=". $value['id'] ."' class ='btn btn-danger delete'> delete </a>" . "</td>";
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
<!-- -->
</div>
</div>


</div>






</section>
<?php
}elseif($do == 'delete'){
$id2 = $_GET['id'];
$stmt55 = $db->prepare("DELETE  FROM `room_categories` WHERE id = ?");
$stmt55->execute(array($id2));

header("Location:catagories.php");

}
}else{
    echo "you not aurhorized to be here";
}















?>
<?php
ob_end_flush();
include "includes/templates/footer.php";







?>