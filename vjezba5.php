<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Igra pogodi broj">
    <meta name="keywords" content="Igra pogodi broj">
    <meta name="author" content="Ivan Vukušić">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Pogodi broj</title>
    <style>
        .pogodak{
            display: inline-block;
            padding: 0.1rem;
            border-radius: 5%;
            background-color: green;
            color: white;
        }
        .krivo{
            display: inline-block;
            padding: 0.1rem;
            border-radius: 5%;
            background-color: red;
            color: white;
        }
        p, label{
            margin: 0.5rem;
            font-weight: bold;
        }
        button{
            margin:0.3rem;
        }
    </style>
</head>
<body>
    <h1>Igra (pogodi broj)</h1>
    <form method="POST" action="" target="_self">
        <label for="guess">Upišite jedan broj od 1 do 10:</label>
        <input type="number" name="guess" min="1" max="10" required/>
        <br/>
        <button type="submit">Pogodi!</button>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $userGuess = intval($_POST["guess"]);
            $randomBroj = rand(1, 10);
            $poruka = "";
            $klasa = "";
            
            if($userGuess === $randomBroj){
                $poruka = "Pogodak, probaj ponovo!";
                $klasa = "pogodak";
            }
            else{
                $poruka = "Krivo, probaj ponovo!";
                $klasa = "krivo";
            }

            echo "<div class='$klasa'><p>$poruka</p></div>";

            echo "<p>Zamišljeni broj je: $randomBroj</p>";
        }
    ?>
</body>
</html>