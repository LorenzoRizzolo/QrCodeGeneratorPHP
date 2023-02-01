<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="icons/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="icons/favicon.png" type="image/x-icon">
    <title>QRCodeGenerator</title>
</head>

<?php
require "phpqrcode/qrlib.php" ;
?>

<body>
    <?php
            if(isset($_POST['genera'])){
                $nome = "qr/".$_POST['nome'].".png";
                $colore = $_POST['color'];
                // switch($colore){
                //     case '1':
                //         $colore=
                // }
                $text = $_POST['text'];

                // creo il qr
                require_once('phpqrcode/qrlib.php');
                //genera qr 
                $pixel_size = 10;
                $frame_size = 2;
                $ecc = "QR_ECLEVEL_L";
                QRcode::png($text, $nome, $ecc, $pixel_size, $frame_size);
                if($text == "" || $text == " "){
                    if($nome == "qr/.png" || $nome == "qr/ .png"){
                        echo "<div class='errore'>Testo e Nome sono vuoti</div>";
                    }else{
                        echo "<div class='errore'>Testo vuoto</div>";
                    }
                }else{
                    echo "<div class='scarica'>";
                    echo"<img class='qr' src='".$nome."' alt='qr non generato'><br>";
                    echo "<div align='right'><div class='but'><a href='".$nome."' download>Scarica QR Generato</a></div></div>";
                    echo"</div>";
                }
            }
        ?>
    <div class="box">
        <img src="icons/favicon.png" alt="logo">
        <nav>
            <ul>
                <div><a href="creatore.php">Creatore</a></div>
                <div><a href="donazioni.php">Donazioni</a></div>
                <?php
                $iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
                $ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
                $ipod = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
                $android = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"Android");
                $webos = (bool) strpos($_SERVER['HTTP_USER_AGENT'],"windows");
                $mobile = true;
                if($ipad || $iphone || $android || $webos || $ipod){
                    echo "<br><br><br>";
                }
                ?>
                <div><a href="/">Ricarica pagina</a></div>
            </ul>
        </nav>
        <h2>Generatore di QRCode</h2>
        <form method="post">

            <h3>Inserisci il nome con cui scaricare il QRCode</h3>
            <input type="text" name="nome" placeholder="nome QR">

            <!-- <h3>Scegli il colore del QR</h3>
            <select name="color">
                <option value="1">Nero</option>
                <option value="2">Blu</option>
                <option value="3">Rosso</option>
                <option value="4">Verde</option>
            </select> -->

            <h3>Inserisci il testo o il link da inserire dentro al QR</h3>
            <textarea name="text" placeholder="testo del QR" cols="30" rows="5"></textarea>

            <h3>Clicca per generare il QR</h3>
            <div align="right">
            <input class="but" type="submit" name="genera" value="Genera QR">
            </div>
        </form>
    </div>

</body>
</html>