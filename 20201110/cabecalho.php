<?php

function cabecalho(){
    $alt = $GLOBALS['alt'];
    $menu = $GLOBALS['menu'];
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <script src='js/main.js'></script>
        </head>
        <body>                
            <nav class='navbar navbar-expand-lg nav'>
                <a href='index.php' class='navbar-brand logotipo'>
                    <img src='img/logo2.png' class='rounded' alt='$alt' />
                </a>
                <a class='navbar-brand center' href='index.php'>Biblioteca</a>

                <!-- botão que aparece quando a tela for pequena -->
                <button class='btn-dark dark navbar-toggler nav-btn' type='button'
                    data-toggle='collapse' data-target='#menu'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='menu'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item '>
                            <a class='nav-link ' href='#' id='navbar' role='button'  aria-haspopup='true' aria-expanded='false'>
                                Cadastrar:
                            </a>
                            </li>
                            <li class='nav-item '>
                            <div class='menu' aria-labelledby='navbar'>
                                ";foreach($menu as $i=>$l){
                                    echo '<a class="aux" href="form_'.$i.'.php">'.$l.'</a> |';
                                }                        
                        
                                echo "
                            </div>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link' href='#' id='navbar' role='button'  aria-haspopup='true' aria-expanded='false'>
                                Listar:
                            </a>
                            </li>
                            <li class='nav-item '>
                            <div class='menu' aria-labelledby='navbar'>
                                ";foreach($menu as $i=>$l){
                                    echo '<a class="aux" href="lista_'.$i.'.php">'.$l.'</a> |';
                                }                        
                        
                                echo "
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        <main role='main' class='container'>";
}
?>