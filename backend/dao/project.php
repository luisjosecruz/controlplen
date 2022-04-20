<?php 

class Project
{
    public function getProjects($conn){
        $stmt = $conn->query("
            SELECT p.*, COUNT(m.metaId) cantidad_metas, v.valorIcono icon, v.valorColor color 
            FROM proyectos AS p
            LEFT JOIN metas AS m ON p.proyectoId = m.metaProyecto
            INNER JOIN valores AS v ON p.proyectoValor = v.valorId
            GROUP BY p.proyectoId ORDER BY p.proyectoId DESC LIMIT 7");
        return $stmt;
    }

    public function getAllProjects($conn){
        $stmt = $conn->query("
            SELECT p.*, COUNT(m.metaId) cantidad_metas, v.valorNombre value, valorColor, valorIcono FROM proyectos AS p
            LEFT JOIN metas AS m ON p.proyectoId = m.metaProyecto
            INNER JOIN valores AS v ON p.proyectoValor = v.valorId
            GROUP BY p.proyectoId ORDER BY p.proyectoId DESC
        ");
        return $stmt;
    }

    public function getProjectByRandom($random, $conn){
        $stmt = $conn->query("
            SELECT proyectos.*, valores.valorNombre, valores.valorIcono icon, valores.valorColor color FROM proyectos 
            LEFT JOIN valores ON valores.valorId = proyectos.proyectoValor WHERE proyectoLink = '$random'");
        return $stmt;
    }

    public function getCountProjectByStatus($status, $conn) {
        $stmt = $conn->query("SELECT COUNT(proyectoId) qty FROM proyectos WHERE proyectoEstado LIKE '$status'");
        $qty = $stmt->fetch();
        return $qty;
    }

    public function getQtyData($conn) 
    {
        $stmt = $conn->query("
            SELECT 
            COUNT(proyectos.proyectoId) cantProyectos, 
            (SELECT COUNT(metas.metaId) FROM metas) cantMetas, 
            (SELECT COUNT(metas.metaId) FROM metas WHERE metas.metaEstado = 'Completado') cantMetasCompletas,
            (SELECT COUNT(tareas.tareaId) FROM tareas) cantTareas, 
            (SELECT COUNT(tareas.tareaId) FROM tareas WHERE tareas.tareaEstado = 'Completado') cantTareasCompletas,
            (SELECT COUNT(valores.valorId) FROM valores) cantValores
            FROM proyectos
        ");
        $qty = $stmt->fetch();
        return $qty;
    }

    public function createProject($data, $conn) 
    {
        if (is_string($data['project-value'])) {
            $queryGetValueId = "SELECT valorId FROM valores WHERE valorNombre LIKE '".$data['project-value']."'";
            $stmt = $conn->query($queryGetValueId);
            $rowGetValueId = $stmt->fetch();
            $value = $rowGetValueId['valorId'];
        } else {
            $value = $data['project-value'];
        }

        $name = $data['project-name'];
        $desc = $data['project-description'];
        $status = $data['project-status'];
        $dates = $data['daterange'];

        $date = explode(' - ', $dates);
        $dstart = date('Y-m-d', date(strtotime($date[0])));
        $dend = date('Y-m-d', date(strtotime($date[1])));

        $query = "INSERT INTO proyectos VALUES (null, $value, '$name', '$desc', '$status', null, '$dstart', '$dend', null, null);";
        
        if ($conn->query($query)) {
            $projectId = $conn->lastInsertId();
            return 'created-project';
        } else {
            return 'error-create-project';
        }
    }

    /* GOALS */
    public function getGoalsByRandom($random, $conn)
    {
        $stmt = $conn->query("
            SELECT metas.* FROM metas INNER JOIN proyectos ON proyectos.proyectoId = metas.metaProyecto 
            WHERE proyectos.proyectoLink = '$random'");
        return $stmt;
    }

    public function createGoal($data, $conn) 
    {
        $goal = $data['goalname'];
        $link = $data['project-link'];
        $date = $data['daterange'];
        $status = "";

        if (isset($projectId)) {
            $projectId = $projectId;
            $status = $data['project-status'];
        } else {
            $stmt = $conn->query("SELECT * FROM proyectos WHERE proyectos.proyectoLink = '".$link."'");
            $row = $stmt->fetch();
            $projectId = $row['proyectoId'];
            $status = $row['proyectoEstado'];
        }

        $dates = explode(' - ', $date);
        $dstart = date('Y-m-d', date(strtotime($dates[0])));
        $dend = date('Y-m-d', date(strtotime($dates[1])));

        $query = "INSERT INTO metas VALUES (null, $projectId, '$goal', 'Pendiente', '$dstart', '$dend', null, null);";
        if ($conn->query($query)) {
            return 'created-goal';
        } else {
            return 'error-create-goal';
        }
    }
    
    /* TASKS */
    public function getTasksByMeta($goalId, $conn){
        $stmt = $conn->query("SELECT tareas.* FROM tareas INNER JOIN metas ON metaId = tareaMeta WHERE metaId = '$goalId'");
        return $stmt;
    }

    public function createTask($data, $conn) 
    {   
        $goalId = $data['goalId'];
        $task = $data['taskname'];
        $date = $data['daterange'];
        $status = $data['taskstatus'];
        $type = $data['taskstype'];

        $dates = explode(' - ', $date);
        $dstart = date('Y-m-d', date(strtotime($dates[0])));
        $dend = date('Y-m-d', date(strtotime($dates[1])));

        $query = "INSERT INTO tareas VALUES (null, $goalId, '$task', '$status', '$dstart', '$dend', null, null, null, null, '$type', null);";
        if ($conn->query($query)) {
            $taskId = $conn->lastInsertId();
            if ($type === 'Habito') {
                $habitType = $_POST['habitType'];
                $habitStatus = $_POST['habitStatus'];
                $days = "";
                $days .= (isset($_POST['Lunes'])) ? $_POST['Lunes'] . "," : "";
                $days .= (isset($_POST['Martes'])) ? $_POST['Martes'] . "," : "";
                $days .= (isset($_POST['Miercoles'])) ? $_POST['Miercoles'] . "," : "";
                $days .= (isset($_POST['Jueves'])) ? $_POST['Jueves'] . "," : "";
                $days .= (isset($_POST['Viernes'])) ? $_POST['Viernes'] . "," : "";
                $days .= (isset($_POST['Sabado'])) ? $_POST['Sabado'] . "," : "";
                $days .= (isset($_POST['Domingo'])) ? $_POST['Domingo'] . "," : "";

                $query = "INSERT INTO habitos VALUES (null, $taskId, '$habitStatus', '$habitType', '$days', null, null);";
                if ($conn->query($query)) {
                    return 'created-habit';
                }
            } else {
                return 'created-task';
            }
        } else {
            return 'error-create-task';
        }
    }

    public function showGoalDet($data, $conn) {
        $goalId = $data['goalId'];

        $stmt = $conn->query("SELECT metas.* FROM metas WHERE metaId = '$goalId'");
        $row = $stmt->fetch();
        $goalName = $row['metaDescripcion'];

        $pending = self::getCantTaskByStatus($goalId, 'Pendiente', $conn);
        $progress = self::getCantTaskByStatus($goalId, 'En progreso', $conn);
        $completed = self::getCantTaskByStatus($goalId, 'Completado', $conn);
        
        $html = '';
        $html .= '
            <div class="card-goal-det">
                <h6 class="card-goal-det-title">'.$goalName.'</h6>
                <ul class="card-goal-det-list">
                    <li><p class="card-goal-det-number">'.$pending.'</p><p class="card-goal-det-numtext">Tareas totales</p></li>
                    <li><p class="card-goal-det-number">'.$pending.'</p><p class="card-goal-det-numtext">Pendientes</p></li>
                    <li><p class="card-goal-det-number">'.$progress.'</p><p class="card-goal-det-numtext">En progreso</p></li>
                    <li><p class="card-goal-det-number">'.$completed.'</p><p class="card-goal-det-numtext">Completadas</p> </li>
                </ul>
            </div>
        ';

        return $html;
    }

    public function getCantTaskByStatus ($goalId, $status, $conn) {
        $stmt = $conn->query("SELECT COUNT(tareas.tareaId) cantareas FROM tareas WHERE tareas.tareaMeta = '$goalId' AND tareas.tareaEstado = '$status'");
        $row = $stmt->fetch();
        return $row['cantareas'];
    }

}

?>