<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Estadisticas</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" />
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
                                <a class="nav-link" href="../ficha/agregar_ficha.php">Agregar Ficha</a>
                                <a class="nav-link" href="../ficha/consultar_ficha.php">Consulta de Fichas</a>
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
                       
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
            
        </div>
        <body>
            <div class="col-lg-10">
                <div class="card" style="position: relative;right: -240px;bottom: -150px;">
                    <div class="card-header">
                        Estadisticas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <canvas id="Graficobar" width="400" height="400"></canvas>
                            </div>
                            <div class="col-lg-4">
                                <canvas id="Graficobarhorizontal" width="400" height="400"></canvas>
                            </div>

                            <div class="col-lg-4">
                                <canvas id="Graficopie" width="400" height="400"></canvas>
                            </div>

                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </body>
        




        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
    CargarDatosGraficosBar();
    CargarDatosGraficosBarHorizontal();
    CargarDatosGraficosPie();
    function CargarDatosGraficosBar(){
        $.ajax({
            url:'controlador_grafico.php',
            type:'POST'
        }).done(function(resp){
            if(resp.length>0){
                var titulo = [];
                var cantidad = [];
                var colores = [];
                var data = JSON.parse(resp);
                for(var i=0; i < data.length; i++){
                    titulo.push(data[i][2]);
                    cantidad.push(data[i][1]);
                    colores.push(colorRGB());
                }

                CrearGrafico(titulo,cantidad,colores,'bar','GRAFICO EN BARRAS DE FICHAS','Graficobar');
                
            }   
        })
    }
    function CargarDatosGraficosBarHorizontal(){
        $.ajax({
            url:'controlador_grafico.php',
            type:'POST'
        }).done(function(resp){
            if(resp.length>0){
                var titulo = [];
                var cantidad = [];
                var colores = [];
                var data = JSON.parse(resp);
                for(var i=0; i < data.length; i++){
                    titulo.push(data[i][2]);
                    cantidad.push(data[i][1]);
                    colores.push(colorRGB());
                }

                CrearGrafico(titulo,cantidad,colores,'horizontalBar','GRAFICO EN BARRAS HORIZONTAL DE FICHAS','Graficobarhorizontal');
                


            }
        })
    }
    function CargarDatosGraficosPie(){
        $.ajax({
            url:'controlador_grafico.php',
            type:'POST'
        }).done(function(resp){
            if(resp.length>0){
                var titulo = [];
                var cantidad = [];
                var colores = [];
                var data = JSON.parse(resp);
                for(var i=0; i < data.length; i++){
                    titulo.push(data[i][2]);
                    cantidad.push(data[i][3]);
                    colores.push(colorRGB());
                }

                CrearGrafico(titulo,cantidad,colores,'pie','GRAFICO PIE DE FICHAS','Graficopie');
                


            }
        })
    }
    function CrearGrafico(titulo,cantidad,colores,tipo,encabezado,id){
            var ctx = document.getElementById(id);
            var myChart = new Chart(ctx, {
                type: tipo,
                data: {
                    labels: ['Inducción','Identificación','Análisis','Diseño','Desarrollo','Implantación','Evaluación',],
                    datasets: [{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor:colores,
                        borderColor:colores,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
    }

    function generarNumero(numero){
	    return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }
    </script>
</body>

</html>