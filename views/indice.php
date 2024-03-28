<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layout</a></li>
                                        <li class="breadcrumb-item active">Horizontal</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Preventas</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                    <div class="col-xxl-6 col-sm-6">
                        <div class="card widget-flat text-bg-success"> <!-- Cambiado de "text-bg-info" a "text-bg-success" para cambiar el color a verde -->
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="bi bi-clipboard2-check widget-icon"></i>
                                </div>
                                <h6 class="text-uppercase mt-0" title="Customers">Ganadas</h6>
                                <?php 
                                    $preventas = new Preventa();
                                    $cantidadGanadas = $preventas->contarPreventasGanadas();
                                ?>
                                <h2 class="my-2"><?= $cantidadGanadas ?></h2>
                                <p class="mb-0">
                                    <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->


                    
                        <div class="col-xxl-6 col-sm-6">
                            <div class="card widget-flat text-bg-pink">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="bi bi-clipboard-x widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Perdidas</h6>
                                    <?php 
                                        $preventas = new Preventa();
                                        $cantidadCerradasPerdidas = $preventas->contarPreventasCerradaPerdida();
                                    ?>
                                    <h2 class="my-2"><?= $cantidadCerradasPerdidas ?></h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        </div>

                        <div class="row">

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-purple">
                                <div class="card-body">
                                    <div class="float-end">
                                    <i class="bi bi-clock"></i>
                                        <i class="bi bi-clipboard2-data widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Pendientes de Cierre</h6>
                                    <?php 
                                        $preventas = new Preventa();
                                        $cantidadPendienteCierre = $preventas->contarPreventasPendientesCierre();
                                    ?>
                                    <h2 class="my-2"><?= $cantidadPendienteCierre ?></h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat bg-warning-subtle">
                            
                                <div class="card-body">
                                    <div class="float-end">
                                    
                                    <i style="background-color: #c2c2c2;" class="bi bi-clock widget-icon"></i>
                                        
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Pendientes</h6>
                                    <?php 
                                        $preventas = new Preventa();
                                        $cantidadPendientes = $preventas->contarPreventasPendientes();
                                    ?>
                                    <h2 class="my-2"><?= $cantidadPendientes ?></h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white text-warning bg-opacity-50 me-1">-5.75%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->


                        <div class="col-xxl-3 col-sm-6">
    <div class="card widget-flat text-secondary me-1 border border-secondary-light rounded-3">
        <div class="card-body">
            <div class="float-end">
                <i style="background-color: #c2c2c2;" class="ri-group-2-line widget-icon text-secondary"></i>
            </div>
            <h6 class="text-uppercase mt-0" title="Customers">Realizada reunion</h6>
            <?php 
                $preventas = new Preventa();
                $cantidadRealizadaReunion = $preventas->contarPreventasRealizadaReunion();
            ?>
            <h2 class="my-2"><?= $cantidadRealizadaReunion ?></h2>
            <p class="mb-0">
                <span class="badge bg-secondary-subtle text-secondary me-1">8.21%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
        </div>
    </div>
</div> <!-- end col-->



                        
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-primary">
                                <div class="card-body">
                                    <div class="float-end">
                                    <i class="bi bi-star"></i>
                                        <i class="bi bi-clipboard widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Realizada Valoración</h6>
                                    <?php 
                                        $preventas = new Preventa();
                                        $cantidadValoradas = $preventas->contarPreventasValoradas();
                                    ?>
                                    <h2 class="my-2"><?= $cantidadValoradas ?></h2>
                                    <p class="mb-0">
                                        <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div>

                    <div class="row">
   
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Últimas preventas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Contacto</th>
                                                    <th scope="col">Comercial</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Fecha Solicitud</th>
                                                    <th scope="col">Fecha Reunión</th>
                                                    <th scope="col">Acta</th>
                                                    <th scope="col">Horas</th>
                                                    <th scope="col">Importe</th>
                                                    <th scope="col">Status</th>                                                     
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                // Instanciar la clase Precompra
                                                $preventa = new PreVenta();

                                                // Obtener los datos de las preventas
                                                $preventas = $preventa->ultimasPreventas();

                                                // Iterar sobre los resultados y generar las filas de la tabla
                                                foreach ($preventas as $index => $preventa) {
                                                    echo '<tr>';
                                                    echo '<th scope="row">' . ($index + 1) . '</th>'; // Número de fila
                                                    echo '<td>' . $preventa['nomCli'] . '</td>'; // Cliente
                                                    echo '<td>' . $preventa['nomCont'] . '</td>'; // Contacto
                                                    echo '<td>' . $preventa['nomCom'] . '</td>'; // Comercial
                                                    echo '<td>' . $preventa['nomTi'] . '</td>'; // Tipo
                                                    echo '<td>' . $preventa['fecha_solicitud'] . '</td>'; // Fecha Solicitud
                                                    echo '<td>' . $preventa['fecha_reunion'] . '</td>'; // Fecha Reunión
                                                    echo '<td>' . $preventa['acta_reunion'] . '</td>'; // Acta
                                                    echo '<td>' . $preventa['horas_previstas'] . '</td>'; // Horas
                                                    echo '<td>' . $preventa['importe'] . '</td>'; // Importe
                                                    
                                                
                                                    // Definir la clase CSS según el estado
                                                    $estado_class = '';
                                                    switch ($preventa['status']) {
                                                        case 'P':
                                                            $estado_class = 'badge bg-warning-subtle text-warning';
                                                            $estado = 'Pendiente';
                                                            break;
                                                        case 'RP':
                                                            $estado_class = 'badge bg-secondary-subtle text-secondary';
                                                            $estado = 'Realizada reunión';
                                                            break;
                                                        case 'RV':
                                                            $estado_class = 'badge bg-primary';
                                                            $estado = 'Realizada valoración';
                                                            break;
                                                        case 'PC':
                                                            $estado_class = 'badge bg-purple-subtle text-purple';
                                                            $estado = 'Pendiente cierre';
                                                            break;
                                                        case 'CG':
                                                            $estado_class = 'badge bg-primary-subtle text-primary';
                                                            $estado = 'Cerrada ganada';
                                                            break; 
                                                        case 'CP':
                                                            $estado_class = 'badge bg-danger-subtle text-danger';
                                                            $estado = 'Cerrada perdida';
                                                            break;         
                                                        default:
                                                            $estado_class = 'badge bg-secondary-subtle text-secondary'; // Por defecto
                                                            break;
                                                    }
                                                    
                                                    echo '<td><span class="' . $estado_class . '">' . $estado . '</span></td>'; // Estado                                                                                                                                    
                                                    echo '</tr>';
                                                }
                                                
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button" aria-expanded="false" aria-controls="weeklysales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0">Weekly Sales Report</h5>

                                    <div id="weeklysales-collapse" class="collapse pt-3 show">
                                        <div dir="ltr">
                                            <div id="revenue-chart1" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col">
                                                <p class="text-muted mt-3">Current Week</p>
                                                <h3 class=" mb-0">
                                                    <span>$506.54</span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Previous Week</p>
                                                <h3 class=" mb-0">
                                                    <span>$305.25 </span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Conversation</p>
                                                <h3 class=" mb-0">
                                                    <span>3.27%</span>
                                                </h3>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3">Customers</p>
                                                <h3 class=" mb-0">
                                                    <span>3k</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0">Yearly Sales Report</h5>

                                    <div id="yearly-sales-collapse" class="collapse pt-3 show">
                                        <div dir="ltr">
                                            <div id="yearly-sales-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">Quarter 1</p>
                                                <h4 class="mb-0">$56.2k</h4>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">Quarter 2</p>
                                                <h4 class="mb-0">$42.5k</h4>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted mt-3 mb-2">All Time</p>
                                                <h4 class="mb-0">$102.03k</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                            <!-- 
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h4 class="fs-22 fw-semibold">69.25%</h4>
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> US Dollar Share</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div id="us-share-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             -->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->



        </div>

    

<script>
!function(r) {
    "use strict";
    function e() {
        this.$body = r("body"),
        this.charts = []
    }
    e.prototype.initCharts = function() {
        window.Apex = {
            chart: {
                parentHeightOffset: 0,
                toolbar: {
                    show: !1
                }
            },
            grid: {
                padding: {
                    left: 0,
                    right: 0
                }
            },
            colors: ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"]
        };
        var e = ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"],
            t = r("#revenue-chart1").data("colors"),
            a = {
                series: [{
                    name: "Revenue",
                    data: [260, 505, 414, 526, 227, 413, 201]
                }, {
                    name: "Sales",
                    data: [320, 258, 368, 458, 201, 365, 389]
                }, {
                    name: "Profit",
                    data: [320, 458, 369, 520, 180, 369, 160]
                }],
                chart: {
                    height: 377,
                    type: "bar"
                },
                plotOptions: {
                    bar: {
                        columnWidth: "60%"
                    }
                },
                stroke: {
                    show: !0,
                    width: 2,
                    colors: ["transparent"]
                },
                dataLabels: {
                    enabled: !1
                },
                colors: e = t ? t.split(",") : e,
                xaxis: {
                    categories: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
                },
                yaxis: {
                    title: {
                        text: "$ (thousands)"
                    }
                },
                legend: {
                    offsetY: 7
                },
                grid: {
                    padding: {
                        bottom: 20
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(e) {
                            return "$ " + e + " thousands"
                        }
                    }
                }
            };
        new ApexCharts(document.querySelector("#revenue-chart1"), a).render();
        var e = ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"],
            a = {
                series: [{
                    name: "Mobile",
                    data: [25, 15, 25, 36, 32, 42, 45]
                }, {
                    name: "Desktop",
                    data: [20, 10, 20, 31, 27, 37, 40]
                }],
                chart: {
                    height: 250,
                    type: "line",
                    toolbar: {
                        show: !1
                    }
                },
                colors: e = (t = r("#yearly-sales-chart").data("colors")) ? t.split(",") : e,
                stroke: {
                    curve: "smooth",
                    width: [3, 3]
                },
                markers: {
                    size: 3
                },
                xaxis: {
                    categories: ["2017", "2018", "2019", "2020", "2021", "2022", "2023"]
                },
                legend: {
                    show: !1
                }
            };
        new ApexCharts(document.querySelector("#yearly-sales-chart"), a).render();
        var a = Apex.grid = {
            padding: {
                right: 0,
                left: 0
            }
        },
            a = {
                series: [44, 55, 13, 43],
                chart: {
                    width: 80,
                    type: "pie"
                },
                legend: {
                    show: !(Apex.dataLabels = {
                        enabled: !1
                    })
                },
                colors: ["#1a2942", "#f13c6e", "#3bc0c3", "#d1d7d973"],
                labels: ["Team A", "Team B", "Team C", "Team D"]
            };
        new ApexCharts(document.querySelector("#us-share-chart"), a).render()
    }, e.prototype.init = function() {
        this.initCharts()
    }, r.Dashboard = new e, r.Dashboard.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    t(document).ready(function(e) {
        t.Dashboard.init()
    })
}(window.jQuery);
</script>



