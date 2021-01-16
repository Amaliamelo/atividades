<?php
include "conf.php";
session_start();

cabecalho();

// caso o acesso for realizado por professor logado....nao permite o acesso
if($_SESSION["permissao"]=="3"){
    echo "<script>location.href='index.php'</script>";
}

$select = "SELECT * FROM professor ";

if($_SESSION["permissao"]=="2"){
    $select .= " WHERE prontuario='".$_SESSION["usuario"]."'";
    echo "<h3>".$_SESSION["email"]."</h3>";
}

$select.=" ORDER BY nome";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>
            <th>Prontuário</th>
            <th>Nome</th>
            <th>Email</th>            
            <th>Formação</th>
        </tr>
        </thead>";

        echo "<tbody id='tbody_professor'>";
        $i=0;
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["prontuario"]."</td>
                    <td>".$l["nome"]."</td>
                    <td>".$l["email"]."</td>
                    <td>".$l["formacao"]."</td>
                    
               </tr>";
                  $i++;
        }
        if($i==0){
            echo "<tr><td colspan='5'>Não há professores cadastrados</td></tr>";
        }
        echo "</tbody>";
echo "</table>";


rodape();

?>

