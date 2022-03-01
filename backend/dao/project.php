<?php 

class Project
{
    public function getProjects($conn){
        $stmt = $conn->query("
            SELECT p.*, COUNT(m.metaId) cantidad_metas, v.valorNombre value FROM proyectos AS p
            INNER JOIN metas AS m ON p.proyectoId = m.metaProyecto
            INNER JOIN valores AS v ON p.proyectoValor = v.valorId
            GROUP BY p.proyectoId ORDER BY p.proyectoId DESC LIMIT 3");
        return $stmt;
    }

    public function getAllProjects($conn){
        $stmt = $conn->query("
            SELECT p.*, COUNT(m.metaId) cantidad_metas, v.valorNombre value FROM proyectos AS p
            INNER JOIN metas AS m ON p.proyectoId = m.metaProyecto
            INNER JOIN valores AS v ON p.proyectoValor = v.valorId
            GROUP BY p.proyectoId ORDER BY p.proyectoId DESC
        ");
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
        $tags = str_replace("— ", "", $tags);

        $query = "INSERT INTO proyectos VALUES (null, $value, '$name', '$desc', '$status', '$tags', '$start', '$end', null, null);";
        
        if ($conn->query($query)) {
            $projectId = $conn->lastInsertId();
            if ($cantgoals >= 1) {
                return self::createGoal($data, $projectId,  $conn);
            } else {
                return 'created-project';
            }
        } else {
            return 'error-create-project';
        }
    }

    public function createGoal($data, $projectId, $conn) {
        $cantgoals = $data['cantgoals'];
        $status = $data['project-status'];
        $start = $data['project-start-date'];
        $end = $data['project-end-date'];
        $cont = 0;

        for ($i=1; $i <= $cantgoals; $i++) { 
            $goal = $data['fast-goal_' . $i];
            $goal = str_replace("— ", "", $goal);
            $query = "INSERT INTO metas VALUES (null, $projectId, '$goal', '$status', '$start', '$end', 'proyecto', null);";
            if ($conn->query($query)) {
                $cont = $i;
            } 
        }

        return ($cont > 0) ? 'created-goal' : 'error-create-goal Cont: ';
    }

}

?>