<?php
    $host = "db4free.net";
    $usuario = "amaliamelo03";
    $senha = "93065637";
    $bd = "taxonomia";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>