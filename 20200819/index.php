<!DOCTYPE html>
<html>
    <head>
    <title>Engenharia Reversa</title>
    <style>
       .img {
                height: 100px;
                width: 100px;
            }
        .imagens{
            margin-bottom: 10px;
        }
        .msg{
            color:red;
            font-weight: bold;
        }
    </style>
    <script src="jquery-3.5.1min.js"></script>
        <script>
            $(document).ready(function(){
                $("select[name='fideIn']").change(function() {
                    var valor = $("select[name='fideIn']").val(); 
                    var id = 'img'+valor;
                    var display =$("#"+id).css("display");
                    if(display != "none" && valor!= ""){
                        var texto ='<h3> Imagem '+valor+' já está amostra</h3>';
                        $("#mensagem").html(texto);
                    }
                    else
                    {
                        $("#"+id).fadeIn();
                        $("#mensagem").html("");
                    }
                    var valor = $("select[name='fideIn']").val("");
                    
                });
                $("select[name='fideOut']").change(function() {
                    var valor = $("select[name='fideOut']").val(); 
                    var id = 'img'+valor;
                    var display =$("#"+id).css("display");
                    if(display == "none" && valor != ""){
                        var texto ='<h3> Imagem '+valor+' já oculta</h3>';
                        $("#mensagem").html(texto).css("color");
                    }
                    else
                    {
                        $("#"+id).fadeOut();
                        $("#mensagem").html("");
                        
                    }
                    var valor = $("select[name='fideOut']").val(""); 
                });
                
            });
        </script>
    </head>
    <body>
    <h3>Engenharia Reversa</h3><hr />
        <select name="fideOut">
            <option value="">::selecione qual ocultar::</option> 
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <select name="fideIn">
            <option value="">::selecione qual mostrar::</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <hr />
            <div class="msg" id="mensagem"></div>
        <hr />
        <div class="imagens">
            <img id="img1" class="img" src="img/img1.png"/>
            <img id="img2" class="img" src="img/img2.png"/>
            <img id="img3" class="img" src="img/img3.png"/>
            <img id="img4" class="img" src="img/img4.png"/>
            <img id="img5" class="img" src="img/img5.png"/>
            <img id="img6" class="img" src="img/img6.png"/>
            <img id="img7" class="img" src="img/img7.png"/>
        </div>
    </body>
</html>