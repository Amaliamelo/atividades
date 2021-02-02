<?php
	include "const_cookie.php";
?>

<!DOCTYPE html>

<html lang="pt-BR">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8" />
		<title>Form de login</title>
		<link rel="stylesheet" href="../css/estilos.css" type="text/css" />
	</head>
	
	<body>
		<main class="container">
		<h1>Faça sua Autenticação</h1>

		<button class="modalbtn">Login</button>
		<button class="modalbtn_cad_aluno">Cadastro</button>

		</main>
		<div class="modal">
  
			<form id="f1" class="modal-content animate" action="autenticacao.php" method="post">
				
				<div class="imgcontainer">
					<button type="button" class="close" title="Fechar">&times;</button>
					<img src="../imagens/img_avatar2.png" alt="Avatar" class="avatar" />
				</div>
				
				<div id="erro"></div>
				
				<div class="container">
					<label for="email"><b>Endereço de e-mail</b></label>
					<input type="text" placeholder="Digite seu e-mail" name="email" id="email" required 
					value="<?php echo isset($_COOKIE[NOME_COOKIE])?base64_decode($_COOKIE[NOME_COOKIE]):"";?>">
							
					<label for="senha"><b>Senha</b></label>
					<input type="password" placeholder="Digite sua senha" name="senha" id="senha" required>
				  
					<input type="submit" name="submeter" value="Login" class="submitbtn" />

					<input type="checkbox" name="lembrete" <?php echo isset($_COOKIE[NOME_COOKIE])?"checked=checked":"value=sim";?> id="lembrete" />
					<label for="lembrete">Lembrar meu e-mail</label>
				</div>
				
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" class="cancelbtn">Cancelar</button>
				</div>
				
			</form>
			
		</div>
		<div class="modal_cadastro_aluno">
  
			<form id="cadastro_aluno" class="modal-content animate" action="cadastro.php" method="post">
				
				<div class="imgcontainer">
					<button type="button" class="close close_cadastro_aluno" title="Fechar">&times;</button>
				</div>
				
				<div id="erro_cad"></div>
				
				<div class="container">
					<label for="prontuario"><b>CPF</b></label>
					<input type="cpf" placeholder="Digite seu CPF" name="cpf" id="cpf" required>
					
					<label for="email"><b>Endereço de e-mail</b></label>
					<input type="text" placeholder="Digite seu e-mail" name="emai_cad" id="email_cad" required>
					
					<label for="tipo"><b>Tipo</b></label>
					<select name="tipo" id="tipo">
						<option value="professor">Professor</option>
						<option value="administrador">Administrador</option>
						<option value="aluno">Aluno</option>
					</select>

					<label for="senha"><b>Senha</b></label>
					<input type="password" placeholder="Digite sua senha" name="senha_cad" id="senha_cad" required>
							
					<label for="confirmar senha"><b>Confirmar Senha</b></label>
					<input type="password" placeholder="Confirme sua senha" name="conf_senha" id="conf_senha" required>
				  
					<input type="submit" name="codastrar" value="cadastro" class="submitbtn" />

					<input type="checkbox" name="lembrete_cad" value="sim" id="lembrete_cad" />
					<label for="lembrete">Lembrar do meu cadastro</label>
				</div>
				
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" class="cancelbtn cancelbtn_cad_aluno">Cancelar</button>
				</div>
				
			</form>
			
		</div>

		<script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/MD5.js"></script>
		<script src="../js/login.js"></script>
		<noscript>Seu navegador não suporta JavaScript</noscript>
	</body>
	
</html>