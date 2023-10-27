<?php
require_once ('../vendor/autoload.php');
use UrPapuh\QrGenerator\QrBuilder;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Generator</title>
</head>
<body>
    <h1>QR Code Generator</h1>
    <form action="index.php" method="post">
        <table id="form">
            <tr>
                <td>
                    <label for="data">Contenido ( [http/https]://[domain-name]/ ): </label>
                </td>
                <td>
                    <input type="text" name="data">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="label">Texto: </label>
                </td>
                <td>
                    <input type="text" name="label">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="filename">Nombre de Archivo: </label>
                </td>
                <td>
                    <input type="text" name="filename">
                </td>
            </tr>
            <tr>                       
                <td>
                    <input type="submit" value="Generar codigo">
                </td>
            </tr>
        </table>
<?php
    if (isset($_POST['data']) && isset($_POST['label']) && isset($_POST['filename'])) {
        $code = QrBuilder::create($_POST['data'], $_POST['label'], $_POST['filename']);
?>
        <table id="result">
            <tr>
                <td>
                    <label for="qrcode">QR generado para <?=$_POST['data']?>: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/<?=$_POST['filename']?>.png" name="qrcode">
                </td>
            </tr>
        </table>
<?php
    }
?>
    </form>
</body>
</html>