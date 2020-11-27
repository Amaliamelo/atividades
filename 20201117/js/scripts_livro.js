function define_alterar_remover_livro(){
    $(".alterar_livro").click(function(){
        i = $(this).val();
       console.log(i);
        aux=2;
        $.get("seleciona.php?id="+i,{"aux":aux}, function(r){
            a = r[0];          
            $("input[name='id_livro']").val(a.id_livro);
            $("select[name='genero_modal']").val(a.cod_genero);
            $("input[name='titulo_modal']").val(a.titulo);
            $("input[name='autor_modal']").val(a.autor);
            $("input[name='ano']").val(a.ano);
            $("input[name='paginas']").val(a.paginas);
            $("input[name='editora']").val(a.editora);

            });
    });
    $(".remover_livro").click(function(){
        i=$(this).val();
        c="id_livro";
        t="livro";
        p={tabela: t, id: i, coluna:c}
        $("#remover_livro").click(function(){
            $.get("remover.php",p, function(r){
                if(r=='1'){
                    $("#msg").html("Livro removido com sucesso!");
                    $("button[value='"+i+"']").closest("tr").remove();
                    $(".close").click();
                }
                else{
                    $("#msg").html("Essa ação não pode ser efetuada!");
                    $(".close").click();
                }
            });
        });
       
    });
}
    $(function(){

        define_alterar_remover_livro();

        $("#salvar_livro").click(function(){ 
           p = {
                id_livro:$("input[name='id_livro']").val(),
                genero:$("select[name='genero_modal']").val(),
                titulo:$("input[name='titulo_modal']").val(),
                autor:$("input[name='autor_modal']").val(),
                ano:$("input[name='ano']").val(),
                paginas:$("input[name='paginas']").val(),
                editora:$("input[name='editora']").val(),
                aux:1
           };        
           $.post("atualizar.php",p,function(r){

            if(r=='1'){
                $("#msg").html("Livro alterado com sucesso.");
                $(".close").click();
                atualizar_tabela_livro();
            }else{
                $("#msg").html("Falha ao atualizar Livro.");
            }
           });
       }); 
       function atualizar_tabela_livro(){ 
            aux=2;  
            p={aux:aux};
            
            $.get("seleciona.php",p, function(r){
                console.log(r); 
                t = "";
                $.each(r,function(i,a){
                    t += "<tr>";
                    t +=    "<td>"+a.titulo+"</td>";
                    t +=    "<td>"+a.autor+"</td>";
                    t +=    "<td>"+a.ano+"</td>";
                    t +=    "<td>"+a.paginas+"</td>";
                    t +=    "<td>"+a.editora+"</td>";
                    t +=    "<td>"+a.nome_genero+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-dark alterar_livro' value='"+a.id_livro+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-dark remover_livro' value='"+a.id_livro+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_livro").html(t);
                $("#filtro").show();
                $("#inserido").hide();
                define_alterar_remover_livro();
            });
        }
        });
