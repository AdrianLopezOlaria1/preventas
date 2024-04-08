<br>
<form method="POST" action="index.php?action=enviarFiltro">
    <label for="estado">Filtrar por estado:</label>
    <select class="form-select" id="estado" name="estado">
        <option value="">Todos</option>
        <option value="P">Pendiente</option>
        <option value="RP">Realizada reunión</option>
        <option value="RV">Realizada valoración</option>
        <option value="PC">Pendiente cierre</option>
        <option value="CG">Cerrada ganada</option>
        <option value="CP">Cerrada perdida</option>
    </select>
    <input type="submit" value="seleccionar">
</form><br>

<form method="POST" action="index.php?action=enviarFiltro">
    <label for="comercial">Filtrar por comercial asignado</label>
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
    <input type="submit" value="seleccionar">
</form><br>

<form method="POST" action="index.php?action=enviarFiltro">
    <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>

    <label for="fecha_fin" class="form-label">Fecha fin:</label>
    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
  
    <button type="submit">Seleccionar fechas</button>
</form><br>

