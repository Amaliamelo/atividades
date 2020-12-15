<?php
session_start();
if(!empty($_POST)){
    include "conexao.php";

    $email = $_POST["email_login"];
    $senha = $_POST["senha_login"];
    
    
    $sql = "SELECT cpf, nome_usuario, permissao FROM usuario WHERE 
                email='$email' AND senha='$senha'";
    

    $resultado = mysqli_query($conexao, $sql)
        or die(mysqli_error($conexao));

    if(mysqli_num_rows($resultado)=="1"){

        $linha=mysqli_fetch_assoc($resultado);
        $_SESSION["usuario"] = $linha["cpf"];
        $_SESSION["nome_usuario"] = $linha["nome_usuario"];
        $_SESSION["permissao"] = $linha["permissao"];
        
            header("location: index_usuario.php");
    }
    else{
        header("location: index.php?erro=1");
    }
}

?>