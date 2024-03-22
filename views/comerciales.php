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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Contact List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Comercial List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary rounded-start-0"><i class="ri-search-line fs-16"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

            <div class="row" id="comerciales-lista">
                <!-- La lista de clientes se mostrará aquí -->
            </div>

        </div> <!-- end container-fluid -->
    </div> <!-- end content -->

    <!-- Modal de Edición de Cliente -->
    <div id="modalEditarComercial" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Comercial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formEditarComercial">
                    <div class="mb-3">
                        <label for="nombreComercial" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" value="">
                    </div>
                    <div class="mb-3">
                        <label for="emailComercial" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailComercial" name="emailComercial" value="">
                    </div>
                    <input type="hidden" id="comercialId" name="comercialId" value="">
                    <button type="button" id="guardarCambiosBtn" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

</div>

<script>
    $(document).ready(function () {
        // Cargar la lista de clientes al cargar la página
        cargarComerciales();

        // Función para cargar la lista de clientes
        function cargarComerciales(terminoBusqueda = '') {
            $.ajax({
                url: 'metodos/buscar_comerciales.php', // Ruta de tu script PHP para obtener clientes
                type: 'GET',
                dataType: 'json',
                data: { termino: terminoBusqueda },
                success: function (response) {
                    // Limpiar la lista de clientes
                    $('#comerciales-lista').empty();
                    // Iterar sobre los clientes y mostrarlos en la lista
                    $.each(response, function (index, comercial) {
                        //console.log("Estado del cliente:", cliente.status);
                        if (comercial.status !== 'D') {
                            var html = '<div class="col-md-6">';
                            html += '<div class="card">';
                            html += '<div class="card-body">';
                            html += '<div class="d-flex align-items-start justify-content-between">';
                            html += '<div class="d-flex">';
                            html += '<a class="me-3" href="#">';
                            html += '<img class="avatar-md rounded-circle bx-s" src="assets/images/users/avatar-2.jpg" alt="">';
                            html += '</a>';
                            html += '<div class="info">';
                            html += '<h5 class="fs-18 my-1">' + comercial.nombre + '</h5>';
                            html += '<p class="text-muted fs-15">' + comercial.email + '</p>';
                            html += '</div>';
                            html += '</div>';
                            <?php if($_SESSION['usuario']['rol'] == 1): ?>
                            html += '<div class="">';
                            html += '<a href="#" class="btn btn-success btn-sm me-1 editar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit" data-id="' + comercial.id + '"><i class="ri-pencil-fill"></i></a>';
                            html += '<a href="#" class="btn btn-danger btn-sm eliminar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" data-id="' + comercial.id + '"><i class="ri-close-fill"></i></a>';
                            html += '</div>';
                            <?php endif; ?>
                            
                            html += '</div>';
                            html += '<hr>'; // Asegúrate de que el hr esté dentro del bloque if
                            html += '<ul class="social-list list-inline mt-3 mb-0">';
                            html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Facebook"><i class="ri-facebook-fill"></i></a></li>';
                            html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Twitter"><i class="ri-twitter-fill"></i></a></li>';
                            html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="LinkedIn"><i class="ri-linkedin-box-fill"></i></a></li>';
                            html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Skype"><i class="ri-skype-fill"></i></a></li>';
                            html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Message"><i class="ri-mail-open-line"></i></a></li>';
                            html += '</ul>';
                            html += '</div>'; 
                            html += '</div>'; 
                            html += '</div>'; 


                        $('#comerciales-lista').append(html);
                        }
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                    if (terminoBusqueda !== '') {
                        // Si se ha ingresado un término de búsqueda, muestra el mensaje de error
                        alert("Error al buscar los comerciales. Consulta la consola para más detalles.");
                    } else {
                        // Si no se ha ingresado un término de búsqueda, carga todos los clientes
                        cargarComerciales(); // Esto llamará a la función sin un término de búsqueda, cargando todos los clientes
                    
        }}
        });
    }

    // Manejar clic en el botón de edición
    $(document).on('click', '.editar-btn', function() {
        var comercialId = $(this).data('id');
        $.ajax({
            url: 'metodos/obtener_comercial.php',
            type: 'GET',
            data: { id: comercialId},
            dataType: 'json',
            success: function(response) {
                $('#nombreComercial').val(response.nombre);
                $('#emailComercial').val(response.email);
                $('#comercialId').val(comercialId);
                $('#modalEditarComercial').modal('show');
            },
            error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Agregar alerta u otro manejo de errores aquí
            alert("Error al obtener los datos del comercial. Consulta la consola para más detalles.");
        }
        });
            // Evitar el comportamiento predeterminado del enlace
             return false;
    });

    // Manejar clic en el botón de guardar cambios
    $('#guardarCambiosBtn').click(function() {
        var formData = $('#formEditarComercial').serialize();

        $.ajax({
            url: 'metodos/editar_comercial.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
    success: function(response) {
        if (response.success) {
            alert(response.message);
            $('#modalEditarComercial').modal('hide');
            cargarComerciales();
        } else {
            alert(response.error);
        }
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Agregar alerta u otro manejo de errores aquí
        alert("Error al modificar. Consulta la consola para más detalles.");
    }
});

    });
    $(document).on('click', '.eliminar-btn', function() {
    var comercialId = $(this).data('id');
    // Mostrar confirmación al usuario
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este comercial?");
    if (confirmacion) {
        // Si el usuario confirma, enviar la solicitud AJAX para deshabilitar el cliente
        $.ajax({
            url: 'metodos/deshabilitar_comerciales.php',
            type: 'POST',
            data: { id: comercialId },
            dataType: 'json',
            success: function(response) {
                // Muestra una alerta o realiza cualquier otra acción necesaria
                alert('Comercial deshabilitado exitosamente.');
                // Recarga la lista de clientes para reflejar los cambios
                cargarComerciales();
            },
            error: function(xhr, status, error) {
                // Maneja los errores de manera adecuada
                alert('Error al deshabilitar el cliente. Consulta la consola para más detalles.');
                console.error(xhr.responseText);
            }
        });
    } 
    // Evitar el comportamiento predeterminado del enlace
    return false;
});

function cargarComerciales(terminoBusqueda = '') {
        $.ajax({
            url: 'metodos/buscar_comerciales.php', // Ruta del script PHP para buscar clientes
            type: 'GET',
            dataType: 'json',
            data: { termino: terminoBusqueda }, // Envía el término de búsqueda al servidor
            success: function(response) {
                // Limpiar la lista de clientes
                $('#comerciales-lista').empty();
                // Iterar sobre los clientes y mostrarlos en la lista
                $.each(response, function (index, comercial) {
                        //console.log("Estado del cliente:", cliente.status);
                        if (comercial.status !== 'D') {
                            var html = '<div class="col-md-6">';
                                html += '<div class="card">';
                                html += '<div class="card-body">';
                                html += '<div class="d-flex align-items-start justify-content-between">';
                                html += '<div class="d-flex">';
                                html += '<a class="me-3" href="#">';
                                html += '<img class="avatar-md rounded-circle bx-s" src="assets/images/users/avatar-2.jpg" alt="">';
                                html += '</a>';
                                html += '<div class="info">';
                                html += '<h5 class="fs-18 my-1">' + comercial.nombre + '</h5>';
                                html += '<p class="text-muted fs-15">' + comercial.email + '</p>';
                                html += '</div>';
                                html += '</div>';                                
                                <?php if($_SESSION['usuario']['rol'] == 1): ?>
                                html += '<div class="">';
                                html += '<a href="#" class="btn btn-success btn-sm me-1 editar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit" data-id="' + comercial.id + '"><i class="ri-pencil-fill"></i></a>';
                                html += '<a href="#" class="btn btn-danger btn-sm eliminar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" data-id="' + comercial.id + '"><i class="ri-close-fill"></i></a>';
                                html += '</div>';
                                <?php endif; ?>
                                
                                html += '</div>';
                                html += '<hr>'; // Asegúrate de que el hr esté dentro del bloque if
                                html += '<ul class="social-list list-inline mt-3 mb-0">';
                                html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Facebook"><i class="ri-facebook-fill"></i></a></li>';
                                html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Twitter"><i class="ri-twitter-fill"></i></a></li>';
                                html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="LinkedIn"><i class="ri-linkedin-box-fill"></i></a></li>';
                                html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Skype"><i class="ri-skype-fill"></i></a></li>';
                                html += '<li class="list-inline-item"><a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0" title="" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" href="" data-bs-title="Message"><i class="ri-mail-open-line"></i></a></li>';
                                html += '</ul>';
                                html += '</div>'; 
                                html += '</div>'; 
                                html += '</div>'; 

                        $('#comerciales-lista').append(html);
                        }
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                if (terminoBusqueda !== '') {
                    // Si se ha ingresado un término de búsqueda, muestra el mensaje de error
                    alert("Error al buscar los comerciales. Consulta la consola para más detalles.");
                } else {
                    // Si no se ha ingresado un término de búsqueda, carga todos los clientes
                    cargarComerciales(); // Esto llamará a la función sin un término de búsqueda, cargando todos los clientes
                }
            }
        });
    }

    // Evento de teclado para detectar la entrada del usuario en el campo de búsqueda
    $('#example-input1-group2').keyup(function() {
        var terminoBusqueda = $(this).val().trim();
        // Si el término de búsqueda tiene al menos 3 caracteres, cargar los clientes
        if (terminoBusqueda.length >= 1) {
            cargarComerciales(terminoBusqueda);
        } else {
            // Si el término de búsqueda es vacío o tiene menos de 3 caracteres, cargar todos los clientes
            cargarComerciales();
        }
    });

});

</script>
