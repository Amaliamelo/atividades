<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <script src='js/scripts_livro.js'></script>
            <script src='js/scripts_usuario.js'></script>
            <script src='js/scripts_emprestimo.js'></script>
            <script src='js/scripts_genero.js'></script>
            <script src='js/main.js'></script>
        </head>
        <body>
        <div class="login-form col-xs-10 offset-xs-1 
			col-sm-6 offset-sm-3 col-md-4 offset-md-4">
			<header>
				<br/><h2 class="text-center">Entre com seu <b>e-mail</b> e <b>senha</b>:</h2>
			</header>
			<form  name="login" method="post" action="autenticacao.php">
                <div class="form-group">
                    <input type="email" name="email_login"  placeholder = "Email..." class="form-control" >
                </div>
                <div class="form-group">
                        <input type="password" name="senha_login" placeholder = "Senha ..." class="form-control">
                </div>
            </form>
            <div class="float-left"></div>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#NovoUsuario">Cadastrar-se</button>
            <div class="float-right"></div>
            <button type="button" class="btn btn-light autenticar" id="login">Entrar</button>
        </div>        
    </div>
    <script>
    $(function(){
        $(".autenticar").click(function(){
            var senha = $("input[name='senha_login']").val();
            $.post("exemploMD5.php",{"senha":senha}, function(senha_md5){
                $("input[name='senha_login']").val(senha_md5);
                $("form[name='login']").submit();
            });  
        });
    });
</script>
</body>
</html>
