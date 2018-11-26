<?php

function pegarTodosCupons() {
    $sql = "SELECT * FROM cupom";
    $resultado = mysqli_query(conn(), $sql);
    $cupom = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $cupom[] = $linha;
    }
    return $cupom;
}
function adicionarCupom($nmCupom, $codigo, $desconto) {
    $sql = "INSERT INTO cupom (nmCupom, codigo, desconto, status) 
			VALUES ('$nmCupom', '$codigo', '$desconto', 'NaoAtivado')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao cadastrar Cupom' . mysqli_error($cnx)); }
    return 'Cupom cadastrado com sucesso!';
}

function deletarCupom($codigo) {
    $sql = "DELETE FROM cupom WHERE codigo = '$codigo'";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao deletar Cupom' . mysqli_error($cnx)); }
    return 'Cupom deletado com sucesso!';
            
}

function pegarCupomPorCodigo($codigo) {
    $sql = "SELECT * FROM cupom WHERE codigo = '$codigo'";
    $resultado = mysqli_query(conn(), $sql);
    $cupom = mysqli_fetch_array($resultado);
    return $cupom;
}

function editarCupom($codigo, $nmCupom, $desconto) {
    $sql = "UPDATE cupom SET nmCupom = '$nmCupom', desconto = '$desconto' WHERE codigo = '$codigo'";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cupom' . mysqli_error($cnx)); }
    return 'Cupom alterado com sucesso!';
}

?>