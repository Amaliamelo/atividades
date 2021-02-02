<?php

    include "conexao.php";
    session_start();        
    $cpf= $_POST["cpf"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];
    $senha= $_POST["senha"];

    $query = "INSERT into usuario(cpf,email,senha,tipo) values('$cpf','$email','$senha', '$tipo')";

    mysqli_query($conexao, $query) or die($query);

    
    echo '1 ';