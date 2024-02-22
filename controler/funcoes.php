<?php 

function insert_sql($conexao,$tabela,$dados){

  //Construindo a lógica de montar a string da query
  $colunas_dados = array_keys($dados);
  $colunas = implode(',',$colunas_dados);
  $valores_dados = array_map(function(){return "?";},$dados);
  $valores = implode(",",$valores_dados);

  $query = "INSERT INTO $tabela ($colunas) VALUES ($valores)";
  
  //Se o parâmetro $conexão for == 'echo', a função só irá mostrar a query, sem mandar o insert pro banco
  if($conexao == 'echo'){
    return $query;
  }else{

    $sql = $conexao->prepare($query);

    //inserindo os valores de $dados nos '?' que foram inseridos na query
    $count = 1;
    foreach($dados as $da){
      $sql->bindValue($count,$da);
      $count ++;
    }
    try{
      $conexao;
      $sql->execute(); 

      //Mostrando se houve ou não alguma linha alterada no banco
      if($sql->rowCount() > 0){
        echo 'Linhas alteradas: ' . $sql->rowCount();
      }else{
        echo 'Não foi possível alterar.';
      }
    }catch(PDOException $e){
      echo "<strong>deu ruim:</strong> " . $e->getMessage();
    }
  }
}

function select_sql($conexao,$tabela,$colunas=null,$where=null,$tabela_join=null,$fk_tabela=null,$id_tabela_join=null){
    
  switch(true){
    case $colunas == "*": $col = "*";
      break;
    case $colunas == NULL: $col = "*";
      break;
    case is_string($colunas): $col = $colunas;
      break;
    default : $col = implode(",",$colunas);
    }

  //construindo a query
  $query = "SELECT $col FROM $tabela";
  $join_txt = " INNER JOIN $tabela_join ON $tabela.$fk_tabela = $tabela_join.$id_tabela_join";
  $where_txt = " WHERE $where";
    
  //permitindo o uso do inner join
  if($tabela_join !== null){
    $query .= $join_txt;
  }

  //permitindo o uso do where
  if($where !== null){
    $query .= $where_txt;
  }
  
  //Se o parâmetro $conexão for == 'echo', a função só irá mostrar a query, sem mandar o insert pro banco      
  if($conexao == "echo"){
    return $query;
  }else{
    try{
      $sql = $conexao->prepare($query);
      $sql->execute();
      $result = $sql->fetch(PDO::FETCH_ASSOC);
      return $result;
    }catch(PDOException $e){
      echo "<strong>Deu ruim:</strong> " . $e->getMessage();
      }
  }
}

function delete_SQL($conexao,$tabela,$id){

  //Tentando conectar com a váriavel de conexão PDO
  try{$conexao;

    $sql = $conexao->prepare("DELETE FROM $tabela WHERE id = ?");
        
    //Comparando o valor que a coluna ´id´ deverá receber
    $sql->bindValue(1,$id);
    $sql->execute();

  if($sql->rowCount() > 0){
    echo "Registro excluído";//Se não houver erros, aparecerá só isso
  }else{
    echo "não foi possível alterar o registro";
  }
  }catch(PDOException $e){
    //Caso haja erro, irá aparecer essa mensagem
    echo "<strong>deu ruim:</strong> " . $e->getMessage();
  }
}

function update ($conexao,$tabela,$dados,$id){

  $colunas = array_keys($dados); //Colocar os valores das colunas em um array
  $value =  array_map(function(){return "?";},$dados); //Fazer leitura do array e fazer um callback para cada um devolvendo um novo array

  $colunas_txt = implode("`, `", $colunas); //Transformar o array colunas em um txt
  $value_txt = implode(" , ", $value); //Transformar o array value em um txt

  $query = ["UPDATE ($tabela) SET (`$colunas_txt`) = ($value_txt) WHERE id = $id"];
  if($conexao == 'query'){
    return $query;
  }else{

  $sql = $conexao->prepare($query);

  $count = 1;
  foreach($dados as $da){

    $sql->bindValue($count,$da);

    $count ++;
  }

    try{
      $conexao;
      $sql->execute(); 

      if($sql->rowCount() > 0){
        echo 'Linhas alteradas: ' . $sql->rowCount();
      }else{
        echo 'Não foi possível alterar.';
      }

    }catch(PDOException $e){
      echo "Falhou" . $e->getMessage();
    }
  }


};

?>