<?php include('includes/header.php'); ?>

<?php
    $db = mysqli_connect("localhost", "root", "", "carrental");

?>


<?php
    //provjeri je li car id setiran ili ne
    if(isset($_GET['id']))
    {
        
        $car_id = $_GET['id'];

    
        $sql = "UPDATE  vozila
            SET kolicina = kolicina + 1,
                status = 'Deactivated'
            WHERE Id = $car_id";
        $db->query($sql);

}

      

        //dohvati detlje selektiranog vozila
        /*$sql = "SELECT * FROM najmovi WHERE VoziloID=$car_id";
        $res = mysqli_query($db, $sql);
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            $row = mysqli_fetch_assoc($res);
            
            $status = $row['Status'];
        }
        else
        {
            header('location:'.SITEURL);
        }*/


    
 header('location: ./administracija.php');
?>

<?php


$sql4 = "UPDATE vozila SET kolicina = kolicina + 1 WHERE Id = $car_id";
$db->query($sql4);
$sql5 = "UPDATE najmovi SET status = 'Deactivated' WHERE VoziloID = $car_id";
$db->query($sql5);


// if (mysqli_query($db, $sql)) {
//     mysqli_close($db);
//     header('Location: administracija.php'); 
//     exit;
// } else {
//     echo "Error updating record";
// }

