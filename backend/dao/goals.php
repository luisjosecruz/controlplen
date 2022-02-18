<?php 

class Goals
{
    public function getObjectives($conn){
        $stmt = $conn->query("SELECT * FROM objectives");
        return $stmt;
    }

    
}

?>