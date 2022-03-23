<?php
session_start();
if(isset($_SESSION['user'])){
   header("Location:dashboard.php");
}
$nonavbar = 1;
include "init.php";

$bool = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $arrerrors =array();
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if($user == ''){
        array_push($arrerrors ,"you can not leave username field is empty");
    }
     if($pass ==''){
        array_push($arrerrors ,"you can not leave password field is empty");
    }
     if($user !== "yousef"){
        array_push($arrerrors ,"you enter wrong user");
    }
     if($pass != "2002"){
        array_push($arrerrors ,"you enter wrong pass");
    }
    if(count($arrerrors) > 0){
        foreach($arrerrors as $error){
            echo  $error  ;
        }
    }else{
            $_SESSION['user'] = $user;
            header("Location:dashboard.php");
        }
    }

?>
<section>
<div class="row">
<div class="col-md-7">


</div>

<div class="col-md-5">

<form action="<?php echo $_SERVER['PHP_SELF']  ?>" method = 'POST'>
    <label for="text"> Username </label>
<input type="text" id="text" class='form-control' name='user' />
<label for="pass"> Password </label>
<input type="password" id="pass" class='form-control' name='pass'  auto-complete='off' />
<div class='form-group'>
<input type="submit" value='login'  class='btn btn-primary' />
</div>
</form>
<?php

?>
</div>

</div>
</section>
<?php
include "includes/templates/footer.php";







?>