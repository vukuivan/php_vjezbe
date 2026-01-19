
<?php
    $a = "";
    $b = "";
    $rezultat = ""
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba 4</title>
</head>
<body>
    <form name="form" action="izracun.php" method="post">
        <div style="margin-bottom: 0.5rem;">
            <label for="a">Vrijednost a:</label>
            <input type="number" id="a" name="a"></input>
        </div>
        <div style="margin-bottom: 0.5rem">
            <label for="b">Vrijednost b:</label>
            <input type="number" id="b" name="b"></label>
        </div>
        <input type="submit" value="Posalji">
    </form>
</body>
</html>