<?php
    $host = "db4free.net:3306";
    $usuario = "amaliamelo";
    $senha = "93065637";
    $bd = "musicaplayer";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>