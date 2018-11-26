<?php

require_once "modelo/usuarioModelo.php";


/** anon */
function index() {
    $dados["usuarios"] = pegarTodosUsuarios();
    exibir("usuario/listar", $dados);
}

/** anon */
function adicionar() {
    if (ehPost()) {
        extract($_POST);

        $nome = validarNomes($nome);
        $sobrenome = validarNomes($sobrenome);
        $email = validarEmail($email);
        $sexo = validarSexo($sexo);
        $numero = validarNumero($numero);
        $cpf = validarCpf($cpf);
        $senha = validarSenha($senha, $csenha);

 if ($_SESSION["erro"][0] <> true){

        alert(adicionarUsuario($nome, $sobrenome, $email, $sexo, $numero, $cpf, $senha));
        redirecionar("principal");
} else{

    $dados["erro"] = $_SESSION["erro"];
    exibir("usuario/formulario", $dados);

}      
    
    } else {
        exibir("usuario/formulario");
    }
}

/** admin */
function deletar($idUsuario) {
    alert(deletarUsuario($idUsuario));
    redirecionar("usuario/index");
}

/** admin  */
function editar($idUsuario) {
    if (ehPost()) {
        extract($_POST);

        $nome = validarNomes($nome);
        $sobrenome = validarNomes($sobrenome);
        $email = validarEmail($email);
        $sexo = validarSexo($sexo);
        $numero = validarNumero($numero);
        $cpf = validarCpf($cpf);
        $senha = validarSenha($senha, $csenha);

if ($_SESSION["erro"][0] <> true){

        alert(editarUsuario($idUsuario, $nome, $sobrenome, $email, $sexo, $numero, $cpf, $senha));
        redirecionar("usuario/index");

} else{

    $dados["erro"] = $_SESSION["erro"];
    exibir("usuario/formulario", $dados);

}   
        
    } else {
        $dados['usuario'] = pegarUsuarioPorId($idUsuario);
        $dados['acao'] = "./usuario/editar/$id";
        exibir("usuario/formulario", $dados);
    }
}

/** anon */
function visualizar($id) {
    $dados['usuario'] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}

/** admin, user */ 
function perfil(){

    $dados = array();
    $dados = $_SESSION["auth"];

    exibir ("usuario/visualizarPerfil", $dados);

}

/** admin, user */
function editarPerfil($idUsuario){
    if ($_SESSION["auth"]["user"]["idUsuario"] = $idUsuario){

         if (ehPost()) {
        extract($_POST);

        $nome = validarNomes($nome);
        $sobrenome = validarNomes($sobrenome);
        $email = validarEmail($email);
        $sexo = validarSexo($sexo);
        $numero = validarNumero($numero);
        $cpf = validarCpf($cpf);
        $senha = validarSenha($senha, $csenha);

if ($_SESSION["erro"][0] <> true){

        alert(editarUsuario($idUsuario, $nome, $sobrenome, $email, $sexo, $numero, $cpf, $senha));
        redirecionar("usuario/index");

} else{

    $dados["erro"] = $_SESSION["erro"];
    exibir("usuario/formulario", $dados);

}   
        
    } else {
        $dados['usuario'] = pegarUsuarioPorId($idUsuario);
        $dados['acao'] = "./usuario/editar/$idUsuario";
        exibir("usuario/formulario", $dados);
    }
}

}
?>