<?php
    include "conf.php";

    cabecalho();
    echo'<center>
        <form  name="filtro" class="d-flex justify-content-center">
            <div class="form-group col-md-3" style="margin-left: 2%;">
                <input type="text" name="nome_genero" placeholder = "Nome genero..." class="form-control">
            </div>
            <div class="from-group col-md-3 " style="margin-right: 3%;">
                <button class="btn btn-dark form-control " type="button" id="filtro_genero" >Filtrar</button>
            </div>
        </form>
        <div id="inserido" style="color:white" class="d-flex justify-content-center"></div>
        <div id="filtro">';
        
        $select = "SELECT * FROM genero ";
        $resultado = mysqli_query($conexao,$select)
            or die("ERRO:". mysqli_error($conexao));
    
        echo '<table class="table table-dark table2" >
        <thead class="thead">
            <tr>
                <th>Genero</th>
                <th>Remover</th>
            </tr>
        </thead>';
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                <td>'.$linha["nome_genero"].'</td>
                <td>
                    <button class="btn btn-dark remover_genero" value="'.$linha["id_genero"].'">Remover</button>
                </td>
                </tr>';
        }
        

        echo'</table></div><div id="inserido"></div></center>';

     
        rodape();

        ?>