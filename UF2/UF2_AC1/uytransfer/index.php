<html>
    <head>
        <title>index</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    </head>

    <body>
    	<form name="datos" action="upload.php" method="post" enctype="multipart/form-data">
    <?php
    echo "<table width=\"100%\" bordercolor=\"#FA5858\" bgcolor=\"#FA5858\">
    <tr>
   <td width=\"75%\"><a href=\"https://www.google.com\">Uy!Transfer</a></td>
    <td><a href=\"upload.php\">Enviar archivo</a></td>
    <td><a href=\"https://www.google.com\">Mis ultimos archivos</a></td>
    <tr>
    </table>";

	echo "<div class=\"espacio\"><input type=\"text\" name=\"nom\"id=\"nom\" value=\"tu nombre cariño\"/></div>";

	echo "<div class=\"espacio\"><input type=\"file\" name=\"archiu\" id=\"archiu\"/></div>";
 	
	echo "<div class=\"espacio\"><input type=\"checkbox\" name=\"validacion\" id=\"validacion\" /><label for=\"validacio\">Quiero enviar el link de descarga por email</label></div>";

	echo "<div class=\"espacio\"><input type=\"text\" name=\"email\" id=\"email\" value=\"El email del destinatario cariño\"/></div>";
 	
	echo "<div class=\"espacio\"><label for=\"area\">Mensaje</label><textarea name=\"area\" id=\"area\"></textarea></div>";
 	
	echo "<div class=\"espacio\"><button type=\"submit\">Subir archivo</button></div>";
 	

 	?>
    </body>
</html>