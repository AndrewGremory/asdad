<?php
session_start();
include("conexion2.php");

include('funciones.php');

$fichas = "SELECT id_ficha, tipo_programa, pro_nombre, concat(usuarios.nombre,' ',usuarios.apellido) as lider, lider_ficha FROM fichas join programa on nombre_programa=id_programa join usuarios on id_usuario=lider_ficha";
$miconexion=conectar_bd('root','login');



// if (isset($_GET["eliminar"])) {
//     // eliminar registro
//     $conexion->query("DELETE FROM fichas WHERE id_ficha =" . $_GET["eliminar"]);
// }

// if (isset($_GET["editar"])) {
//     // editar registro
//     $conexion->query("UPDATE FROM fichas where id_ficha =" . $_GET["editar"]);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Consulta ficha</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Sena</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Opciones </a>
                    <a class="dropdown-item" href="#">Mis fichas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../index.php">Salir</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../inicio.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Fichas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="agregar_ficha.php">Agregar Ficha</a>
                                <a class="nav-link" href="consultar_ficha.php">Consulta de Fichas</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Usuarios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUsuarios" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../usuarios/agregar_user.php">Agregar usuario</a>
                                <a class="nav-link" href="../usuarios/consultar_user.php">Consulta de usuario</a>

                            </nav>
                        </div>


                        <a class="nav-link" href="../estadisticas/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Estadisticas
                        </a>
                       
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="container">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <br>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>tipo programa</th>
                                <th>Nombre programa</th>
                                <th>Lider de ficha</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Administrar</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>tipo programa</th>
                                <th>Nombre programa</th>
                                <th>Lider de ficha</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Administrar</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $resultado = mysqli_query($conexion, $fichas);

                            while ($row = mysqli_fetch_assoc($resultado)) { 
                                ?>
                                <tr>

                                <td><form action="seguimiento.php" method="post"><input type="submit" collapse hidden id="ficha" class="btn btn-light" name="ficha" value="<?php echo $row['id_ficha']; ?>"/><?php echo $row['id_ficha']; ?></td>
                                    <td><?php echo $row['tipo_programa']; ?></td>
                                    <td><?php echo $row['pro_nombre']; ?></td>
                                    <td><?php echo $row['lider']; ?></td>
                                    <td><button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class="fas fa-edit"></i></button>
                                    <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button></td>
                                    
                                    <input type="hidden" name="pro_nombre" value="<?php echo $row['pro_nombre']?>">
                                    <!-- <td><form action="seguimiento.php"><button type="submit" id="ficha" class="btn btn-primary" name="ficha" value="<?php echo $row['id_ficha']; ?> ">Administrar ficha</button></form></td> -->
                                    <td><button type="submit" id="ficha" class="btn btn-primary" name="ficha" value="<?php echo $row['id_ficha']; ?> ">Administrar ficha</button></form></td>
                                    <!-- <td><label for="ficha" class="btn btn-primary">Administrar ficha</label></td> -->
                                    <!-- <td><a href="seguimiento.php"><button type="button" class="btn btn-success">Administrar ficha</button></a></td> -->

                                </tr>
                            <?php } ?>



                        </tbody>
                    </table>
                </div>

                                <!-- modal editar -->
                <div id="editar" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Ficha</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario -->
                                <form action="editar.php" id="formulario" role="form" method="POST">
                                    <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="numeroFicha">Número ficha</label>
                                            <input class="form-control" name="id"  id="id" type="text" placeholder="Ingrese número de ficha"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="TipoPrograma">Tipo de programa</label>
                                            <select class="form-control" name="tipo_programa" id="TipoPrograma" required>
                                                <option disabled selected value="">Selecciona una opción</option>
                                                <option value="1">Especialización Tecnológica</option>
                                                <option value="2">Tecnólogo	</option>
                                                <option value="3">Técnico</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="NombrePrograma">Nombre programa</label>
                                    <?php 
                                        // include('funciones.php');
                                        // $miconexion=conectar_bd('root','login');
                                        $consulta = "SELECT * FROM programa";
                                        $resultado = mysqli_query($miconexion, $consulta)or die(mysqli_error($miconexion));
                                        
                                        ?>


                                        <select class="form-control" name="nombre_programa" id="NombrePrograma" required>
                                            <option disabled selected>Selecciona una opción</option>
                                            <?php while ($opcion = $resultado -> fetch_object()) { ?>

                                        <option value="<?php echo $opcion -> id_programa;?>"><?php echo $opcion -> pro_nombre;?></option>
                                            <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AgregarPrograma">Agregar Programa</button>
                                    
                                </div>

                                        <div class="form-group">
                                            
                                            <label class="small mb-1" for="lider">Lider de ficha</label>
                                            <?php 
                                            // include('funciones.php');
                                            // $miconexion=conectar_bd('root','login');
                                            $consulta = "SELECT * FROM usuarios where rol = 'instructor'";
                                            $resultado = mysqli_query($miconexion, $consulta)or die(mysqli_error($miconexion));
                                            
                                            ?>
                                            <select class="form-control" name="lider_ficha" id="LiderFicha" required>
                                                <option disabled selected>Seleccione un instructor</option>
                                                <?php while ($opcion = $resultado -> fetch_object()) { ?>

                                                <option value=" <?php echo $opcion -> id_usuario;?>"><?php echo $opcion-> nombre." ".$opcion -> apellido;?></option>
                                                <?php } ?>

                                            </select>

                                <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="inicio.php">Agregar ficha</a> -->
                                <input type="submit" class="btn btn-primary btn-block orm-group mt-4 mb-0" value="Modificar Ficha">
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>

        <!-- MODAL AGREGAR PROGRAMA -->
        <div class="form-group">
                            <div class="modal fade" tabindex="-1" id="AgregarPrograma">
                                <div class="modal-dialog" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Agregar Programa
                                            <button class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="guardar_programa.php" id="Modal" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb" for="InsertarNombre">Nombre de programa</label>
                                                        <input class="form-control py-4" name="nombre" id="nombre" type="text" placeholder="Ingrese nombre de programa" required/>
                                                    </div>
                                                </div>
                                                <input type="submit" class="btn btn-primary btn-block" value="Guardar">

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                         <!-- modal eliminar -->
            <div id="eliminar" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar ficha</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario -->
                            <h4>¿Está seguro de eliminar esta ficha?</h4>
                            <form action="eliminar_ficha.php" id="modal_eliminar" role="form" method="POST">
                                <label for="delete_id">Ficha que va a eliminar: </label>
                                <input type="text" class="form-control"  name="ficha" id="delete_id" readonly="readonly"></input>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-success">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        <script>
            $('.editbtn').on('click', function() {
                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function() {
                    return $(this).text();
                });
                $('#id').val(datos[0]);
                $('#TipoPrograma').val(datos[1]);
                $('#NombrePrograma').val(datos[2]);
                $('#LiderFicha').val(datos[3]);


            });
        </script>

        <script>
            $('.deletebtn').on('click', function() {
                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function() {
                    return $(this).text();
                });
                $('#delete_id').val(datos[0]);
                $('#copy_id').val(datos[10]);


            });
        </script>

        <script>
        $(document).ready(function() {
                $('#dataTable').DataTable( {
                    language: {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    }
                    
                });
                
            } );
            
            </script>
        </main>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>