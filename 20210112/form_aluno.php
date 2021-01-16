<?php
include "conf.php";
session_start();

cabecalho();
    if(isset($_SESSION["permissao"])){
        if($_SESSION["permissao"]=="2"||$_SESSION["permissao"]=="3"){
            echo "<script>location.href='index.php'</script>";
        }
    }

?>
<h4>Cadastro de Aluno</h4>
<form class="form_cad" name="cadastro" method="post" action="insere_aluno.php">

    <input type="number" name="prontuario" placeholder="Prontuario..." class="input-control col-6" />
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />
    <div>Data Nasc. <input type="date" name="data_nascimento" class="input-control col-5" /></div>
    Gênero: <input type="radio" name="sexo" value="m" /> Masc.
    <input type="radio" name="sexo" value="f" /> Fem.
    <input type="radio" name="sexo" value="o" /> Outro <br />
    <input type="email_cadastro" name="email" placeholder="Email..." class="input-control col-6" />
    <?php
    if(!isset($_SESSION["permissao"])){
    ?>
        <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="input-control col-6" /> 
        <input type="password" name="confirma_senha" placeholder="Confirme a senha..." class="input-control col-6" /> <br />
    <?php
    }else{?>
        <input type="hidden" name="senha_cadastro" value="12345" />
    <?php
    }
    ?>
        <button type="button" class="cadastrar input-control col-6">Cadastrar</button>

</form>

<?php
rodape();

?>