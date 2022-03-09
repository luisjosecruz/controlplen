<?php 

class User
{
    public function login($data, $conn){
        $username = $data['username'];
        $password = $data['password'];
        $stmt = $conn->query("SELECT * FROM usuarios WHERE usuarioUnico = '$username' AND usuarioClave = '$password'");
        return $stmt;
    }

    public function register($data, $conn) {
        $name = $data['name'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        $username = $name; // userId

        $stmt = $conn->query("INSERT INTO usuarios('$name', '$lastname', '$username', '$email', '$password', 'standard', null, 'Activo');");
        
        return $stmt->rowCount();        
    }

}

?>