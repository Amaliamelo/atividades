<?php

function cabecalho(){
    if(isset($_SESSION["tempo"])){
        date_default_timezone_set('America/Sao_Paulo');
        $_SESSION["tempo"]=date('h:i:s');
        if($_SESSION["tempo"]>=$_SESSION["tempoLimite"]){
            session_destroy();
            header("location: login.php");
        }
        else{       
            $_SESSION["tempoLimite"]= date("h:i:s",strtotime(date("h:i:s")."+1 minute"));
        }
    }
    $alt = $GLOBALS["alt"];
    $menu = $GLOBALS["menu"];
    echo "<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <script src='js/moment.js'></script>
            <script src='js/MD5.js'></script>
            <script src='js/cadastro.js'></script>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script>       
            <link href='css/main.css' rel='stylesheet' />                    
        </head>
        <body>                
            <nav class='navbar navbar-expand-md  navbar-dark d-flex p-3 px-md-4 mb-3 border-bottom '>
            <a href='index.php' class='navbar-brand logotipo'>
                <img src='img/logotipo.png' class='rounded' alt='$alt' />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class='navbar-toggler' type='button'
                data-toggle='collapse' data-target='#menu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='menu'>
                <ul class='navbar-nav'>";
                if(isset($_SESSION["usuario"])){   
                    
                if($_SESSION["permissao"]=="3"){
                    echo "<h3 role='presentation'>
                        Aluno
                    </h3>";

                }
                else if($_SESSION["permissao"]=="2"){
                    echo "<h3 role='presentation'>
                        Professor
                    </h3>";

                }                
                else{
                    echo "<h3>
                        Administrador
                    </h3>
                    <li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                            Cadastrar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>";                        
                        foreach($menu as $i=>$l){
                            echo "<li class='nav-item'>
                                    <a class='menu' href='form_$i.php'>$l</a>
                                </li>";
                        }  
                        echo "</ul>
                        </li>
                        <li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                            Listar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>";                        
                            foreach($menu as $i=>$l){
                                echo "<li class='nav-item'>
                                        <a class='menu' href='lista_$i.php'>$l</a>
                                    </li>";
                            }  
                            echo "
                            </ul>
                        </li>";
                    }
                    echo "<li>
                            <ul class='navbar-nav'>
                                <li role='presentation' >
                                    <a href='logout.php'>
                                        LOGOUT (SAIR)
                                    </a>
                                </li>
                            </ul>
                        </li>";
                }
                    else{

                    echo "
                    <li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                        CADASTRE-SE <span class='caret'></span>
                        </a>
                        <ul class='dropdown-menu'>                        
                            <li class='nav-item'>
                                <a class='menu' href='form_aluno.php'>Aluno</a>
                            </li>
                            <li class='nav-item'>
                                <a class='menu' href='form_professor.php'>Professor</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        
                    <ul class='navbar-nav'>
                            <li role='presentation' >
                                <a href='#' data-toggle='modal' 
                                data-target='#modal_login'>
                                    Login
                                </a>
                            </li>
                        </ul>
                    </li>";
                    }
                echo "
            </ul>  
                    
            </div>        
        </nav>
        <main role='main' class='container'>";
        if(isset($_GET["erro"])){
            echo "<div id='erro'>Erro na autenticação</div>";
        }
     
        include "form_login.php";
}
?>