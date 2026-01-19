<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba 4 izracun</title>
</head>
<body>
    <?php
        $a = $_POST['a'];
        $b = $_POST['b'];

        $rez = (3*$a-$b)/2;
        echo "<p>a=$a<br/>b=$b<br/>Rezultat je (3*$a-$b)/2 = $rez!</p>";
    ?>
</body>
</html>