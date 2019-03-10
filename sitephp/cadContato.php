<?php
include  "connect.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$conteudo = $_POST['conteudo'];
$headers = 'MIME-version: 1.0'. "\r\n";
$headers .= 'content-type: text/html; charset=iso-8859-1'. "\r\n";
$headers .= 'To: Romario Sousa<estreladamanha585@gmail.com>'. "\r\n";
$headers .='From: <contato@sitephp.com.br>'. "\r\n";
$headers .='Reply-To: <contato@sitephp.com.br>'. "\r\n";


$to = 'estreladamanha585@gmail.com';

$envio = mail($to, $assunto, $conteudo, $headers);
if($envio) {
  echo "Email enviado corretamente<br>";
  echo "<a href=index.php>Voltar</a>";
}else {
  echo "Erro de envio!<br>";
    echo "<a href=contato.php>Voltar</a>";
}
 ?>
