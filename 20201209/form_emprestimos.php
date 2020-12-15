<?php
include "conf.php";

cabecalho();
if($_SESSION["permissao"]=="2"){
    echo '<script>location.href="index.php"</script>';
}
        $selectGenero = "SELECT nome_genero, id_genero FROM genero";

        $resultadoGenero = mysqli_query($conexao,$selectGenero);
       echo' <div id="form_emprestimo" ">
       <div class="form-row offset-md-3 justify-content-md-center ">
            <div class="form-group col-md-3" style="padding-left: 1%;">
                <select name = "genero" id="genero" class="form-control">
                    <option value =""> ::ESCOLHA UM GENERO::</option>';
                        while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                            echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                        }
                echo'</select>
            </div>
            <div class="form-group col-md-3" style="padding-right: 1%;" >
                <select name="livro" id="livro" class="form-control"  disabled>
                    <option label="::SELECIONE UM LIVRO::"> </option>
                </select>
            </div>';
            $selectUsuario = "SELECT nome_usuario, cpf, permissao FROM usuario";

            $resultadoUsuario = mysqli_query($conexao,$selectUsuario);
            echo'<div class="form-group col-md-3" style="padding-right: 1%;" >
                <select name="usuario" id="usuario" class="form-control">
                    <option label="::SELECIONE UM USUARIO::"> </option>';
                        while($linhaUsuario = mysqli_fetch_assoc($resultadoUsuario)){
                            if($linhaUsuario["permissao"]!="1"){
                                echo '<option value='.$linhaUsuario["cpf"].'> '.$linhaUsuario["nome_usuario"].'</option>';
                            }
                        }
                echo'</select>
            </div>
            <div class="form-group">
                <input type="date" name="data" placeholder = "Data ..." class="form-control">
            </div>
            <div class="form-group">
            <button class="btn btn-dark form-control " id="cad_emprestimo" type="button" >Cadastrar</button>
            </div>
            <div class="from-group">
                <input class="btn btn-dark form-control " type="reset" value="Limpar"></button>
            </div>
        </div>
        </div>
        </div>';
        echo'<div id="inserido" class="d-flex justify-content-center"></div>';
rodape();

?>