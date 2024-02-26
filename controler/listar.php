<?php 
require_once './controler/conexao.php';
require_once './controler/funcoes.php';

$sql = "SELECT 
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

$select = $conn->prepare($sql);
$select->execute();
$result->fetchAll(PDO::FETCH_ASSOC);

echo "Nome: {$result[0]['nome']}<br>
Faixa etária: {$result[0]['faixa_etaria']}<br>
Duração: {$result[0]['duracao']}<br>
Diretor: {$result[0]['diretor']}<br>
Lançamento: {$result[0]['lancamento']}<br>
Tipo: {$result[0]['tipo']}<br>
Categoria: {$result[0]['categoria']}<br>
<a href=\"./executa_edit.php?id={$result[0]['id']}\">Editar</a>
";


?>