
$(document).ready(function(){
    
    $("select[name='genero']").change(function(){
        var id = $("select[name='genero']").val();
        $.post("seleciona_livro.php", {"id":id}, function(msg){
            option="<option label='::SELECIONE UM LIVRO::' />"; 
            $.each(msg, function(indice, valor){
                option+="<option value='"+valor.id_livro+"'> "+valor.titulo+" </option>";
            });
            $("select[name='livro']").prop("disabled", false); 
            $("select[name='livro']").html(option);
        });
    });
    $("#cad_genero").click(function(){
        var nome_genero = $("input[name='genero']").val();
        var id=0;
        $.get("insere.php", {"id":id, "nome_genero":nome_genero}, function(msg){
            $("#form_genero").hide();
            $("#inserido").html(msg);
        });
    });
    $("#cad_emprestimo").click(function(){
        var genero = $("select[name='genero']").val();
        var livro = $("select[name='livro']").val();
        var usuario = $("select[name='usuario']").val();
        var data =$("input[name='data']").val();
        var id=3;
        $.get("insere.php", {"id":id, "genero":genero,"livro":livro, "usuario":usuario, "data":data}, function(msg){
            $("#form_emprestimo").hide();
            $("#inserido").html(msg);
        });
    });
    $("#cad_livro").click(function(){
        var genero = $("select[name='genero']").val();
        var titulo = $("input[name='titulo']").val();
        var autor = $("input[name='autor']").val();
        var ano = $("input[name='ano']").val();
        var paginas = $("input[name='paginas']").val();
        var editora = $("input[name='editora']").val();
        var id=1;
        
        $.get("insere.php", {"id":id, "genero":genero,"titulo":titulo, "autor":autor, "ano":ano, "paginas":paginas, "editora":editora}, function(msg){
            console.log(msg)
            $("#form_livro").hide();
            $("#inserido").html(msg);
        });
    });
    $("#cad_usuario").click(function(){
        var id=2; 
        var cpf= $("input[name='cpf']").val();;
        var nome_usuario = $("input[name='nome_usuario']").val();
        var email = $("input[name='email']").val();
        var telefone = $("input[name='telefone']").val();
        var cep = $("input[name='cep']").val();
        var senha=$("input[name='senha']").val();
        $.post("exemploMD5.php",{"senha":senha}, function(m){
            var senha_cod=m;
            $.get("insere.php", {"id":id, "cpf":cpf,"nome_usuario":nome_usuario, "email":email, "telefone":telefone, "cep":cep, "senha":senha_cod}, function(msg){
                $("#form_usuario").hide();
                $("#inserido").html(msg);
            });
        });
       
    });
    $("#filtro_genero").click(function(){
        var id=0;
        var genero = $("input[name='nome_genero']").val();
        $.get("listar.php", {"id":id, "genero":genero}, function(msg){
            $("#tbody_genero").html(msg);
            define_alterar_remover_genero();
        });
    });

    $("#filtro_livro").click(function(){
        var id=1;
        var genero = $("select[name='genero']").val();
        var autor = $("input[name='autor']").val();
        
        $.get("listar.php", {"id":id, "genero":genero, "autor":autor}, function(msg){
            $("#tbody_livro").html(msg);
            define_alterar_remover_livro();
        });
    });

    $("#filtro_usuario").click(function(){
        var id=2;
        var nome_usuario = $("input[name='nome_usuario']").val();
        
        $.get("listar.php", {"id":id, "nome_usuario":nome_usuario}, function(msg){
          $("#tbody_usuario").html(msg);
            define_alterar_remover_usuario();
        });
    });
    $("#filtro_emprestimo").click(function(){
        var genero = $("select[name='genero']").val();
        var livro = $("select[name='livro']").val();
        var usuario = $("select[name='usuario']").val();
        var data =$("input[name='data']").val();
        var id=3;
        $.get("listar.php", {"id":id, "genero":genero,"livro":livro, "usuario":usuario, "data":data}, function(msg){
            $("#tbody_emprestimo").html(msg);
            define_alterar_remover_emprestimo();
        });
    });
    
    
   
    
    
});