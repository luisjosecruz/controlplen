<?php 
require_once ('utils.php');

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
    public function getTasksByMeta($goalId, $conn)
    {
        $stmt = $conn->query("
        SELECT tareas.*, habitos.habitoId
        FROM tareas 
        INNER JOIN metas ON metaId = tareaMeta 
        LEFT JOIN habitos ON tareas.tareaId = habitos.habitoTarea
        WHERE metaId = '$goalId'
        ORDER BY tareaFechaFin ASC");
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
                $days .= (isset($_POST['lunes'])) ? $_POST['lunes'] . "," : "";
                $days .= (isset($_POST['martes'])) ? $_POST['martes'] . "," : "";
                $days .= (isset($_POST['miércoles'])) ? $_POST['miércoles'] . "," : "";
                $days .= (isset($_POST['jueves'])) ? $_POST['jueves'] . "," : "";
                $days .= (isset($_POST['viernes'])) ? $_POST['viernes'] . "," : "";
                $days .= (isset($_POST['sábado'])) ? $_POST['sábado'] . "," : "";
                $days .= (isset($_POST['domingo'])) ? $_POST['domingo'] . "," : "";

                $days = ($habitType === 'Diario' && $days === "") ? 'lunes,martes,miércoles,jueves,viernes,sábado,domingo' : $days; 

                $sql = "INSERT INTO habitos VALUES (null, $taskId, '$habitStatus', '$habitType', '".rtrim($days, ',')."', null, null);";
                if ($conn->query($sql)) {
                    return 'created-habit';
                }
            } else {
                return 'created-task';
            }
        } else {
            return 'error-create-task';
        }
    }

    public function showGoalDet($data, $conn) 
    {
        $goalId = $data['goalId'];

        $stmt = $conn->query("SELECT metas.* FROM metas WHERE metaId = '$goalId'");
        $row = $stmt->fetch();
        $goalName = $row['metaDescripcion'];

        $all = self::getCantTaskByStatus($goalId, '%', $conn);
        $pending = self::getCantTaskByStatus($goalId, 'Pendiente', $conn);
        $progress = self::getCantTaskByStatus($goalId, 'En progreso', $conn);
        $completed = self::getCantTaskByStatus($goalId, 'Completado', $conn);
        
        $html = '';
        $html .= '
            <div class="card-goal-det">
                <h6 class="card-goal-det-title">'.$goalName.'</h6>
                <ul class="card-goal-det-list">
                    <li><p class="card-goal-det-number">'.$all.'</p><p class="card-goal-det-numtext">Tareas totales</p></li>
                    <li><p class="card-goal-det-number">'.$pending.'</p><p class="card-goal-det-numtext">Pendientes</p></li>
                    <li><p class="card-goal-det-number">'.$progress.'</p><p class="card-goal-det-numtext">En progreso</p></li>
                    <li><p class="card-goal-det-number">'.$completed.'</p><p class="card-goal-det-numtext">Completadas</p> </li>
                </ul>
            </div>
        ';

        return $html;
    }

    public function getCantTaskByStatus ($goalId, $status, $conn) 
    {
        $stmt = $conn->query("  SELECT COUNT(tareas.tareaId) cantareas 
                                FROM tareas WHERE tareas.tareaMeta = '$goalId' 
                                AND tareas.tareaEstado LIKE '$status'");
        $row = $stmt->fetch();
        return $row['cantareas'];
    }

    public function getTaskByDate ($conn, $date, $status) 
    {
        if ($status == 'Completado') {
            $and = "AND t.tareaEstado LIKE '$status' OR t.tareaEstado LIKE 'En progreso'
                    AND bitacora.bitacoraFechaEjecucion IN 
                    ((SELECT c.calendarId FROM calendario c WHERE c.year = YEAR(NOW()) AND c.month = MONTH(NOW()) AND c.day = DAY(NOW())))
            ";
        } else {
            $and = "AND t.tareaEstado LIKE '$status' OR t.tareaEstado LIKE 'En progreso'";
        }
 
        $stmt = $conn->query("
            SELECT t.tareaId, t.tareaMeta, t.tareaDescripcion, t.tareaEstado, 
                DATE_FORMAT(t.tareaFechaInicio, '%d/%m/%Y') tareaFechaInicio, 
                DATE_FORMAT(t.tareaFechaFin, '%d/%m/%Y') tareaFechaFin,
                t.tareaTipo, h.habitoId, h.habitoEstado, h.habitoEstado, 
                h.habitoTipo, h.habitoDias, bitacora.bitacoraId, MAX(calendario.calendarId) calendarId,
                (SELECT c.calendarId FROM calendario c WHERE c.year = YEAR(NOW()) AND c.month = MONTH(NOW()) AND c.day = DAY(NOW())) 
                today, bitacora.bitacoraEstado
            FROM tareas t 
                LEFT JOIN habitos h ON t.tareaId = h.habitoTarea
                LEFT JOIN bitacora ON bitacora.bitacoraTarea = t.tareaId
                LEFT JOIN calendario ON bitacora.bitacoraFechaEjecucion = calendario.calendarId
            WHERE '$date' BETWEEN t.tareaFechaInicio AND t.tareaFechaFin 
            $and
            GROUP BY t.tareaId
            ORDER BY t.tareaFechaFin, h.habitoTipo ASC
        ");
        return $stmt;
    }

    public function updateStatusTask ($data, $conn) 
    {
        $taskid = $data['taskid'];
        $tasktype = $data['tasktype'];
        $habitoid = $data['habitoid'];
        $taskstatus = $data['status'];
        $estado = '';

        if ($taskstatus === 'completed') {
            if ($tasktype === 'Habito') {
                $estado = 'En progreso';
                self::saveBitacora($taskid, $habitoid, 'Hábito del día completado', 'Completado', $conn);
            }
            if ($tasktype === 'Una vez') {
                $estado = 'Completado';
                self::saveBitacora($taskid, $habitoid, 'Tarea del día completado', 'Completado', $conn);
            }
        }

        if ($taskstatus === 'pending') {
            if ($tasktype === 'Habito') {
                $estado = 'En progreso';
                self::saveBitacora($taskid, null, 'Hábito no completado', 'No completado', $conn);
            }
            if ($tasktype === 'Una vez') {
                $estado = 'Pendiente';
                self::saveBitacora($taskid, null, 'Tarea no completado', 'No completado', $conn);
            }
        }

        if ($estado !== "") {
            $sql = "UPDATE tareas SET tareaEstado = '$estado' WHERE tareaId = $taskid";

            if ($conn->query($sql)) {
                return 'updated-task';
            } else {
                return 'error-update-task';
            }
        }
    }

    public function saveBitacora ($task, $habit, $desc, $status, $conn) 
    {
        $habit = ($habit == "") ? 'null' : $habit;
        $date = self::getCalendar($conn);

        $sqlGetBit = "SELECT * FROM bitacora WHERE bitacoraTarea = $task AND bitacoraFechaEjecucion = $date";
        $stmt = $conn->query($sqlGetBit);

        if ($stmt->rowCount() > 0) {
            $sql = "UPDATE bitacora SET bitacoraDescripcion = '$desc', bitacoraEstado = '$status' WHERE bitacoraTarea = $task";
        } else {
            $sql = "INSERT INTO bitacora VALUES (null, $task, $habit, '$desc', $date, '$status', null);";
        }
        
        if ($conn->query($sql)) {
            return true;
        } else {
            session_start(); 
            $log = Utils::registerLog('errorLogBiracora', "$sql", $_SESSION["usuarioId"], $conn);
            return ($log) ? 'bitacora 200' : 'bitacota 500';
        }
    }

    public function getCalendar ($conn) 
    {
        $sql = "SELECT * FROM calendario c WHERE c.year = YEAR(NOW()) AND c.month = MONTH(NOW()) AND c.day = DAY(NOW());";
        $stmt = $conn->query($sql);
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            return $row['calendarId'];
        } else {
            session_start(); 
            $log = Utils::registerLog('errorLogCalendar', 'Error al obtener datos del calendario', $_SESSION["usuarioId"], $conn);
            return ($log) ? 'calendar 200' : 'calendar 500';
        }
    }

}


?>