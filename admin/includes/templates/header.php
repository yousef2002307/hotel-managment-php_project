<!DOCTYPE html>
<html>
<head>
  <?php
 include "config.php";
$stmt = $db->prepare("SELECT * FROM `system_settings`");
$stmt->execute();
$row = $stmt->fetch();

?>
<title><?php echo $row['hotel_name'];  ?></title>
<meta charset='UTF-8' />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="layout/css/tagify.css" rel="stylesheet">

  <link rel="stylesheet" href="layout/css/style.css" type='text/css'/>
  
</head>
<body>

