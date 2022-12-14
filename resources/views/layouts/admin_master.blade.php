Products<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AgroSena 4.0</title>        

        <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f1bdee8178.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand"><i class="fa-solid fa-spa"></i> AgroFinca 4.0</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Ajustes</a>
                        <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesi??n</a>
                    </form>

                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inicio</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                                Finca los cerezos
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaz</div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCultivos" aria-expanded="false" aria-controls="collapseCultivos">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-seedling"></i></div>
                                Cultivos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCultivos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('crop_create') }}">Crear Cultivo</a>
                                    <a class="nav-link" href="{{ route('crop_index') }}">Inventario de cultivos</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseActividades" aria-expanded="false" aria-controls="collapseActividades">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scissors"></i></div>
                                Actividades
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseActividades" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('activity_create') }}">Crear Actividad</a>
                                    <a class="nav-link" href="{{ route('activity_index') }}">Inventario de actividades</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInsumos" aria-expanded="false" aria-controls="collapseInsumos">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Insumos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseInsumos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('supply_create') }}">Crear Insumo</a>
                                    <a class="nav-link" href="{{ route('supply_index') }}">Inventario de insumos</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGastos" aria-expanded="false" aria-controls="collapseGastos">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass-dollar"></i></div>
                                Gastos Adicionales
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseGastos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('additional_cost_create') }}">Crear Gasto Adicional</a>
                                    <a class="nav-link" href="{{ route('additional_cost_index') }}">Lista de Gastos Adicionales</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrueba" aria-expanded="false" aria-controls="collapsePrueba">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-broom"></i></div>
                                Prueba
                                <div class="sb-sidenav-collapse-arrow"><i class="fa-solid fa-broom"></i></div>
                            </a>
                            <div class="collapse" id="collapsePrueba" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('create') }}">Crear</a>
                                    <a class="nav-link" href="{{ route('index') }}">Inventario</a>
                                </nav>
                            </div>
                            
                            
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                @yield('content')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; AgroSena 4.0, Santiago Naranjo S.</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend') }}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
         <!-- <script src="{{ asset('backend') }}/assets/demo/datatables-demo.js"></script>  -->
<!-- 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script> -->

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

        @yield('script')
    </body>
</html>
