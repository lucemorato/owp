<?php
    $db = mysqli_connect("localhost", "root", "", "carrental");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent-a-Car</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
      include ('includes/header.php');
    ?>
     <main>
        <h1 class="poruka">Start an adventure</h1>   
    </main>
    <?php
      include ('includes/footer.html');
    ?> 
  </body>
</html>
