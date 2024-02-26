<?php 
session_start();
include_once 'conexao.php';
include_once 'funcoes.php';
//Área do select
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
  ON L.id_categoria = C.id"
;
// $SQL_select = "SELECT 
//   L.nome,
//   L.faixa_etaria,
//   L.duracao,
//   L.diretor,
//   L.lancamento,
//   TE.tipo,
//   C.categoria 
//   FROM listagem as L 
//   INNER JOIN tipos_entretenimento as TE 
//   ON L.id_tipo = TE.id 
//   INNER JOIN categorias as C 
//   ON L.id_categoria = C.id"
// ;
$select_colunas = $conn->prepare($SQL_select);
$select_colunas->execute();
$result_select = $select_colunas->fetch(PDO::FETCH_ASSOC);
$colunas = array_keys($result_select);

//Área do update
$sql_update = "UPDATE listagem SET

";

//Área do insert
print_r($colunas);


echo "<pre>";
print_r($result_select);
echo "</pre>";

// $insert = insert_sql($conn,'listagem',$_GET);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área de cadastro</title>
</head>
<body>
  <div>
    <form action="" method="get">
      <?php
      $n = sizeof($colunas);
      for($i = 1; $i < $n ;$i++){
        echo "<label for='{$colunas[$i]}' >{$colunas[$i]}:</label>
        <input type='text' name='{$colunas[$i]}'><br>";}
      ?>
      <input type="submit" value="Enviar">
    </form>
  </div>
</body>
</html>