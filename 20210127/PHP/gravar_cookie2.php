<?php

    $validade = time() + 86400*2;
    $caminho = "/";
    $dominio = "localhost";
    $seguro = false;
    $http = true;

    if($_POST["lembrete_cad"]!="") {
        foreach($_POST["nomes"] as $nome) {
            $valor = base64_encode($_POST[$nome]);
            setcookie($nome, $valor, $validade, $caminho, $dominio, $seguro, $http);
        }
        echo "1";
    }
?>