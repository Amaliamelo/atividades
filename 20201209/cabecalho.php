<?php

function cabecalho(){
    session_start();
    $alt = $GLOBALS['alt'];
    $menu_adm = $GLOBALS['menu_adm'];
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />   
            <link href= 'https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>         
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <script src='js/scripts_livro.js'></script>
            <script src='js/scripts_usuario.js'></script>
            <script src='js/scripts_emprestimo.js'></script>
            <script src='js/scripts_genero.js'></script>
            <script src='js/main.js'></script>
            <script src='js/md5.js'></script>
        </head>
        <body>                
            <nav class='navbar navbar-expand-lg nav'>
                <a href='index.php' class='navbar-brand logotipo'>
                    <img src='img/logo2.png' class='rounded' alt='$alt' />
                </a>
                <a class='navbar-brand center' href='index.php' '>Biblioteca</a>

                <!-- botão que aparece quando a tela for pequena -->
                <button class='btn-dark dark navbar-toggler nav-btn' type='button'
                    data-toggle='collapse' data-target='#menu'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='menu'>
                    <ul class='navbar-nav mr-auto'>";
                    if(isset($_SESSION["permissao"])){
                        if($_SESSION["permissao"]=="1"){
                            echo" <li class='nav-item '>
                                <a class='nav-link ' href='#' id='navbar' role='button'  aria-haspopup='true' aria-expanded='false'>
                                    Cadastrar:
                                </a>
                                </li>
                                <li class='nav-item '>
                                <div class='menu' aria-labelledby='navbar'>
                                    ";foreach($menu_adm as $i=>$l){
                                        if($i!="usuario"){
                                            echo '<a class="aux" href="form_'.$i.'.php">'.$l.'</a> |';
                                        }
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
                                    ";foreach($menu_adm as $i=>$l){
                                        echo '<a class="aux" href="lista_'.$i.'.php">'.$l.'</a> |';
                                    }                        
                            
                                    echo "
                                </div>
                            </li>
                            <li class='nav-item' role='presentantion'>
                                <a class='nav-link' href='logout.php'>
                                    <span width='2em' height='2em' class='material-icons'>
                                        exit_to_app
                                    </span>
                                </a>
                            </li>";
                        }
                        elseif($_SESSION["permissao"]=="2"){ 
                            echo" <li class='nav-item '>
                            <a class='nav-link ' href='#' id='navbar' role='button'  aria-haspopup='true' aria-expanded='false'>
                            </a>
                            </li>
                            <li class='nav-item '>
                            <a class='aux' href='lista_usuario.php'>
                                Perfil
                                <span class='material-icons'>
                                    contact_page
                                </span>
                            </a>
                                                    
                        </li>
                            <li class='nav-item '>
                               <a class='aux' href='lista_livro.php'>
                               Livros
                               <span class='material-icons'>
                                    book
                               </span>                          
                               </a>
                            </li>
                            <li class='nav-item '>
                               <a class='aux' href='lista_emprestimos.php'>
                               Meus Emprestimos
                               <span class='material-icons'>
                               shopping_bag
                               </span>                          
                               </a>
                            </li>
                        <li class='nav-item' >
                            <a class='aux' href='logout.php'>
                            <span width='2em' height='2em' class='material-icons'>
                                exit_to_app
                            </span>
                            </a>
                        </li>";
                        }
                    }
                    else{
                        echo"  <li class='nav-item' role='presentantion'>
                        <a class='nav-link' href='#' data-toggle='modal'data-target='#modal_login'>
                        <svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-person' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                        </svg>
                        </a>
                        </li>";
                    }
                    echo" </ul>
                    
                </div>
            </nav>
        <main role='main' class='container'>";
        if(isset($_GET["erro"])){
            echo"<div id='erro' style='color:white' class='d-flex justify-content-center'>Erro na autenticação</div>";
        }
}
?>