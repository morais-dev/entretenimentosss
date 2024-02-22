<?php 
session_start();

include_once 'funcoes.php';
include_once 'conexao.php';

$email = $_POST['email'];

$senha_hash = select_sql($conn,"usuarios","senha"," email = '$email'");

$senha_string = implode('',$senha_hash);

$senha = password_verify($_POST['senha'],$senha_string);


if($senha == true){
  
  $select_email = select_sql($conn,"usuarios","email","email = '$email'");
  $_SESSION['nome'] = $select_email['nome'];
  $_SESSION['email'] =  $select_email['email'];
  header('location:../index.php');
  
}else{
  echo "dados incorretos!<br><a href='index.html'>Retornar a tela de Login</a>";
}


?>