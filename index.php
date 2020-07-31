<?php 
include './service/moduloService.php';

$codModulo= "";
$codigo="";
$nombre= "";
$estado="";

$accion = "Agregar";
$moduloService= new moduloService();

	if(isset($_POST['accion']) && $_POST['accion'] == "Agregar" ){

		$moduloService->insert($_POST["codigo"],$_POST["nombre"],$_POST["estado"]);
	
	}else if(isset($_POST['accion']) && $_POST['accion'] == "Modificar"){
		
		$moduloService->update($_POST["nombre"],$_POST["estado"],$_POST["codigo"]);

	}else if(isset($_GET["update"])){
		
        $modulo=$moduloService->findByPK($_GET["update"]);
        		
		if ($modulo !=null) {
		$codModulo= $modulo["COD_MODULO"];
		$nombre=$modulo["NOMBRE"];
		$estado=$modulo["ESTADO"];
		
		$accion="Modificar";
		print_r($codModulo);
		}					
	}else if($_GET["delete"]){
		$moduloService->delete($_GET["delete"]);
	}
	$result = $moduloService->findAll();
	
?>
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


                <form name="forma" method="POST" action="index.php">

                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <th>CODIGO MODULO</th>
                            <th>NOMBRE</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>

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
                                    <a href="index.php?update=<?php echo $row['COD_MODULO']; ?>"
                                        class="btn btn-success btn-sm" data-toggle="modal"><span
                                            class="glyphicon glyphicon-edit"></span> Editar</a>
                                    <a href="index.php?delete=<?php echo $row['COD_MODULO']; ?>"
                                        class="btn btn-danger btn-sm" data-toggle="modal"><span
                                            class="glyphicon glyphicon-trash"></span> Borrar</a>
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

                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row form-group ">
                                <div class="col-sm-12 text-center">
                                    <h3><?php echo $accion?> Modulo</h4>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4 text-center">
                                    <label class="control-label" style="position:relative; top:7px;" 
                                        for="codigo">Codigo </label>
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="codigo" value="<?php echo $codModulo ?>"
                                        maxlength="10" size="11" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4 text-center">
                                    <label class="control-label" style="position:relative; top:7px;" 
                                        for="nombre">Nombre</label>
                                </div>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" type="text" name="nombre"
                                        value="<?php echo $nombre ?>" maxlength="100" size="25" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4 text-center">
                                    <label class="control-label" style="position:relative; top:7px;" for="estado">Estado
                                    </label>
                                </div>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" type="text" name="estado"
                                        value="<?php echo $estado ?>" maxlength="100" size="11">
                                </div>
                            </div>


                            <input type="hidden" name="codModulo" value="<?php echo $codModulo ?>">


                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="accion" value="<?php echo $accion?>" class="btn btn-primary"><span
                                class="glyphicon glyphicon-check"></span><?php echo " ".$accion?></button>
                </form>

            </div>

        </div>

    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>