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
  width: 280px;
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
      include ('includes/header.html');
    ?>
    <div>
        <table class="styled-table" style="color: white; margin: auto; margin-top: 60px;">
            <thead>
                <tr>
                    
                    <th scope="col">Marka</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Cijena</th>
                    
                    
                </tr>
            </thead>
            <tbody>  
           <?php
              $sql="SELECT * FROM vozila WHERE Kolicina > 0";
              $result=$db->query($sql);
              $resultCheck = mysqli_num_rows($result);
              if($resultCheck>0) {
              while($row=mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                echo "<td>".$row['Ime']."</td>";
                echo "<td>".$row['Kategorija']."</td>";
                echo "<td>".$row['Cijena']."</td>";
                echo "<td><button class='open-button' onclick='openForm()'".$row['Id'].">UNAJMI</button></td>";
                echo "</tr>";
              }
            }
                ?>
                
            </tbody>
        </table>
    </div>
    <?php
      include ('includes/footer.html');
    ?> 
  
  <?php
      $db = mysqli_connect("localhost", "root", "", "carrental");


   
    if (isset($POST['submit'])) {
       
        $ime = $_POST['ime'];
        $prezime = $POST['prezime'];
		    $email = $POST['email'];
		    $brojDana = $POST['brojDana'];

		$sql1 = "INSERT INTO kupci(ime, prezime, email)
			VALUES ('".$ime."', '".$prezime."', '".$email."')";
		$db->query($sql1);

    $sql2 = "INSERT INTO najmovi(brojDana)
    VALUES ('".$brojDana."')";
	  $db->query($sql2);
    } else {
      echo 'Error';
    }
?>
      <div class="form-popup" id="myForm">
        <form action="dostupnaVozila.php" class="form-container" method="POST" name="najam">
          <h1>Unesi podatke:</h1>

          <label for="ime"><b>Ime</b></label>
          <input type="text" placeholder="Ime" name="ime" required>

          <label for="prezime"><b>Prezime</b></label>
          <input type="text" placeholder="Prezime" name="prezime" required>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="example@gmail.com" name="email" required>
          
          <label for="brojDana"><b>Broj dana:</b></label>
          <input type="number" placeholder="10" name="brojDana" required>

          <button type="submit" class="btn">Potvrdi</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Zatvori</button>
        </form>
      </div>
<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script>
  </body>
</html>