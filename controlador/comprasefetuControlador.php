<?php
require_once "modelo/compraefetuModelo.php";

function index() {
    $dados["compras"] = pegarTodasCompras();
    exibir("produto/compras", $dados);
}
?>