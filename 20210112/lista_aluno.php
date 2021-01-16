<?php
include "conf.php";
session_start();

cabecalho();

// caso o acesso for realizado por aluno logado... nao permite o acesso
if($_SESSION["permissao"]=="2"){
    echo "<script>location.href='index.php'</script>";
}


echo "
   
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>
            <th>Prontuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Nascimento</th>
            <th>Sexo</th>
        </tr>
        </thead>";

        echo "<tbody id='tbody_aluno'>";
        $select = "SELECT * FROM aluno";
        
        if($_SESSION["permissao"]=="3"){
            $select .= " WHERE prontuario='".$_SESSION["usuario"]."'";
            echo "<h3>".$_SESSION["email"]."</h3>";
        }

        $select.= " ORDER BY nome";
        $r = mysqli_query($conexao,$select)
            or die("Erro: " . mysqli_error($conexao));                
        $i=0;
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["prontuario"]."</td>
                    <td>".$l["nome"]."</td>
                    <td>".$l["email"]."</td>
                    <td>".date("d/m/Y", strtotime($l["data_nascimento"]))."</td>
                    <td>".$l["sexo"]."</td>
                  </tr>";
                  $i++;
        }
        if($i==0){
            echo "<tr><td colspan='6'>Não há alunos cadastrados</td></tr>";
        }
        echo "</tbody>";
echo "</table>";


rodape();

?>

