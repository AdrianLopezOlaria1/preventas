<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Create new client</h4>
                            <p class="text-muted mb-0">
                            Enter the new client information here.
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
                                    <label for="exampleInputEmail1" class="form-label">Client name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter client name" name="nombre">
                                    <small id="emailHelp" class="form-text text-muted">The name must not be previously
                                        registered</small>
                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['nombre'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                            <?php $cliente = new Cliente(); $cliente->borrarErrores(); ?>          
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
            

    
