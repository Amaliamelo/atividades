<!DOCTYPE html>
<html>
    <head>
    <title>Atividade Bimestral</title>
    <script src="jquery-3.5.1min.js"></script>
        <script>
            $(document).ready(function(){
                //criando a primeira linha da tabela
                var newRow = $("<tr>");	   
                var cols = "";
                cols += '<td colspan="3">Preencha o nome e o ano para verificar se este nome está entre os 20 mais frequentes da década</td>';   	
                newRow.append(cols);	    
                $("#table2").append(newRow);

                //função para adicionar linhas a tabela, com os dados dos nomes coletados
                function AddTableRow(dados, n,i) {	
                        var newRow = $("<tr id="+i+">");	   
                        var cols = "";	
                        cols += '<td>'+(dados.ranking)+'</td>';
                        if(dados.nome==n){
                            cols += '<td style="color:green;  font-weight: bold;">'+(dados.nome)+'</td>';
                        }
                        else{
                            cols += '<td>'+(dados.nome)+'</td>';
                        }    
                        cols += '<td>'+(dados.frequencia)+'</td>';	   	    	
                        newRow.append(cols);	    
                        $("#table2").append(newRow);	
                        return false;	  
                 }

                //Focando o nome e procurando dados
                $("input[name='nome'").focus();
                $("input[name='nome'").blur(function(){
                    if($("input[name='nome'").val()==""){
                        $("input[name='nome'").focus();
                    }
                    else{
                        n=$("input[name='nome'").val().toUpperCase();
                        ano= $("input[name='ano'").val();
                        $.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+ano+"", function(dados) {
                            $("#table2 tr").remove();
                            var newRow = $("<tr>");	   
                            var cols = "";
                            cols += '<th>Posição</td>';	 
                            cols += '<th>Nome</td>';
                            cols += '<th>Frenquencia</td>';   	
                            newRow.append(cols);	    
                            $("#table2").append(newRow);
                            for(i=0;i<20;i++){
                                AddTableRow(dados[0].res[i], n, i);
                            }
                        });
                    }
                });     

                //procurando os dados quando ocorre mudança no ano
                $("input[name='ano'").change(function(){
                    n=$("input[name='nome'").val().toUpperCase();
                    ano= $("input[name='ano'").val();
                    $.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+ano+"", function(dados) {
                        $("#table2 tr").remove();
                        var newRow = $("<tr>");	   
                        var cols = "";
                        cols += '<th>Posição</td>';	 
                        cols += '<th>Nome</td>';
                        cols += '<th>Frenquencia</td>';   	
                        newRow.append(cols);	    
                        $("#table2").append(newRow);
                        for(i=0;i<20;i++){
                            AddTableRow(dados[0].res[i], n, i);
                        }
                    });
                });                       
            });
        </script>
    </head>
    <body>
        <input type="text" name="nome" placeholder="digite um nome...">
        <input type="number" name="ano" min="1930" max="2010" step="10" value="1930">
        <hr />
        <table id="table2" border="1">
            <thead>
                <tr>
                    <th>Posicao</th>
                    <th>Nome</th>
                    <th>Frequencia</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </body>
</html>