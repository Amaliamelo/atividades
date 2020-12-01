
<?php 
    include "conexao.php";
    switch($_GET["id"]){
        case 0:
            $select = "SELECT * FROM genero ";

            if(!empty($_GET)){
                $select .= " WHERE (1=1) ";
        
                if($_GET["genero"]!=""){
                    $nome_genero = $_GET["genero"];
        
                    $select .= " AND nome_genero like '%$nome_genero%' ";
                }
            }

            $select .=" ORDER BY nome_genero";

            $resultado = mysqli_query($conexao,$select);
            while($linha = mysqli_fetch_assoc($resultado)){
                    echo '<tr>
                    <td>'.$linha["nome_genero"].'</td>
                    <td> 
                        <button class="btn btn-dark alterar_genero" value="'.$linha["id_genero"].'" data-toggle="modal"
                    data-target="#modal">Alterar</button>
                        <button class="btn btn-dark remover_genero" value="'.$linha["id_genero"].'">Remover</button>
                    </td>
                    </tr>';
            }
     
        break;
        case 1:
            
            $select = "SELECT livro.autor, genero.nome_genero, titulo, ano, paginas, editora, id_livro 
             FROM livro INNER JOIN genero ON livro.cod_genero = genero.id_genero";

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


            while($linha = mysqli_fetch_assoc($resultado)){
            
            echo '<tr>
                    <td>'.$linha["titulo"].'</td>
                    <td style="font-style:italic;">'.$linha["autor"].'</td>
                    <td style="font-style:italic;">'.$linha["ano"].'</td>
                    <td style="font-style:italic;">'.$linha["paginas"].'</td>
                    <td style="font-style:italic;">'.$linha["editora"].'</td>
                    <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                    <td>
                        <button class="btn btn-dark alterar_livro" value="'.$linha["id_livro"].'" data-toggle="modal"
                            data-target="#modal">Alterar</button>
                        <button class="btn btn-dark remover_livro" value="'.$linha["id_livro"].'">Remover</button>
                    </td>
                </tr>'; 
            }


            
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
        
          
            while($linha = mysqli_fetch_assoc($resultado)){
            echo '<tr>
                    <td style="font-style:italic;">'.$linha["cpf"].'</td>
                    <td>'.$linha["nome_usuario"].'</td>
                    <td style="font-style:italic;">'.$linha["email"].'</td>
                    <td style="font-style:italic;">'.$linha["telefone"].'</td>
                    <td style="font-style:italic;">'.$linha["cep"].'</td>

                    <td>
                        <button class="btn btn-dark alterar_usuario" value="'.$linha["cpf"].'" data-toggle="modal"
                            data-target="#modal">Alterar</button>
                        <button class="btn btn-dark remover_usuario" value="'.$linha["cpf"].'">Remover</button>
                    </td>
                </tr>'; 
            }
        
            echo "</table>";
        break;
        case 3:
            $select = "SELECT  nome_genero, titulo, nome_usuario, data_emprestimo, id_emprestimo FROM emprestimo INNER JOIN genero 
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



            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                        <td style="font-style:italic;">'.$linha["titulo"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_usuario"].'</td>
                        <td>'.$linha["data_emprestimo"].'</td>
                        <td>
                            <button class="btn btn-dark alterar_emprestimo" value="'.$linha["id_emprestimo"].'" data-toggle="modal"
                                data-target="#modal">Alterar</button>
                            <button class="btn btn-dark remover_emprestimo" value="'.$linha["id_emprestimo"].'">Remover</button>
                        </td>
                    </tr>'; 
            }

            echo "</table></div>";
            
        break;
    }
    
?>