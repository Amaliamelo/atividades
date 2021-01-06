<?php
$selectGenero = "SELECT nome_genero, id_genero FROM genero";

$resultadoGenero = mysqli_query($conexao,$selectGenero);
echo'<div id="form_livro">
        <form  class="d-flex justify-content-center">
            <div class="form-row  justify-content-md-center ">
                    <div class="form-group " style="padding-left: 1%;">
                    <label>Genero</label>
                    <select name = "genero_modal" class="form-control">
                        <option value =""> ::SELECIONE UM GENERO::</option>
                ';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }
           echo' </select>
    </div>
        <input type="hidden" name="id_livro" />
        <input type="hidden" name="usuario" value"'.$_SESSION["usuario"].'"/>
        <div class="form-group">
        <label>Titulo</label>
                <input type="text" name="titulo_modal" placeholder = "Titulo ..." class="form-control">
        </div>
        <div class="form-group">
        <label>Autor</label>
                <input type="text" name="autor_modal" placeholder = "Autor..." class="form-control">
        </div>
        <div class="form-group">
        <label>Ano de publicação</label>
                <input type="number" name="ano"  placeholder = "Ano ..." class="form-control">
        </div>
        <div class="form-group">
        <label>Numero de páginas</label>
                <input type="number" name="paginas"   placeholder = "Páginas..." class="form-control">
        </div>
        <div class="form-group">
                <label>Editora</label>
                <input type="text" name="editora" placeholder = "Editora..." class="form-control">
        </div>
        <div class="form-group">
            <label>Data do Emprestimo:</label>
            <input type="date" name="data_modal" value="'.date('Y-m-d').'" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Data de Devolução</label>
            <input type="date" name="data_devolucao" value="'.date('Y-m-d', strtotime('+1 week')).'" class="form-control"/>
       </div>
    </div>
     </form>
    ';

?>