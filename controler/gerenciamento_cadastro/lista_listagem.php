<?php 
// session_start();
include_once '../conexao.php';
include_once '../funcoes.php';
//Área do select
// $SQL_select = "SELECT 
//   L.id,
//   L.nome as `Nome`,
//   L.faixa_etaria as `Faixa etária`,
//   L.duracao as `Duração`,
//   L.diretor as `Diretor`,
//   L.lancamento as `Lançamento`,
//   TE.tipo as `Tipo`,
//   C.categoria as `Categoria` 
//   FROM listagem as L 
//   INNER JOIN tipos_entretenimento as TE 
//   ON L.id_tipo = TE.id 
//   INNER JOIN categorias as C 
//   ON L.id_categoria = C.id"
// ;

$SQL_select = "SELECT 
  L.id,
  L.nome,
  L.faixa_etaria,
  L.duracao,
  L.diretor,
  L.lancamento,
  TE.tipo,
  C.categoria 
  FROM listagem as L 
  INNER JOIN tipos_entretenimento as TE 
  ON L.id_tipo = TE.id 
  INNER JOIN categorias as C 
  ON L.id_categoria = C.id"
;

$select_colunas = $conn->prepare($SQL_select);
$select_colunas->execute();
$result_select = $select_colunas->fetchAll(PDO::FETCH_ASSOC);
$colunas = array_keys($result_select[0]);

foreach($result_select as $registros){

  foreach($registros as $coluna => $valor){
    if($coluna == "id"){
      continue;
    }else{
    echo "<strong>$coluna:</strong> $valor //";}
  }
  echo "<a href=\"./update.php?id={$registros['id']}\">Editar</a>";
  echo "<hr>";
};
?>