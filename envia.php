<html>
    <head>
        <title>DITL - Inteligência PAMA-LS</title>   
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
		<link rel='stylesheet' href='./relprev.css' type='text/css' media='screen'></link>
    </head>
<?php


$dataServidor = date("d/m/Y H:i:s");
$local = $_POST['local'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$fatos_observados = $_POST['situacao'];

if(!empty($_POST['email'])){
	$email = $_POST['email'];
}else{
	$email = "Anônimo";
}

if(!empty($_POST['relator'])){
	$relator = $_POST['relator'];
}else{
	$relator = "Anônimo";
}


//$imagem_nome="dom.jpg";
//$arquivo=fopen($imagem_nome,'r');
//$contents = fread($arquivo, filesize($imagem_nome));
//$encoded_attach = chunk_split(base64_encode($contents));
//fclose($arquivo);


 $body = "
<html>
    <head>
        <title>DITL - Inteligência PAMA-LS</title>   
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
		<link rel='stylesheet' href='./relprev.css' type='text/css' media='screen'></link>
    </head>
	
    <body cz-shortcut-listen='true' id='body' bgcolor='#F8F8FF'> 
        <div id='tudo'>	
            <div id='cabecalho'>
            <table border='0'>
                <tr>
                    <td width='29%'><img src='cid:img_dom' width='150'></td>
                    <td>
                        <h2>Relatório de Vulnerabilidades - PAMA-LS</h2>                        
                        <b>Local:</b> $local<br>
                        <b>Data</b> $data<br>
                        <b>Hora:</b> $hora<br>
                        <b>Relator:</b> $relator<br>
                        <b>E-mail:</b> $email<br>                        
                    </td>
                </tr>
            </table>
            <br>
            <br>         
            <b>Fatos Relatados:</b> <br>
            $fatos_observados                                                      
            </div>
        </div>
    </body>
</html>";
//$body .= "Content-type: image/jpeg; name=\"$imagem_nome\"\r\n";
//$body .= "Content-Transfer-Encoding: base64\r\n";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



#
# Exemplo de envio de e-mail SMTP PHPMailer - www.secnet.com.br
#
# Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");

# Inicia a classe PHPMailer
$mail = new PHPMailer();

# Define os dados do servidor e tipo de conex?
$mail->IsSMTP(); // Define que a mensagem ser?SMTP
$mail->Host = "mail.intraer"; # Endere? do servidor SMTP
$mail->Port = 587; // Porta TCP para a conex?
$mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se dispon?el
$mail->SMTPAuth = true; # Usar autentica?o SMTP - Sim
$mail->Username = ''; # Usu?io de e-mail
$mail->Password = ''; // # Senha do usu?io de e-mail

# Define o remetente (voc?
$mail->From = "r"; # Seu e-mail
$mail->FromName = ""; // Seu nome

# Define os destinat?io(s)
//$mail->AddAddress('sint.ciaar@fab.mil.br', 'SINT - CIAAR'); # Os campos podem ser substituidos por vari?eis
$mail->AddAddress('ditl@fab.mil.br', 'DITL - PAMA-LS'); # Os campos podem ser substituidos por vari?eis


#$mail->AddCC('ciclano@site.net', 'Ciclano'); # Copia
#$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); # C?ia Oculta

# Define os dados t?nicos da Mensagem
$mail->IsHTML(true); # Define que o e-mail ser?enviado como HTML
$mail->CharSet = 'UTF-8'; # Charset da mensagem (opcional)

# Define a mensagem (Texto e Assunto)
$mail->Subject = "DITL - Relatório de Vulnerabilidades - PAMA-LS"; # Assunto da mensagem
//$mail->Body = $body; #Corpo do e-mail
$mail->MsgHTML($body);
//$mail->AltBody = "Este ?o corpo da mensagem de teste, somente Texto! \r\n :)";

# Define os anexos (opcional)
#$mail->AddAttachment("c:/temp/documento.pdf", "documento.pdf"); # Insere um anexo
$mail->AddEmbeddedImage('dom.jpg', 'img_dom');
# Envia o e-mail
$enviado = $mail->Send();

# Limpa os destinat?ios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

# Exibe uma mensagem de resultado (opcional)
if ($enviado) {
	
 echo "<center><br><br><br><br><br><br><br><br><br><br>
 <table>
 <tr>
 <td><td width='29%'><img src='dom.png' width='85'></td>
 <td><font color='#FFFFFF'><h2>Relatório enviado com sucesso!</h2></font></td>
 </tr>
 </table>
 
 </center>";

} else {
	echo "<center><br><br><br><br><br><br><br><br><br><br>
 <table>
 <tr>
 <td><td width='29%'><img src='dom.png' width='85'></td>
 <td><font color='#FFFFFF'><h2>Não foi possível enviar o e-mail <b>Informações do erro:</h2></font></td>
 </tr>
 </table>
 
 </center>";
 echo "<center></b> " . $mail->ErrorInfo;
}

?>
</body>
</html>

