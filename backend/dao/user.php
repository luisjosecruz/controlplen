<?php 

class User
{
    public function login($data, $conn){
        $stmt = $conn->query("SELECT * FROM users WHERE userEmail = '$data[0]' AND userPassword = '$data[1]'");
        return $stmt;
    }

    public function logout() {
        session_start();
        unset($_SESSION["userid"]);
        unset($_SESSION["userEmail"]);
    }
}

?>