<?php 

class User
{
    public function login($data, $conn){
        $username = $data['username'];
        $password = $data['password'];
        $stmt = $conn->query("SELECT * FROM usuarios WHERE usuarioUnico = '$username' AND usuarioClave = '$password'");
        return $stmt;
    }

}

?>