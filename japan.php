<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px black solid;
        }
        .red{
            background-color: red;
        }
        .white{
            background-color: white;
        }
    </style>
</head>
<body>
    <?php
    echo "<table><tbody>";
    for($i = 0; $i < 150; $i++){
        echo "<tr>";
        for($j = 0; $j < 240; $j++){
            if(sqrt(pow($j - 120, 2) + pow($i - 75, 2)) < 37.5){
                echo "<td class='red'></td>";
            }else{
                echo "<td></td>";
            }
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
</body>
</html>