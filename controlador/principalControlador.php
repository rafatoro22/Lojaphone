<?php

require_once "modelo/produtoModelo.php";
require "servicos/uploadImagem.php";


/** anon */
function index() {
    $dados["produto"] = pegarTodosProdutos();
    exibir("/principal", $dados);
}


