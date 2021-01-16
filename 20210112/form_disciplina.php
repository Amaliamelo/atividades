<?php
include "conf.php";
session_start();

$select = "SELECT prontuario,nome FROM professor ORDER BY nome";
$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));
cabecalho();
if(isset($_SESSION["permissao"])){
    if($_SESSION["permissao"]=="2"||$_SESSION["permissao"]=="1"){
        echo "<script>location.href='index.php'</script>";
    }
}
?>
<h4>Cadastro de Disciplina</h4>
<form class="form_cad" method="post" action="insere_disciplina.php">    
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />
    <textarea placeholder="Descrição da disciplina..." name="descricao" class="textarea-control col-6"></textarea>
    <select required name="cod_professor" class="select-control col-6" >
        <option label="::Professor::"></option>
        <?php
        while($l=mysqli_fetch_assoc($resultado)){
            $cod_professor = $l["prontuario"];
            $professor = $l["nome"];
            echo "<option value='$cod_professor'>$professor</option>";
        }
        ?>
    </select>

    <button class="input-control col-6">Cadastrar</button>


</form>

<?php
rodape();

?>