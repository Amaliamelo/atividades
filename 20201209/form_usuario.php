<?php
    include "conf.php";

    cabecalho();

    if(isset($_SESSION["permissao"])){
        if($_SESSION["permissao"]=="2"){
            echo '<script>location.href="index.php"</script>';
        }
    }
    else{
        echo'<div id="form_usuario">
        <form  class="d-flex justify-content-center">
            <div class="form-row  offset-md-6 justify-content-md-center ">
                <div class="form-group col-md-12">
                        <input type="text" name="nome_usuario" placeholder = "Nome ..." class="form-control">
                </div>
                <div class="form-group col-md-12">
                        <input type="email" name="email" placeholder = "E-mail..." class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="cpf"  placeholder = "CPF..." class="form-control">
                </div>
                <div class="form-group col-md-4">
                        <input type="number" name="telefone"  placeholder = "Telefone..." class="form-control">
                </div>
                <div class="form-group col-md-4">
                        <input type="cep" name="cep"   placeholder = "CEP..." class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="password" name="senha"   placeholder = "Senha..." class="form-control">
                </div>
                <div class="form-group col-md-3" style="padding-left: 1%;" hidden>
                    <select name="permissao" class="form-control">
                        <option value ="2"> Usuario</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="password" name="confirmar_senha"   placeholder = "Confirme sua senha..." class="form-control">
                </div>
                <div class="form-group col-md-6">
                        <button class="btn btn-dark form-control " type="button" id="cad_usuario" >Cadastrar</button>
                </div>
            </div>
        </form>
        </div>
    ';
    echo'<div id="inserido" class="d-flex justify-content-center"></div>';

    }

       
    rodape();

?>