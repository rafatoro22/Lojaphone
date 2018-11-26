<h2>Visão</h2>
<?php if(!empty($_SESSION["auth"])){ 

			if ($_SESSION["auth"]["role"] == "admin"){ ?>

	<p>Código: <?=$cupom['codigo']?></p>

<?php }} ?>

<p>Nome do Cupom: <?=$cupom['nmCupom']?></p>
<p>Desconto: <?=$cupom['desconto']?></p>
<!-- <img src="<?php echo $produto['imagem'];?>"></a> -->

