<?php include('config.php');
session_start();

$fichaconsulta= $_POST['ficha'];
$consulta = "SELECT * FROM resultado_aprendizaje where ficha_id = '$fichaconsulta'";

$queryData   = mysqli_query($con, $consulta);
$total_client = mysqli_num_rows($queryData);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Seguimiento</title>
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


                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Estadisticas
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tablas
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
                <div class="container-fluid">
                    <br>
                    <div class="col"><a href="consultar_ficha.php" class="btn btn-outline-dark" role="button">Volver</a>
                    <h3 class="mt-4">
                        Seguimiento de ficha  a
                    
                        <?php echo $fichaconsulta ?>
                        
        </div>
                    </h3>
                    <hr>
                        <!-- SELECIONNAR EXCEL -->
                            <div class="card-body">
                                <div class="col-md-7">
                                <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">
                                    <div class="file-input text-center ">
                                        <input type="hidden"  name="ficha_id" value="<?php echo $fichaconsulta; ?>">
                                        <input type="file" name="dataCliente" id="file-input" class="file-input__input"> 
                                        <label class="file-input__label" for="file-input">
                                        <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                                        <!-- <span  class=" btn btn-primary">Elegir Archivo Excel</span>                                 -->
                                        <input type="submit" name="subir" class="btn btn-primary" value="Subir Excel"/>
        
                                    </label >
        
                                    </div>
                                
                                </form>
                                </div>
        
                        </div>
                        
                    <div class="row">
                        <?php
                    

                        ?>   
                    <h6 class="text-center">
                        Resultados de aprendizaje <strong>(<?php echo $total_client; ?>)</strong>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Agregar_resultado">Agregar resultado de Aprendizaje</button>

                    </h6>
                            
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fase</th>
                                        <th>Actividad de proyecto</th>
                                        <th>Competencia</th>
                                        <th>Resultado de <br> aprendizaje</th>
                                        <th>Tipo de <br> resultado</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        <th>Estado de resultado</th>
                                        <th>Observaciones</th>
                                        <th>Opciones</th>
                                        <th style="visibility:collapse; display: none; ">id</th>
                                
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fase</th>
                                        <th>Actividad de proyecto</th>
                                        <th>Competencia</th>
                                        <th>Resultado de <br> aprendizaje</th>
                                        <th>Tipo de <br> resultado</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        <th>Estado de resultado</th>
                                        <th>Observaciones</th>
                                        <th>Opciones</th>
                                        <th style="visibility:collapse; display: none; ">id</th>

      

        
                                    </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <tr>
                                        <?php 
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($queryData)) { ?>
                                        <th><?php  echo $i++;?></th>
                                        <td><?php echo $data['fase']; ?></td>
                                        <td><?php echo $data['actividad']; ?></td>
                                        <td><?php echo $data['competencia']; ?></td>
                                        <td><?php echo $data['resultado']; ?></td>
                                        <td><?php echo $data['tipo']; ?></td>
                                        <td><?php echo $data['fecha_inicio']; ?></td>
                                        <td><?php echo $data['fecha_fin']; ?></td>
                                        <td><?php echo $data['estado']; ?></td>
                                        <td><?php echo $data['observaciones']; ?></td>
                                        <td> <button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class="fas fa-edit"></i></button> <hr>
                                            <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button> 
                                            <!-- eliminar -->
                                            <!-- <form action="eliminar.php" method="post">
                                                <button type="submit" class="btn btn-secondary deletebtn" data-toggle="modal" name="numero" data-target="#eliminar"><i class="fas fa-trash"></i></button> 
                                            </form> -->
                                        
                                            </td>
                                        <form action="eliminar.php" method="POST"></form>
                                        <!-- <td> <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button> </td> -->
                                        <td style="visibility:collapse; display: none; " ><?php echo $data['id']; ?></td>
                                        </tr>   
        
                                        <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            
            
            <!-- modal agregar resultado -->

            <div class="modal fade bd-example-modal-lg" id="Agregar_resultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Resultados de aprendizaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- FORMULARIO -->
                        <form action="insertar_resultado.php" method="POST" id="insertar_resultado">
                            <div class="form-group">
                                <label for="id" class="alert alert-success"  >Ficha <?php echo $ficha; ?></label>
                                <input type="hidden" id="id" name="idform" value="<?php echo $fichaconsulta; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="fase">Fase </label>
                                <input type="text" class="form-control" name="form_fase" id="form_fase" placeholder="Ingrese fase" required>
                            </div>
                            <div class="form-group">
                                <label for="actividad">Actvidad de proyecto</label>
                                <textarea class="form-control" name="form_actividad" id="form_actividad" placeholder="Ingrese Actividad de proyecto" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="competencia">Competencia</label>
                                <textarea class="form-control" name="form_competencia" id="form_competencia" placeholder="Ingrese Competencia" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="resultado">Resultado de Aprendizaje</label>
                                <textarea class="form-control" name="form_resultado" id="form_resultado" rows="3" placeholder="Ingrese Resultado de aprendizaje" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="form_tipo_resultado">Tipo de resultado</label>
                                <select class="form-control" name="form_tipo_resultado" id="form_tipo_resultado" required>
                                    <option selected disabled>Seleccione tipo de resultado</option>
                                    <option>Específico</option>
                                    <option>Institucional</option>
                                    <option>Clave</option>
                                    <option>Transversal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de inicio </label>
                                <input type="date" class="form-control" name="form_fecha_inicio" id="form_fecha_inicio" placeholder="Fecha de inicio">
                            </div>
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de fin </label>
                                <input type="date" class="form-control" name="form_fecha_fin" id="form_fecha_fin" placeholder="Fecha de fin">
                            </div>
                            <div class="form-group">
                                <label for="form_estado_resultado">Estado de resultado</label>
                                <select name="form_estado_resultado" id="form_estado_resultado" class="form-control" required>
                                    <option selected disabled>Seleccione tipo de resultado</option>
                                    <option>Evaluado</option>
                                    <option>Pendiente</option>
                                    <option>En ejecución</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="observacion">Observaciones</label>
                                <textarea name="form_observacion" id="form_observacion" class="form-control" placeholder="¿Alguna observacion?" rows="10"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                            </form>
                    </div>
                    </div>
                </div>
            </div> 
            <!-- modal editar -->
            <div id="editar" class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Resultado de la ficha <?php echo $fichaconsulta; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario -->
                                <!-- FORMULARIO -->
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" hidden name="ficha" value="<?php echo $fichaconsulta; ?>">
                                    </div>
                                    <div class="form-group" >
                                        <input type="text" hidden name="id" id="update_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="fase">Fase</label>
                                        <input type="text" class="form-control" name="fase" id="fase"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="actividad">Actvidad de proyecto</label>
                                        <textarea class="form-control" id="actividad" name="actividad"  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="competencia">Competencia</label>
                                        <textarea class="form-control" name="competencia" id="competencia"  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="resultado">Resultado de Aprendizaje</label>
                                        <textarea class="form-control" name="resultado" id="resultado" rows="3"  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_resultado">Tipo de resultado</label>
                                        <select class="form-control" name="tipo_resultado"  id="tipo_resultado">
                                            <option selected, disabled>Seleccione tipo de resultado</option>
                                            <option value="Específico">Específico</option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Clave">Clave</option>
                                            <option value="Transversal">Transversal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha de inicio </label>
                                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_fin">Fecha de fin </label>
                                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha de fin">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_resultado">Estado de resultado</label>
                                        <select name="estado" id="estado_resultado" class="form-control">
                                            <option selected, disabled>Seleccione tipo de resultado</option>
                                            <option>Evaluado</option>
                                            <option>Pendiente</option>
                                            <option>En ejecución</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observaciones</label>
                                        <textarea name="observacion" id="observacion" class="form-control" placeholder="¿Alguna observacion?" rows="10"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="editar" value="Editar"></input>
                                    </div>
                                </form>
                                <?php 
                                    
                                    if(isset($_POST['editar'])){
                                        $fase = $_POST['fase'];
                                        $actividad = $_POST['actividad'];
                                        $competencia = $_POST['competencia'];
                                        $resultado = $_POST['resultado'];
                                        $tipo_resultado = $_POST['tipo_resultado'];
                                        $fecha_inicio = $_POST['fecha_inicio'];
                                        $fecha_fin = $_POST['fecha_fin'];
                                        $estado = $_POST['estado'];
                                        $observacion = $_POST['observacion'];
                                        $id = $_POST['id'];
                                        $ficha = $_POST['ficha'];
                                    
                                        $registros = mysqli_query($con, "SELECT * FROM resultado_aprendizaje where id='$id'") or die("Problemas en el select consulta".mysqli_error($con));
                                    
                                        if($reg = mysqli_fetch_array($registros)){
                                            $registros = mysqli_query($con, "UPDATE resultado_aprendizaje set fase ='$fase', actividad ='$actividad', competencia ='$competencia', resultado ='$resultado', tipo ='$tipo_resultado', fecha_inicio ='$fecha_inicio', fecha_fin ='$fecha_fin', estado ='$estado', observaciones ='$observacion' WHERE id ='$id'") or die ("Problemas en el update".mysqli_error($con));
                                    
                                            // echo "<script language='JavaScript'>alert('Grabacion Correcta');</script>"; 
                                    
                                            // header("Location: seguimiento.php");

                                    
                                        }else
                                        echo "Error, no se actualizó resultado de aprendizaje";
                                    }
                                ?>
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
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario -->
                            <h4>¿Está seguro de eliminar este resultado de la ficha  <?php echo $ficha; ?>?</h4>
                            <form action="eliminar.php" id="modal_eliminar" role="form" method="POST">
                                <input type="hidden" name="ficha" value="<?php echo $ficha; ?>">
                                <textarea class="form-control" disabled name="resultado" id="delete_id" rows="5" ></textarea>
                                <input type="text" hidden name="id" id="copy_id">
                                


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-success">Eliminar</button>
                                </div>
                            </form>
                        </div>
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
            $('#fase').val(datos[0]);
            $('#actividad').val(datos[1]);
            $('#competencia').val(datos[2]);
            $('#resultado').val(datos[3]);
            $('#tipo_resultado').val(datos[4]);
            $('#fecha_inicio').val(datos[5]);
            $('#fecha_fin').val(datos[6]);
            $('#estado_resultado').val(datos[7]);
            $('#observacion').val(datos[8]);
            $('#update_id').val(datos[10]);



        });
    </script>
    <script>
            $('.deletebtn').on('click', function() {
                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function() {
                    return $(this).text();
                });
                $('#delete_id').val(datos[3]);
                $('#copy_id').val(datos[10]);


            });
        </script>
    <script>
        $(document).ready(function() {
            var lenguaje = $('#dataTable').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" 
                },
                "createdRow":function(row,data,index){
                    if (data[8] == "Evaluado"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(7).css({
                            'background-color':'#008000',
                            'color':'white',
                        })
                    }
                    if (data[8] == "Pendiente"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(7).css({
                            'background-color':'#FF3333',
                            'color':'white',
                        })
                    }
                    if (data[8] == "En ejecución"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(7).css({
                            'background-color':'#FFAC33',
                            'color':'white',
                        })
                    }
                }
            } );
            
        } );
    </script>
    

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