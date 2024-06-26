        <?php if(isset($_GET['pre'])){unset($_SESSION['preventasFiltradas']);unset($_SESSION['estado']);unset($_SESSION['comercial']);unset($_SESSION['usu']);unset($_SESSION['ini']);unset($_SESSION['fin']);}?>                                            
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Inforges</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ventana</a></li>
                                        <li class="breadcrumb-item active">Preventas</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Preventas</h4>
                            </div>
                        </div>
                    </div> 
                    <div >
                    <button class="btn btn-primary" onclick="mostrarFiltros()" style="display:float;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"></path>
                        </svg> Filtros
                    </button>
                    <?php if($_SESSION['usuario']['rol'] == 1):?>                
                        <div class="d-flex justify-content-end align-items-center gap-2" style="float:right;">        
                            <a class="btn btn-soft-info" href="index.php?action=formPreventa" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;" 
                            onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                            onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';"
                            > Nueva preventa</a>
                        </div>                
                    <?php endif; ?>

                    <?php if(isset($_SESSION['preventasFiltradas']) || isset($_GET['mostrar'])):?>
                        <div id="filtros" class="row" style="display:block; transition: opacity 0.3s;">
                    <?php else:?>
                        <div id="filtros" class="row" style="display:none; transition: opacity 0.3s;">
                    <?php endif;?>   
                            <?php require 'form/formFiltros.php'?>
                        </div>                     
                    </div><br>                                     
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Preventas</h4>
                                </div>
                                <div class="card-body">                                    
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Contacto</th>
                                                <th scope="col">Comercial</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Fecha Solicitud</th>
                                                <th scope="col">Fecha Reunión</th>
                                                <th scope="col">Fecha Presentación</th>
                                                <th scope="col">Acta</th>
                                                <th scope="col">Archivo</th>
                                                <th scope="col">Horas</th>
                                                <th scope="col">Importe</th>
                                                <th scope="col">Preventas</th> 
                                                <?php if($_SESSION['usuario']['rol'] == 1): ?> 
                                                <th scope="col">Acción</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                                                                                                                                   
                                            if (isset($_SESSION['preventasFiltradas'])) {                                                
                                                $preventasFiltradas = $_SESSION['preventasFiltradas']; 
                                                if($preventasFiltradas == null){
                                                    echo "<div class='alert alert-warning'>No hay resultados que mostrar</div>";
                                                } else {
                                                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; 
                                                    $totalPreventas = count($preventasFiltradas);
                                                    $preventasPorPagina = 5;  
                                                    $totalPaginas = ceil($totalPreventas / $preventasPorPagina);                                               
                                                    for ($i = ($paginaActual - 1) * $preventasPorPagina; $i < min($paginaActual * $preventasPorPagina, $totalPreventas); $i++) {
                                                        $preventa = $preventasFiltradas[$i];
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . ($i + 1) . '</th>'; // Número de fila
                                                        echo '<td>' . $preventa['nomUs'] . '</td>'; // Usuario
                                                        echo '<td>' . $preventa['nomCli'] . '</td>'; // Cliente
                                                        echo '<td>' . $preventa['nomCont'] . '</td>'; // Contacto
                                                        echo '<td>' . $preventa['nomCom'] . '</td>'; // Comercial
                                                        echo '<td>' . $preventa['nomTi'] . '</td>'; // Tipo
                                                        echo '<td>' . $preventa['fecha_solicitud'] . '</td>'; // Fecha Solicitud
                                                        echo '<td>' . $preventa['fecha_reunion'] . '</td>'; // Fecha Reunión
                                                        echo '<td>' . $preventa['fecha_presentacion'] . '</td>'; // Fecha Presentación
                                                        echo '<td>' . $preventa['acta_reunion'] . '</td>'; // Acta
                                                        $nombreArchivo = $preventa['archivo'];
                                                        $nombreArchivoBien = substr($nombreArchivo, strrpos($nombreArchivo, '_') + 1);
                                                        echo '<td>' . $nombreArchivoBien . '</td>'; // Archivo
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
                                                        if($_SESSION['usuario']['rol'] == 1){   
                                                        echo '<td style="white-space: nowrap; width: 1%;"> <div class="tabledit-toolbar btn-toolbar" style="text-align: left;"><div class="btn-group btn-group-sm" style="float: none;"><a href="index.php?action=formEditPreventa&id=' .$preventa['id']. 
                                                        '" class="tabledit-edit-button btn btn-success" 
                                                        style="float: none;">Modificar</a></div>';                                        
                                                        }                                                                                
                                                        echo '</tr>';
                                                    }
                                                    echo '</tbody>';
                                                    echo '</table>';
                                                    echo '<br>';
                                                    echo '<ul class="pagination">';
                                                    for ($i = 1; $i <= $totalPaginas; $i++) {
                                                        echo '<li class="page-item ' . ($paginaActual == $i ? 'active' : '') . '"><a class="page-link" href="index.php?action=preventas&pagina=' . $i . '">' . $i . '</a></li>';
                                                }
                                                echo '</ul>';                                                                                                                                                                                                                            
                                                }
                                            } else {
                                                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                                                    $preventa = new PreVenta();
                                                    $preventas = $preventa->obtenerPreventas();
                                                        
                                                    $totalPreventas = count($preventas);
                                                    $preventasPorPagina = 10;
                                                        
                                                    $totalPaginas = ceil($totalPreventas / $preventasPorPagina);

                                                        
                                                    for ($i = ($paginaActual - 1) * $preventasPorPagina; $i < min($paginaActual * $preventasPorPagina, $totalPreventas); $i++) {
                                                            
                                                    $preventa = $preventas[$i];
                                                    echo '<tr>';
                                                    echo '<th scope="row">' . ($i+1) . '</th>'; // Número de fila
                                                    echo '<td>' . $preventa['nomUs'] . '</td>'; // Usuario
                                                    echo '<td>' . $preventa['nomCli'] . '</td>'; // Cliente
                                                    echo '<td>' . $preventa['nomCont'] . '</td>'; // Contacto
                                                    echo '<td>' . $preventa['nomCom'] . '</td>'; // Comercial
                                                    echo '<td>' . $preventa['nomTi'] . '</td>'; // Tipo
                                                    echo '<td>' . $preventa['fecha_solicitud'] . '</td>'; // Fecha Solicitud
                                                    echo '<td>' . $preventa['fecha_reunion'] . '</td>'; // Fecha Reunión
                                                    echo '<td>' . $preventa['fecha_presentacion'] . '</td>'; // Fecha Presentación
                                                    echo '<td>' . $preventa['acta_reunion'] . '</td>'; // Acta
                                                    $nombreArchivo = $preventa['archivo'];
                                                    $nombreArchivoBien = substr($nombreArchivo, strrpos($nombreArchivo, '_') + 1);
                                                    echo '<td>' . $nombreArchivoBien . '</td>'; // Archivo
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
                                                    if($_SESSION['usuario']['rol'] == 1){   
                                                    echo '<td style="white-space: nowrap; width: 1%;"> <div class="tabledit-toolbar btn-toolbar" style="text-align: left;"><div class="btn-group btn-group-sm" style="float: none;"><a href="index.php?action=formEditPreventa&id=' .$preventa['id']. 
                                                    '" class="tabledit-edit-button btn btn-success" 
                                                    style="float: none;">Modificar</a></div>';                                        
                                                    }                                                                                
                                                    echo '</tr>';
                                                }
                                                echo '</tbody>';
                                                echo '</table>';
                                                echo '<br>';
                                                echo '<ul class="pagination">';
                                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                                    echo '<li class="page-item ' . ($paginaActual == $i ? 'active' : '') . '"><a class="page-link" href="index.php?action=preventas&pagina=' . $i . '">' . $i . '</a></li>';
                                                }
                                                echo '</ul>';
                                            }                                                                                       
                                            ?>                                                                                                                                                                                              
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                </div>
            </div>
        </div>
<script>
    function mostrarFiltros() {
        var div = document.getElementById("filtros");
        if (div.style.display === "none") {
            div.style.display = "block";
            setTimeout(function() {
                div.style.opacity = 1;
            }, 300);
        } else {
            div.style.opacity = 0;
            setTimeout(function() {
                div.style.display = "none";
            }, 200); // 0.3 segundos
        }
    }
</script>