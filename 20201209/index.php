<?php
    include "conf.php";
    
    cabecalho();
    if(isset($_GET["entrar"])){
        echo"<div class='alert alert-success'role='alert'>Faça seu login para entrar</div>";
    }
    if(isset($_SESSION["usuario"])==false){
        echo'
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center login-form">
            <h1 class="display-4">Biblioteca</h1>
            <p class="lead">Do grego βιβλιοϑήκη, biblion — livro, e theca — depósito.
            Na definição tradicional do termo, é um local em que são guardados livros, 
            documentos tridimensionais, e demais publicações para o público estudar, ler,
            e consultar tais obras.</p>
        </div>';

        echo'<h3 style="color: white; text-align: left;">Nossos livros</h3></br>';
        $select ="SELECT livro.autor, genero.nome_genero, titulo, ano, paginas, editora, id_livro 
        FROM livro INNER JOIN genero ON livro.cod_genero = genero.id_genero ORDER BY titulo";

        $resultado = mysqli_query($conexao,$select);
        
        echo'<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">';

        while($linha = mysqli_fetch_assoc($resultado)){
            
               echo' <div class="col">
                    <div class="card mb-4" style="height:100%;">
                        <div class="card-header">
                            <h4 class="my-0 fw-normal">'.$linha["nome_genero"].'</h4>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title pricing-card-title">'.$linha["titulo"].'</h3>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>AUTOR: '.$linha["autor"].'</li>
                                <li>EDITORA: '.$linha["editora"].'</li>                           
                            </ul>
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal"data-target="#modal_login">
                                    Faça o login para efetuar emprestimo!
                            </button> 
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
    }   
    rodape();

?>