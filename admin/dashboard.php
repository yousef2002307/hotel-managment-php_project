<?php
ob_start();
session_start();

if(isset($_SESSION['user'])){
    include "init.php";
}else{
    echo "you not aurhorized to be here";
}















?>
<?php
ob_end_flush();
include "includes/templates/footer.php";







?>