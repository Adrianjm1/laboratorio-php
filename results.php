<?php


include_once('config\conn.php');

$id = $_GET['id'];

$QUERY = "Select * from examen where idPaciente = '$id'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($con));
$countQUERY = mysqli_num_rows($rsQUERY);
$examenes = mysqli_fetch_array($rsQUERY);

// $date = date('Y-m-d');
// if (isset($_POST['submit'])) {
//     $insertquery = "INSERT INTO orden (idPaciente, status, fecha) VALUES ('$id', 0, '$date')";

//     $resolve = mysqli_query($conn, $insertquery) or die('Error: ' . mysqli_error($conn));

//     header("Location: dashboardEnfermero.php");
// }


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="row">

        <?php


        foreach ($rsQUERY as $examen) {
        ?>

            <div class="col">




                <ul class="list-group mx-auto w-50">
                <hi> Examen</hi>
                    <?php


                    foreach ($examen as $key => $value) {
                        // echo $key . ": " . $value . "<br>";
                        if ($key !== 'id') {



                    ?>


                            <li class="list-group-item list-group-item-info"> <?php echo '<b>  '.$key.' </b>' . " : " . $value  ?> </li>


                    <?php
                        }
                    }
                    ?>

            </div>
            </ul>


        <?php

        }
        ?>

    </div>



</body>

</html>