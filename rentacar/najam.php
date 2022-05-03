<?php include('includes/header.php'); ?>

<?php
    $db = mysqli_connect("localhost", "root", "", "carrental");
?>

<?php
    //provjeri je li car id setiran ili ne
    if(isset($_GET['car_id']))
    {
        //dohvati car_id i sve detalje vezane za selektirano auto
        $car_id = $_GET['car_id'];

        //dohvati detlje selektiranog vozila
        $sql = "SELECT * FROM vozila WHERE id=$car_id";
        $res = mysqli_query($db, $sql);
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            $row = mysqli_fetch_assoc($res);
            
            $imeVozila = $row['Ime'];
            $kategorija = $row['Kategorija'];
            $cijena = $row['Cijena'];
            $kolicina = $row['Kolicina'];
        }
        else
        {
            header('location:'.SITEURL);
        }

    }
    else
    {
        header('location:'.SITEURL);
    }
?>

<section>
    <div>
        <h2>
            Ispunite ovaj obrazac kako bi potvrdili svoj najam.
        </h2>

        <form action="" method="POST" class="najam">
            <fieldset>
                <legend>Izabrano vozilo</legend>
                <div class="car-menu-desc">
                        <h3><?php echo $imeVozila; ?></h3>
                        <input type="hidden" name="imeVozila" value="<?php echo $imeVozila; ?>">

                        <p class="car-price"><?php echo $cijena; ?> HRK</p>
                        <input type="hidden" name="cijena" value="<?php echo $cijena; ?>">

                        <div class="order-label">Broj dana:</div>
                        <input type="number" name="brojDana" class="input-responsive" value="1" required>
                        
                    </div>
            </fieldset>
            <fieldset>
                    <legend> Detalji o kupcu</legend>
                    <div class="order-label">Ime</div>
                    <input type="text" name="imeKupca" placeholder="E.g. Lucija" class="input-responsive" required>
                    <div class="order-label">Prezime</div>
                    <input type="text" name="prezimeKupca" placeholder="E.g. Mikulic" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="emailKupca" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <input type="submit" name="submit" value="Potvrdi najam" class="btn btn-primary">
                </fieldset>
        </form>
        <?php 

                //Provjeri je li potvrdi botun kliknut
                if(isset($_POST['submit']))
                {
                    // Dohvati sve detalje iz forme

                    $vozilo = $_POST['imeVozila'];
                    $cijena = $_POST['cijena'];
                    $brojdana = $_POST['brojDana'];

                    $total = $cijena * $brojdana;  

                

                    $status = "Activated";

                    $ime = $_POST['imeKupca'];
                    $prezime = $_POST['prezimeKupca'];
                    $email = $_POST['emailKupca'];


                    //spremi u bazu
                    $sql2 = "INSERT INTO najmovi SET 
                        imeVozila = '$vozilo',
                        cijena = $cijena,
                        brojDana = $brojdana,
                        total = $total,
                       
                        status = '$status',
                        imeKupca = '$ime',
                        prezimeKupca = '$prezime',
                        emailKupca = '$email'
                    ";

                    //echo $sql2; die();

                    //izvrsi upit
                    $res2 = mysqli_query($db, $sql2);

                //     //provjeri je li izvrseno dobro
                //     if($res2==true)
                //     {
                //         //Uspjesno izvrseno i spremljeno
                //         $_SESSION['najam'] = "<div class='success text-center'>Vozilo je unajmnjeno..</div>";
                //         header('location:'.SITEURL);
                //     }
                //     else
                //     {
                //         //Greska
                //         $_SESSION['najam'] = "<div class='error text-center'>Greška.</div>";
                //         header('location:'.SITEURL);
                //     }

                }
            
            ?>
    </div>
</section>