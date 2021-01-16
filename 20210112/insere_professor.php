<?php

include "conf.php";


$prontuario = $_POST["prontuario"];
$nome = $_POST["nome"];
$email = $_POST["email_cadastro"];
$formacao = $_POST["formacao"];
$senha = $_POST["senha_cadastro"];

$insert = "INSERT INTO professor VALUES ('$prontuario','$nome','$email','$formacao')";

mysqli_query($conexao,$insert)
    or die("erro: ". mysqli_error($conexao));


$insert = "INSERT INTO usuario VALUES ('$prontuario','$email','$senha','2')";
    mysqli_query($conexao,$insert)
        or die("erro: ". mysqli_error($conexao));
    

header("location: index.php");

?>