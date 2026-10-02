<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="table table-striped">
            <?php 
                include "conexao.php"; //pega a conexão com o banco para que a variável $conn possua a conexão aberta com o mysql
                $descricao = $_POST['descricao']; // $_POST é um array associativo que recebe via http POST method os dados inseridos do forms de index.php
                
                //(isset) é um construtor que retorna true se a variável existe e não é nula
                if(isset($_POST['ativo'])){ //se ativo for diferente de null, retorna ativo 
                    $ativo = $_POST['ativo'];
                }else{
                    $ativo = 0; //senão retona 0, para que fique inativo
                }
                
                //instrução sql
                $sql = "INSERT INTO produto (descricao, ativo)
                VALUES ('$descricao', '$ativo')"; //isso é apenas uma string ainda não foi enviada ao banco


                //consulta o banco de dados (mysqli_query($conn, $sql)), mysql recebe a string e o banco grava o registro
                if(mysqli_query($conn, $sql)){
                    header("Location: index.php"); //se deu certo retorna true e volta para o index.php, dando reload na página
                    exit; //depois sai
                }else{
                    echo "Erro :" . mysqli_error($conn);
                }
            ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>