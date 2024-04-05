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
