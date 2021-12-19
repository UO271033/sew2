<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="Ejercicio4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1>Ejercicio 4 - Precios del cobre</h1>
    </header>
    <main>
        <?php
        $apikey = "l52vevjp8mv24iza2oy18ruuug070jjjopyig9v02g58m27y0386od4ntpv3";
        $url = curl_init("https://metals-api.com/api/latest?access_key=" . $apikey . "&base=XCU");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($url);
        curl_close($url);
        $precios = json_decode($json, true);
        echo "<ul>
                <li>Precio USD: " .$precios['rates']['USD'] ." $</li>
                <li>Precio EUR: " .$precios['rates']['EUR'] ." €</li>
                <li>Precio AUD: " .$precios['rates']['AUD'] ." $</li>
                <li>Precio CAD: " .$precios['rates']['CAD'] ." $</li>
                <li>Precio CHF: " .$precios['rates']['CHF'] ." francos suizos</li>
                <li>Precio CNY: " .$precios['rates']['CNY'] ." ¥</li>
                <li>Precio GBP: " .$precios['rates']['GBP'] ." £</li>
                <li>Precio JPY: " .$precios['rates']['JPY'] ." ¥</li>
            </ul>
        "
        ?>
    </main>
</body>
</html>
