<?php 
session_start();


if(empty($_SESSION['nome'] && !empty($_SESSION['email']))){
  header("location:/view/login.html");
}else{
  // session_destroy();
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entretenimentosss</title>
</head>
<body>
  <p>hey</p>
</body>
</html>
 <?php }?>