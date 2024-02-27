<?php 
include_once '../conexao.php';
include_once '../funcoes.php';

$id = array_shift($_GET);

$SQL_update = "UPDATE FROM 'listagem'SET
  ";

  update_SQL("echo",'listagem',$_GET,$id);
  // header("location:./update.php?id=$id");

?>