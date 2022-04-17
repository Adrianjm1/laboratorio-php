<?php

ini_set("SMT","");
ini_set("smtp_port","localhost");
ini_set("sendmail_from", "");

$correoDestino = "andrewgonza45@gmail.com";
$asunto = "Hacking";
$mensaje = "Estamos intentnando hackear tu cuenta";
$cabeceras = "From: adrian";
$cabeceras = "Content-type: text/html";
$cabeceras = "MIME-Version: 1.0";
$cabeceras = "X-Mailer: PHP/".phpversion();
$cabeceras = "Reply-To: adrian";

//enviar el correo

if (mail($correoDestino, $asunto, $mensaje, $cabeceras)) {
    # code...
    echo "Correo enviado";
}
else{
    echo "Correo no enviado";
}




?>