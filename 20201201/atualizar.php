<?php
    include "conexao.php";

    switch($_POST["aux"]){
        case 0:
            $cpf = $_POST["cpf"];
            $nome_usuario = $_POST["nome_usuario"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $cep = $_POST["cep"];


            $update = "UPDATE usuario SET nome_usuario='$nome_usuario',
                                        email='$email',
                                        cep='$cep',
                                        telefone='$telefone' WHERE
                                        cpf='$cpf'";

            mysqli_query($conexao,$update)
            or die(mysqli_error($conexao));
            echo "1";   
        break;
        case 1:
            $id_livro = $_POST["id_livro"];
            $genero = $_POST["genero"];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $ano = $_POST["ano"];
            $paginas = $_POST["paginas"];
            $editora = $_POST["editora"];

            $update = "UPDATE livro SET cod_genero='$genero',
                                        titulo='$titulo',
                                        autor='$autor',
                                        ano='$ano',
                                        paginas='$paginas',
                                        editora='$editora' WHERE
                                        id_livro='$id_livro'";

            mysqli_query($conexao,$update)
            or die(mysqli_error($conexao));

            echo "1";  
        break;
        case 2:
            $id_emprestimo = $_POST["id_emprestimo"];
            $genero = $_POST["genero"];
            $livro = $_POST["livro"];
            $usuario = $_POST["usuario"];
            $data = $_POST["data"];

            $update = "UPDATE emprestimo SET cod_genero='$genero',
                                        cod_livro='$livro',
                                        cod_usuario='$usuario',
                                        data_emprestimo='$data' WHERE
                                        id_emprestimo='$id_emprestimo'";

            mysqli_query($conexao,$update)
            or die(mysqli_error($conexao));
            echo "1";  
        break;
        case 3:
            $id_genero = $_POST["id_genero"];
            $nome_genero = $_POST["nome_genero"];

            $update = "UPDATE genero SET nome_genero='$nome_genero' WHERE
                                        id_genero='$id_genero'";

            mysqli_query($conexao,$update)
            or die(mysqli_error($conexao));

            echo "1";  
        break;
    }


?>