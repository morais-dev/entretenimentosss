<?php 

include_once 'funcoes.php';
include_once 'conexao.php';

$email = $_POST["email"];
$nome = $_POST["nome"];
$senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

$dados = ["nome" => $nome, "email" => $email, "senha" => $senha];

$insert = insert_sql($conn,'usuarios',$dados);

//colocar um rowCount()
?>