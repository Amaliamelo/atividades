<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "taxonomia";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>