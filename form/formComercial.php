<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Create new comercial</h4>
                            <p class="text-muted mb-0">
                            Enter the new comertial information here.
                            </p>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_SESSION['completado'])): ?>
                                <div class='alert alert-success'>
                                    <?=$_SESSION['completado'];?>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="index.php?action=enviarComercial">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Comertial name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter client name" name="nombre">
                                        <?php if(isset($_SESSION['error']['nombre'])): ?>
                                            <div class='alert alert-warning'>
                                                <?=$_SESSION['error']['nombre'];?>
                                            </div>
                                         <?php endif; ?>
                                        <label for="exampleInputEmail2" class="form-label">Comertial email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2"
                                    aria-describedby="emailHelp" placeholder="Enter client name" name="email">
                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['email'];?>
                                        </div>
                                    <?php endif; ?>
                                    <small id="emailHelp" class="form-text text-muted">The name and email must not be previously
                                        registered</small>

                                    
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                            <?php $comercial = new Comercial(); $comercial->borrarErrores(); ?>          
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
            

    
