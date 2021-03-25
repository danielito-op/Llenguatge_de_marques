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


$nom = $_FILES["archiu"]["name"];
                $rutaTmp = $_FILES["archiu"]["tmp_name"];
                $tamanyo = $_FILES["archiu"]["size"];
                $tipo = $_FILES["archiu"]["type"];
                $Extensio = substr($nom, strpos($nom, "."));

$Any = date("Y");
$Mes = date("M");
$Dia = date("D");
$NumAleatori = mt_rand(10000,99999);
$rutaDestino = "files/".$Any.$Mes.$Dia.$NumAleatori.$Extensio;
$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/$rutaDestino";


// Check file size
if ($_FILES["archiu"]["size"] > 10485760) {
  $uploadOk = 0;
  echo "Vas mu acelerado, mejor sube algo igual o mas pequeñito que 10 megas chavalote.";
}

// Allow certain file formats
if($Extensio != ".jpg" && $Extensio != ".png" && $Extensio != ".pdf" && $Extensio != ".rar" && $Extensio != ".zip") {
    echo "No tan deprisa despistao que solamente puedes subir archivos de tipo jpg, png, pdf, rar o zip no me seas guarro i usa un convertidor o algo";
  $uploadOk = 0;
}

 
    
    echo "<table width=\"100%\" bordercolor=\"#FA5858\" bgcolor=\"#FA5858\">
    <tr>
   <td width=\"75%\"><a href=\"index.php\">Uy!Transfer</a></td>
    <td><a href=\"upload.php\">Enviar archivo</a></td>
    <td><a href=\"https://www.google.com\">Mis ultimos archivos</a></td>
    <tr>
    </table><br>";

    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<table><tr><td><img src=\"images/no.jpg\"></td><td><strong>No se ha subido nada, date por avisado.</strong></td></table>";
// if everything is ok, try to upload file
} else {

  if (move_uploaded_file($rutaTmp, $rutaDestino)) {
     
     if($nomUsuari==''){
     echo "<table><tr><td><img src=\"images/ok.png\"></td><td><strong>Archivo enviado correctamente</strong></td><tr><td></td><td><p>Oye tu!! Usa éste link para compartir tu archivo: <a href=\"$rutaDestino\">$linkDescarga</a></p></td>";
    } else{
        echo "<table><tr><td><img src=\"images/ok.png\"></td><td><strong>Archivo enviado correctamente</strong></td><tr><td></td><td><p>Hola $nomUsuari, usa éste link para compartir tu archivo: <a href=\"$rutaDestino\">$linkDescarga</a></p></td>";
     }
     
}
}

 	?>
    </body>
</html>