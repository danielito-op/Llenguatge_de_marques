<html>
    <head>
        <title>header</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    </head>

    <body>
    	<form name="datos" action="upload.php" method="post" enctype="multipart/form-data">
    <?php
    
    echo "<table width=\"100%\" bordercolor=\"#FA5858\" bgcolor=\"#FA5858\">
    <tr>
   <td width=\"75%\"><a href=\"index.php\">Uy!Transfer</a></td>
    <td><a href=\"upload.php\">Enviar archivo</a></td>
    <td><a href=\"cookies.php\">Mis ultimos archivos</a></td>
    <tr>
    </table>";

    echo "<h1>Archivos enviados recientemente</h1>";
    $rutaDestino = $_COOKIE["rutaDestino"];

    if (isset($_COOKIE["numlinks"])){
        $numlinks = $_COOKIE["numlinks"];
    
        while (isset($_COOKIE["rutaDestino$numlinks"])) {
            echo "<p><a href=\"$rutaDestino\">$rutaDestino</a></p>";

            $numlinks--;
        }
    }

 	?>
    </body>
</html>