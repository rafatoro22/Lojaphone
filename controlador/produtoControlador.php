<?php
// lembre de autenticar os dados do adicionar e editar
require "modelo/produtoModelo.php";
require "servicos/uploadImagem.php";

/** anon */
function index() {
    $dados["produto"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}
/** admin */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $imagem_name    = $_FILES["imagemProduto"]["name"];
        $imagem_tmp     = $_FILES["imagemProduto"]["tmp_name"];

        $diretorio_imagem   = uploadImagem($imagem_name, $imagem_tmp);

        alert(adicionarProduto($marca, $modelo, $preco, $quantidade, $diretorio_imagem));
        redirecionar("produto/index");
    } else {
        exibir("produto/formulario");
    }
}
/** admin */
function deletar($idProduto) {
    alert(deletarProduto($idProduto));
    redirecionar("produto/index");
}

/** admin */
function editar($idProduto) {
    if (ehPost()) {
        extract($_POST);
        alert(editarProduto($idProduto, $marca, $modelo, $preco, $quantidade, $cor, $imagem));
        redirecionar("produto/index");
    } else {
        $dados['produto'] = pegarProdutoPorId($idProduto);
        $dados['acao'] = "./produto/editar/$idProduto";
        exibir("produto/formulario", $dados);
    }
}

/** anon */
function visualizar($idProduto) {
    $dados['produto'] = pegarProdutoPorId($idProduto);
    exibir("produto/visualizar", $dados);
}
/** admin */

function compras() {
    $dados["compras"] = pegarTodasCompras();
    exibir("produto/compras", $dados);
}
?>