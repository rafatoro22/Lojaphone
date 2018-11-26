<?php
function uploadImagem($SourceImage, $imagem_tmp) {
	$imagem				= basename($SourceImage);
	$diretorio_mover	= "publico/img/produtos/" . $imagem;
	$diretorio   		= "./publico/img/produtos/";
	$resultado = move_uploaded_file($imagem_tmp, $diretorio_mover);
	$diretorio_imagem = $diretorio_mover;
	if(!$resultado) {
		die("Upload Falhou...");
	}
	return $diretorio_imagem;
}