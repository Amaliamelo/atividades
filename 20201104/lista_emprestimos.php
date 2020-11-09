<?php
    include "conf.php";

    cabecalho();
    $selectGenero= "SELECT nome_genero,id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);
    echo' <form method = "POST" name="filtro">
    <div class="form-row offset-md-3 justify-content-md-center ">
        <div class="form-group  col-md-3">
        <select class="form-control" name = "genero">
            <option value =""> ::SELECIONE UM GENERO::</option>';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }

        $selectUsuario= "SELECT nome_usuario,cpf FROM usuario";

        $resultadoUsuario = mysqli_query($conexao,$selectUsuario);
        echo'</select></div>
        <div class="form-group  col-md-3 ">
        <select class="form-control" name = "usuario">
            <option value =""> ::SELECIONE UM USUARIO::</option>';
                while($linhaUsuario = mysqli_fetch_assoc($resultadoUsuario)){
                    echo '<option value='.$linhaUsuario["cpf"].'> '.$linhaUsuario["nome_usuario"].'</option>';
                }

        $selectLivro= "SELECT titulo,id_livro FROM livro";

        $resultadoLivro = mysqli_query($conexao,$selectLivro);
        echo'</select></div>
        <div class="form-group  col-md-3">
        <select class="form-control" name = "livro">
            <option value =""> ::SELECIONE UM LIVRO::</option>';
                while($linhaLivro = mysqli_fetch_assoc($resultadoLivro)){
                    echo '<option value='.$linhaLivro["id_livro"].'> '.$linhaLivro["titulo"].'</option>';
                }
        echo'
        </select></div>
        <div class="form-group col-md-3" style="margin-left: 2%;">
            <input class="form-control" type="date" name="data" placeholder ="Data..."/>
        </div>
        <div class="from-group col-md-3 " style="margin-right: 3%;">
            <button class="btn btn-dark form-control " type="button" id="filtro_emprestimo">Filtrar</button>
        </div>
    </div>
    
    
    </form>
     </hr><div id="filtro">';

    $select = "SELECT  nome_genero, titulo, nome_usuario, data_emprestimo FROM emprestimo INNER JOIN genero 
        ON emprestimo.cod_genero = genero.id_genero INNER JOIN livro ON emprestimo.cod_livro = livro.id_livro INNER JOIN usuario ON emprestimo.cod_usuario=usuario.cpf";
    
    $resultado = mysqli_query($conexao,$select) or die($select); 

    echo '<table class="table table-dark table-striped table-hover table2" width="50%">
            <thead class="thead">
                <tr>
                    <th>Genero</th>
                    <th>Livro</th>
                    <th>Usuario</th>
                    <th>Data</th>
                </tr>
            </thead>
    ';

    while($linha = mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                <td style="font-style:italic;">'.$linha["titulo"].'</td>
                <td style="font-style:italic;">'.$linha["nome_usuario"].'</td>
                <td>'.$linha["data_emprestimo"].'</td>
            </tr>'; 
    }

    echo "</table></div>";
    echo'</div><div id="inserido"></div></center>';

    rodape();

?>