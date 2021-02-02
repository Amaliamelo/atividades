$(function() {

	$(".modalbtn").click(function() {
		$(".modal").css("display", "block");

	});
	$(".modalbtn_cad_aluno").click(function() {
        $(".modal_cadastro_aluno").css("display", "block");

    });
	$(".close").click(function() {
		$(".modal").css("display", "none");
		$(".modal_cadastro_aluno").css("display", "none");
		$(".modal_cadastro_professor").css("display", "none");
	});	
	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
		$(".modal_cadastro_aluno").css("display", "none");
		$(".modal_cadastro_professor").css("display", "none");
	});
	
	$("#f1").submit(function(evento) {
		var senha= $("input[name='senha']").val();
        senha = $.md5(senha);
		$("input[name='senha']").val(senha);

		evento.preventDefault(); //cancelando o evento de submissão, ocorre pq atralemos a submissão ao submit e não ao click


		var dados = {"email":$("#email").val(),
					"senha":$("#senha").val(),
					"lembrete":$("#lembrete").is(":checked")?$("#lembrete").val(): ""
				};
			
		$.post("autenticacao.php", dados, function(retorno){
			var resultado = JSON.parse(retorno); //parse retorna o JSON em uma variavel
			if(resultado.codigo == 1){
				window.location.href ="index.php";
			}
			else{
				$("#erro").html(resultado.mensagem);
				$("input[name='submeter']").val("Login...");
			}
		});	
		$("input[name='submeter']").val("Logando...");
	});
	$("#cadastro_aluno").submit(function(evento) {
		var senha= $("input[name='senha_cad']").val();
		var conf_senha=$("input[name='conf_senha']").val();
		if(senha==conf_senha){
			senha = $.md5(senha);
			$("input[name='senha_cad']").val(senha);
		}
		else{
			$("#erro_cad").html("Confirmação de senha Errada");
		}
		lembrete = $("#lembrete_cad").is(":checked")?$("#lembrete_cad").val(): "";
		evento.preventDefault();	

		var dados = {"cpf":$("#cpf").val(),
					"email":$("#email_cad").val(),
					"tipo":$("#tipo").val(),
					"nomes":["cpf","email","tipo"],
					"senha":senha,
					"lembrete_cad":lembrete
				};
		if(lembrete!=""){
			$.post("gravar_cookie2.php", dados, function(retorno){
				console.log(retorno);
				if(retorno == 1){
					$("#erro").html("Dados guardados");
					window.location.href ="form_login.php";
					
				}
				else{
					$("#erro").html("Erro");
				}
			});
		}

		$.post("cadastrar.php", dados, function(retorno){
			if(retorno == 1){
				window.location.href ="form_login.php";
			}
			else{
				$("#erro").html("Erro");
			}
		});
	});
	$(".remover").click(function() {
		
		var dados = [];
		$("input[name='conf_remover']:checked").each(function() {
			dados.push($(this).val());
		});
		 var nome = {"lembrete":dados};
					
		console.log(dados);

		$.post("remover_cookie.php", nome, function(retorno){
			console.log(retorno);
			if(retorno == 1){
				
				window.location.href ="index.php";
			}
			else{
				$("#erro").html("Assinale a opção sim");

			};
		});
	});
	
	$(window).click(function(event) {
		//var target = event.target;
		//if (target.className=="modal") {
			//$(".modal").css("display", "none");
		//}
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});
	
});