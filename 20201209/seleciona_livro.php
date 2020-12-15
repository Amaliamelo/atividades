<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    $select="SELECT titulo, id_livro FROM livro
    
            WHERE cod_genero = '".$_POST['id']."' ORDER BY titulo";
    
    $res = mysqli_query($conexao, $select);
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>