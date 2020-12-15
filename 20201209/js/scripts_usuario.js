function define_alterar_remover_usuario(){
    $(".alterar_usuario").click(function(){

        i = $(this).val();
        aux=1;
        $.get("seleciona.php?id="+i,{"aux":aux}, function(r){
            a = r[0];                               
            $("input[name='cpf']").val(a.cpf);
            $("input[name='nome_usuario_modal']").val(a.nome_usuario);
            $("input[name='email']").val(a.email);
            $("input[name='telefone']").val(a.telefone);
            $("input[name='cep']").val(a.cep);
            $("select[name='permissao']").val(a.permissao);
        });
    });
    $("#remover_usuario").click(function(){
        i=$(this).val();
        c="cpf";
        t="usuario";
        p={tabela: t, id: i, coluna:c}
        $("#remover_usuario").click(function(){
            $.get("remover.php",p, function(r){
                if(r=='1'){
                    $("#msg").html("Usuario removido com sucesso!");
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
        
        define_alterar_remover_usuario();
        $("#salvar_usuario").click(function(){ 
                
                var senha = $("input[name='senha_cadastro'").val();
                var atualiza=0;
                if(senha!=""){
                    senha = $.md5(senha);
                }
                if($("#session").val()=="2"){
                    atualiza=1;
                }
                p = {
                    cpf:$("input[name='cpf']").val(),
                    nome_usuario:$("input[name='nome_usuario_modal']").val(),
                    email:$("input[name='email']").val(),
                    telefone:$("input[name='telefone']").val(),
                    cep:$("input[name='cep']").val(),
                    permissao:$("select[name='permissao']").val(),
                    senha:senha,
                    aux:0
                };   
                
                $.post("atualizar.php",p,function(r){
                    console.log(r);
                    if(r=='1'){
                        $("#msg").html("Usuario alterado com sucesso.");
                        $(".close").click();
                        atualizar_tabela_usuario(atualiza);
                    }else{
                        $("#msg").html("Falha ao atualizar Usuario.");
                    }
                });
                
               
           
       }); 
       function atualizar_tabela_usuario(atualiza){ 
            aux=1;          
            if(atualiza==1){
                var i=$("input[name='cpf']").val();
                $.get("seleciona.php?id="+i,{"aux":aux}, function(r){
                    t = "";
                    $.each(r,function(i,a){
                        t += "<ul style='list-style: none;' class='linha'>";
                        t +=    "<li style='font-style:italic;'><b>CPF:</b>&nbsp"+a.cpf+"</li>";
                        t +=    "<li style='font-style:italic;'><b>NOME:</b>&nbsp"+a.nome_usuario+"</li>";
                        t +=    "<li style='font-style:italic;'><b>EMAIL:</b>&nbsp"+a.email+"</li>";
                        t +=    "<li style='font-style:italic;'><b>TELEFONE:</b>&nbsp"+a.telefone+"</li>";
                        t +=    "<li style='font-style:italic;'><b>CEP:</b>&nbsp"+a.cep+"</li>";
                        t +=    "<li style='font-style:italic;'>";
                        t +=        "<button class='btn btn-dark alterar_usuario' value='"+a.cpf+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                        t +=    "</li>";
                        t += "</ul>";
                    });            
                    $(".lista").html(t);
                    define_alterar_remover_usuario();
                });
            }else{
                $.get("seleciona.php",{"aux":aux}, function(r){
                    t = "";
                    $.each(r,function(i,a){
                        t += "<tr>";
                        t +=    "<td>"+a.cpf+"</td>";
                        t +=    "<td>"+a.nome_usuario+"</td>";
                        t +=    "<td>"+a.email+"</td>";
                        t +=    "<td>"+a.telefone+"</td>";
                        t +=    "<td>"+a.cep+"</td>";
                        t +=    "<td>"+a.permissao+"</td>";
                        t +=    "<td>";
                        t +=        "<button class='btn btn-dark alterar_usuario' value='"+a.cpf+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                        t +=        " <button class='btn btn-dark remover_usuario' value='"+a.cpf+"'>Remover</button>";
                        t +=    "</td>";
                        t += "</tr>";
                    });            
                    $("#tbody_usuario").html(t);
                    define_alterar_remover_usuario();
                });
            }
           
        }
    });
