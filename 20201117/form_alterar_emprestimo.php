
<?php 
    echo'<script src="js/main.js"></script>';
    $selectGenero = "SELECT nome_genero, id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);
    echo'
<form class="form-row offset-md-3 justify-content-md-center ">
        <div class="form-group     ">
            <select name = "genero_modal" id="genero" class="form-control">
                <option value =""> ::ESCOLHA UM GENERO::</option>';
                    while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                        echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                    }
            
            echo'</select>
        </div>
        <div class="form-group" " >
            <select name="livro_modal" id="livro" class="form-control">
                <option label="::SELECIONE UM LIVRO::"> </option>
            </select>
        </div>';
        $selectUsuario = "SELECT nome_usuario, cpf FROM usuario";

        $resultadoUsuario = mysqli_query($conexao,$selectUsuario);
        echo'<div class="form-group" " >
            <select name="usuario_modal" id="usuario" class="form-control">
                <option label="::SELECIONE UM USUARIO::"> </option>';
                    while($linhaUsuario = mysqli_fetch_assoc($resultadoUsuario)){
                        echo '<option value='.$linhaUsuario["cpf"].'> '.$linhaUsuario["nome_usuario"].'</option>';
                    }
            echo'</select>
        </div>
        <input type="hidden" name="id_emprestimo" />
        <div class="form-group">
            <input type="date" name="data_modal" placeholder = "Data ..." class="form-control">
        </div>
    </form>';

?>