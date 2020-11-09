
<?php 
    include "conexao.php";
    switch($_GET["id"]){
        case 0:
            $select = "SELECT * FROM genero ";

            if(!empty($_GET)){
                $select .= " WHERE (1=1) ";
        
                if($_GET["genero"]!=""){
                    $nome_genero = $_GET["genero"];
        
                    $select .= " AND nome_genero like '%$nome_genero%'";
                }
            }
        
            $resultado = mysqli_query($conexao,$select);
    
            echo '<ul class="list-group col-md-6 text-align: justify " id="lista">';
            while($linha = mysqli_fetch_assoc($resultado)){
                    echo '<liclass="list-group-item" style="background-color: rgba(125, 125, 125, 0.4);
                    color:white">'.$linha["nome_genero"].'</li>';
        }
     
        break;
        case 1:
            
            $select = "SELECT livro.autor, genero.nome_genero, titulo, ano, paginas, editora  FROM livro INNER JOIN genero ON livro.cod_genero = genero.id_genero";

            if(!empty($_GET)){
                $select .= " WHERE (1=1) ";

                if($_GET["genero"]!=""){
                    $nome_genero = $_GET["genero"];

                    $select .= " AND genero.nome_genero like '%$nome_genero%'";
                }

                if($_GET["autor"]!=""){
                    $autor = $_GET["autor"];

                    $select .= " AND livro.autor like '%$autor%'";
                }
            }

            $resultado = mysqli_query($conexao,$select);

            echo '<table class="table table-dark table-striped table-hover table2" width="50%">
            <thead class="thead">
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Ano de Publicação</th>
                    <th>Paginas</th>
                    <th>Editora</th>
                    <th>Genero</th>
                </tr>
            </thead>
            ';

            while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td>'.$linha["titulo"].'</td>
                    <td style="font-style:italic;">'.$linha["autor"].'</td>
                    <td style="font-style:italic;">'.$linha["ano"].'</td>
                    <td style="font-style:italic;">'.$linha["paginas"].'</td>
                    <td style="font-style:italic;">'.$linha["editora"].'</td>
                    <td style="font-style:italic;">'.$linha["nome_genero"].'</td>

                </tr>'; 
            }

            echo "</table>";

            
        break;
        case 2:
            $select = "SELECT * FROM usuario ";

            if(!empty($_GET)){
                $select .= " WHERE (1=1) ";
    
                if($_GET["nome_usuario"]!=""){
                    $nome_usuario = $_GET["nome_usuario"];
    
                    $select .= " AND nome_usuario like '%$nome_usuario%'";
                }
            }
    
            $resultado = mysqli_query($conexao,$select);
        
            echo '<table class="table table-dark table-striped table-hover table2" width="50%">
            <thead class="thead">
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                </tr>
            </thead>
            ';
        
            while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td style="font-style:italic;">'.$linha["cpf"].'</td>
                    <td>'.$linha["nome_usuario"].'</td>
                    <td style="font-style:italic;">'.$linha["email"].'</td>
                    <td style="font-style:italic;">'.$linha["telefone"].'</td>
                    <td style="font-style:italic;">'.$linha["cep"].'</td>
                </tr>'; 
            }
        
            echo "</table>";
        break;
        case 3:
            $select = "SELECT  nome_genero, titulo, nome_usuario, data_emprestimo FROM emprestimo INNER JOIN genero 
            ON emprestimo.cod_genero = genero.id_genero INNER JOIN livro ON emprestimo.cod_livro = livro.id_livro INNER JOIN usuario ON emprestimo.cod_usuario=usuario.cpf";
            
            if(!empty($_GET)){     
                if($_GET["genero"]!=""){   
                    $genero = $_GET["genero"];
    
                    $select .= " AND genero.id_genero = '$genero'";       
            
                }
                if($_GET["usuario"]!=""){   
                    $usuario = $_GET["usuario"];
    
                    $select .= " AND usuario.cpf = '$usuario'";       
            
                }
                if($_GET["livro"]!=""){   
                    $livro = $_GET["livro"];
    
                    $select .= " AND livro.id_livro = '$livro'";       
            
                }
                if($_GET["data"]!=""){
                    $data = $_GET["data"];
                    
                    $select .= " WHERE emprestimo.data_emprestimo like '%$data%'";
                } 
            }
            
            $resultado = mysqli_query($conexao,$select) or die($select); 
        
            echo '<table class="table table-dark table-striped table-hover table2" width="50%">
                    <thead class="thead">
                        <tr>
                            <th>Genero</th>
                            <th>Livro</th>
                            <th>Usuario</th>
                            <th>Data</th>
                        </tr>
                    </thead>
            ';
        
            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                        <td style="font-style:italic;">'.$linha["titulo"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_usuario"].'</td>
                        <td>'.$linha["data_emprestimo"].'</td>
                    </tr>'; 
            }
        
            echo "</table>";
        
        break;
    }
    
?>