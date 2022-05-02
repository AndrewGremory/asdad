<?php 
    include('funciones.php');
    $miconexion=conectar_bd('root','login');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agregar ficha</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Sena</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
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
                    <a class="dropdown-item" href="index.php">Salir</a>
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

        <!-- Contenido -->
        
        <div id="layoutSidenav_content">
            <div class="container-fluid">
            <h1 class="mt-4">Ingrese los datos de la ficha </h1>
                <div class="card-body">
                    <form id="formulario" role="form" method="post" action="conexion.php">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="numeroFicha">Número ficha</label>
                                    <input class="form-control" name="ficha" max="6" id="id" type="text" placeholder="Ingrese número de ficha" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="TipoPrograma" >Tipo de programa</label>
                                    <select class="form-control" name="tipo_programa" id="TipoPrograma" required>
                                        <option selected disabled value="">Selecciona una opción</option>
                                        <option value="1">Especialización Tecnológica</option>
                                        <option value="2">Tecnólogo	</option>
                                        <option value="3">Técnico</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="NombrePrograma" >Nombre programa</label>
                            <?php 
                                // include('funciones.php');
                                // $miconexion=conectar_bd('root','login');
                                $consulta = "SELECT * FROM programa";
                                $resultado = mysqli_query($miconexion, $consulta)or die(mysqli_error($miconexion));
                                
                                ?>


                                <select class="form-control" name="nombre_programa" id="NombrePrograma" required>
                                    <option selected disabled value="">Selecciona una opción</option>
                                    <?php while ($opcion = $resultado -> fetch_object()) { ?>

                                <option value="<?php echo $opcion-> id_programa;?>"><?php echo $opcion-> pro_nombre;?></option>
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
                                        <option selected disabled value="">Seleccione un instructor</option>
                                        <?php while ($opcion = $resultado -> fetch_object()) { ?>

                                        <option value=" <?php echo $opcion -> id_usuario;?>"><?php echo $opcion-> nombre." ".$opcion -> apellido;?></option>
                                        <?php } ?>

                                    </select>

                        <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="inicio.php">Agregar ficha</a> -->
                        <input type="submit" class="btn btn-primary btn-block orm-group mt-4 mb-0" value="Agregar Ficha">
                    </div>
                    </form>
                </div>
                                        <!-- Modal agregar program -->

                                        <div class="form-group">
                            <div class="modal" tabindex="-1" id="AgregarPrograma">
                                <div class="modal-dialog">
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
                                                        <input class="form-control py-4" name="nombre" id="nombre" type="text" placeholder="Ingrese nombre de programa" />
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
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>