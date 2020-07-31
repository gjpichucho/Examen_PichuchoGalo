<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD PHP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="./">INICIO <span class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a class="dropdown-item" href="funcionalidades.php">Gestion Funcionalidades</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a class="dropdown-item" href="moduloRol.php">Gestion Modulo por Rol</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container">
        <h1 class="page-header text-center">EXAMEN PHP GALO PICHUCHO</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <form name="forma" method="POST" action="moduloRol.php">

                <div class="wrap-input100">
					<div class="label-input100">Rol</div>
					<div>
						<select class="js-select2" id="rol" name="rol">
							<option value="0">Seleccione una Rol</option>
							<option value="1">ADMIN</option>
							<option value="2">ALUMNO</option>
							<option value="3">DOCENTE</option>
						</select>
						
					</div>
					<span class="focus-input100"></span>
                </div>
                <button type="submit" name="accion" value="" class="btn btn-primary"><span
                                class="glyphicon glyphicon-check"></span>Aceptar</button>

                    <table class="table table-bordered table-striped" style="margin-top:20px;">

                        <thead>

                            <th>Modulos</th>

                        </thead>
                        <tbody>
                            <?php
						
						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['COD_MODULO']; ?></td>

                            </tr>
                            <?php
                	}
				} else { ?>
                            <tr>
                                <td colspan="8" class="text-center">NO HAY DATOS</td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>



</body>