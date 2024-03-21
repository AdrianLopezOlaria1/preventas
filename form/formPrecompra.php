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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Elements</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Form Elements</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Input Types</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label for="example-static" class="form-label">Cliente</label>
                                            <input type="text" readonly class="form-control-plaintext" id="example-static" name="cliente" value="cliente@cliente.com(sacar de la sesion)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fecha_reunion" class="form-label">Fecha de la reunión</label>
                                            <input class="form-control" id="fecha_reunion" type="date" name="fecha_reunion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-time" class="form-label">Hora de la reunión</label>
                                            <input class="form-control" id="example-time" type="time" name="hora_reunion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="acta_reunion" class="form-label">Detalles acta de la reunión</label>
                                            <textarea class="form-control" id="acta_reunion" name="acta_reunion" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Archivo acta de la reunión</label>
                                            <input type="file" id="example-fileinput" class="form-control">
                                        </div>
                                    </form>
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="persona_contacto" class="form-label">Persona de Contacto</label>
                                        <input type="text" readonly class="form-control-plaintext" id="persona_contacto" value="email@cliente.com(sacar de la sesion?)" name="persona_contacto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="comercial" class="form-label">Comerciales</label>
                                        <select class="form-select" id="comercial" name="comercial">
                                            <!-- Opciones Comerciales  -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipo_proyecto" class="form-label">Tipo de proyecto</label>
                                        <select class="form-select" id="tipo_proyecto" name="tipo_proyecto">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="horas" class="form-label">Horas</label>
                                        <input class="form-control" id="horas" type="number" name="horas">
                                    </div>
                                    <div class="mb-3">
                                        <label for="precio" class="form-label">Precio estimado</label>
                                        <input class="form-control" id="precio" type="number" name="precio">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end content -->
</div><!-- end content-page -->

<script>
    // Hacer una solicitud AJAX para obtener los comerciales
    $.ajax({
        url: 'metodos/obtener_comerciales.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Agregar las opciones de comerciales al select
            const selectComercial = $('#comercial');
            $.each(data, function(index, comercial) {
                selectComercial.append($('<option>', {
                    value: comercial.id,
                    text: comercial.nombre
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener los comerciales:', error);
        }
    });
</script>