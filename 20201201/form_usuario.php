<?php
    include "conf.php";

    cabecalho();
        echo'<div id="form_usuario">
            <form  class="d-flex justify-content-center">
                <div class="form-row offset-md-3 justify-content-md-center ">
                    <div class="form-group">
                        <input type="cpf" name="cpf"  placeholder = "CPF..." class="form-control">
                    </div>
                    <div class="form-group">
                            <input type="text" name="nome_usuario" placeholder = "Nome ..." class="form-control">
                    </div>
                    <div class="form-group">
                            <input type="email" name="email" placeholder = "E-mail..." class="form-control">
                    </div>
                    <div class="form-group">
                            <input type="number" name="telefone"  placeholder = "Telefone..." class="form-control">
                    </div>
                    <div class="form-group">
                            <input type="number" name="cep"   placeholder = "CEP..." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha"   placeholder = "Senha..." class="form-control">
                    </div>
                    <div class="form-group">
                            <button class="btn btn-dark form-control " type="button" id="cad_usuario" >Cadastrar</button>
                    </div>
                    <div class="from-group">
                        <input class="btn btn-dark form-control " type="reset" value="Limpar"></button>
                    </div>
                </div>
            </form>
            </div>
        ';
        echo'<div id="inserido" class="d-flex justify-content-center"></div>';

    rodape();

?>