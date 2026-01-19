<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun prosjeka</title>
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
    </style>
</head>
<body>
    <div>
        <h1>Izračun ocjene iz kolokvija</h1>
        <p>Potrebno je napraviti formu za izračun ocjene iz kolokvija. Imamo uvjet da moramo izračunati srednju ocjenu iz prvog 
           i drugog kolokvija. Ukoliko je jedan od kolokvija negativan, krajnja ocjena je negativna. Drugi uvjet je da ocjena ne 
           smije biti manja od 1 i veća od 5</p>
    </div>
    <form action="" method="POST" target="_self"> 
        <div class="unos">
            <lable style="display:block;" for="ocjena1">Ocijena I kolokvija:</lable>
            <input style="display:block;" name="ocjena1" type="number" min="1" max="5" required>
        </div>
        <div class="unos">
            <lable style="display:block;" for="ocjena2">Ocijena II kolokvija:</lable>
            <input style="display:block;" name="ocjena2" type="number" min="1" max="5" required>
        </div>
        <div class="kontrole">
            <input type="submit" name="Posalji" value="Pošalji">
        </div>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["ocjena1"]) && isset($_POST["ocjena2"])){
                $ocjena1 = $_POST["ocjena1"];
                $ocjena2 = $_POST["ocjena2"];

                $prosjek = 0;
                if($ocjena1 == 1){
                    echo "<div class='rezultat'>
                            <p>Ocjena I. kolokvija je 1. </p>
                            <p>Student mora ponavljati I. kolokvij</p>
                        </div>";
                } 
                elseif($ocjena2 == 1){
                    echo "<div class='rezultat'>
                            <p>Ocjena II. kolokvija je 1.</p>
                            <p>Student mora ponavljati II. kolokvij</p>
                        </div>";
                }
                else{
                    $prosjek = ($ocjena1 + $ocjena2)/2;

                    echo "<div class='rezultat'>
                            <p> Ocjena I. kolokvija: $ocjena1 </p>
                            <p> Ocjena II. kolokvija: $ocjena2 </p>
                            <p> Srednja ocjena iz predmeta: $prosjek</p>
                            <p> Konačna ocjena iz predmeta: $prosjek </p>
                        </div>";
                }

                echo "<form action='' method='POST' target='_self'> 
                        <input type='submit' name='Ocisti' value='Očisti'>
                    </form>";
            }
        }
    ?>
</body>
</html>
