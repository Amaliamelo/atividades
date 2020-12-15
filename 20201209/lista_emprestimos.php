<?php
    include "conf.php";

    cabecalho();
    if($_SESSION["permissao"]=="2"){
        $cpf=$_SESSION["usuario"];
        $select = "SELECT nome_genero, titulo, nome_usuario,
        data_emprestimo, id_emprestimo FROM emprestimo 
        INNER JOIN genero ON emprestimo.cod_genero = genero.id_genero
        INNER JOIN livro ON emprestimo.cod_livro = livro.id_livro
        INNER JOIN usuario ON emprestimo.cod_usuario=usuario.cpf WHERE
                cod_usuario='$cpf' ORDER BY data_emprestimo";
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
                <tbody id="tbody_emprestimo">
        ';
        $i=0;

        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                    <td style="font-style:italic;">'.$linha["titulo"].'</td>
                    <td style="font-style:italic;">'.$linha["nome_usuario"].'</td>
                    <td>'.date("d/m/y", strtotime($linha["data_emprestimo"])).'</td>
                </tr>';
                $i++; 
        }
        if($i==0){
            echo'<td style="font-style:italic; colspan="6"">Nenhum Emprestimo Realizado</td>';

        }
    }
    elseif($_SESSION["permissao"]=="1"){
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
    
            $selectUsuario= "SELECT nome_usuario,cpf,permissao FROM usuario";
    
            $resultadoUsuario = mysqli_query($conexao,$selectUsuario);
            echo'</select></div>
            <div class="form-group  col-md-3 ">
            <select class="form-control" name = "usuario">
                <option value =""> ::SELECIONE UM USUARIO::</option>';
                while($linhaUsuario = mysqli_fetch_assoc($resultadoUsuario)){
                    if($linhaUsuario["permissao"]!="1"){
                        echo '<option value='.$linhaUsuario["cpf"].'> '.$linhaUsuario["nome_usuario"].'</option>';
                    }
                }
            $selectLivro= "SELECT titulo,id_livro FROM livro";
    
            $resultadoLivro = mysqli_query($conexao,$selectLivro);
            echo'</select></div>
            <div class="form-group  col-md-3">
            <select class="form-control" name = "livro" disabled>
                <option value =""> ::SELECIONE UM LIVRO::</option>
                    
            </select></div>
            <div class="form-group col-md-3" style="margin-left: 2%;">
                <input class="form-control" type="date" name="data" placeholder ="Data..."/>
            </div>
            <div class="from-group col-md-3 " style="margin-right: 3%;">
                <button class="btn btn-dark form-control " type="button" id="filtro_emprestimo">Filtrar</button>
            </div>
        </div>
        
        
        </form>
        <div id="msg" style="color:white" class="d-flex justify-content-center"></div>
         </hr><div id="filtro">';
    
        $select = "SELECT  nome_genero, titulo, nome_usuario, data_emprestimo, id_emprestimo FROM emprestimo INNER JOIN genero 
            ON emprestimo.cod_genero = genero.id_genero INNER JOIN livro ON emprestimo.cod_livro = livro.id_livro 
            INNER JOIN usuario ON emprestimo.cod_usuario=usuario.cpf ORDER BY data_emprestimo";
        
        $resultado = mysqli_query($conexao,$select) or die($select); 
    
        echo '<table class="table table-dark table-striped table-hover table2" width="50%">
                <thead class="thead">
                    <tr>
                        <th>Genero</th>
                        <th>Livro</th>
                        <th>Usuario</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="tbody_emprestimo">
        ';
        $i=0;
    
        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                    <td style="font-style:italic;">'.$linha["titulo"].'</td>
                    <td style="font-style:italic;">'.$linha["nome_usuario"].'</td>
                    <td>'.date("d/m/y", strtotime($linha["data_emprestimo"])).'</td>
                    <td>
                        <button class="btn btn-dark alterar_emprestimo" value="'.$linha["id_emprestimo"].'" data-toggle="modal"
                            data-target="#modal">Alterar</button>
                        <button class="btn btn-dark remover_emprestimo" value="'.$linha["id_emprestimo"].'"data-toggle="modal"
                            data-target="#modal_remover">Remover</button>
                    </td>
                </tr>';
                $i++; 
        }
        if($i==0){
            echo'<td style="font-style:italic; colspan="6"">Nenhum Emprestimo Cadastrado</td>';
    
        }
    }
    else{
        echo '<script>location.href="index.php"</script>';
    }
    echo "</tbody></table></div>";
    echo'</div><div id="inserido"></div></center>';
    $titulo = "Alterar Emprestimo";
    $salvar = "salvar_emprestimo";
    $nome_form = "form_alterar_emprestimo.php";
    $remover="remover_emprestimo";
    $titulo_remover="Remover Emprestimo";
    include "modal.php";
    include "modal_remover.php";
    rodape();

?>