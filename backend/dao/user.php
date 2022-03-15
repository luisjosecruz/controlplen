<?php 
require_once ('utils.php');

class User
{

    /* --------------------------------- SIGN IN -------------------------------- */

    public function login($data, $conn) 
    {
    
        $hash = self::getPwd($data['username'], $conn);
        $password = Utils::verify($data['password'], $hash);

        $userData = [
            'user' => $data['username'],
            'pass' => $hash
        ];

        if (!$password) return 'login 404';

        $sql = "SELECT * FROM usuarios WHERE usuarioClave = :pass AND (usuarioUnico = :user OR usuarioCorreo = :user)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($userData);
        $row = $stmt->fetch();

        if ($row) {
            session_start();
            $_SESSION['usuarioId'] = $row['usuarioId'];
            $_SESSION['usuarioCorreo'] = $row['usuarioCorreo'];

            if (isset($_SESSION["usuarioId"])) {

                $log = Utils::registerLog('userLoggedIn', 'Usuario conectado', $_SESSION["usuarioId"], $conn);

                return ($log) ? 'login 200' : 'error login log';

            } else {
                return 'login 500';
            }

        } else {
            return 'login 404';
        }
    }

    public function getPwd($username, $conn) 
    {
        $sql = "SELECT usuarioClave FROM usuarios WHERE usuarioUnico = :user OR usuarioCorreo = :user";
        $stmt = $conn->prepare($sql);
        $stmt->execute( [ 'user' => $username ] );
        $row = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            $hash = $row['usuarioClave'];
            return $hash;
        } else {
            return false;
        }
    }

    /* --------------------------------- LOG OUT -------------------------------- */

    public function logout ($conn) 
    {
        session_start(); 
        $log = Utils::registerLog('userLoggedOut', 'Usuario desconectado', $_SESSION["usuarioId"], $conn);

        if ($log) {
            unset($_SESSION["usuarioId"]);
            unset($_SESSION["usuarioCorreo"]);
            return 'logout 200';
        } else {
            return 'error logout log';
        }
    }

    /* --------------------------------- SIGN UP -------------------------------- */

    public function signUp($post, $conn) 
    {
        $username = substr($post['name'], 0, 1).explode(' ', trim($post['lastname']))[0].Utils::generateRandomString(3);
        $password = Utils::hash($post['password']);

        $data = [
            'nombre' => $post['name'],
            'apellido' => $post['lastname'],
            'usuario' => strtolower($username),
            'email' => $post['email'],
            'tipo' => 'standard',
            'pass' => $password,
            'estado' => 'Activo'
        ];

        $validate = self::validateUser($data, $conn);

        if ($validate === true) {
            $sql = "INSERT INTO usuarios VALUES(null, :nombre, :apellido, :usuario, :email, :pass, :tipo, null, :estado, null)";
            $stmt = $conn->prepare($sql);
            $stmt->execute($data);

            return ($stmt->rowCount() == 1) ? "signUp 200" : "signUp 500";    
        } else {
            return $validate;
        }
    }

    /* ------------------------- VALIDATE USER -------------------------------- */

    public function validateUser ($data, $conn) 
    {
        $nombre = Utils::testInput($data['nombre']);
        if (!preg_match("/^[a-zA-Z- áéíóúÁÉÍÓÚñÑ]*$/", $nombre)) {
            return "error format name";
        }

        $apellido = Utils::testInput($data['apellido']);
        if (!preg_match("/^[a-zA-Z- áéíóúÁÉÍÓÚñÑ]*$/", $apellido)) {
            return "error format lastname";
        }

        $email = Utils::testInput($data['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "error format email";
        }

        $sql = "SELECT * FROM usuarios WHERE usuarioCorreo = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute( [ 'email' => $email ] );
        
        return ($stmt->rowCount() > 0) ? "user exist" : true;
    }

}

?>