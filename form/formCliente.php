<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Formulario Clientes</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Formulario Clientes</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Crear nuevo cliente</h4>
                            <p class="text-muted mb-0">
                            Ingrese la información del nuevo cliente aquí.
                            </p>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_SESSION['completado'])): ?>
                                <div class='alert alert-success'>
                                    <?=$_SESSION['completado'];?>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="index.php?action=enviarCliente">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre de cliente</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Ingrese nombre de cliente" name="nombre">
                                    <small id="emailHelp" class="form-text text-muted">El nombre no debe estar
                                    previamente registrado.
                                    </small>
                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['nombre'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </form>
                            <?php $cliente = new Cliente(); $cliente->borrarErrores(); ?>          
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                                    </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
            

    
