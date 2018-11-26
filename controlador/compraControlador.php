<?php
if (!isset($_SESSION["carrinho"])){
session_start();
}
require "./modelo/compraModelo.php";

/** user, admin */
function index(){
	$total = $_SESSION["total"];
	if (ehPost()){
		(extract($_POST));

	 // 	echo $_SESSION["total"];

	 	$cupom = selecionarCupom($codigo, $_SESSION["auth"]["user"]["idUsuario"]);
	 	$nome = usuarioCupom($codigo); 
		$desconto = $cupom["desconto"]/100;
	 	
		if ($desconto == 0){

			$dados["erro"] = "Este cupom já foi usado por: ".$nome["nome"];
			exibir("carrinho/listar", $dados);
			die();

		}
	 	$preco = 0;
		$count = count($_SESSION["carrinho"]);
		$idProduto = 0;
		$quantidadeProduto = 0;
		$idUsuario = $_SESSION["auth"]["user"]["idUsuario"];
		for ($i = 0; $i < $count; $i++){

			$idProduto = $_SESSION["carrinho"][$i]["idProduto"];
			$quantidade = $_SESSION["carrinho"][$i]["quantidadeNoCarrinho"];
			$preco = selecionarPreco($idProduto);
			$remocao = removerEstoque($idProduto);

				if ($remocao = true){

					$preco["preco"] = $preco["preco"]-($preco["preco"] * $desconto);
					adicionarCompra($idProduto, $idUsuario, $preco["preco"]*$quantidade, $quantidade);

				}
}
			

}
	$_SESSION["carrinho"] = null;
	redirecionar("produto/index/");


}

/** admin, user */
function finalizarCompra($total){
$preco = 0;
$count = count($_SESSION["carrinho"]);
$idProduto = 0;
$quantidadeProduto = 0;
$idUsuario = $_SESSION["auth"]["user"]["idUsuario"];
for ($i = 0; $i < $count; $i++){

	$idProduto = $_SESSION["carrinho"][$i]["idProduto"];
	$quantidade = $_SESSION["carrinho"][$i]["quantidadeNoCarrinho"];
	echo "São ".$quantidade." unidades do produto ".$idProduto." o total custa ".$total;
	$preco = selecionarPreco($idProduto);
	$remocao = removerEstoque($idProduto);

		if ($remocao = true){

			adicionarCompra($idProduto, $idUsuario, $preco["preco"]*$quantidade, $quantidade);

		}
}
	$_SESSION["carrinho"] = null;
	redirecionar("produto/index/");
}

?>