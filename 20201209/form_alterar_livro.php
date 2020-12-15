<?php
$selectGenero = "SELECT nome_genero, id_genero FROM genero";

$resultadoGenero = mysqli_query($conexao,$selectGenero);
echo'<div id="form_livro">
        <form  class="d-flex justify-content-center">
            <div class="form-row offset-md-3 justify-content-md-center ">
                    <div class="form-group col-md-3" style="padding-left: 1%;">
                    <select name = "genero_modal" class="form-control">
                        <option value =""> ::SELECIONE UM GENERO::</option>
                ';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }
    ?>
            </select>
    </div>
        <input type="hidden" name="id_livro" />
        <div class="form-group">
                <input type="text" name="titulo_modal" placeholder = "Titulo ..." class="form-control">
        </div>
        <div class="form-group">
                <input type="text" name="autor_modal" placeholder = "Autor..." class="form-control">
        </div>
        <div class="form-group">
                <input type="number" name="ano"  placeholder = "Ano ..." class="form-control">
        </div>
        <div class="form-group">
                <input type="number" name="paginas"   placeholder = "Páginas..." class="form-control">
        </div>
        <div class="form-group">
                <input type="text" name="editora" placeholder = "Editora..." class="form-control">
        </div>
    </div>
    </form>