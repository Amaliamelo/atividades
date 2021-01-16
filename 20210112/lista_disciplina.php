<?php
include "conf.php";
session_start();

cabecalho();


if($_SESSION["permissao"]=="2"||$_SESSION["permissao"]=="1"){
    echo "<script>location.href='index.php'</script>";
}

$select = "SELECT id_disciplina, descricao, disciplina.nome as disciplina
                     FROM disciplina  ORDER BY disciplina";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <h3>Disciplinas</h3>
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>            
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        </thead>";
        $i=0;
        echo "<tbody id='tbody_disciplina'>";
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["disciplina"]."</td>
                    <td>".$l["descricao"]."</td>
                  </tr>";
                $i++;
        }
        if($i==0){
            echo "<tr><td colspan='4'>Não há disciplinas cadastradas</td></tr>";
        }
        echo "</tbody>";
echo "</table>";


rodape();

?>

