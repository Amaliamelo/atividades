<?php
include "conf.php";

cabecalho();

    $selectGenero = "SELECT nome_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);
    echo'<form method = "POST" name="filtro">
            <div class="form-group  col-md-6 offset-md-3">
                <select name = "genero" class="form-control">
                    <option value =""> ::SELECIONE O GENERO ::</option>';
                        while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                            echo '<option value='.$linhaGenero["nome_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                        }
                echo'</select>
            </div>
            <div class="form-row offset-md-3 justify-content-md-center ">
                <div class="form-group col-md-3" style="margin-left: 2%;">
                        <input type="text" name="autor" placeholder = "autor..." class="form-control">
                </div>
                <div class="form-group col-md-3" style="margin-right: 3%;">
                    <button class="btn btn-dark form-control" id="filtro_livro" type="button">Pesquisar</button>
                </div>
            </div>
    </form>';

    $select = "SELECT livro.autor, genero.nome_genero, titulo, ano, paginas, editora, id_livro 
     FROM livro INNER JOIN genero ON livro.cod_genero = genero.id_genero ORDER BY titulo";

    $resultado = mysqli_query($conexao,$select);
    
    echo ' <div id="msg" style="color:white" class="d-flex justify-content-center"></div>
    <div id="filtro">
    <table class="table table-dark  table2" >
    <thead class="thead">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Ano de Publicação</th>
            <th>Paginas</th>
            <th>Editora</th>
            <th>Genero</th>
        </tr>
    </thead>
    <tbody id="tbody_livro">';

    while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td>'.$linha["titulo"].'</td>
            <td style="font-style:italic;">'.$linha["autor"].'</td>
            <td style="font-style:italic;">'.$linha["ano"].'</td>
            <td style="font-style:italic;">'.$linha["paginas"].'</td>
            <td style="font-style:italic;">'.$linha["editora"].'</td>
            <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
            <td>
                <button class="btn btn-dark alterar_livro" value="'.$linha["id_livro"].'" data-toggle="modal"
                data-target="#modal">Alterar</button>
                <button class="btn btn-dark remover_livro" value="'.$linha["id_livro"].'" data-toggle="modal"
                    data-target="#modal_remover">Remover</button>
            </td>       
        </tr>'; 
    }

    echo "</tbody></table></div><hr/>";

    $titulo = "Alterar Livro";
    $salvar = "salvar_livro";
    $nome_form = "form_alterar_livro.php";
    $remover="remover_livro";
    $titulo_remover="Remover Livro";
    include "modal_remover.php";
    include "modal.php";

rodape();

?>