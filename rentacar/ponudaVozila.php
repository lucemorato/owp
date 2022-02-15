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
      float: left;
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

    </style>
  </head>
  <body>
    <?php 
      include ('includes/header.html');
    ?>
     <main>
       <div style="display: inline;">
       <form class="search" action="ponudaVozila.php" style="max-width:300px;" method="post">
            <input type="text" name="valueToSearch" placeholder="Marka/Kategorija"> 
            
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
        <table class="styled-table">
            <thead>
                <tr style="display: inline-table;">
                    <th scope="col">Marka</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Cijena</th>
                </tr>
            </thead>
            <tbody>  
           <?php
              
            
              while($row=mysqli_fetch_assoc($search_result)) {
                
                ?>
                  <tr style="text-align: center; display:block;">
                    <td><?php echo $row['Ime']; ?><td>
                    <td><?php echo $row['Kategorija']; ?><td>
                    <td><?php echo $row['Cijena']; ?><td>
                  </tr>
                  
                  <?php
                }
              
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
