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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>


<h1>Esta seguro que desea enviar una orden de examenes para el paciente <?php echo $paciente['nombre'] ?> </h1>

<form action="order.php?id=<?php echo $id?>" method="post">

    <input type="submit" name="submit" value="Enviar">

</form>
    
</body>
</html>