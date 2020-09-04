<!DOCTYPE html>
<html>
    <head>
    <title>Engenharia Reversa- AJAX JQUERY</title>
    <style>
        .msg1{
            color:red;
            font-weight: bold;
        }
        .msg2{
            color:green;
            font-weight: bold;
        }
    </style>
    <script src="jquery-3.5.1min.js"></script>
        <script>
            $(document).ready(function(){
                $("#btn").click(function(){
                    fruta= $("input[name='fruta'").val();
                    $.get("cadastro.php", {"fruta":fruta}, function(m){
                        $("#mensagem").html(m);
                    });
                });
            });
        </script>
    </head>
    <body>
        <h3>Engenharia Reversa- AJAX JQUERY</h3><hr />
        <input type="text" name="fruta" placeholder="Cadastre uma fruta...">
        <button id="btn">Cadastro Assincrono</button>
        <hr />
            <div class="msg" id="mensagem"></div>
    </body>
</html>