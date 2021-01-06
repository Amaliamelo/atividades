
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>Atividades da AmaliaMelo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="css/css.css" />
    <script src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script>
         $(document).ready(function(){
            var tamanhoFont = 16;
            $(".aumentar_letras").click(function(){
                    tamanhoFont = tamanhoFont+2;
                    $(".body").css({"font-size" : tamanhoFont+"px"});
                
            });
            $(".diminuir_letras").click(function(){
                    tamanhoFont = tamanhoFont-1;
                    $(".body").css({"font-size" : tamanhoFont+"px"});
            });
            var contraste=0;
            $(".contraste").click(function(){
                    if(contraste==0){
                        $("body").css("background-color", "black")
                        $(".container").css("color", "white");
                        $(".linha").css("border-color","white");
                        $("a").css("color"," white");
                        contraste=1;
                    }else{
                        $("body").css("background-color", "white")
                        $(".container").css("color", "black");
                        $(".linha").css("border-color","black");
                        $("a:link").css("color","black");
                        contraste=0;
                    };
             });
        });
    </script>
  </head>
  <body class="body">
        <header>
            <nav class="navbar navbar-expand-md navbar-warning bg-warning">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <h1 class="navbar-brand">Atividades</h1>
                    </li>
                </ul> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-outline-dark aumentar_letras" style="margin-right:10px;" >A+</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-outline-dark diminuir_letras" style="margin-right:10px;"> A-</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-outline-dark contraste"style="margin-right:10px;"> contraste</button>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="container">

            <div class="row">
                <div class="col-sm" >
                    <img src="img/eu.jpg" class="eu" alt="Foto do Perfil da Amália Melo"></img>
                    <h2>Amália Vitoria de Melo</h2>
                    <li>
                        <span class="material-icons">contacts</span>
                        <a href="https://linkedin.com/in/amália-melo-a2b72b1a0" >Linkedin.com/amália-melo</a>
                    </li>
                    <li>
                        <span class="material-icons">email</span>
                        amaliamelovitoria@gmail.com
                    </li>
                </div>
                <div class="linha"></div>
                <div class="col-sm" >
                        
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200812/index.php">Editor de Texto - JEQUERY</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200819/index.php">Engenharia Reversa</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200825/index.php">Engenharia Reversa - AJAX_JEQUERY</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200826/index.php">Editor de Texto - AJAX_JEQUERY</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200902/index.php">  Procurando Cep- JSON</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200910/index.php"> ATIVIDADE BIMESTRAL 1: Procurando Pesquisa de nomes_API IBGE</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200923/index.php"> Atividade em grupo - Taxonomia</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20200930/index.php"> Atividade em grupo - Taxonomia - FILTROS</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201014/index.php"> Atividade em grupo - Taxonomia - Inserts</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201020_/index.php"> ATIVIDADE BIMESTRAL 2: Playlist de Musica</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201104/index.php"> Revisão 1° e 2° Bimiestre: BIBLIOTECA</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201110/index.php"> DELETE_BIBLIOTECA</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201117/index.php"> ALTERAR_BIBLIOTECA</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201201/index.php"> LOGIN_BIBLIOTECA</a><hr />
                        </li> 
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201209/index.php"> ATIVIDADE BIMESTRAL 3: Biblioteca</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20201222/index.php">Biblioteca novas funcionalidades</a><hr />
                        </li>
                        <li>
                            <span class="material-icons">play_circle</span>
                            <a href="20210105/index.php">Acessibilidade na Web</a><hr />
                        </li>
                </div>
            </div>
        </div>

        <footer class="footer fixed-bottom text-center">
        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validaform.min.js"></script>
    </body>
</html>
