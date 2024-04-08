<div class="row">
    <div class="col-2">
        <form method="POST" action="index.php?action=enviarFiltro" class="mb-3">
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
            <br>
            <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
            onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Seleccionar</button>
        </form>
    </div>

    <div class="col-2">
        <form method="POST" action="index.php?action=enviarFiltro" class="mb-3">
            <label for="comercial" class="form-label">Filtrar por comercial asignado</label>
            <select class="form-select" id="comercial" name="comercial">
                <option value="">Todos</option>
                <?php 
                    $comerciales = new Comercial();
                    $comerciales = $comerciales->obtenerComerciales();
                    if (!empty($comerciales)) {
                        foreach ($comerciales as $c) {
                ?>
                <option value="<?=$c['id']?>">
                    <?=$c['nombre']?>
                </option>
                <?php 
                        }
                    }
                ?>                                  
            </select>
            <br>
            <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
            onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Seleccionar</button>
        </form>
    </div>

    <div class="col-2">
        <form method="POST" action="index.php?action=enviarFiltro" class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>

            <label for="fecha_fin" class="form-label">Fecha fin:</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
            <br>
            <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
            onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Seleccionar fechas</button>
        </form>
    </div>
</div>