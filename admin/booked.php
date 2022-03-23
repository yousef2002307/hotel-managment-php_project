<?php
ob_start();
session_start();


if(isset($_SESSION['user'])){
    include "init.php";
 
  
?>
<div class='col-md-9'>
<div class='catagory-check'>
<span>show enteries</span>
<div class='row'>
<div class='col-md-4'>
<select name = 'filter' class='entery2'>
<option>3</option>
<option>5</option>
<option>10</option>
<option>15</option>
<option>20</option>
<option>60</option>
<option>100</option>
</select>
</div>

</div>
<div class='catagory-check'>

<table class="table check-table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Room</th>
      <th scope="col" class='cat'>name</th>
      <th scope="col">refernece</th>
      <th scope="col">status</th>
      
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody class='tbody'>
    <?php
  $stmt = $db->prepare("SELECT room_categories.*,rooms.*,checked.* FROM rooms INNER JOIN room_categories ON room_categories.id = rooms.category_id INNER JOIN checked ON rooms.id =checked.room_id WHERE DATEDIFF(now(),checked.date_out) < 0 LIMIT 3");

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
 echo $value['ref_no'];
        echo "</td>";
        echo "<td>";
        echo "booked";
               echo "</td>";

    echo "<td>" . "<button class='btn btn-primary pop2'> view </button>";
  echo "</td>";
    echo"</tr>";
  }

?>
  </tbody>
</table>
</div>
</div>
</div>
</div>






</section>



<aside class='aside'>
<div>
<h2> check-out</h2>
<article>




l;flkf;l

</article>

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