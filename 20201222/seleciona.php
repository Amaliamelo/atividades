<?php 
    include "conexao.php";
    header('Content-Type: application/json');
    
    switch($_GET["aux"]){

        case 0:
            $select = "SELECT  nome_genero, titulo, nome_usuario,
            data_emprestimo, id_emprestimo,data_devolucao FROM emprestimo 
            INNER JOIN genero ON emprestimo.cod_genero = genero.id_genero
            INNER JOIN livro ON emprestimo.cod_livro = livro.id_livro
            INNER JOIN usuario ON emprestimo.cod_usuario=usuario.cpf ORDER BY data_emprestimo";
        
            if(isset($_GET["id"])){
                $id_emprestimo = $_GET["id"];
                $select = "SELECT * FROM emprestimo WHERE
                id_emprestimo='$id_emprestimo' ORDER BY data_emprestimo";
            }
            
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        
            while($linha = mysqli_fetch_assoc($resultado)){
            $matriz[]=$linha;
            }
        
            echo json_encode($matriz);
        break;
        case 1:
            $select = "SELECT * FROM usuario ORDER BY nome_usuario";
            
            if(isset($_GET["id"])){
                $cpf = $_GET["id"];
                $select = "SELECT * FROM usuario WHERE
                cpf='$cpf' ORDER BY nome_usuario";
            }
        
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        
            while($linha = mysqli_fetch_assoc($resultado)){
            $matriz[]=$linha;
            }
        
            echo json_encode($matriz);
        break;
        case 2:
            $select = "SELECT autor, genero.nome_genero, titulo, ano, paginas, editora, id_livro
             FROM livro INNER JOIN genero ON livro.cod_genero = genero.id_genero ORDER BY titulo";
            
            if(isset($_GET["id"])){
                $id_livro = $_GET["id"];
                $select = "SELECT * FROM livro WHERE
                id_livro='$id_livro' ORDER BY titulo";
            }
        
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        
            while($linha = mysqli_fetch_assoc($resultado)){
                $matriz[]=$linha;
            }
            echo json_encode($matriz);
        break;
        case 3:
            
            $select = "SELECT * FROM genero  ORDER BY nome_genero";
            
            if(isset($_GET["id"])){
                $id_genero = $_GET["id"];
                $select = "SELECT * FROM genero WHERE
                id_genero='$id_genero' ORDER BY nome_genero";
            }
        
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        
            while($linha = mysqli_fetch_assoc($resultado)){
            $matriz[]=$linha;
            }
        
            echo json_encode($matriz);
        break;
        
    }
    
                    
    
    
?>