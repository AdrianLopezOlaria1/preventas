        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Preventas</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Preventas</h4>
                            </div>
                        </div>
                    </div>                                       
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Orders</h4>
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
                                                    <?php if($_SESSION['usuario']['rol'] == 1): ?> 
                                                    <th scope="col">acción</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                // Instanciar la clase Precompra
                                                $preventa = new PreVenta();

                                                // Obtener los datos de las preventas
                                                $preventas = $preventa->obtenerPreventas();

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
                                                            $estado = 'Realizada reunión preventa';
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
                                                    if($_SESSION['usuario']['rol'] == 1){   
                                                    echo '<td style="white-space: nowrap; width: 1%;"> <div class="tabledit-toolbar btn-toolbar" style="text-align: left;"><div class="btn-group btn-group-sm" style="float: none;"><a href="index.php?action=formEditPreventa&&id=' .$preventa['id']. '" class="tabledit-edit-button btn btn-success" style="float: none;">Modificar</a></div>';                                        
                                                    }                                                                                
                                                    echo '</tr>';
                                                }
                                                
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                </div>
            </div>
        </div>