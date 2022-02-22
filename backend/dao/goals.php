<?php 

class Goals
{
    public function getProjects($conn){
        $stmt = $conn->query("SELECT * FROM proyectos");
        return $stmt;
    }

    
}

?>