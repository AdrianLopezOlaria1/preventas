<?php
unset($_SESSION['preventasFiltradas']);
unset($_SESSION['estado']);
unset($_SESSION['comercial']);
unset($_SESSION['usu']);
unset($_SESSION['ini']);
unset($_SESSION['fin']);

header('Location:index.php?action=preventas&mostrar');