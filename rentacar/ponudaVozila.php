<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM vozila WHERE CONCAT(Ime, Kategorija) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM vozila";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "carrental");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ponuda vozila</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
      input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 72.5%;
        background: #f1f1f1;
        margin-top: 20px;    
      }
      /* Style the submit button */
      button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #4CAF50;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        float: right;
        display: inline;
        margin-top: 20px;
      }
          
      form.search button:hover {
        background: #0b7dda;
      }

      /* Clear floats */
      form.search::after {
        content: "";
        clear: both;
        display: table;
      }
      .styled-table2 {
        border-collapse: collapse;
        margin-right: auto;
        margin-left: auto;
        margin-top: 20px;
        font-size: 1.3em;
        font-family: sans-serif;
        /*max-width: 400px;*/
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }

      styled-table2 thead tr {
        color: #f1f1f1;
      }
      .styled-table2 th,
      .styled-table2 td {
        padding: 12px 15px;
        text-align: center;
      }
      .styled-table2 tbody tr {
        border-bottom: 1px solid #dddddd;
        border-top: 1px solid #dddddd;
      }

      .styled-table2 tbody tr:nth-of-type(even) {
        background-color: #f1f1f1;
        color: black;
      }

      .styled-table2 tbody tr:last-of-type {
        border-bottom: 2px solid white;
      }
    </style>
  </head>
  <body>
    <?php 
      include ('includes/header.php');
    ?>
     <main>
       <div style="display: inline;">
       <form class="search" action="ponudaVozila.php" style="margin:auto;max-width:300px" method="post">
            <input type="text" name="valueToSearch" placeholder="Marka / Kategorija"> 
            
            <button type="submit" name="search"><i class="fa fa-search"></i></button> 
          </div>
     
            
    
    
    <?php /* LOŠIJI NAČIN
    if (isset($_POST['submit'])) {
        $searchValue = $_POST['search'];
        $db = mysqli_connect("localhost", "root", "", "carrental");
        if ($db->connect_error) {
            echo "connection Failed: " . $db->connect_error;
        } else {
            $sql = "SELECT * FROM vozila WHERE Kategorija LIKE '%$searchValue%'";

            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo $row['Ime'] ." " .  $row['Kategorija'] . "<br>";
              
            }

          
        }   
    }
    */
    ?>
     <div>
        <table class="styled-table2">
            <thead>
                <tr>
                    <th scope="col">Marka</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Cijena</th>
                </tr>
            </thead>
            <tbody>  
           <?php
            $db = mysqli_connect("localhost", "root", "", "carrental");

               $sql="SELECT * FROM vozila ORDER BY ime";
               $result=$db->query($sql);
               $resultCheck = mysqli_num_rows($result);
               if($resultCheck>0) {
               while($row = mysqli_fetch_assoc($search_result)){

               echo "<tr>";
               //echo "<td>".$row['Id']."</td>";
               echo "<td>".$row['Ime']."</td>";
               echo "<td>".$row['Kategorija']."</td>";
               echo "<td>".$row['Cijena']."</td>";
               echo "</tr>";
              }
          }
              //while($row=mysqli_fetch_assoc($search_result)) {
                
                ?>
                  <!--<tr style="text-align: center; display:block;">
                    <td><?php //echo $row['Ime']; ?><td>
                    <td><?php //echo $row['Kategorija']; ?><td>
                    <td><?php //echo $row['Cijena']; ?><td>
                  </tr>-->
                  
                  <?php
                //}
              
            ?>
			
            </tbody>
        </table>
    </div>
    </main>
 
    <?php
      include ('includes/footer.html');
    ?> 
  </body>
</html>
