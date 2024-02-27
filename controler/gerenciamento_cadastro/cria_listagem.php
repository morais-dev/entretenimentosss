<div>
  <form action="">
    <input type="text">
    <input type="text">
  </form>
</div>


<?php 
include_once '../conexao.php';
include_once '../funcoes.php';
insert_sql($conn,'listagem',$dados);
?>