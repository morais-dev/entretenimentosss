<?php 
include_once 'funcoes.php';
include 'conexao.php';

$select = $conn->prepare("SELECT
      L.nome as `L.nome`,
      L.faixa_etaria as `L.faixa_etaria`,
      L.duracao as `L.duracao`,
      L.diretor as `L.diretor`,
      L.lancamento as `L.lancamento`,
      TE.nome as `tipo`,
      TE.descricao as `TE.descricao`,
      C.nome as `categoria`,
      A.avaliacao as `A.avaliacao`,
      A.comentario as `A.comentario`,
      A.data_avaliacao as `A.data_avaliacao`,
      A.nome as `A.nome`,
      A.email as `A.email`
      FROM listagem as L 
      INNER JOIN tipos_entretenimento as TE ON L.id_tipo = TE.id 
      INNER JOIN categorias as C ON L.id_categoria = C.id 
      INNER JOIN avaliacoes as A ON L.id = A.id_listagem 
      WHERE L.id = ?");



$oto_select->execute();

$result = $oto_select->fetch(PDO::FETCH_ASSOC);

// print_r($result);

echo "<pre>";
var_dump($result);
echo "</pre>";


?>