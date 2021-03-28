<html>
    <head>
        <title>upload</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    </head>

    <body>
    	<form name="datos" action="upload.php" method="post" enctype="multipart/form-data">
    <?php
    


$uploadOk = 1;

$nomUsuari = $_POST["nom"];
$email = $_POST["email"];

$nom = $_FILES["archiu"]["name"];
                $rutaTmp = $_FILES["archiu"]["tmp_name"];
                $tamanyo = $_FILES["archiu"]["size"];
                $tipo = $_FILES["archiu"]["type"];
                $Extensio = substr($nom, strpos($nom, "."));


$Any = date("Y");
$Mes = date("m");
$Dia = date("d");
$NumAleatori = mt_rand(10000,99999);
$rutaDestino = "files/".$Any.$Mes.$Dia.$NumAleatori.$Extensio;
$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/$rutaDestino";

if (strpos($email, "@") == false) {
              header ("location: index.php");
               echo "Introduce un correo valido";
                  
}

// Check file size
if ($_FILES["archiu"]["size"] > 10485760) {
  $uploadOk = 0;
  echo "Vas muy acelerado, mejor sube algo igual o mas pequeñito que 10 megas chavalote.";
}

// Allow certain file formats
if($Extensio != ".jpg" && $Extensio != ".png" && $Extensio != ".pdf" && $Extensio != ".rar" && $Extensio != ".zip") {
    echo "No tan deprisa despistao, solamente puedes subir archivos de tipo jpg, png, pdf, rar o zip no me seas guarro i usa un convertidor o algo.";
  $uploadOk = 0;
}

 $to = $_POST["email"];
 $message = $_POST["missatge"] && $linkDescarga;
 $subject = "Missatge enviat per uytransfer";

if(isset($_POST["validacion"]) && $_POST["missatge"] = true){

 mail($to,$subject,$message);

}

else if($_POST["validacion"] = true){
    
    $message2 = "Sorpresa!! Alguien ha compartido contigo un archivo. <a href=\"$rutaDestino\">$linkDescarga</a>";
     
     mail($to,$subject,$message2);
}

else{
    $message3 = "No te he envidado ninguna url";
    mail($to,$subject,$message3);
}
    echo "<table width=\"100%\" bordercolor=\"#FA5858\" bgcolor=\"#FA5858\">
    <tr>
   <td width=\"75%\"><a href=\"index.php\">Uy!Transfer</a></td>
    <td><a href=\"upload.php\">Enviar archivo</a></td>
    <td><a href=\"cookies.php\">Mis ultimos archivos</a></td>
    <tr>
    </table><br>";

    
    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<table><tr><td><img src=\"images/no.jpg\"></td><td><strong>No se ha subido nada, date por avisado.</strong></td></table>";
} else {

  if (move_uploaded_file($rutaTmp, $rutaDestino)) {
     
     if($nomUsuari==''){
     echo "<table><tr><td><img src=\"images/ok.png\"></td><td><strong>Archivo enviado correctamente</strong></td><tr><td></td><td><p>Oye tu!! Usa éste link para compartir tu archivo: <a href=\"$rutaDestino\">$linkDescarga</a></p></td>";
    } else{
        
                
        echo "<table><tr><td><img src=\"images/ok.png\"></td><td><strong>Archivo enviado correctamente</strong></td><tr><td></td><td><p>Hola $nomUsuari, usa éste link para compartir tu archivo: <a href=\"$rutaDestino\">$linkDescarga</a></p></td>";
     }
     
}
}


$numlinks = 1;
if(isset($_COOKIE["numlinks"])){
    $numlinks = $_COOKIE["numlinks"];
    $numlinks++;
}

setcookie("numlinks", $numlinks, time() + 60 * 60 * 24 * 7);
setcookie("rutaDestino$numlinks", $rutaDestino, time() + 60 * 60 * 24 * 7);
echo "Hecho";
 	?>
    </body>
</html>