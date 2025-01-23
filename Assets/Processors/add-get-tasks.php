<?php
require '../Connectors/connector.php';

$db = new Database();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = file_get_contents('php://input');
    $data = json_decode($inputData, true);

    $taskName = htmlspecialchars(trim($data['taskName'] ?? ''), ENT_QUOTES, 'UTF-8');
    $taskDescription = htmlspecialchars(trim($data['taskDescription'] ?? ''), ENT_QUOTES, 'UTF-8');
    $priority = htmlspecialchars(trim($data['priority'] ?? 'Medium'), ENT_QUOTES, 'UTF-8');
    $dueDate = htmlspecialchars(trim($data['dueDate'] ?? null), ENT_QUOTES, 'UTF-8');
    $reminderTime = htmlspecialchars(trim($data['reminderTime'] ?? null), ENT_QUOTES, 'UTF-8');
    $assignTo = htmlspecialchars(trim($data['assignTo'] ?? ''), ENT_QUOTES, 'UTF-8');
    $taskStatus = htmlspecialchars(trim($data['taskStatus'] ?? 'Active'), ENT_QUOTES, 'UTF-8');

    if (empty($taskName) || empty($assignTo)) {
        echo json_encode([
            'success' => false,
            'message' => 'Task Name and Assigned To are required fields.',
        ]);
        exit;
    }

    $validPriorities = ['Low', 'Medium', 'High'];
    if (!in_array($priority, $validPriorities)) {
        $priority = 'Medium';
    }

    $validStatuses = ['Active', 'Due', 'Currently Working', 'Closed'];
    if (!in_array($taskStatus, $validStatuses)) {
        $taskStatus = 'Active';
    }

    try {
        $prefix = "DOC-050";

        $lastTIDResult = $db->query("SELECT TID FROM Tasks ORDER BY CreatedAt DESC LIMIT 1")->fetch();
        $lastTID = $lastTIDResult['TID'] ?? null;

        if ($lastTID) {
            $lastNumber = (int) substr($lastTID, 7);
            $nextIDNumber = $lastNumber + 1;
        } else {
            $nextIDNumber = 51;
        }

        $nextID = $prefix . str_pad($nextIDNumber, 3, '0', STR_PAD_LEFT);

        $db->query("
            INSERT INTO Tasks (TID, TaskName, TaskDescription, Priority, DueDate, ReminderTime, AssignTo, TaskStatus) 
            VALUES (:TID, :TaskName, :TaskDescription, :Priority, :DueDate, :ReminderTime, :AssignTo, :TaskStatus)
        ", [
            ':TID' => $nextID,
            ':TaskName' => $taskName,
            ':TaskDescription' => $taskDescription,
            ':Priority' => $priority,
            ':DueDate' => $dueDate,
            ':ReminderTime' => $reminderTime,
            ':AssignTo' => $assignTo,
            ':TaskStatus' => $taskStatus,
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'Task added successfully',
            'TID' => $nextID,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage(),
        ]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'fetch') {
    try {
        $tasks = $db->query("SELECT * FROM Tasks ORDER BY CreatedAt DESC")->fetchAll(PDO::FETCH_ASSOC);

        if ($tasks) {
            echo json_encode([
                'success' => true,
                'data' => $tasks,
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'No tasks found.',
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage(),
        ]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['action'])) {
    $inputData = file_get_contents('php://input');
    $data = json_decode($inputData, true);

    $tid = htmlspecialchars(trim($data['TID'] ?? ''), ENT_QUOTES, 'UTF-8');

    if ($_GET['action'] === 'delete') {
        try {
            $db->query("DELETE FROM Tasks WHERE TID = :TID", [':TID' => $tid]);

            echo json_encode([
                'success' => true,
                'message' => 'Task deleted successfully.',
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
            ]);
        }
    } elseif ($_GET['action'] === 'update_status') {
        try {
            $currentStatus = $db->query("SELECT TaskStatus FROM Tasks WHERE TID = :TID", [':TID' => $tid])->fetchColumn();

            if ($currentStatus) {
                $nextStatus = match ($currentStatus) {
                    'Active' => 'Currently Working',
                    'Currently Working' => 'Closed',
                    'Due' => 'Currently Working',
                    'Closed' => 'Closed',
                    default => 'Active',
                };

                $db->query("UPDATE Tasks SET TaskStatus = :TaskStatus WHERE TID = :TID", [
                    ':TaskStatus' => $nextStatus,
                    ':TID' => $tid,
                ]);

                echo json_encode([
                    'success' => true,
                    'message' => 'Task status updated successfully.',
                    'newStatus' => $nextStatus,
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Task not found.',
                ]);
            }
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
            ]);
        }
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method or action.',
    ]);
}
?>
