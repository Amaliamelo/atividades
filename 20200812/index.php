<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editor de texto com Jquery</title>
    </head>
    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }

    </style>
    <script src="jquery-3.5.1min.js"></script>
    <script>
        var teste_negrito=0, teste_sublinhado=0, teste_italico=0;
        $(function(){
            $("#quadrado").keyup(function(){
                $("#quadrado2").html($("#campo").val());
            });

            $("#negrito").click(function(){
                if(teste_negrito==0) {
                    $("#quadrado2").css('font-weight','bold');
                    teste_negrito=1;
                }
                else{
                    $("#quadrado2").css('font-weight', 'normal' );
                    teste_negrito=0;
                }
            });

            $("#italico").click(function(){
                if(teste_italico==0){
                    $("#quadrado2").css("font-style","italic");
                    teste_italico=1;
                }
                else{
                    $("#quadrado2").css("font-style",'normal');
                    teste_italico=0;
                }
            });

            $("#sublinhado").click(function(){
                if(teste_sublinhado==0) {
                    $("#quadrado2").css('text-decoration','underline');
                    teste_sublinhado=1;
                }
                else{
                    $("#quadrado2").css('text-decoration', 'none' );
                    teste_sublinhado=0;
                }
            });
        });
    </script>
    <body>
        <h3>Editor de Texto com Jquery</h3>

        <img id="negrito" src="negrito.png" />
        <img id="italico" src="italico.png" />
        <img  id="sublinhado" src="sublinhado.png" />

        <div style = "display: table">
            <div id="quadrado" style = "display: table-cell;">
                <textarea id = "campo" name = "campo" placeholder="Digite aqui"></textarea>
            </div>

            <div id="quadrado2" style = "display: table-cell;"></div>
        </div>
        <!-- modificação do beluzo-->
        <!--Teste-->
    </body>
</html>
