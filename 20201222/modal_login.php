<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Autenticação</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  name="login" method="post" action="autenticacao.php">
                <div class="form-group">
                    <input type="email" name="email_login"  placeholder = "Email..." class="form-control" >
                </div>
                <div class="form-group">
                        <input type="password" name="senha_login" placeholder = "Senha ..." class="form-control">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary autenticar" id="login">Autenticar</button>
            <p>Ainda não é cadatrado?<a href="form_usuario.php">clique aqui</a></p>
        </div>
        </div>
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