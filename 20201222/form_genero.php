<?php   
        include "conf.php";
    
        cabecalho();
        if($_SESSION["permissao"]=="2"){
            echo '<script>location.href="index.php"</script>';
        }
            echo'
            <div id="form_genero">
            <form class="d-flex justify-content-center">
                <div class="form-group">
                    <div class="col-auto">
                        <input type="text" name="genero" placeholder = "Genero..." class="form-control">
                    </div>
                </div>
                <div class="from-group">
                    <div class="col-auto">
                        <button class="btn-dark form-control" type="button" id="cad_genero">Cadastrar</button>
                    </div>
                </div>
            </form>
            </div>
            ';
        echo'<div id="inserido" class="d-flex justify-content-center"></div>';

        rodape();

    ?>     
