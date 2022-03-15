<?php 

class Utils
{

    /* -------------------------------------------------------------------------- */
    /*                                  PASSWORD                                  */
    /* -------------------------------------------------------------------------- */

    public static function hash($password) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 16]);
    }

    public static function verify($password, $hash) {
        return password_verify($password, $hash);
    }

    /* -------------------------------------------------------------------------- */
    /*                                REGISTER LOGS                               */
    /* -------------------------------------------------------------------------- */

    public static function registerLog ($action, $desc, $user, $conn) 
    {
        $data = [
            'logAction' => $action,
            'logDesc' => $desc,
            'logUser' => $user
        ];
        $sql = "INSERT INTO logs VALUES ( null, :logAction, :logDesc, :logUser, null )";
        $stmt = $conn->prepare($sql);
        
        return ($stmt->execute($data)) ? true : false;
    }

    /* -------------------------------------------------------------------------- */
    /*                               GENERATE RANDOM                              */
    /* -------------------------------------------------------------------------- */

    PUBLIC static function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz+_-';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    /* --------------------------- CLEAR INPUT STRING --------------------------- */

    public static function testInput ($string) 
    {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        
        return $string;
    }

}
?>