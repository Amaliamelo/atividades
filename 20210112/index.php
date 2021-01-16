<?php

include "conf.php";
session_start();


    if(isset($_SESSION["permissao"])){ 
        cabecalho(); 
        if($_SESSION["permissao"]=="3"){
            header("location: lista_aluno.php");
            }
            else if($_SESSION["permissao"]=="2"){
                header("location: lista_professor.php");
    
            }                
            else{
                echo'<div class="pricing-header text-center">
                <h1 class="display-4">Bem vindo Adiministrador!!</h1>
                <p class="lead">Sistema Escolar.</p>
                </div>';
    
            }
        
      
           
    }
    else{
        session_destroy();
        header("location: login.php");
    }

?>