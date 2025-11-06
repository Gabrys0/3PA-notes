<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <form method="post">
          <input type="number" name="num">
          <button name="btn">To Binary</button>
     </form>
     <?php
     if(isset($_POST["btn"])){
          $num = $_POST["num"];
          $binExponentNum = 1;
          $numCount = 0;
          for($i = 1; $i <= $num; $i = $i * 2){
               $binExponentNum = $binExponentNum * 2;
               $numCount++;
          }
          $binExponentNum = $binExponentNum / 2;
          $result = "";
          while($num > 0){
               if($num >= $binExponentNum){
                    $result = $result."1";
                    $num = $num - $binExponentNum;
                    $binExponentNum = $binExponentNum / 2;
               }else{
                    $result = $result."0";
                    $binExponentNum = $binExponentNum / 2;
               }
               $numCount--;
          }
          while($numCount > 0){
               $result = $result."0";
               $numCount--;
          }
          echo $result;
     }
     ?>
</body>
</html>