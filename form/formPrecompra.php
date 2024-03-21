
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
                                        <!-- selector clientes-->
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
                                        </div>
                                        <!-- fin selector clientes -->                    
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
                                    <!-- selector contactos -->
                                    <div class="mb-3">
                                        <label for="id_contacto" class="form-label">Contacto</label>
                                        <select class="form-select" name="id_contacto" id="contacto">
                                            <option value="">Select contact</option>
                                        </select>
                                    </div>
                                    <!-- fin selector contactos -->
                                    <div class="mb-3">
                                        <label for="comercial" class="form-label">Comerciales</label>
                                        <select class="form-select" id="comercial" name="comercial">
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
                                    </div>
                                    <!-- selector tipos -->
                                    <div class="mb-3">
                                        <label for="tipo" class="form-label">Tipo de proyecto</label>
                                        <select class="form-select" name="tipo" id="tipo">
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
                                    </div>
                                    <!-- fin selector tipos -->
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