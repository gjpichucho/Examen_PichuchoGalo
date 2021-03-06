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



                <table class="table table-bordered table-striped" style="margin-top:20px;">

                    <thead>
                        <tr>
                            <td colspan=3><strong>funcionalidades</strong></td>
                        </tr>
                        <th>Nombre</th>
                        <th>URL Principal</th>
                        <th>Descripcion</th>
                    </thead>
                    <tbody>
                        <?php
						
						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['COD_MODULO']; ?></td>
                            <td><?php echo $row['NOMBRE']; ?></td>
                            <td><?php echo $row['ESTADO']; ?></td>

                            <td>
                                <a href="index.php?update=<?php echo $row['codigo']; ?>" class="btn btn-success btn-sm"
                                    data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                <a href="index.php?delete=<?php echo $row['codigo']; ?>" class="btn btn-danger btn-sm"
                                    data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                            </td>

                        </tr>
                        <?php
                	}
				} else { ?>
                        <tr>
                            <td colspan="8" class="text-center">NO HAY DATOS</td>;
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>