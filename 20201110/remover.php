<?php 
    include "conexao.php";
  
    $tabela = $_GET["tabela"];
    $coluna = $_GET["coluna"];
    $id = $_GET["id"];

    $delete="DELETE FROM $tabela WHERE $coluna=$id";

    mysqli_query($conexao,$delete)
    or die("Erro:".mysqli_error($conexao));

    echo"1";
     
?>