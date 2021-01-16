$(function(){
    $(".cadastrar").click(function(){
        var senha=$("input[name='senha_cadastro']").val();
        senha = $.md5(senha);
        $("input[name='senha_cadastro']").val(senha);
        $("form[name='cadastro']").submit();
    });
    
});