<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Kalkulator">
    <meta name="keywords" content="Kalkulator">
    <meta name="author" content="Ivan Vukušić">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .kalkulator {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 10%;
            margin: 10px 0;
            padding: 8px;
            font-size: 16px;
        }
        label{
            font-weight: bold;
        }
        .rezultat {
            margin-top: 15px;
            font-weight: bold;
        }
        .unos{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Kalkulator</h1>
    <form method="POST" action="" target="_self">
        <div class="unos">
            <label for="broj1">Upišite prvi broj:</label>
            <input type="number" name="broj1" required/>
        </div>
        <div class="unos">
            <label for="broj2">Upišite drugi broj:</label>
            <input type="number" name="broj2" required/>
        </div>
        <br/>
        <div class="kontrole">
            <button type="submit" name="operacija" value="+">+</button>
            <button type="submit" name="operacija" value="-">-</button>
            <button type="submit" name="operacija" value="*">*</button>
            <button type="submit" name="operacija" value="/">/</button>
        </div>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $broj1 = $_POST['broj1'];
            $broj2 = $_POST['broj2'];
            $operacija = $_POST['operacija'];
            $rez = 0;

            switch($operacija){
                case '+':
                    $rez = $broj1 + $broj2;
                    break;
                case '-':
                    $rez = $broj1 - $broj2;
                    break;
                case '*':
                    $rez = $broj1 * $broj2;
                    break;
                case '/':
                    if($broj2 != 0){
                        $rez = $broj1 / $broj2;
                    }
                    else{
                        echo "<p style='color: red;'> Greška: Dijeljenje s nulom nije dozvoljeno!</p>";
                        exit;
                    }
                    break;
                default:
                    echo "<p style='color: red;'> Greška: Nepoznata operacija! </p>";
                    exit;
            }

            echo "<div class='kalkulator'>
                    <p class='rezultat'> Rezultat: $rez</p>
                  </div>";
        }
    ?>
</body>
</html>