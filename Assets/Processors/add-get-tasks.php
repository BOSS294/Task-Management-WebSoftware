<?php
require '../Connectors/connector.php';

// Initialize the database connection
$db = new Database();

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read raw POST data
    $inputData = file_get_contents('php://input');
    
    // Decode JSON into an associative array
    $data = json_decode($inputData, true);
    
    // Sanitize and validate form data
    $taskName = htmlspecialchars(trim($data['taskName'] ?? ''), ENT_QUOTES, 'UTF-8');
    $taskDescription = htmlspecialchars(trim($data['taskDescription'] ?? ''), ENT_QUOTES, 'UTF-8');
    $priority = htmlspecialchars(trim($data['priority'] ?? 'Medium'), ENT_QUOTES, 'UTF-8');
    $dueDate = htmlspecialchars(trim($data['dueDate'] ?? null), ENT_QUOTES, 'UTF-8');
    $reminderTime = htmlspecialchars(trim($data['reminderTime'] ?? null), ENT_QUOTES, 'UTF-8');
    $assignTo = htmlspecialchars(trim($data['assignTo'] ?? ''), ENT_QUOTES, 'UTF-8');
    $taskStatus = htmlspecialchars(trim($data['taskStatus'] ?? 'Active'), ENT_QUOTES, 'UTF-8');

    // Validate required fields
    if (empty($taskName) || empty($assignTo)) {
        echo json_encode([
            'success' => false,
            'message' => 'Task Name and Assigned To are required fields.',
        ]);
        exit;
    }

    // Validate priority
    $validPriorities = ['Low', 'Medium', 'High'];
    if (!in_array($priority, $validPriorities)) {
        $priority = 'Medium';
    }

    // Validate task status
    $validStatuses = ['Active', 'Due', 'Currently Working', 'Closed'];
    if (!in_array($taskStatus, $validStatuses)) {
        $taskStatus = 'Active';
    }

    try {
        // Generate a unique TID starting with DOC-050
        $prefix = "DOC-050";

        // Find the last inserted TID
        $lastTIDResult = $db->query("SELECT TID FROM Tasks ORDER BY CreatedAt DESC LIMIT 1")->fetch();
        $lastTID = $lastTIDResult['TID'] ?? null;

        // Extract the numeric part and increment
        if ($lastTID) {
            // Extract the numeric part (051, 052, etc.)
            $lastNumber = (int) substr($lastTID, 7);
            $nextIDNumber = $lastNumber + 1;
        } else {
            // Start from 051 if no TID is found
            $nextIDNumber = 51; 
        }

        // Generate the next TID with padding
        $nextID = $prefix . str_pad($nextIDNumber, 3, '0', STR_PAD_LEFT);


        // Insert the task into the database
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
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.',
    ]);
}
?>
