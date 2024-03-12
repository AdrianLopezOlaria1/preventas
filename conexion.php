<?php

class Conexion {
    public static function conectar() {
        return mysqli_connect("atic.green:3306", "preventa", "4l2O*6r6j", "preventa");
    }
}
