<h2>Visão</h2>
<p>id: <?=$usuario['idUsuario']?></p>
<p>nome: <?=$usuario['nome']?></p>
<p>email: <?=$usuario['email']?></p>
<?php require "./servicos/correiosServico"; enviarEmail($usuario['email']); ?>

<a href="./carrinho/adicionar/<?=$usuario['idUsuario']?>">Comprar</a>