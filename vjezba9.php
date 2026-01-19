<?php
    $cars = array("Audi", "BMW", "Renault", "Citroen"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ducan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .rezultat {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-weight: bold;
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
        .unos{
            display: block;
        }
        li{
            list-style-type: none;
        }
    </style>
</head>
<body>
    <?php
        $dan = date("D");
        $radnoVrijeme = [
            "RadniDanPocetak" => "08:00",
            "RadniDanKraj" =>  "18:00",
            "SubotaPocetak" => "08:00",
            "SubotaKraj" => "14:00"
        ];


        $vikend = false;
        function ducan($stanje="otvoren"){
            echo "<p class='rezultat'>Ducan je $stanje</p>";
        }

        if($dan == "Sun"){
            ducan("zatvoren");
        }

        elseif($dan == "Sat"){
            $radnoVrijemePocetak = $radnoVrijeme["SubotaPocetak"];
            $radnoVrijemeKraj = $radnoVrijeme["SubotaKraj"];

            if(time() >= strtotime($radnoVrijemePocetak) && time() <= strtotime($radnoVrijemeKraj)){
                ducan();
            }
            else{
                ducan("zatvoren");
            }
        }
        else{
            $radnoVrijemePocetak = $radnoVrijeme["RadniDanPocetak"];
            $radnoVrijemeKraj = $radnoVrijeme["RadniDanKraj"];

            if(time() >= strtotime($radnoVrijemePocetak) && time() <= strtotime($radnoVrijemeKraj)){
                ducan();
            }
            else{
                ducan("zatvoren");
            }
        }
    ?>
</body>
</html>