<?php
    function ProstiBroj(){
        echo "<ul>";
        for($i=2; $i<100; $i++){
    		if($i % $i == 0 && $i % 1 == 0) {
                if($i % 2 != 0 && $i % 3 != 0) {
                    echo "<li>$i</li>";   
                }
            } 
    	}
        echo "</ul>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProstiBroj</title>
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
            width: 98%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-weight: bold;
        }
        input, button {
            width: 10%;
            margin: 10px 0;
            padding: 8px;
            font-size: 16px;
        }
        .text{
            width: 90%;
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
    <h1>Prosti brojevi</h1>
    <div class="rezultat">
        <ul>
            <li><?php echo ProstiBroj(); ?>
        </ul>
        
    </div>
</body>
</html>