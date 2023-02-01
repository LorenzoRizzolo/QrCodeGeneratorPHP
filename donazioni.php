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
    <title>QR-Donazioni</title>
</head>
<body>
    <style>
        .box h2{
            margin:10px;
        }
    </style>

    <div class="box">
        <img src="icons/favicon.png" alt="logo">
        <nav>
            <ul>
                <div><a href="/">Home</a></div>
                <div><a href="creatore.php">Creatore</a></div>
            </ul>
        </nav>
        <h2>Donazioni </h2><h2> Quanto vuoi donare ? </h2>
        <form method="post">
            <select name="denaro">
                <option value="0.5">0.5 &euro;</option>
                <option value="1">1 &euro;</option>
                <option value="2">2 &euro;</option>
                <option value="2.5">2.5 &euro;</option>
                <option value="3">3 &euro;</option>
                <option value="3.5">3.5 &euro;</option>
                <option value="4">4 &euro;</option>
                <option value="4.5">4.5 &euro;</option>
                <option value="5">5 &euro;</option>
            </select>
            <div align="right">
                <input class="but" type="submit" name="dona" value="Dona">
            </div>
        </form>
        <?php
        if(isset($_POST['dona'])){
            $valore = $_POST['denaro'];
            echo "<script>window.open('https://www.paypal.com/paypalme/lorenzorizzolo/".$valore."','_self')</script>";
        }
        ?>
   </div>

</body>
</html>