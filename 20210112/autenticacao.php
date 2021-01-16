<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT cpf, id_perfil, email FROM usuario 
        WHERE email=? AND senha=? ";
        
        $stmt=mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

        mysqli_stmt_execute($stmt);


        $resultado = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($resultado)=="1"){
            
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION["usuario"]=$linha["cpf"];
            $_SESSION["permissao"]=$linha["id_perfil"];
            $_SESSION["email"]=$linha["email"];
            
            date_default_timezone_set('America/Sao_Paulo');
            $_SESSION["tempo"]=date('h:i:s');
            
            $_SESSION["tempoLimite"]= date("h:i:s",strtotime(date("h:i:s")."+1 minute"));

            /*print_r($_SESSION["tempo"]);
            print_r("  ");
            print_r($_SESSION["tempoLimite"]);
            die;*/
         
            header("location: index.php");
        }
        else{        
            header("location: index.php?erro=1");
        }

    }

?>