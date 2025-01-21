<?php
require '../Connectors/connector.php';

$db = new Database();
header('Content-Type: application/json');

try {
    $input = json_decode(file_get_contents('php://input'), true);

    function sanitize_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $requiredFields = ['name', 'phoneNumber', 'email', 'projectName', 'projectDescription', 'budget', 'openingBalance'];
    $sanitizedInput = [];

    foreach ($requiredFields as $field) {
        if (empty($input[$field])) {
            throw new Exception("The field {$field} is required.");
        }
        $sanitizedInput[$field] = sanitize_input($input[$field]);
    }

    if (!is_numeric($sanitizedInput['budget']) || $sanitizedInput['budget'] < 0) {
        throw new Exception("The budget must be a valid positive number.");
    }

    if (!is_numeric($sanitizedInput['openingBalance']) || $sanitizedInput['openingBalance'] < 0) {
        throw new Exception("The opening balance must be a valid positive number.");
    }

    if (!filter_var($sanitizedInput['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address.");
    }

    $lastClient = $db->query("SELECT CID FROM clients ORDER BY ClientAddedOn DESC LIMIT 1")->fetch();
    $newClientId = 'CWBD001';
    if ($lastClient) {
        $lastIdNum = (int)substr($lastClient['CID'], 4);
        $newClientId = 'CWBD' . str_pad($lastIdNum + 1, 3, '0', STR_PAD_LEFT);
    }

    $sql = "INSERT INTO clients (CID, Name, PhoneNumber, Email, ProjectName, ProjectDescription, Budget, OpeningBalance, ClosingBalance, ClientStatus) 
    VALUES (:cid, :name, :phoneNumber, :email, :projectName, :projectDescription, :budget, :openingBalance, :closingBalance, :clientStatus)";

    $params = [
        ':cid' => $newClientId,
        ':name' => $sanitizedInput['name'],
        ':phoneNumber' => $sanitizedInput['phoneNumber'],
        ':email' => $sanitizedInput['email'],
        ':projectName' => $sanitizedInput['projectName'],
        ':projectDescription' => $sanitizedInput['projectDescription'],
        ':budget' => $sanitizedInput['budget'],
        ':openingBalance' => $sanitizedInput['openingBalance'],
        ':closingBalance' => $sanitizedInput['openingBalance'],
        ':clientStatus' => 'Active',
    ];

    $db->query($sql, $params);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    $db->disconnect();
}
?>
