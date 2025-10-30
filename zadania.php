<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
        td{
            border: black solid 1px;
        }
    </style>
</head>
<body>
    <p>ZADANIE 1</p>
    <form method="post">
        <input name="login" type="text">
        <input name="password" type="password">
        <button name="btn1">Click</button>
    </form>
    <p>
        <?php
            if(isset($_POST["btn1"])){
                echo $_POST["login"]."<br>".$_POST["password"];
            }
        ?>
    </p>

    <p>ZADANIE 2</p>
    <form method="post">
        <select name="column">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "forumpsy");
                $q = "SHOW columns FROM konta";
                $result = mysqli_query($conn, $q);
                while($row = mysqli_fetch_row($result)){
                    echo "<option>".$row[0]."</option>";
                }
                mysqli_close($conn);
            ?>
        </select>
        <button name="btn2">Show</button>
        <?php
            if(isset($_POST["btn2"])){
                $conn = mysqli_connect("localhost", "root", "", "forumpsy");
                $q = "SELECT ".$_POST["column"]." FROM konta";
                $result = mysqli_query($conn, $q);
                echo "<table><tbody>";
                while($row = mysqli_fetch_row($result)){
                    echo "<tr><td>".$row[0]."</td></tr>";
                }
                echo "</tbody></table>";
                mysqli_close($conn);   
            }
        ?>
    </form>
    <p>ZADANIE 3</p>
    <form method="post">
        <select name="tables">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "forumpsy");
                $q = "SHOW tables";
                $result = mysqli_query($conn, $q);
                while($row = mysqli_fetch_row($result)){
                    echo "<option>".$row[0]."</option>";
                }
                mysqli_close($conn);
            ?>
        </select>
        <button name="showIdsBtn">Show Ids</button><br>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "forumpsy");
            if(isset($_POST["showIdsBtn"])){
                echo "<select name='ids'>";
                $table = $_POST["tables"];
                $q = "SELECT id FROM ".$table;
                $result = mysqli_query($conn, $q);
                while($row = mysqli_fetch_row($result)){
                    echo "<option>".$row[0]."</option>";
                }
                echo "</select>";
                echo "<button name='showRecordBtn'>SHOW</button>";   
            }
            if(isset($_POST["showRecordBtn"])){
                $q2 = "SELECT * FROM ".$_POST["tables"]." WHERE id=".$_POST["ids"];
                $result = mysqli_query($conn, $q2);
                echo "<table><tbody><tr>";
                $row = mysqli_fetch_row($result);
                foreach($row as $cell){
                    echo "<td>".$cell."</td>";
                }
                echo "</tr></tbody></table>";
            }
            mysqli_close($conn);
        ?>
    </form>
</body>
</html>