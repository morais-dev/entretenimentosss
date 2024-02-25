<?php 
session_start();

//se a sessão for vazia, irá direcionar pro login
if(empty($_SESSION['nome']) && empty($_SESSION['email'])){
  header("location:/view/login.html");
}else{
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
<header>
  <div>Olá <?= $nome?></div>
</header>
<body>
  <div><a href="./controler/cadastros.php">Área de cadastro</a></div>
</body>
<footer>

</footer>
</html>
 <?php }?>