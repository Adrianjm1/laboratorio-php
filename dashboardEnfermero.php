<?php


include_once('config\conn.php');

$QUERY = "Select * from paciente";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($con));
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
      <a class="nav-item nav-link active" href="dashboardEnfermero.php">Dashboard</a>

    </div>
  </div>
</nav>

    <table class="mx-auto  table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cedula</th>
                <th scope="col">Correo</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($rsQUERY as $paciente) {
            ?>
                <tr>

                    <td> <?php echo $paciente['nombre']; ?> </td>
                    <td> <?php echo $paciente['cedula']; ?> </td>
                    <td> <?php echo $paciente['correo']; ?> </td>
                    <th>
                        <a href="order.php?id=<?php echo $paciente['id']; ?>" class="btn btn-primary">Ordenar examenes</a>
                        <a href="results.php?id=<?php echo $paciente['id']; ?>" class="btn btn-danger">Ver resultados</a>
                    </th>
                </tr>

            <?php
            }

            ?>


        </tbody>
    </table>

    <p>
        <button class="btn mx-auto d-block text-center btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Agregar paciente
        </button>
    </p>

    
    <div class="collapse mx-auto  text-center" id="collapseExample">
        <form action="process/addPaciente.php" method="post">
            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre">
            <br>
            <label for="cedula">Cedula</label><br>
            <input type="text" name="cedula">
            <br>
            <label for="correo">Correo</label> <br>
            <input type="email" name="correo">
            <input type="hidden" value="enfermero" name="enfermero">
            <br>
            <button class="btn btn-info" type="submit" name="crear-nota" value="create" styles="margin-left: 20px;">Agregar</button>
        </form>
        <br>
    </div>

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