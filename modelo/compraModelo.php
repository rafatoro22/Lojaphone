<?php

function adicionarCompra($idProduto, $idUsuario, $preco, $quantidade){

    $sql = "INSERT INTO compra (idProduto, idUsuario, preco, quantidade) 
			VALUES ('$idProduto', '$idUsuario', '$preco', '$quantidade')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao cadastrar compra' . mysqli_error($cnx)); }
   
    return 'Compra cadastrada com sucesso!';

}

function selecionarPreco($idProduto){

	$sql = "SELECT preco FROM produto WHERE idProduto = '$idProduto'";
    $resultado = mysqli_query(conn(), $sql);
    $preco = mysqli_fetch_array($resultado);
    return $preco;

}

function selecionarCupom($codigo, $idUsuario){

	$sql = "SELECT desconto FROM cupom WHERE codigo = '$codigo' && status = 'NaoAtivado'";
	$resultado = mysqli_query(conn(), $sql);
    $desconto = mysqli_fetch_array($resultado);

        if(!$resultado) { die('Cupom não disponível' . mysqli_error($cnx)); }else{
   
   			$sqlInativar = "UPDATE cupom SET status = 'Ativado', idUsuario = '$idUsuario'  WHERE codigo = '$codigo'";
   			$resultado = mysqli_query($cnx = conn(), $sqlInativar);

    			if(!$resultado) { die('Erro ao configurar cupom' . mysqli_error($cnx)); }else{
    				return $desconto;
				}

		}
}

function UsuarioCupom($codigo){

	$sqlNome = "SELECT nome FROM cupom c INNER JOIN usuario u ON (u.idUsuario = c.idUsuario) WHERE c.codigo = '$codigo'";
    $resultadoNome = mysqli_query(conn(), $sqlNome);
    $nome = mysqli_fetch_array($resultadoNome);

     return $nome;

}

function removerEstoque($idProduto){

	$sql = "UPDATE produto SET quantidade = quantidade -
	(SELECT quantidade FROM compra WHERE idProduto = '$idProduto') WHERE idProduto = '$idProduto'";
  	$resultado = mysqli_query(conn(), $sql);

  	    if(!$resultado) { die('Erro ao configurar Estoque' . mysqli_error($cnx)); }else{
    		return false;
		}

}
?>