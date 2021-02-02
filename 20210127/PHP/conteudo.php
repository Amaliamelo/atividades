<?php
	function exibir($titulo, $conteudos) {
		$html = "<!DOCTYPE html>\n";
		$html .= "<html lang='pt-BR'>\n";
		$html .= "\t<head>\n";
		$html .= "\t\t<meta charset='UTF-8' />\n";
		$html .= "\t\t<title>".$titulo."</title>\n";
		$html .= "\t\t<link rel='stylesheet' href='../css/estilos.css' type='text/css'>\n";
		$html .= "\t\t<script src='../js/jquery-3.5.1.min.js'></script>\n";
		$html .= "\t\t<script src='../js/login.js'></script>\n";
		$html .= "\t</head>\n";
		$html .= "\t<body>\n";
		$html .= "\t<main class='container'>\n";
		foreach($conteudos as $conteudo) {
			$html .= "\t\t".$conteudo."\n";
		}
		$html .= "\t</main>\n";
		$html .= "\t</body>\n";
		$html .= "</html>";
		echo $html;
	}
?>