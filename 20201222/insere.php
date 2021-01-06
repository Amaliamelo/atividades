
<?php 
    include "conexao.php";
    session_start();
    switch($_GET["id"]){
        case 0:
            $genero = $_GET["nome_genero"];

            $query = "INSERT into genero(nome_genero) values('$genero')";

            mysqli_query($conexao, $query) or die($query);

            echo "GENERO CADASTRADO!!";
        break;
        case 1:
            $genero = $_GET["genero"];
            $titulo = $_GET["titulo"];
            $autor = $_GET["autor"];
            $ano = $_GET["ano"];
            $paginas = $_GET["paginas"];
            $editora = $_GET["editora"];

            $query = "INSERT into livro(cod_genero,titulo,autor,ano,paginas,editora) values('$genero','$titulo','$autor','$ano','$paginas','$editora')";

            mysqli_query($conexao, $query) or die($query);

            echo'LIVRO CADASTRADO!';
        break;
        case 2:
            $cpf= $_GET["cpf"];
            $nome_usuario = $_GET["nome_usuario"];
            $email = $_GET["email"];
            $telefone = $_GET["telefone"];
            $cep = $_GET["cep"];
            $senha= $_GET["senha_cod"];
            $permissao=$_GET["permissao"];

            $query = "INSERT into usuario(cpf,nome_usuario,email,telefone,cep,senha,permissao) values('$cpf','$nome_usuario','$email','$telefone','$cep','$senha','$permissao')";

            mysqli_query($conexao, $query) or die($query);

           
            echo '<script>location.href="index.php?entrar=1"</script>';
        break;
        case 3:
            $livro = $_GET["livro"];
            $usuario = $_SESSION["usuario"];
            $genero = $_GET["genero"];
            $data = $_GET["data"];
            $data_devolucao = $_GET["data_devolucao"];
    
            $query = "INSERT into emprestimo(cod_livro, cod_usuario, cod_genero, data_emprestimo, data_devolucao) values('$livro','$usuario','$genero', '$data', '$data_devolucao')";
    
            mysqli_query($conexao, $query) or die($query);
    

            echo "<div class='alert alert-success'role='alert'>EMPRESTIMO CADASTRADO!!</div>";
        break;
    }
    
?>