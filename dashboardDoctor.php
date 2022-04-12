
<?php


include_once('config\conn.php');

$QUERY = "Select *, orden.id AS identificador, paciente.id AS identificadorPaciente from orden INNER JOIN paciente on orden.idPaciente = paciente.id ORDER BY status ASC, FECHA ASC ";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
$countQUERY = mysqli_num_rows($rsQUERY);



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
      <a class="nav-item nav-link active" href="dashboardDoctor.php">Dashboard</a>

    </div>
  </div>
</nav>

<table  class="mx-auto table table-bordered table-dark">
    Ordener de examenes pendientes
    <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estatus</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($rsQUERY as $value) {
        ?>
            <tr>

                <td> <?php echo $value['nombre'] ?> </td>
                <td> <?php echo $value['fecha'] ?> </td>
                <td> <?php echo $value['status'] ? 'Enviados': "Pendiente" ?> </td>

                <th>  <?php
                            if ($value['status']) {
                                echo "";
                            }else {
                                echo "<a href='examen.php?idPaciente=".$value['identificadorPaciente']."&id=".$value['identificador']."' class='btn btn-success'>Revisar</a>";
                            }
                
                
                        ?>                
                                
                </th>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>

<a class="text-decoration-none text-white" href="addPozo.php"> 
    
    <button class="mx-auto d-block btn-primary"> Agregar paciente </button>

</a>    
    
</body>
</html>