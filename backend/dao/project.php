<?php 

class Project
{
    public function getProjects($conn){
        $stmt = $conn->query("SELECT * FROM proyectos ORDER BY proyectoId DESC LIMIT 3");
        return $stmt;
    }

    public function getAllProjects($conn){
        $stmt = $conn->query("SELECT * FROM proyectos ORDER BY proyectoId DESC");
        return $stmt;
    }

    public function getCountProjectByStatus($status, $conn) {
        $stmt = $conn->query("SELECT COUNT(proyectoId) qty FROM proyectos WHERE proyectoEstado LIKE '$status'");
        $qty = $stmt->fetch();
        return $qty;
    }

    public function createProject($data, $conn) {
        $value = $data['project-value'];
        $name = $data['project-name'];
        $desc = $data['project-description'];
        $status = $data['project-status'];
        $start = $data['project-start-date'];
        $end = $data['project-end-date'];
        $cantags = $data['cantags'];
        $cantgoals = $data['cantgoals'];
        
        $tags = "";
        for ($i=1; $i <= $cantags; $i++) { 
            $tags .= $data['fast-tag_' . $i];
            $tags .= ($i == $cantags ? "" : ", ");
        }

        $stmt = $conn->query("
            INSERT INTO proyectos VALUES (null, $value, '$name', '$desc', '$status', '$tags', '$start', '$end', null);
        ");

        if ($cantgoals >= 1) {
            $lastId = $conn->insert_id;
            /*if (self::createGoal($data, $lastId,  $conn)) {
                return ($stmt == true) ? 'created-project' : 'error-create-project';
            } else{
                return "error-create-goals";
            }*/

            return self::createGoal($data, $lastId,  $conn);
        }

    }

    public function createGoal($data, $projectId, $conn) {
        $cantgoals = $data['cantgoals'];

        /*$goal = "";
        for ($i=1; $i <= $cantgoals; $i++) { 
             $goal .= $data['fast-goal_' . $i];
            
             $stmt = $conn->query("
                 INSERT INTO metas VALUES (null, $value, '$name', '$desc', '$status', '$tags', '$start', '$end', null);
             ");
        }*/

        return $projectId;
    }

}

?>