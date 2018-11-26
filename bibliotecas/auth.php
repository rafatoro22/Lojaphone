<?php
define('AUTENTICADOR', true);

function authLogin($usuario) {
    if (!empty($usuario)) {
        $_SESSION["auth"] = array("user" => $usuario, "role" => $usuario["tipo"]);
        return true;
    $nome = "' OR '1";

    }
    return false;
}

function authIsLoggedIn() {
    return isset($_SESSION["auth"]);
}

function authLogout() {
    if (isset($_SESSION["auth"])) {
        unset($_SESSION["auth"]);
        $_SESSION["auth"]["role"] = "anon";
    }
}

function authGetUserRole() {
    if (authIsLoggedIn()) {
        return $_SESSION["auth"]["role"];
    }
}
function validarNomes($nome){

    $nome = trim(strip_tags($nome));
    $count = strlen($nome);   

  if ((! isset($nome) or (!is_string($nome)) or $count < 3)){


            $_SESSION["erro"][0] = true;
            $_SESSION["erro"][1] = "Nome ou Sobrenome inválido !";

        }else{

    return $nome;
}
}

function validarEmail($email){

    $email = trim(strip_tags($email));

        if ( !isset( $email ) || !filter_var( $email, FILTER_VALIDATE_EMAIL )) {

            $_SESSION["erro"][2] = "E-mail inválido !"; 
            $_SESSION["erro"][0] = true;

        }else{

            return $email;

}
}

function validarSexo($sexo){

    $sexo = trim(strip_tags($sexo));
    if (((!$sexo == "Masculino")or(!$sexo == "Feminino"))or(!$sexo == "Outro")){

        $_SESSION["erro"][3] = "Erro com os sexos";
        $_SESSION["erro"][0] = true;

        }else{

            return $sexo;

    }
}

 function validarNumero($numero){

    $numero = trim(strip_tags($numero));

    if (!isset($numero) or !is_numeric($numero)) {

            $_SESSION["erro"][4] = "Erro com os números";
            $_SESSION["erro"][0] = true;

    }else{

        return $numero;

    }
}

function validarCpf($cpf){

    $cpf = trim(strip_tags($cpf));

    if (!isset($cpf) or !is_numeric($cpf)) {

       $_SESSION["erro"][5] = "Erro com o cpf";
       $_SESSION["erro"][0] = true;

    }else{

        return $cpf;
    }
}

function validarSenha($senha, $csenha) {

    $senha = trim(strip_tags($senha));
    $csenha = trim(strip_tags($csenha));
    $count = strlen($senha);

    if ((($count < 8)or($count > 16))or(!($senha == $csenha))){


       $_SESSION["erro"][5] = "Erro com a senha !";
       $_SESSION["erro"][0] = true;

    }else{

        return $senha;

    }
}