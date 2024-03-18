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
                        <h4 class="page-title">Contact List</h4>
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

            <div class="row" id="clientes-lista">
                <!-- La lista de clientes se mostrará aquí -->
            </div>

        </div> <!-- end container-fluid -->
    </div> <!-- end content -->

    <!-- Modal de Edición de Cliente -->
    <div id="modalEditarCliente" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formEditarCliente">
                    <div class="mb-3">
                        <label for="nombreCliente" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="Cliente_A1">
                    </div>
                    <input type="hidden" id="clienteId" name="clienteId" value="">
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
        cargarClientes();

        // Función para cargar la lista de clientes
        function cargarClientes() {
            $.ajax({
                url: 'metodos/obtener_clientes.php', // Ruta de tu script PHP para obtener clientes
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Limpiar la lista de clientes
                    $('#clientes-lista').empty();
                    // Iterar sobre los clientes y mostrarlos en la lista
                    $.each(response, function (index, cliente) {
                        //console.log("Estado del cliente:", cliente.status);
                        if (cliente.status !== 'D') {
                        var html = '<div class="col-md-6">';
                        html += '<div class="card">';
                        html += '<div class="card-body">';
                        html += '<div class="d-flex align-items-start justify-content-between">';
                        html += '<div class="d-flex">';
                        html += '<a class="me-3" href="#">';
                        html += '<img class="avatar-md rounded-circle bx-s" src="assets/images/users/avatar-2.jpg" alt="">';
                        html += '</a>';
                        html += '<div class="info">';
                        html += '<h5 class="fs-18 my-1">' + cliente.nombre + '</h5>';
                        html += '<p class="text-muted fs-15">' + cliente.status + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="">';
                        html += '<a href="#" class="btn btn-success btn-sm me-1 editar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit" data-id="' + cliente.id + '"><i class="ri-pencil-fill"></i></a>';
                        html += '<a href="#" class="btn btn-danger btn-sm eliminar-btn tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" data-id="' + cliente.id + '"><i class="ri-close-fill"></i></a>';
                        html += '</div>';
                        html += '</div>';
                        html += '<hr>';
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
                        $('#clientes-lista').append(html);
                        }
                });
            },
            error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Agregar alerta u otro manejo de errores aquí
            alert("Error al cargar los clientes. Consulta la consola para más detalles.");
        }
        });
    }

    // Manejar clic en el botón de edición
    $(document).on('click', '.editar-btn', function() {
        var clienteId = $(this).data('id');
        $.ajax({
            url: 'metodos/obtener_cliente.php',
            type: 'GET',
            data: { id: clienteId },
            dataType: 'json',
            success: function(response) {
                $('#nombreCliente').val(response.nombre);
                $('#clienteId').val(clienteId);
                $('#modalEditarCliente').modal('show');
            },
            error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Agregar alerta u otro manejo de errores aquí
            alert("Error al obtener los datos del cliente. Consulta la consola para más detalles.");
        }
        });
            // Evitar el comportamiento predeterminado del enlace
             return false;
    });

    // Manejar clic en el botón de guardar cambios
    $('#guardarCambiosBtn').click(function() {
        var formData = $('#formEditarCliente').serialize();

        $.ajax({
            url: 'metodos/editar_cliente.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
    success: function(response) {
        if (response.success) {
            alert(response.message);
            $('#modalEditarCliente').modal('hide');
            cargarClientes();
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
    var clienteId = $(this).data('id');
    // Mostrar confirmación al usuario
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este cliente?");
    if (confirmacion) {
        // Si el usuario confirma, enviar la solicitud AJAX para deshabilitar el cliente
        $.ajax({
            url: 'metodos/deshabilitar_cliente.php',
            type: 'POST',
            data: { id: clienteId },
            dataType: 'json',
            success: function(response) {
                // Muestra una alerta o realiza cualquier otra acción necesaria
                alert('Cliente deshabilitado exitosamente.');
                // Recarga la lista de clientes para reflejar los cambios
                cargarClientes();
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
});

</script>
