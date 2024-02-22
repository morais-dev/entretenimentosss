<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entretenimentos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="container-fluid" style="background-color:#003311">
      <p>Entrentenimentosss.com</p>
    </div>
  </header>
  
  <?php 
    session_start();
    include_once 'funcoes.php';
    include 'conexao.php';

    $id = $_GET['id'];
    $select = $conn->prepare(
      "SELECT
      L.nome as `L.nome`,
      L.faixa_etaria as `L.faixa_etaria`,
      L.duracao as `L.duracao`,
      L.diretor as `L.diretor`,
      L.lancamento as `L.lancamento`,
      TE.nome as `tipo`,
      TE.descricao as `TE.descricao`,
      C.nome as `categoria`
      FROM listagem as L 
      INNER JOIN tipos_entretenimento as TE ON L.id_tipo = TE.id 
      INNER JOIN categorias as C ON L.id_categoria = C.id  
      WHERE L.id = ?");
    $select->bindParam(1,$id);
    $select->execute();
    $result = $select->fetch(PDO::FETCH_ASSOC);
      
    $av = $conn->prepare("SELECT * FROM avaliacoes WHERE id_listagem = ?");
    $av->bindParam(1,$id);
    $av->execute();
    $avaliacao = $av->fetchAll(PDO::FETCH_ASSOC);

    $media = $conn->prepare("SELECT AVG(avaliacao) FROM avaliacoes WHERE id_listagem = ?");
    $media->bindParam(1,$id);
    $media->execute();
    $media_result = $media->fetch();
    $nota = number_format($media_result[0],2);

  ?>
  <main>
    <div class="pai">
      <span><img src="https://upload.wikimedia.org/wikipedia/pt/d/db/Wonka_%28filme%29.jpg" alt="Wonka - Filme">
      </span>
      <span class="generic">
        <h1><strong>Filme: </strong><?= $result["L.nome"]?></h1>
        <p><strong>Faixa etária: </strong><?= $result["L.faixa_etaria"]?></p>
        <p><strong>Duração: </strong><?= $result["L.duracao"]?></p>
        <p><strong>Diretor: </strong><?= $result["L.diretor"]?></p>
        <p><strong>Lançamento: </strong><?= $result["L.lancamento"]?></p>
        <p><strong>Categoria: </strong><?= $result["tipo"]?></p>
        <p><strong>Gênero: </strong><?= $result["categoria"]?></p>
      </span>
    </div>
  </main>
  
  <div>
    <div class="coments">
      <span>
        <h2>Comentários</h2>
        <p>Média das avaliações: <?= $nota ?></p>
        <hr>
      </span>
      <form action="index.php">
        <span class="esq">
          <input type="text" name="nome" placeholder="Nome:"><br>
          <input type="email" name="email" placeholder="Email:"><br>
          <input type="number" name="nota" placeholder="Nota" min="0" max="5"><br>
          <input type="submit" value="Enviar">
        </span>
        <span class="textarea">
          <textarea name="avaliacao" cols="80" rows="2" placeholder="Escreva sua avaliação"></textarea>
        </span>
      </form>
    </div>
    <div class="coments">
      <?php
        foreach($avaliacao as $ava => $v){
          echo "<div class='coments'><p>" . $v['nome'] . ' ' . $v['data_avaliacao'].': '. $v['comentario'] .  ' Nota: ' . $v['avaliacao'] ."</p></div>";
        }
      ?>
    </div>
  </div>

  <div><p> ESPAÇO PARA PROPAGANDA </p></div>


  <footer class="class">
    <p>siga nossas redes sociais:</p>
    <ul>
      <li><a href="">Instagram</a></li>
      <li><a href="">Twiter</a></li>
      <li><a href="">Facebook</a></li>
    </ul>
  </footer>
</body>
</html>