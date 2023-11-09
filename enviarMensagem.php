<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$corpo = "

<h1><b>Contato SisBen: </b></h1><hr>

".$msg."<br /><br />

Para responder utilize o seguinte email: ".$email."

<hr>
";

$para = "umbrellacorps8@gmail.com";
$assunto = "Contato SisBen";
$menssagem = $corpo;
$cabecalho = "MIME-Version: 1.0" . "\r\n";
$cabecalho .= "Content-type: text/html; charset=ISO 8859-1" . "\r\n";
$cabecalho .= "from: SisBen <contato@sisben.pe.hu>" . "\r\n";
mail($para, $assunto, $menssagem, $cabecalho);

echo '<script type="text/javascript">alert("Mensagem enviada!");window.location=("index");</script>';

?>