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
        <div id="filtro"';
        
        $select = "SELECT * FROM genero ";
        $resultado = mysqli_query($conexao,$select);
    
        echo '<ul class="list-group col-md-6 text-align: justify" >';
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item" style="background-color: rgba(125, 125, 125, 0.4); color:white">'.$linha["nome_genero"].'</li>';
        }
        

        echo'</ul></div><div id="inserido"></div></center>';

     
        rodape();

        ?>