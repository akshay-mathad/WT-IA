<?php

$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task_manager";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

session_start();
echo "Hello {$_SESSION['uid']}";
// Retrieve data from task table of current user from database
$userId = $_SESSION['uid'];
$sql = "SELECT * FROM task WHERE U_id = '$userId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "SELECT * FROM task WHERE U_id = '$userId' ORDER BY DOC ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Process retrieved data
            echo "<div>";
            echo "<p>Task Title: " . $row['TaskTitle'] . "</p>";
            echo "<p>Description: " . $row['Description'] . "</p>";
            echo "<p>Date of Completion: " . $row['DOC'] . "</p>";
            echo "</div>";
        }
    }

} else {
    echo "<div>Please create tasks</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <a href="Registration.php">Registration</a>
        <a href="Login.php">Login</a>
        <a href="createTask.php">Create Task</a>
        <a href="modifyTask.php">Modify Task</a>
        <a href="deleteTask.php">Delete Task</a>
    </div>
</body>

</html>