<?php
// Incluir Composer
include_once('./vendor/autoload.php');

// Criar a variável com a URL para o QRCode
$url = 'https://celke.com.br/curso/curso-de-php';

// Imprimir o título
echo "<h2>Gerar QRCode da URL: $url</h2>";

// Gerar QRCode: instanciar a classe QRCode e enviar os dados para o render gerar o QRCode
$qrcode = (new \chillerlan\QRCode\QRCode())->render($url);
//var_dump($qrcode);

// Imprimir o QRCode
echo "<img src='$qrcode'>";

?>