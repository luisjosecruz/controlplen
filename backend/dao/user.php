<?php 

class User
{
    public function login($data, $conn){
        $stmt = $conn->query("SELECT * FROM usuarios WHERE usuarioUnico = '$data[0]' AND usuarioClave = '$data[1]'");
        return $stmt;
    }

    public function logout() {
        session_start();
        unset($_SESSION["usuarioId"]);
        unset($_SESSION["usuarioCorreo"]);
    }
}

?>