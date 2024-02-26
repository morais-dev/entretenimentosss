<?php 
require_once './controler/conexao.php';
require_once './controler/funcoes.php';

switch($link){
  case 1 :
    include_once 'listar.php';
  break;
  case 2 : 
    include_once 'editar.php';

}

?>