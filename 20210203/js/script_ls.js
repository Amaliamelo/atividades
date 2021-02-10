$(function() {

	$(".modalbtn").click(function() {
        $(".modal").css("display", "block");
    });

	$(".close").click(function() {
        $(".modal").css("display", "none");
    });

	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
    });
	
	$(window).click(function(event) {
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

	$("#submeter").click(function(){
		if($("#lembrete").is(":checked")){
			let email64 = btoa($("#email").val());			
			
			let usuario = {"email":email64,"data":Date.now() };
			
			localStorage.setItem("usuario", JSON.stringify(usuario));			

		}
		else{
			if(localStorage.getItem("usuario")){
				localStorage.removeItem("usuario"); 
			}
		}
		
	});

	getItemLocalStorage();
});

function getItemLocalStorage(){

	if(localStorage.getItem("usuario")){
		var usuario = JSON.parse(localStorage.getItem("usuario"));
		var email = atob(usuario.email);
		var data = usuario.data;
		let dataAtual = Date.now();
		let tempoDecorrido =  dataAtual-data;

		if(tempoDecorrido>172800000/*10000*/){
			localStorage.removeItem("usuario"); 
			$("#erro").val("Tempo decorrio acima do permitido");

		}
		else{
			$("#email").val(email);
			$("#lembrete").prop("checked", true);

		}
	}
}