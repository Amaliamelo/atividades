<?php

	session_start();

	include "conteudo.php";
	include "const_cookie.php";


	
	if(isset($_SESSION["cpf"])){
		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_SESSION['tipo'].".</p>";
		$conteudos[2] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[3] = "<p><a href='logout.php'>Sair</a></p>";

		$conteudos[4]="<form><table border='1'>";
		$conteudos[5]="<thead>";
		$conteudos[6]="<th>Cookies gravados</th>";
		$conteudos[6].="<th>Valor</th>";
		$conteudos[7]="<th>Deseja remover</th>";
		$conteudos[8]="</thead>";
		$conteudos[9]="<tbody>";
			foreach($_COOKIE as $n=>$v) {
				if($n!="PHPSESSID"){
					$nome=$n;
					$valor = $v;
					$conteudos[9].="<tr><td>".$nome."</td>";
					$conteudos[9].="<td>".base64_decode($valor)."</td>";
					$conteudos[9].="<td><input type='checkbox' name='conf_remover'
								 value='".$nome."' id='conf_remover' />Sim</td></tr>";	
				}
			}

		$conteudos[12]="</tbody>";
		$conteudos[13]="</table></form>";
		$conteudos[14]="<div id='erro'></div>";
		$conteudos[15] = "<input type='button' name='remover' value='remover' class='remover' />";

		exibir($titulo, $conteudos);
	}
	else {
		//session_destroy();
		header("location: form_login.php");
	}
?>