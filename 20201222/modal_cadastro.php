<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="modal-body">
            <?php include $form_usuario;?>
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