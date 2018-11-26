<center>
<h2><b>Celular</h2></b></h2>
<p><b>Marca: </b><?=$produto['marca']?><br>
<b>Modelo: </b><?=$produto['modelo']?><br>
<b>Preço:</b> R$ <?=$produto['preco']?><br><br>
<img height="400px" width="300px" src="<?php echo $produto['imagem'];?>"></a></p><br>
<a class="btn btn-danger"href="./carrinho/adicionar/<?=$produto['idProduto']?>">Comprar</a>
</center>
<br>
<br>


