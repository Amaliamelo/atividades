<?php
     $host = "db4free.net";
     $usuario = "amaliamelo02";
     $senha = "93065637";
     $bd = "livraria";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>