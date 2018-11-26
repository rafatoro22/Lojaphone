<?php

// require "PHPMailer.php";

function calcular_frete($cep_origem,
    $cep_destino,
    $peso, // em quilogramas
    $valor, // valor de serviço adicionais
    $tipo_do_frete, // Se é PAC ou Sedex
    $altura = 6,
    $largura = 20,
    $comprimento = 20){
    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoProria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";
    //Sedex: 40010
    //Pac: 41106
    $xml = simplexml_load_file($url);
    echo "<pre>";
    var_dump($xml);
    return $xml->cServico;
}
 // function enviarEmail($email){

// error_reporting(E_ALL);
// $de = "raul.ifsp@gmail.com";
// $para = "$email";
// $assunto = "E-mail da Lojaphones";
// $msg = "Você foi cadastrado com sucesso !";
// $final = "De:". $de;
// mail($para, $assunto, $msg, $final);
// echo "A mensagem de e-mail foi enviada.";

// }

// // Instância do objeto PHPMailer
// $mail = new PHPMailer;
 
// // Configura para envio de e-mails usando SMTP
// $mail->isSMTP();
 
// // Servidor SMTP
// $mail->Host = 'smtp.gmail.com';
 
// // Usar autenticação SMTP
// $mail->SMTPAuth = true;
 
// // Usuário da conta
// $mail->Username = 'raul.ifsp@gmail.com';
 
// // Senha da conta
// $mail->Password = 'rodrigues60';
 
// // Tipo de encriptação que será usado na conexão SMTP
// $mail->SMTPSecure = 'ssl';
 
// // Porta do servidor SMTP
// $mail->Port = 465;
 
// // Informa se vamos enviar mensagens usando HTML
// $mail->IsHTML(true);
 
// // Email do Remetente
// $mail->From = 'raul.ifsp@gmail.com';
 
// // Nome do Remetente
// $mail->FromName = 'Raul';
 
// // Endereço do e-mail do destinatário
// $mail->addAddress('raul.ifsp@gmail.com');
 
// // Assunto do e-mail
// $mail->Subject = 'Sucesso no cadastro !';
 
// // Mensagem que vai no corpo do e-mail
// $mail->Body = '<h1>Mensagem enviada via PHPMailer</h1>';
 
// // Envia o e-mail e captura o sucesso ou erro
// if($mail->Send()):
//     echo 'Enviado com sucesso !';
// else:
//     echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
// endif;
// }
?>