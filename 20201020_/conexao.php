<?php
    $host = "db4free.net";
    $usuario = "amaliamelo";
    $senha = "93065637";
    $bd = "musicaplayer";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>