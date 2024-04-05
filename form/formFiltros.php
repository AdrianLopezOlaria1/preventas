<form method="POST" action="index.php?action=enviarFiltro">
    <label for="estado">Filtrar por Estado:</label>
    <select id="estado" name="estado">
        <option value="">Todos</option>
        <option value="P">Pendiente</option>
        <option value="RP">Realizada reunión</option>
        <option value="RV">Realizada valoración</option>
        <option value="PC">Pendiente cierre</option>
        <option value="CG">Cerrada ganada</option>
        <option value="CP">Cerrada perdida</option>
    </select>
    <input type="submit" value="seleccionar">
</form>
