<?php
    include "conf.php";


    cabecalho();


    echo'<center>
            <form method = "POST" name="filtro" class="d-flex justify-content-center">
                <div class="form-group col-md-3" style="margin-left: 2%;">
                    <input type="text" name="nome_usuario" placeholder = "Nome usuario..." class="form-control">
                </div>
                <div class="from-group col-md-3 " style="margin-right: 3%;">
                    <button class="btn btn-dark form-control" type="button" id="filtro_usuario">Filtrar</button>
                </div>
            </form>';

        $select = "SELECT * FROM usuario ";
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
        </tr>
    </thead>
    ';

    while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td style="font-style:italic;">'.$linha["cpf"].'</td>
            <td>'.$linha["nome_usuario"].'</td>
            <td style="font-style:italic;">'.$linha["email"].'</td>
            <td style="font-style:italic;">'.$linha["telefone"].'</td>
            <td style="font-style:italic;">'.$linha["cep"].'</td>
            <td>
                <button class="btn btn-dark remover_usuario" value="'.$linha["cpf"].'">Remover</button>
             </td>
        </tr>'; 
    }

    echo "</table>";

    echo "<hr/> </ul></div>";
    echo'</div><div id="inserido"></div></center>';
    rodape();

?>