<?php 
session_start();

include_once 'funcoes.php';
include_once 'conexao.php';

$email = $_POST['email'];

//select do banco no hash da senha
$senha_hash = select_sql($conn,"usuarios","senha"," email = '$email'");
//transformando o hash em string
$senha_string = implode('',$senha_hash);
//verificando se o hash bate com a senha
$senha = password_verify($_POST['senha'],$senha_string);


if($senha == true){
  
  $select_email = select_sql($conn,"usuarios","email,nome","email = '$email'");
  $_SESSION['nome'] = $select_email['nome'];
  $_SESSION['email'] =  $select_email['email']; 
  header('location:../index.php');
  
}else{
  session_unset();
  echo "dados incorretos!<br><a href='../index.php'>Retornar a tela de Login</a>";
}


?>