<br>
<div class="row">
    <div class="col">
        <form method="POST" action="index.php?action=enviarFiltro" class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="estado" class="form-label">Filtrar por estado:</label>
                    <select class="form-select" id="estado" name="estado">
                        <option value="">Todos</option>
                        <option value="P">Pendiente</option>
                        <option value="RP">Realizada reunión</option>
                        <option value="RV">Realizada valoración</option>
                        <option value="PC">Pendiente cierre</option>
                        <option value="CG">Cerrada ganada</option>
                        <option value="CP">Cerrada perdida</option>
                    </select>
                </div>
                <div class="col">
                    <label for="comercial" class="form-label">Filtrar por comercial asignado</label>
                    <select class="form-select" id="comercial" name="comercial">
                        <option value="">Todos</option>
                        <?php 
                        $comerciales = new Comercial();
                        $comerciales = $comerciales->obtenerComerciales();
                        if (!empty($comerciales)) {
                            foreach ($comerciales as $c) {
                                if ($c['status'] != 'D') {
                                    ?>
                                    <option value="<?=$c['id']?>">
                                        <?=$c['nombre']?>
                                    </option>
                                    <?php 
                                }
                            }
                        }
                        ?>                                  
                    </select>
                </div>
                <div class="col">
                    <label for="usuario" class="form-label">Filtrar por usuario asignado</label>
                    <select class="form-select" id="usuario" name="usuario">
                        <option value="">Todos</option>
                        <?php 
                        $usuario = new Usuario();
                        $usuarios = $usuario->obtenerUsuarios();
                        if (!empty($usuarios)) {
                            foreach ($usuarios as $u) {
                                if ($u['status'] != 'D') {
                                    ?>
                                    <option value="<?=$u['id']?>">
                                        <?=$u['nombre']?>
                                    </option>
                                    <?php 
                                }
                            }
                        }
                        ?>                                  
                    </select>
                </div>
                <div class="col">
                    <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                </div>
                <div class="col">
                    <label for="fecha_fin" class="form-label">Fecha fin:</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
                    onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                    onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
