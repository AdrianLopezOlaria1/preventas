<br>
<div class="row">
    <div class="col">
        <form method="POST" action="index.php?action=enviarFiltro" class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="estado" class="form-label">Filtrar por estado:</label>
                    <select class="form-select" id="estado" name="estado">
                        <option value="" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == null) echo " selected"?>>Todos</option>
                        <option value="CG" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'CG') echo " selected"?>>Cerrada ganada</option>
                        <option value="CP" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'CP') echo " selected"?>>Cerrada perdida</option>
                        <option value="P" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'P') echo " selected"?>>Pendiente</option>
                        <option value="PC" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'PC') echo " selected"?>>Pendiente cierre</option>
                        <option value="RP" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'RP') echo " selected"?>>Realizada reunión</option>
                        <option value="RV" <?php if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'RV') echo " selected"?>>Realizada valoración</option>                                                                
                    </select>
                </div>
                <div class="col">
                    <label for="comercial" class="form-label">Filtrar por comercial asignado</label>
                    <select class="form-select" id="comercial" name="comercial">
                        <option value="" <?php if(isset($_SESSION['comercial']) && $_SESSION['comercial'] == null) echo " selected"?>>Todos</option>
                        <?php 
                        $comerciales = new Comercial();
                        $comerciales = $comerciales->obtenerComerciales();
                        if (!empty($comerciales)) {
                            foreach ($comerciales as $c) {
                                if ($c['status'] != 'D') {
                                    ?>
                                    <option value="<?=$c['id']?>" <?php if(isset($_SESSION['comercial']) && $_SESSION['comercial'] == $c['id']) echo " selected"?>>
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
                        <option value="" <?php if(isset($_SESSION['usu']) && $_SESSION['usu'] == null) echo " selected"?>>Todos</option>
                        <?php 
                        $usuario = new Usuario();
                        $usuarios = $usuario->obtenerUsuarios();
                        if (!empty($usuarios)) {
                            foreach ($usuarios as $u) {
                                if ($u['status'] != 'D') {
                                    ?>
                                    <option value="<?=$u['id']?>" <?php if(isset($_SESSION['usu']) && $_SESSION['usu'] == $u['id']) echo " selected"?>>
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
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" <?php if(isset($_SESSION['ini'])) echo "value='".$_SESSION['ini']."'"?>>
                </div>
                <div class="col">
                    <label for="fecha_fin" class="form-label">Fecha fin:</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" <?php if(isset($_SESSION['fin'])) echo "value='".$_SESSION['fin']."'"?>>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
                    onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                    onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Filtrar</button>
                    <a href="index.php?action=borrarFiltro" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;"
                    onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                    onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';">Borrar filtros</a>
                </div>
            </div>
        </form>        
    </div>
</div>

