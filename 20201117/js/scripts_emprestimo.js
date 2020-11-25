function define_alterar_remover_emprestimo(){
    $(".alterar_emprestimo").click(function(){
        i = $(this).val();
        aux=0;
      

        $.get("seleciona.php?id="+i,{"aux":aux}, function(r){
            a = r[0];        
            console.log(r);                       
            $("select[name='genero_modal']").val(a.cod_genero);
            $("select[name='usuario_modal']").val(a.cod_usuario);
            $("input[name='data_modal']").val(a.data_emprestimo);
            $("input[name='id_emprestimo']").val(a.id_emprestimo);

            $.post("seleciona_livro.php", {"id":a.cod_genero}, function(msg){
                
                option="<option label='::SELECIONE UM LIVRO::' />"; 
                $.each(msg, function(indice, valor){
                    option+="<option value='"+valor.id_livro+"'> "+valor.titulo+" </option>";
                });
                $("select[name='livro_modal']").html(option);
                $("select[name='livro_modal']").val(a.cod_livro);
            });
            
        });

    });
    $("select[name='genero_modal']").change(function(){
        var id = $("select[name='genero_modal']").val();
        $.post("seleciona_livro.php", {"id":id}, function(msg){
            option="<option label='::SELECIONE UM LIVRO::' />"; 
            $.each(msg, function(indice, valor){
                option+="<option value='"+valor.id_livro+"'> "+valor.titulo+" </option>";
            });
            $("select[name='livro_modal']").html(option);
        });
    });
    $(".remover_emprestimo").click(function(){
        i=$(this).val();
        c="id_emprestimo";
        t="emprestimo";
        p={tabela: t, id: i, coluna:c}
        $.get("remover.php",p, function(r){
            if(r=='1'){
                $("#msg").html("Emprestimo removido com sucesso!");
                $("button[value='"+i+"']").closest("tr").remove();
            }
            else{
                $("#msg").html("Essa ação não pode ser efetuada!");
            }
        }); 
    });
}
 $(function(){
        
        
        define_alterar_remover_emprestimo();
        $("#salvar_emprestimo").click(function(){ 
           p = {
                id_emprestimo:$("input[name='id_emprestimo']").val(),
                genero:$("select[name='genero_modal']").val(),
                livro:$("select[name='livro_modal']").val(),
                usuario:$("select[name='usuario_modal']").val(),
                data:$("input[name='data_modal']").val(),
                aux:2
           };        
           $.post("atualizar.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Emprestimo alterado com sucesso.");
                $(".close").click();
                atualizar_tabela_emprestimo();
            }else{
                $("#msg").html("Falha ao atualizar Emprestimo.");
            }
           });
       }); 
       function atualizar_tabela_emprestimo(){ 
            aux=0;          
            $.get("seleciona.php",{"aux":aux}, function(r){
                t = "";
                $.each(r,function(i,a){
                    t += "<tr>";
                    t +=    "<td>"+a.nome_genero+"</td>";
                    t +=    "<td>"+a.titulo+"</td>";
                    t +=    "<td>"+a.nome_usuario+"</td>";
                    t +=    "<td>"+a.data_emprestimo+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-dark alterar_emprestimo' value='"+a.id_emprestimo+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-dark remover_emprestimo' value='"+a.id_emprestimo+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_emprestimo").html(t);
                define_alterar_remover_emprestimo();
            });
        }
    });
