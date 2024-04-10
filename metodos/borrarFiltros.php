<?php
$_SESSION['mostrar'] = 'ok';
unset($_SESSION['estado']);
unset($_SESSION['comercial']);
unset($_SESSION['usu']);
unset($_SESSION['ini']);
unset($_SESSION['fin']);

header('Location:index.php?action=preventas');