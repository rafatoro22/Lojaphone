<?php

function pegarTodasCompras() {
    $sql = "SELECT * FROM compra";
    $resultado = mysqli_query(conn(), $sql);
    $compras = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $compras[] = $linha;
    }
    return $compras;
}