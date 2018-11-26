<?php 

require_once "servicos/correiosServico.php";

function pegarTodosUsuarios() {
    
    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query(conn(), $sql);
    $usuarios = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $usuarios[] = $linha;
    }
    return $usuarios;
}

function pegarUsuarioPorId($idUsuario) {
    $sql = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
    $resultado = mysqli_query(conn(), $sql);
    $usuario = mysqli_fetch_array($resultado);
    return $usuario;
}

function adicionarUsuario($nome, $sobrenome, $email, $sexo, $numero, $cpf, $senha) {
    $sql = "INSERT INTO usuario (nome, sobrenome, email, sexo, numero, cpf, senha, tipo) 
			VALUES ('$nome', '$sobrenome', '$email', '$sexo', '$numero', '$cpf', '$senha', 'user')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao cadastrar usuário' . mysqli_error($cnx)); }
        // if (enviarEmail($email)){

            return 'Usuario cadastrado com sucesso!';

        // }
}

function editarUsuario($idUsuario, $nome, $sobrenome, $email, $sexo, $numero, $cpf, $senha) {
    $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', sexo = '$sexo', numero = '$numero', cpf = '$cpf', senha = '$senha' WHERE idUsuario = $idUsuario";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar usuário' . mysqli_error($cnx)); }
    return 'Usuário alterado com sucesso!';
}

function deletarUsuario($idUsuario) {
    $sql = "DELETE FROM usuario WHERE idUsuario = $idUsuario";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao deletar usuário' . mysqli_error($cnx)); }
    return 'Usuario deletado com sucesso!';
            
}
function selecionarLogin($login,$passwd){
    print_r($login);
    $sql = "SELECT * FROM usuario WHERE nome = '$login' and  senha = '$passwd'" ;
    $resultado = mysqli_query($cnx = conn(), $sql);
    $registro = mysqli_fetch_assoc($resultado);

    return $registro;
}
