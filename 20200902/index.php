<html>
    <head>
    <title>Procurando CEP</title>
    <style>
        input{
            margin-bottom: 10px;
            height:30px;
            border-radius: 5px;
        }
        ::-webkit-input-placeholder{
            color: #15a97d;
            font-weight:bold;
        }
    </style>
    <script src="jquery-3.5.1min.js"></script>
    <script>
        $(document).ready(function(){
            function limpa() {
                $("#rua").val("");
                $("#numero").val("")
                $("#bairro").val("");
                $("#cidade").val("");   
                $("#uf").val("");
            }
            function isNumeric(str) {
                var er = /^[0-9]+$/;
                return (er.test(str));
            }
            $("#cep").blur(function(){
                var cep = $("input[name='cep']").val();
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if(validacep.test(cep)) {
                        $("#rua").val("...");
                        $("#numero").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(endereco) {
                            if (!("erro" in endereco)){
                                $("#rua").val(endereco.logradouro);
                                $("#bairro").val(endereco.bairro);
                                $("#cidade").val(endereco.localidade);
                                $("#uf").val(endereco.uf);
                                $("#numero").focus();
                            }
                            else {
                                limpa();
                                alert("CEP não encontrado.");
                            }
                        });
                    }
                    else {
                        limpa();
                        alert("Formato de CEP inválido.");
                    }
                }
                else {
                    limpa();
                }
            });
        });

    </script>
    </head>
    <body>
        <h3> Procurando cep</h3> <hr />
        <form>
            <input name="cep" type="text" id="cep" value="" placeholder="Cep..." /><br />
            <input name="rua" type="text" id="rua" placeholder="Endereço"  />        
            <input name="bairro" type="text" id="numero" placeholder="Numero..."  />
            <input name="bairro" type="text" id="bairro" placeholder="Bairro..."  /><br />
            <input name="cidade" type="text" id="cidade" placeholder="Cidade..."  />
            <input name="uf" type="text" id="uf" placeholder="Estado..."  /><br />
        </form>
    </body>

    </html>
    