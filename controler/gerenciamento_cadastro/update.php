<?php 
include_once '../conexao.php';
include_once '../funcoes.php';

$SQL_select = "SELECT 
  L.id,
  L.nome as `Nome`,
  L.faixa_etaria as `Faixa etária`,
  L.duracao as `Duração`,
  L.diretor as `Diretor`,
  L.lancamento as `Lançamento`,
  TE.tipo as `Tipo`,
  C.categoria as `Categoria` 
  FROM listagem as L 
  INNER JOIN tipos_entretenimento as TE 
  ON L.id_tipo = TE.id 
  INNER JOIN categorias as C 
  ON L.id_categoria = C.id
  WHERE L.id = {$_GET['id']}"
;

$select = $conn->prepare($SQL_select);
$select->execute();
$result = $select->fetch(PDO::FETCH_ASSOC);
?>

<div>
  <form action="./executa_update.php?" method="get">
    <input type="hidden" name="id" value="<?=$result['id']?>">
    <?php
      foreach($result as $coluna => $valor){
        if($coluna == 'id'){
          continue;
        }else{
          $i = '0';
          echo "<label for='{$coluna}'><b>{$coluna}</b>:</label>
          <input id='{$i}' type='text' name='{$coluna}' placeholder='{$valor}'><br>";
          $i++;
        }
      }
      ?>
    <input type="submit" value="Editar">
  </form>
</div>