<!-- identado -->
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inforges</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Formularios</a></li>
                                <li class="breadcrumb-item active">Formulario preventas</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Formulario preventas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Nueva preventa</h4>
                        </div>                         
                        <div class="card-body">                            
                            <form action="index.php?action=enviarPreventa" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- selector usuarios-->
                                        <div class="mb-3">
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-select" name="id_usuario" id="usuario">
                                                <option value="">Seleccione usuario</option>
                                                <?php 
                                                    $usuario = new Usuario();
                                                    $usuarios = $usuario->obtenerUsuarios();
                                                    if (!empty($usuarios)) {
                                                        foreach ($usuarios as $u) {
                                                ?>
                                                <?php if($u['status'] != 'D'):?>
                                                    <option value="<?=$u['id']?>">
                                                        <?=$u['nombre']?>
                                                    </option>
                                                <?php endif;?>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <?php if(isset($_SESSION['error']['id_usuario'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['id_usuario'];?>
                                                </div>
                                            <?php endif; ?>                                            
                                        </div>
                                        <!-- fin selector usuarios -->

                                        <!-- selector comerciales-->
                                        <div class="mb-3">
                                            <label for="id_comercial" class="form-label">Comercial</label>
                                            <select class="form-select" id="id_comercial" name="comercial">
                                            <option value="">Seleccione comercial</option>
                                            <?php 
                                                $comerciales = new Comercial();
                                                $comerciales = $comerciales->obtenerComerciales();
                                                if (!empty($comerciales)) {
                                                    foreach ($comerciales as $c) {
                                                        if($c['status'] != 'D'):
                                            ?>
                                            <option value="<?=$c['id']?>">
                                                <?=$c['nombre']?>
                                            </option>
                                            <?php 
                                                endif;
                                                    }
                                                }
                                            ?>                                  
                                            </select>
                                            <?php if(isset($_SESSION['error']['id_comercial'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['id_comercial'];?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <!-- fin selector comerciales -->                    
                                        <div class="mb-3">
                                            <label for="fecha_reunion" class="form-label">Fecha de la reunión</label>
                                            <input class="form-control" id="fecha_reunion" type="date" name="fecha_reunion">                                            
                                        </div>

                                        <div class="mb-3">
                                            <label for="horas" class="form-label">Horas previstas</label>
                                            <input class="form-control" id="horas" type="number" name="horas_previstas">
                                            <?php if(isset($_SESSION['error']['horas_previstas'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['horas_previstas'];?>
                                                </div>
                                            <?php endif; ?>
                                        </div>                                                                             
                                        <div class="mb-3">
                                            <label for="acta_reunion" class="form-label">Detalles acta de la reunión</label>
                                            <textarea class="form-control" id="acta_reunion" name="acta_reunion" rows="14"></textarea>                                            
                                        </div>                                                                                                                            
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <!-- selector clientes -->
                                        <div class="mb-3">
                                            <label for="id_cliente" class="form-label">Cliente</label>
                                            <select class="form-select" name="id_cliente" id="cliente" onchange="cargarContactos()">
                                                <option value="">Seleccione cliente</option>
                                                <?php 
                                                    $cliente = new Cliente();
                                                    $clientes = $cliente->obtenerClientes();
                                                    if (!empty($clientes)) {
                                                        foreach ($clientes as $c) {
                                                ?>
                                                <?php if($c['status'] != 'D'):?>
                                                    <option value="<?=$c['id']?>">
                                                        <?=$c['nombre']?>
                                                    </option>
                                                <?php endif;?>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <?php if(isset($_SESSION['error']['id_cliente'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['id_cliente'];?>
                                                </div>
                                            <?php endif; ?>                                            
                                        </div>
                                        <!-- fin selector clientes -->

                                        <!-- selector contactos -->
                                        <div class="mb-3">
                                            <label for="id_contacto" class="form-label">Contacto</label>
                                            <select class="form-select" name="id_contacto" id="contacto">
                                                <option value="">Seleccione contacto</option>
                                            </select>                                            
                                        </div>
                                        <!-- fin selector contactos -->
                                        
                                        <!-- selector tipos -->
                                        <div class="mb-3">
                                            <label for="id_tipo" class="form-label">Tipo de proyecto</label>
                                            <select class="form-select" name="id_tipo" id="id_tipo">
                                                <option value="">Seleccione tipo</option>
                                                <?php 
                                                    $tipo = new Tipo();
                                                    $tipos = $tipo->obtenerTipos();
                                                    if (!empty($tipos)) {
                                                        foreach ($tipos as $t) {
                                                ?>
                                                <option value="<?=$t['id']?>">
                                                    <?=$t['nombre']?>
                                                </option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <?php if(isset($_SESSION['error']['id_tipo'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['id_tipo'];?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- fin selector tipos --> 

                                        <div class="mb-3">
                                            <label for="fecha_presentacion" class="form-label">Fecha presentación propuesta</label>
                                            <input class="form-control" id="fecha_presentacion" type="date" name="fecha_presentacion">                                        
                                        </div>  

                                        <div class="mb-3">
                                            <label for="importe" class="form-label">Precio estimado</label>
                                            <input class="form-control" id="importe" type="number" name="importe">
                                            <?php if(isset($_SESSION['error']['importe'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['importe'];?>
                                                </div>
                                            <?php endif; ?>
                                        </div>                                    
                                        <div class="mb-3 form-control dropzone">
                                           
                                                
                                                
                                            <h3 style="text-align:center;">Arrastra los archivos o clica para subir<i class="h1 text-muted ri-upload-cloud-2-line"></i></h3>
                                            <input class="form-control dropzone" id="archivo" type="file" name="archivo" style="opacity:0;" onchange="updateFileName(this)">
                                            
                                            <span id="file-name-info"></span>
                                        </div>

                                        
                                                                                
                                        <button type="submit" class="btn btn-primary">Enviar</button> 

                                    </div> <!-- end col -->                            
                                </div> <!-- end row -->
                            </form>
                            <?php $preventa = new Preventa(); $preventa->borrarErrores(); ?>
                        </div> <!-- end card body -->                                                                                                                 
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end content -->
</div><!-- end content-page -->
 
<script>
    function cargarContactos() {
        var idCliente = document.getElementById("cliente").value;
        if (idCliente) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "metodos/obtener_contactos.php?id_cliente=" + idCliente);
            xhr.onload = function() {
                if (xhr.status === 200) {                    
                    var contactos = JSON.parse(xhr.responseText);                                                      
                    var selectorContacto = document.getElementById("contacto");
                    selectorContacto.innerHTML = "";
                    var opcionSeleccionar = document.createElement("option");
                    opcionSeleccionar.value = "";
                    opcionSeleccionar.textContent = "Seleccione contacto";
                    selectorContacto.appendChild(opcionSeleccionar);
                    for (var i = 0; i < contactos.length; i++) {
                        var opcion = document.createElement("option");
                        opcion.value = contactos[i].id;                    
                        opcion.textContent = contactos[i].nombre;
                        if(contactos[i].status != 'D'){
                            selectorContacto.appendChild(opcion);
                        }
                    }
                } else {
                    alert("Error al obtener los contactos: " + xhr.statusText);
                }
            };
            xhr.send();
        } else {
            var selectorContacto = document.getElementById("contacto");
            selectorContacto.innerHTML = "";
        }
    }
    
    function updateFileName(input) {
        var fileNameInfo = document.getElementById('file-name-info');
        if (input.files.length > 0) {
            fileNameInfo.textContent = input.files[0].name;
        } else {
            fileNameInfo.textContent = 'Ningún archivo seleccionado';
        }
    }
</script>