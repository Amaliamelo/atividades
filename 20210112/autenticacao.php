<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT cpf, id_perfil, email, nivel, descricao FROM usuario INNER JOIN perfil ON 
        usuario.id_perfil = perfil.nivel_permissao INNER JOIN permissao ON  perfil.nivel_permissao = permissao.nivel
        WHERE email=? AND senha=? ";
        
        if($stmt=mysqli_prepare($conexao, $sql){// usado para preparar o SQL, se tiver errado o comando sql ele retorna falso

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);


            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado)=="1"){
                
                $linha = mysqli_fetch_assoc($resultado);
                $_SESSION["usuario"]=$linha["cpf"];
                $_SESSION["permissao"]=$linha["id_perfil"];
                $_SESSION["email"]=$linha["email"];
                $_SESSION["descricao"]=$linha["descricao"];
                $_SESSION["nivel"]=$linha["nivel"];

                
                date_default_timezone_set('America/Sao_Paulo');
                $_SESSION["tempo"]=date('h:i');
                
                $_SESSION["tempoLimite"]= date("h:i",strtotime(date("h:i:s")."+1 minute"));

                /*print_r($_SESSION["tempo"]);
                print_r("  ");
                print_r($_SESSION["tempoLimite"]);
                die;*/
            
                header("location: index.php");
            }
            else{        
                header("location: login.php?erro=1");
            }
        }
       

    }

?>