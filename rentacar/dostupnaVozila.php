<?php
    $db = mysqli_connect("localhost", "root", "", "carrental");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dostupna vozila</title>
    <link rel="stylesheet" href="style.css">
    <style>
      * {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  
  bottom: 23px;
  right: 28px;
  width: 160px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
 position:fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  font-family: sans-serif;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=email], .form-container input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=email]:focus, .form-container input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
    </style>
  </head>
  <body>
    <?php 
      include ('includes/header.php');
    ?>
 
    <div>
        <table class="styled-table" style="color: white; margin: auto; margin-top: 20px;">
            <thead>
                <tr>
                    
                    <th scope="col">Marka</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Količina</th>
                    
                    
                </tr>
            </thead>
            <tbody>  
           <?php
              $sql="SELECT * FROM vozila WHERE Kolicina > 0 ORDER BY ime";
              $result=$db->query($sql);
              $resultCheck = mysqli_num_rows($result);
              if($resultCheck>0) {
              while($row=mysqli_fetch_assoc($result)) {
                //Dohvati vrijednosti
                $id = $row['Id'];
                $ime = $row['Ime'];
                $kategorija = $row['Kategorija'];
                $cijena = $row['Cijena'];
                $kolicina = $row['Kolicina'];
                echo "<tr>";
                echo "<td>".$row['Ime']."</td>";
                echo "<td>".$row['Kategorija']."</td>";
                echo "<td>".$row['Cijena']."</td>";
                echo "<td>".$row['Kolicina']."</td>";
                echo "<td><button class='open-button' onclick='openForm(this)' class=“makeReservation“ data-carid='".$row['Id']."'>UNAJMI</button></td>";
                echo "</tr>";
              }
            }
                ?>
            </tbody>
         
        </table>
      </div>

        <div class="form-popup" id="myForm">

    <?php

      $db = mysqli_connect("localhost", "root", "", "carrental");

      if (isset($_POST['submit'])) {
       
        $carID = $_POST['carID'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
		    $email = $_POST['email'];
		    $brojDana = $_POST['brojDana'];
		    $cijena = $_POST['cijena'];
		    $total = $cijena * $brojDana;
        
        
       
        $sql1 = "INSERT INTO kupci(ime, prezime, email)
        VALUES ('".$ime."', '".$prezime."', '".$email."')";
        $db->query($sql1);

        //if ($db->query($sql1) === TRUE) {
          //$last_id = $db->insert_id;
          //echo "New record created successfully. Last inserted ID is: " . $last_id;
        //} else {
          //echo "Error: " . $sql1 . "<br>" . $db->error;
        //}
        $last_id = $db->insert_id;
        $sql2 = "INSERT INTO najmovi(voziloID, kupacID, brojDana, total, cijena)
        VALUES ('".$carID."', '".$last_id."', '".$brojDana."', '".$total."', '".$cijena."')";
        $db->query($sql2);

        //ovaj query triba preformulirat!!! nekad radi, nekad ne radi ?
        //$sql3 = "UPDATE najmovi SET total = (SELECT brojDana * cijena FROM najmovi, vozila WHERE najmovi.voziloID=vozila.id AND najmovi.voziloID=$carID) WHERE voziloID=$carID";
        //$db->query($sql3);

        $sql4 = "UPDATE najmovi SET status = 'Activated' WHERE voziloID = $carID";
        $db->query($sql4);

        $sql5 = "UPDATE vozila SET kolicina = kolicina - 1 WHERE Id = $carID";
        $db->query($sql5);	  
      }
    ?>


        <form action="dostupnaVozila.php" class="form-container" method="POST" name="najam">
          <h1>Unesi podatke:</h1>

          <label for="ime"><b>Ime</b></label>
          <input type="text" placeholder="Ime" name="ime" required>

          <label for="prezime"><b>Prezime</b></label>
          <input type="text" placeholder="Prezime" name="prezime" required>

          <label for="email"><b>E-mail</b></label>
          <input type="email" placeholder="example@gmail.com" name="email" required>
          
          <label for="brojDana"><b>Broj dana:</b></label>
          <input type="number" placeholder="10" name="brojDana" required>

          
          <h3>Cijena: <?php echo $cijena;?></h3>
          <input type="hidden" name="cijena" value="<?php echo $cijena; ?>">

          <input type="hidden" id="reservationCarID" name="carID" value="0">
          <button type="submit" name="submit" class="btn">Potvrdi</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Zatvori</button>
        </form>
      </div>
        <?php
      include ('includes/footer.html');
    ?> 
<script>
    function openForm(el) {
      document.getElementById("myForm").style.display = "block";

      var buttonData = document.getElementsByClassName('makeReservation');
      document.getElementById("reservationCarID").value = el.getAttribute('data-carid');  

    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script>
  </body>
</html>