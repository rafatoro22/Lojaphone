<?php

require "modelo/cupomModelo.php";

/** admin */
function index(){

    $dados["cupons"] = pegarTodosCupons();
    exibir("cupom/listar", $dados);

}
/** admin */
function adicionar(){

	if(ehPOST()){

		extract($_POST);

		$nmCupom = validarNomes($nmCupom);
		$desconto = validarNumero($desconto);

		$upper = implode('', range('A', 'Z'));
		$lower = implode('', range('a', 'z'));
		$nums = implode('', range(0, 9));

		$alphaNumeric = $upper.$lower.$nums;
		$len = 9; // numero de caracteres
		for($i = 0; $i < $len; $i++) {
    			$codigo .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
		}

   	 	alert(adicionarCupom($nmCupom, $codigo, $desconto));
    	redirecionar("cupom/index");

	}else{

			exibir("cupom/formulario");

	}
}

/** anon */
function visualizar($codigo) {
    $dados['cupom'] = pegarCupomPorCodigo($codigo);
    exibir("cupom/visualizar", $dados);
}

/** admin */
function deletar($codigo){

	alert(deletarCupom($codigo));
    redirecionar("cupom/index");

}

/** admin */
function editar($codigo) {
    if (ehPost()) {
        extract($_POST);
        alert(editarCupom($codigo, $nmCupom, $desconto));
        redirecionar("cupom/index");
    } else {
        $dados['cupom'] = pegarCupomPorCodigo($codigo);
        $dados['acao'] = "./cupom/editar/$codigo";
        exibir("cupom/formulario", $dados);
    }
}

?>
