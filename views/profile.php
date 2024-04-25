<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-bg-picture"
                                style="background-image:url('assets/images/bg-profile.jpg')">
                                <span class="picture-bg-overlay"></span>
                                <!-- overlay -->
                            </div>
                            <!-- meta -->
                            <div class="profile-user-box">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="profile-user-img"><img src="assets/images/users/avatar-1.jpg" alt=""
                                                class="avatar-lg rounded-circle"></div>
                                        <div class="">
                                            <h4 class="mt-4 fs-17 ellipsis"><?php echo isset($_SESSION['usuario']['nombre']) ? $_SESSION['usuario']['nombre'] : 'Error'; ?></h4>
                                            <p class="font-13"><?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : 'Añada su descripción'; ?></p>
                                            <!-- <p class="text-muted mb-0"><small>California, United States</small></p> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="#edit-profile" onclick="changeTab('edit-profile', this)">
                                                <button type="button" class="btn btn-soft-info">
                                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                    Editar perfil
                                                </button>
                                            </a>
                                            <a class="btn btn-soft-danger" href="#" id="eliminar"> 
                                            <i class="bi bi-trash"></i> Eliminar cuenta
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="profile-content">
                                        <ul class="nav nav-underline nav-justified gap-0">
                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#aboutme" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true" href="#aboutme">Sobre mi</a>
                                            </li>

                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#user-activities" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#user-activities">Historial</a></li>
                                            
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#edit-profile" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#edit-profile">Ajustes</a></li>
                                            
                                        </ul>

                                        <div class="tab-content m-0 p-4">
                                            <div class="tab-pane active" id="aboutme" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="profile-desk">
                                                    <h5 class="text-uppercase fs-17 text-dark"><?php echo isset($_SESSION['usuario']['nombre']) ? $_SESSION['usuario']['nombre'] : 'Error'; ?></h5>

                                                    <p class="text-muted fs-16">
                                                    <?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : ''; ?>
                                                    </p>

                                                    <h5 class="mt-4 fs-17 text-dark">Información del Usuario</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Sitio web</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['website']) ? $_SESSION['usuario']['website'] : ''; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>
                                                                    <a href="mailto:<?php echo isset($_SESSION['usuario']['email']) ? $_SESSION['usuario']['email'] : 'Error'; ?>" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['email']) ? $_SESSION['usuario']['email'] : 'Error'; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <!-- <tr>
                                                                <th scope="row">Phone</th>
                                                                <td class="ng-binding">(123)-456-7890</td>
                                                            </tr> -->
                                                            <tr>
                                                                <th scope="row">Skype</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['skype']) ? $_SESSION['usuario']['skype'] : ''; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div> <!-- end profile-desk -->
                                            </div> <!-- about-me -->

                                            <!-- Activities -->
                                            <?php 
                                            include 'clases/Actividad.php';

                                            $actividades = new Actividad();

                                            // Llamar al método obtenerActividades() para obtener los datos
                                            $datos_actividades = $actividades->obtenerActividades();

                                            function obtenerIcono($descripcion) {
                                                // Convertir la descripción a minúsculas para realizar comparaciones sin distinción de mayúsculas/minúsculas
                                                $descripcion = strtolower($descripcion);
                                            
                                                // Verificar si la descripción contiene palabras clave y devolver el icono correspondiente
                                                if (strpos($descripcion, 'crea') !== false) {
                                                    return '<img src="assets/images/svg/check2-circle.svg" alt=""></img>';
                                                }
                                                if (strpos($descripcion, 'modi') !== false) {
                                                    return '<img src="assets/images/svg/pencil-square.svg" alt=""></img>';
                                                }
                                                if (strpos($descripcion, 'elim') !== false) {
                                                    return '<img src="assets/images/svg/trash.svg" alt=""></img>';
                                                }
                                                if (strpos($descripcion, 'asig') !== false) {
                                                    return '<img src="assets/images/svg/bag.svg" alt=""></img>';
                                                }
                                            
                                                // Devolver una cadena vacía si no se encuentra ninguna palabra clave
                                                return '';
                                            }

                                            ?>

                                        <div id="user-activities" class="tab-pane">
                                            
                                            <?php
                                            $fecha_anterior = null; // Variable para almacenar la fecha anterior
                                            
                                            foreach ($datos_actividades as $actividad):
                                                // Obtener la fecha de la actividad y formatearla como "día mes año"
                                                $fecha_actividad = date("d F Y", strtotime($actividad['fecha']));
                                                
                                                // Verificar si la fecha actual es diferente a la fecha anterior
                                                if ($fecha_actividad != $fecha_anterior):
                                                    // Si es diferente, imprimir la nueva fecha y comenzar una nueva sección
                                                    if ($fecha_anterior !== null) {
                                                        // Cerrar la sección anterior si no es la primera iteración
                                                        echo '</div>';
                                                    }
                                                    echo "<br><p> $fecha_actividad:</p>";
                                                    echo '<div class="timeline-2">';
                                                    $fecha_anterior = $fecha_actividad; // Actualizar la fecha anterior
                                                endif;
                                            ?>
                                            
                                            <div class="time-item">
                                                <div class="item-info ms-3 mb-3">
                                                    <div class="text-muted"><?php echo $actividad['hora']; ?>  </div>
                                                    <p>
                                                        <strong><?php echo $actividad['descripcion']; ?></strong>
                                                        
                                                        <?php 
                                                        // Obtener el icono correspondiente según la descripción
                                                        $icono = obtenerIcono($actividad['descripcion']);
                                                        
                                                        // Imprimir el icono si está disponible
                                                        if (!empty($icono)) {
                                                            echo $icono;
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <?php endforeach; ?>
                                            </div> <!-- Cerrar la última sección -->
                                        </div> <!-- Cerrar el contenedor principal -->

                                            
                                            

                                            <!-- settings -->
                                            <div id="edit-profile" class="tab-pane">
                                                <div class="user-profile-content">
                                                    <form action="index.php?action=updateProfile" method="POST">
                                                        <div class="row row-cols-sm-2 row-cols-1">
                                                            <div class="mb-2">
                                                                <label class="form-label" for="FullName">Nombre
                                                                    Completo</label>
                                                                <input type="text" value="<?php echo ($_SESSION['usuario']['nombre']);?>" id="FullName"
                                                                    class="form-control" name="nombre">
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label" for="Email">Email</label>
                                                                <input type="email" value="<?php echo ($_SESSION['usuario']['email']);?>"
                                                                    id="Email" class="form-control" name="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="web-url">Sito web</label>
                                                                <input type="text" value="<?php echo isset($_SESSION['usuario']['website']) ? $_SESSION['usuario']['website'] : 'Introduce tu sitio web'; ?>"
                                                                    id="web-url" class="form-control" name="website">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="skype">Skype</label>
                                                                <input type="text" value="<?php echo isset($_SESSION['usuario']['skype']) ? $_SESSION['usuario']['skype'] : 'Introduce tu skype'; ?>" id="skype"
                                                                    class="form-control" name="skype">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="password">Contraseña</label>
                                                                <input type="password" placeholder="introduce tu contraseña"
                                                                    id="password" class="form-control" name="password">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="RePassword">Nueva contraseña(si quieres cambiarla)</label>
                                                                <input type="password" placeholder="Introduce tu nueva contraseña (opcional)"
                                                                    id="RePassword" class="form-control" name="re_password">
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label" for="description">Descripción</label>
                                                                <textarea style="height: 125px;" id="description"
                                                                    class="form-control" name="description"><?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : 'Introduce tu descripción'; ?></textarea>
                                                            </div>

                                                        </div>
                                                        <button class="btn btn-primary" type="submit"><i
                                                                class="ri-save-line me-1 fs-16 lh-1"></i> Guardar</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- profile -->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <script>
    function changeTab(tabId, link) {
        // Busca el elemento correspondiente al ID de la pestaña
        var tab = document.getElementById(tabId);

        // Si el elemento existe
        if (tab) {
            // Oculta todas las pestañas y desmarca todos los enlaces
            var tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(function (tab) {
                tab.classList.remove('active'); // Elimina la clase 'active' de todas las pestañas
            });

            var activeLinks = document.querySelectorAll('.nav-link');
            activeLinks.forEach(function (activeLink) {
                activeLink.classList.remove('active'); // Elimina la clase 'active' de todos los enlaces
            });

            // Muestra la pestaña deseada
            tab.classList.add('active'); // Añade la clase 'active' a la pestaña deseada

            // Resalta el enlace activo
            link.classList.add('active'); // Añade la clase 'active' al enlace clicado
        }
    }
    let boton 
    boton = 

    document.getElementById("eliminar").onclick = function() { 
    // Mostrar un mensaje de confirmación
    var confirmacion = confirm("¿Estás seguro de que quieres borrar tu cuenta?");

    // Verificar si el usuario confirmó
    if (confirmacion) {
        // Si confirmó, redirigir al archivo PHP
        window.location.href = "index.php?action=delete";
    }else{
        window.location.href = "index.php?action=profile";
    }
}

</script>

        <!-- end Footer -->