<?php
    include "conf.php";
    cabecalho();

    echo'<input type="hidden" id="session" value="'.$_SESSION["permissao"].'"/>';

    if($_SESSION["permissao"]=="1"){
        echo'<center>
        <form method = "POST" name="filtro" class="d-flex justify-content-center">
            <div class="form-group col-md-3" style="margin-left: 2%;">
                <input type="text" name="nome_usuario" placeholder = "Nome usuario..." class="form-control">
            </div>
            <div class="from-group col-md-3 " style="margin-right: 3%;">
                <button class="btn btn-dark form-control" type="button" id="filtro_usuario">Filtrar</button>
            </div>
        </form>';
        $select = "SELECT * FROM usuario ORDER BY nome_usuario";
        $resultado = mysqli_query($conexao,$select);
        echo ' <div id="msg" style="color:white" class="d-flex justify-content-center"></div>
            <div id="filtro">
            <table class="table table-dark table-striped table-hover table2" width="50%">
                <thead class="thead">
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                        <th>Permissao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="tbody_usuario">';
            $i=0;
            while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td>'.$linha["cpf"].'</td>
                    <td>'.$linha["nome_usuario"].'</td>
                    <td >'.$linha["email"].'</td>
                    <td>'.$linha["telefone"].'</td>
                    <td>'.$linha["cep"].'</td>
                    <td>'.$linha["permissao"].'</td>
                    <td>
                        <button class="btn btn-dark alterar_usuario" value="'.$linha["cpf"].'" data-toggle="modal"
                                data-target="#modal">Alterar</button>
                        <button class="btn btn-dark remover_usuario" value="'.$linha["cpf"].'" data-toggle="modal"
                            data-target="#modal_remover">Remover</button>
                        </td>
                </tr>'; 
                $i++;
            } 
            if($i==0){
                echo'<td style="font-style:italic; colspan="6"">Nenhum Usuario Cadastrado</td>';

            }

            echo "</tbody></table></div>";

    }
    elseif($_SESSION["permissao"]=="2"){
        echo'<center>';
          
        $select = "SELECT * FROM usuario ORDER BY nome_usuario";
        
        if(isset($_SESSION["usuario"])){
            $cpf = $_SESSION["usuario"];
            $select = "SELECT * FROM usuario WHERE
            cpf='$cpf' ORDER BY nome_usuario";
        }
    
        $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));

        echo '  <div id="msg" style="color:white" class="d-flex justify-content-center"></div>
        <div id="filtro">
        <div class="row justify-content-center">';
        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<div class="col-6">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" role="img">
                    <rect width="100%" height="100%" fill="#777"/>
                    <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg>
                </div> 
                <div class="col-6" >
                    <ul style="list-style: none;" class="linha">
                        <li><b>CPF:</b>&nbsp'.$linha["cpf"].'</li>
                        <li><b>Nome:</b>&nbsp'.$linha["nome_usuario"].'</li>
                        <li><b>Email:</b>&nbsp'.$linha["email"].'</li>
                        <li><b>Telefone:</b>&nbsp'.$linha["telefone"].'</li>
                        <li><b>Cep:</b>&nbsp'.$linha["cep"].'</li>
                    </ul>
                </div>'; 
        }
    }
    $titulo = "Alterar Usuario";
    $salvar = "salvar_usuario";
    $nome_form = "form_alterar_usuario.php";
    $remover="remover_usuario";
    $titulo_remover="Remover Usuario";
    include "modal.php";
    include "modal_remover.php";
    

    rodape();

?>