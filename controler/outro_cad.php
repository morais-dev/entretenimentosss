<?php 
// session_start();
include_once 'conexao.php';
include_once 'funcoes.php';
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


// echo "<pre>";
// print_r($result_select);
// echo "</pre><br>";

echo "<pre>";
print_r($result_select[0]);
echo "</pre><br>";


echo "Nome: {$result_select[0]['nome']}<br>
Faixa etária: {$result_select[0]['faixa_etaria']}<br>
Duração: {$result_select[0]['duracao']}<br>
Diretor: {$result_select[0]['diretor']}<br>
Lançamento: {$result_select[0]['lancamento']}<br>
Tipo: {$result_select[0]['tipo']}<br>
Categoria: {$result_select[0]['categoria']}<br>
<a href=\"./executa_edit.php?id={$result_select[0]['id']}\">Editar</a>
";

// foreach($result_select as $registros){

//   foreach($registros as $coluna => $valor){
//     echo "<strong>$coluna:</strong> $valor //";
//   }   
//   echo "<hr>";
// };



// foreach($result_select as $chave){
//   echo "<hr>";
//   foreach($chave as $valores => $vv){
//     echo "$vv <br>";
//   }
// }

?>