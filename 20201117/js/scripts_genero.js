function define_alterar_remover_genero(){
    $(".alterar_genero").click(function(){

    i = $(this).val();
    aux=3;

    $.get("seleciona.php?id="+i,{"aux":aux}, function(r){
        a = r[0];                               
        $("input[name='genero_modal']").val(a.nome_genero);
        $("input[name='id_genero']").val(a.id_genero);

    });
    });

    $(".remover_genero").click(function(){
        i=$(this).val();
        c="id_genero";
        t="genero";
        p={tabela: t, id: i, coluna:c}
        $("#remover_genero").click(function(){
            $.get("remover.php",p, function(r){
                if(r=='1'){
                    $("#msg").html("Genero removido com sucesso!");
                    $("button[value='"+i+"']").closest("tr").remove();
                    $(".close").click();
                }
                else{
                    $("#msg").html("Essa ação não pode ser efetuada!");
                    $(".close").click();
                }
            });
        })
    });
}
 $(function(){
       
        define_alterar_remover_genero();

        $("#salvar_genero").click(function(){ 
            var aux=3;
            var id_genero   = $("input[name='id_genero']").val();
            var nome_genero = $("input[name='genero_modal']").val();

            $.post("atualizar.php",{"aux":aux,"id_genero":id_genero,"nome_genero":nome_genero},function(r){
            if(r=='1'){
                $("#msg").html("Genero alterado com sucesso.");
                $(".close").click();
                atualizar_tabela_genero();
            }else{
                $("#msg").html("Falha ao atualizar Genero.");
            }
            });
        }); 

        function atualizar_tabela_genero(){ 
            aux=3;          
            $.get("seleciona.php",{"aux":aux}, function(r){
                t = "";
                $.each(r,function(i,a){
                    t += "<tr>";
                    t +=    "<td>"+a.nome_genero+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-dark alterar_genero' value='"+a.id_genero+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-dark remover_genero' value='"+a.id_genero+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_genero").html(t);
                define_alterar_remover_genero();
            });
        }
    });
