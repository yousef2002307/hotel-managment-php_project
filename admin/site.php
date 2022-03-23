<?php
ob_start();
session_start();


if(isset($_SESSION['user'])){
    include "init.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $about = $_POST['about'];
       $stmt2 = $db->prepare("UPDATE `system_settings` SET `hotel_name` = ?, `about_content` = ?, email = ?, contact = ?");
       $stmt2->execute(array($name,$about,$email,$contact));
       echo "<div class='green'>data successfully edited</div>";

    }
    
  
    $stmt = $db->prepare("SELECT * FROM `system_settings`");
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <div class='col-md-9'>

<div class='site-setting'>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method ='POST' class='siteform'>
<label> Hotel Name </label>
<input type='text' name='name' class='form-control mb-3' value = "<?php echo $row['hotel_name'];  ?> " required/>
<label> email </label>
<div class='form-group'>
<input type='text' name='email' class='form-control mb-3 email' value = "<?php echo $row['email'];  ?> " required/>
<div class="invalid-feedback">
       invalid email please try agian
      </div>
</div>
<label> contact </label>
<div class='form-group'>
<input id="validationCustom01" type='text' name='contact' class='form-control mb-3 contact' value = "<?php echo $row['contact'];  ?> " required/>
<div class="invalid-feedback">
       invalid contact number
      </div>
</div>
<label> about text </label>
<textarea  name='about'  class='form-control mb-3'  required>  <?php echo $row['about_content'];  ?>  </textarea>
<div class='sub-btn'>
<input type='submit'  class='btn btn-primary mb-3' value = "save"/>
</div>
</form>
</div>
</div>
</div>
</section>


<?php


}else{
    echo "you not aurhorized to be here";
}
?>
<?php

include "includes/templates/footer.php";


ob_end_flush();




?>