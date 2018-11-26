
<center>
<h2><b>Listar usuários</b></h2><br>
</center>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>VIS
            UALIZAR</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
        </tr>
    </thead>
    <?php 
        foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?=$usuario['idUsuario']?></td>
        <td><?=$usuario['nome']?></td>
        <td><?=$usuario['email']?></td>
        <td><a href="./usuario/visualizar/<?=$usuario['idUsuario']?>" class="btn btn-secondary">Visualizar</a></td>
        <td><a href="./usuario/editar/<?=$usuario['idUsuario']?>" class="btn btn-info">Editar</a></td>
        <td><a href="./usuario/deletar/<?=$usuario['idUsuario']?>" class="btn btn-danger">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table><br>

<center>
<a href="./usuario/adicionar" class="btn btn-primary">Adicionar novo usuario</a>
</center><br>
