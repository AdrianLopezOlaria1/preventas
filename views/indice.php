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

                        
                       

                    </div>
                    <!-- end row -->

                    <div class="row">
                    
                        <div class="col-xl-4">
                            <!-- Chat-->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Chat</h5>
                                    </div>

                                    <div id="yearly-sales-collapse" class="collapse show">
                                        <div class="chat-conversation mt-2">
                                            <div class="card-body py-0 mb-3" data-simplebar style="height: 322px;">
                                                <ul class="conversation-list">
                                                    <li class="clearfix">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                            <i>10:00</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Geneva</i>
                                                                <p>
                                                                    Hello!
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix odd">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="Female">
                                                            <i>10:01</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Thomson</i>
                                                                <p>
                                                                    Hi, How are you? What about our next meeting?
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                            <i>10:01</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Geneva</i>
                                                                <p>
                                                                    Yeah everything is fine
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix odd">
                                                        <div class="chat-avatar">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="male">
                                                            <i>10:02</i>
                                                        </div>
                                                        <div class="conversation-text">
                                                            <div class="ctext-wrap">
                                                                <i>Thomson</i>
                                                                <p>
                                                                    Wow that's great
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body pt-0">
                                                <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <input type="text" class="form-control chat-input" placeholder="Enter your text" required>
                                                            <div class="invalid-feedback">
                                                                Please enter your messsage
                                                            </div>
                                                        </div>
                                                        <div class="col-auto d-grid">
                                                            <button type="submit" class="btn btn-danger chat-send waves-effect waves-light">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
    
                                        </div> <!-- end .chat-conversation-->
                                    </div>
                                </div>
                                
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-8">
                            <!-- Todo-->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Projects</h5>
                                    </div>

                                    <div id="yearly-sales-collapse" class="collapse show">

                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Start Date</th>
                                                        <th>Due Date</th>
                                                        <th>Status</th>
                                                        <th>Assign</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Velonic Admin v1</td>
                                                        <td>01/01/2015</td>
                                                        <td>26/04/2015</td>
                                                        <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Velonic Frontend v1</td>
                                                        <td>01/01/2015</td>
                                                        <td>26/04/2015</td>
                                                        <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Velonic Admin v1.1</td>
                                                        <td>01/05/2015</td>
                                                        <td>10/05/2015</td>
                                                        <td><span class="badge bg-pink-subtle text-pink">Pending</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Velonic Frontend v1.1</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-purple-subtle text-purple">Work in Progress</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-warning-subtle text-warning">Coming soon</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                    <tr>
                                                        <td>6</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-primary-subtle text-primary">Coming soon</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                    <tr>
                                                        <td>7</td>
                                                        <td>Velonic Admin v1.3</td>
                                                        <td>01/01/2015</td>
                                                        <td>31/05/2015</td>
                                                        <td><span class="badge bg-danger-subtle text-danger">Cool</span></td>
                                                        <td>Techzaa Studio</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>        
                                    </div>
                                </div>                           
                            </div> <!-- end card-->
                        </div> <!-- end col-->
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
                                            <div id="revenue-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
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
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->



        </div>

        <!-- <script>
    $(document).ready(function(){
        $.ajax({
            url: 'metodos/obtener_numero_usuarios.php',
            type: 'GET',
            success: function(response) {
                // Actualizar el número total de usuarios
                $('#total-users').text(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script> -->


