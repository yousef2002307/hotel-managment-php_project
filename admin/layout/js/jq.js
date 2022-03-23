$(document).ready(function(){

  $(".dashboard .card  button").click(function(e){
    $(".dashboard .card  form").children(":not([type='submit'])").val("")
  });
  $(".green").fadeOut(7000);
  $(".red").fadeOut(7000);
 setInterval(function(){
$(".green").remove();
$(".red").remove();
 },9000);
$(".edit-btn").click(function (e) { 
  e.preventDefault();
  if(window.location.href.indexOf("catagorie") > -1){
 $(".name").val($(this).parents("td").prev("td").find("span:first-of-type").text());
 $(".price").val(parseInt($(this).parents("td").prev("td").find("span:last-of-type").text()));
 $(".hidden").val($(this).parents("td").prevAll("th").text())
  $(".edit").removeClass("d-none");
  }else if(window.location.href.indexOf("rooms") > -1){
    $(".hidden").val($(this).parents("td").prevAll("th").text())
    $(".name").val($(this).parents("td").prevAll("td:eq(2)").text());
    $(".edit").removeClass("d-none");
  
    
    if($(".opt2").text() == $(this).parents("td").prev().find("span").text()){
    $(".opt2").attr("selected","selected");
    }else{
      $(".opt1").attr("selected","selected");
    }
    let cat = ($(this).parents("td").prevAll("td:eq(1)").text().trim());
   
    ///////////////////////////////////////////////
    $(".select1 option").each(function(){
   
    // console.log($(this).text().trim());
     if($(this).text().trim() == cat){
      $(this).attr("selected","selected");
     }
    })
  }
  
});

$(".delete").click(function (e) { 
 // e.preventDefault();

return confirm("are you sure sir");
 /*
if($x == true){
 
  let id = $(this).parents("td").prevAll("th").text();
location.href = `catagories.php?do=delete&id=${id}`;

}else{
  console.log("adjkjks ")
}
  */
});
///////////ajax
$(".check-select").change(function (e) { 
let value = this.value;
  $(".check-table tbody").load("filter.php",{id:value})
  
});
$(".search").keydown(function (e) { 
  let value = this.value;
    $(".check-table tbody").load("search.php",{id:value})
    
  });
  







$("body").on("click",".pop2",function(){
 
// $(this).parents("td").siblings("th").textContext;
  $(".hidden9").val($(this).parents("td").siblings("th").text())
$(".aside").fadeIn(1000);
});


$(".aside button").click(function(){
  $(".aside").fadeOut(1000);
  });
  
  $(".aside").click(function(){
    $(".aside").fadeOut(1000);
    });
    $(".aside > div").click(function(e){
      e.stopPropagation();
      });
///change on select for enteryes
$(".entery").change(function () { 
   console.log("hello")
   let val = "WHERE DATEDIFF(now(),checked.date_out) >= 0";
  let value = this.value;
    $(".check-table tbody").load("enteries.php",{id:value,stat:val})
    
  });
  $(".entery2").change(function () { 
    console.log("hello")
    let val = "WHERE DATEDIFF(now(),checked.date_out) < 0";
   let value = this.value;
     $(".check-table tbody").load("enteries.php",{id:value,stat:val})
     
   });

  $("body").on("click",".tbody .pop2",function(){
let value = $(this).parents("td").siblings("th").text();
$(".aside article").load("loadpop.php",{id:value})
    });
    

$(".ref").keyup(function(){
  let value = this.value;
  $(".check-table tbody").load("search2.php",{id:value})
  
});














    });
    