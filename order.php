<?php


include_once('config\conn.php');

$id = $_GET['id'];

$QUERY = "Select * from paciente where id = '$id'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($con));
$countQUERY = mysqli_num_rows($rsQUERY);
$paciente = mysqli_fetch_array($rsQUERY);

$date = date('Y-m-d');
if (isset($_POST['submit'])) {
    $insertquery = "INSERT INTO orden (idPaciente, status, fecha) VALUES ('$id', 0, '$date')";

    $resolve = mysqli_query($conn, $insertquery) or die('Error: ' . mysqli_error($conn));

    header("Location: dashboardEnfermero.php");
}


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
    <title>Order</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Laboratorio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Inicio </a>
                <a class="nav-item nav-link active" href="dashboardEnfermero.php">Dashboard</a>

            </div>
        </div>
    </nav>


    <h1 class="mx-auto d-block text-center">Esta seguro que desea enviar una orden de examenes para el paciente <?php echo $paciente['nombre'] ?> </h1>

    <form action="order.php?id=<?php echo $id ?>" method="post">

        <input class="btn mx-auto d-block text-center btn-success" name="submit" type="submit" value="Enviar">

    </form>


    <footer style="position: fixed; bottom:0; width: 100%;" class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-dark" href="#">Adrian Molina</a>
        </div>
        <!-- Copyright -->
    </footer>


</body>

</html>