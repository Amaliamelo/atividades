<form  class="d-flex justify-content-center">
    <div class="form-row  justify-content-md-center ">
        <?php
                if($_SESSION["permissao"]=="1"){
                        echo'<div class="form-group">
                        <input type="cpf" name="cpf"  placeholder = "CPF..." class="form-control" disabled>
                        </div>
                        <div class="form-group">
                                <input type="text" name="nome_usuario_modal" placeholder = "Nome ..." class="form-control" disabled>
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" placeholder = "E-mail..." class="form-control" disabled>
                        </div>
                        <div class="form-group">
                                <input type="number" name="telefone"  placeholder = "Telefone..." class="form-control" disabled>
                        </div>
                        <div class="form-group">
                                <input type="number" name="cep"   placeholder = "CEP..." class="form-control" disabled>
                        </div>
                        <br />
                        <div class="form-group ">
                                <select name = "permissao" class="form-control">
                                        <option value =""> ::SELECIONE UM NÍVEL DE PERMISSÃO::</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                </select>
                        </div>';
                }else{
                        echo'<div class="form-group">
                        <input type="cpf" name="cpf"  placeholder = "CPF..." class="form-control" disabled>
                        </div>
                        <div class="form-group">
                                <input type="text" name="nome_usuario_modal" placeholder = "Nome ..." class="form-control" >
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" placeholder = "E-mail..." class="form-control" >
                        </div>
                        <div class="form-group">
                                <input type="number" name="telefone"  placeholder = "Telefone..." class="form-control" >
                        </div>
                        <div class="form-group">
                                <input type="number" name="cep"   placeholder = "CEP..." class="form-control">
                        </div>
                        <br /> 
                <input type="checkbox" name="trocar_senha" value="1" class="form-control"/>Trocar Senha </br>
                                <div class="form-group" id="trocar_senha" style="display:none;">
                                        <input type="password" name="senha_cadastro"   placeholder = "Digite a senha..." class="form-group">
                                        <input type="password" name="confirma_senha"   placeholder = "Confirmar a senha..." class="form-group">
                                </div>
                                <br/>';
                }
        ?>
      
        
    </div>
</form>