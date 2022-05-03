<?php
    $db = mysqli_connect("localhost", "root", "", "carrental");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administracija</title>
    <script>
        function checkForm() {
            var ime = document.forms["vozila"]["ime"].value;
            var kategorija = document.forms["vozila"]["kategorija"].value;
            var cijena = document.forms["vozila"]["cijena"].value;
            var kolicina = document.forms["vozila"]["kolicina"].value;
            if(ime == "" || kategorija == "" || cijena == "" || kolicina == "") {
                alert("Molimo popunite sva polja!");
                return false;
            }

        }
    </script>
    <link rel="stylesheet" href="style.css">
    <style>
        td a {
            background-color: #f44336;
            color: white;
            padding: 12px 16px;
            text-align: center;
            font-size: medium;
            text-decoration: none;
            display: inline-block;
            border-radius: 20px;
        }

        td a:hover, td a:active {
            background-color: red;
        }
        main {
            float: left;
        }
        aside {
            float: right;
            margin-right: 150px;
            margin-top: 30px;
            background-color: white;
            padding: 50px;
            border-radius: 20px;
            position: static;
            
        }
        .dodaj-vozilo input[type=text], input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .dodaj-vozilo input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .dodaj-vozilo input[type=submit]:hover {
            background-color: #45a049;
        }
        .dodaj-vozilo, h2 {
            color: black;
            font-family: sans-serif;
        }
        .styled-table3 {
            border-collapse: collapse;
            margin-left: 130px;
            margin-top: 20px;
            font-size: 1.3em;
            font-family: sans-serif;
            /*max-width: 400px;*/
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

        styled-table3 thead tr {
            color: #f1f1f1;
        }
        .styled-table3 th,
        .styled-table3 td {
            padding: 12px 15px;
            text-align: center;
        }
        .styled-table3 tbody tr {
            border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
        }

        .styled-table3 tbody tr:nth-of-type(even) {
            background-color: #f1f1f1;
            color: black;
        }

        .styled-table3 tbody tr:last-of-type {
            border-bottom: 2px solid white;
        }
    </style>
  </head>
  <body>
    <?php 
      include ('includes/header.php');
    ?>
     <main>
     <div>
        <table class="styled-table3">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Količina</th>
                </tr>
            </thead>
            <tbody>  
                <?php
                    $sql="SELECT * FROM vozila WHERE kolicina > 0 ORDER BY ime";
                    $result=$db->query($sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck>0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['Id']."</td>";
                            echo "<td>".$row['Ime']."</td>";
                            echo "<td>".$row['Kategorija']."</td>";
                            echo "<td>".$row['Cijena']."</td>";
                            echo "<td>".$row['Kolicina']."</td>";
                            echo "<td><a href='delete.php?id=".$row['Id']."'>OBRIŠI</a></td>";  
                            echo "<td><a href='zaprimi.php?id=".$row['Id']."'>ZAPRIMI</a></td>";  
                            //echo "<td><button class='open-button' onclick='openForm()'".$row['Id']."'>UNAJMI</button></td>";
                            echo "</tr>";
                        }
                    }
			    ?>
            </tbody>
        </table>
    </main>
    <aside>
        <?php
            $db = mysqli_connect("localhost", "root", "", "carrental");

            if (isset($_GET['submit'])) {
            
                $ime = $_GET['ime'];
                $kategorija = $_GET['kategorija'];
                $cijena = $_GET['cijena'];
                $kolicina = $_GET['kolicina'];

                $sql = "INSERT INTO vozila(ime, kategorija, cijena, kolicina)
                    VALUES ('".$ime."', '".$kategorija."', '".$cijena."', '".$kolicina."')";
                $db->query($sql);
            }
        ?>
        <table>
            <tr>
                <th>
                    <h2>Dodaj vozilo: </h2>
                    <form class="dodaj-vozilo" action="administracija.php" method="GET" name="vozila" onsubmit="return checkForm()">
                        Marka:<br />
                        <input type="text" name="ime"><br />
						Kategorija:<br />
                        <select name="kategorija">
                        <option value=""><h3 style="font-family: sans-serif;">--Izaberi kategoriju--</h3></option>
                        <option value="Automobil">Automobil</option>
                        <option value="Skuter">Skuter</option>
                        <option value="Bicikl">Bicikl</option>
                        </select> <br>
                        Cijena:<br />
                        <input type="number" name="cijena"><br />
						Količina:<br />
                        <input type="number" name="kolicina"><br />
                        <input type="submit" name="submit" value="Potvrdi"><br />
                    </form>
                </th>
            </tr>
        </table>
    </aside>
    <?php
      include ('includes/footer.html');
    ?> 
    </body>
</html>