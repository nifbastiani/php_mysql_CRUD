<?php
    $server = "localhost";
    $user = "root";
    $pass = ""; //senha não definida no heidiSQL
    $bd = "projeto_teste";

    //tratamento recomendado usando try/catch para validação de conexão com bd (fail-fast)
    try{
        $conn = mysqli_connect($server, $user, $pass, $bd); //valida a conexão com o banco
    }catch (mysqli_sql_exception $e){
        echo "Erro ao conectar" . $e->getMessage(); //se não conectar o erro é tratado e apresenta mensagem de erro
    }
?>