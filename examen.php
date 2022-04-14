
<?php
include_once('config\conn.php');

$id = $_GET['id'];
$idPaciente = $_GET['idPaciente'];
echo $id;
echo "el id del paciente".$idPaciente;

// $QUERY = "Select * from orden INNER JOIN paciente on orden.idPaciente = paciente.id WHERE orden.idPaciente = '$id' ORDER BY status ASC, FECHA ASC ";

$QUERY = "Select * from paciente where id = '$idPaciente'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
$countQUERY = mysqli_num_rows($rsQUERY);
$paciente = mysqli_fetch_array($rsQUERY);


// if ($paciente == '' || $paciente == null) {
//     echo "No hay examenes pendientes por hacer";
// } else {
//  echo "Se va a hacer el examen al paciente " . $paciente['nombre'] . "Numero de orden" . $paciente['id'];

// }

// var_dump($paciente);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>

    <h2>Evaluacion de examenes para el paciente <?php echo $paciente['nombre'] ?> </h2>


    <!-- formulario de registro de examenes -->
    <form action="process/addExamen.php" method="post">
        <label for="">Globulos rojos</label>
        <input value="0" name="rojos"  type="text"> <br/>   <br/>

        <label for="">Globulos blancos</label>
        <input value="0" name="blancos"  type="text"> <br/>  <br/>

        <label for="">Plaquetas</label>
        <input value="0" name="plaquetas"  type="text"> <br/>  <br/>

        <label for="">Hemoglobina</label>
        <input value="0" name="hemoglobina"  type="text"> <br/>  <br/>

        <label for="">Hematocrito</label>
        <input value="0" name="hematocrito"  type="text"> <br/>  <br/>

        <label for="">Observaciones</label>
        <textarea  name="observaciones"></textarea> <br/>  <br/>

        <input value="<?php echo $id ?>" name="idOrden"  type="hidden"> <br/>  <br/>
        <input value="<?php echo $idPaciente ?>" name="idPaciente"  type="hidden"> <br/>  <br/>

        <input type="submit" name="submit" value="Enviar">

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