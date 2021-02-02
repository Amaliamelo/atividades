<?php
    include "const_cookie.php";

    $validade = time() + 86400*2;
    $caminho = "/";
    $dominio = "localhost";
    $seguro = false;
    $http = true;

    if($_POST["lembrete"]!="") { //se o usuário tiver marcado o checkbox
        $nome = NOME_COOKIE; //nome do cookie
        $valor = base64_encode($_POST["email"]);
        setcookie($nome, $valor, $validade, $caminho, $dominio, $seguro, $http);
    }
    else {
        $nome = NOME_COOKIE; //nome do cookie
        //apagar o cookie
        if(isset($_COOKIE[$nome])) { 
            $valor = base64_encode($_POST["email"]); //valor do cookie
            setcookie($nome, "", time()-1, $caminho, $dominio, $seguro, $http);
            //tempo no passado
            echo '1';
        }
    }
?>