
 <center>
  <h2><b>Compras Efetuadas</b></h2>
 <br>
</center>
<br>
<table class="table">
    <thead>
        <tr>

            <th>ID COMPRA</th>
            <th>ID PRODUTO</th>
            <th>ID USUARIO</th>
            <th>PREÇO</th>
            <th>QUANTIDADE</th>
    <?php
    if (!empty($compra)){
        foreach ($compra as $compras): ?>
            <tr>

                <td><?=$compras['idcompra']?></td>
                <td><?=$compras['idproduto']?></td>
                <td><?=$compras['idusuario']?></td>
                <td><?=$compras['preco']?></td>
                <td><?=$compras['quantidade']?></td>
           
            </tr>
        <?php endforeach; } ?>
    </table>
    <br>
   