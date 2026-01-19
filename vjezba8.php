<?php
    $cars = array("Audi", "BMW", "Renault", "Citroen"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odabir automobila</title>
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
		echo "<p>Označi vozila:</p>"; 
        echo "
            <form method='POST' action='' id='cars'>
                <ul>";
                    foreach ($cars as $car) { 
                    echo '<li><input type="radio" name="car" value="' .$car . '"> ' . $car . '</li>'; 
                    } 
                
                echo "
                </ul>
                <p><input type='submit' value='pošalji'></p>
            </form>"; 
        if(isset($_POST['car'])) { 
            echo "<p class='rezultat'>". $_POST['car'] . "</p><br>";
        }
    ?>
</body>
</html>