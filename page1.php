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
echo "<h1>Tasks:</h1>";
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
            echo "<card>";
            
            echo "<p>Task Title: " . $row['TaskTitle'] . "</p>";
            echo "<p>Description: " . $row['Description'] . "</p>";
            echo "<p>Date of Completion: " . $row['DOC'] . "</p>";
            echo "</card>";
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
    <link href="page1.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <opt>
        <a href="createTask.php"style="color:yellow">Create Task</a>
        <a href="modifyTask.php"style="color:yellow">Modify Task</a>
        <a href="deleteTask.php"style="color:yellow">Delete Task</a>
    </opt>
    <span>
        <a ="Registration.php" style="color:yellow">Registration</a><br>
        <a href="Login.php"style="color:yellow">Login</a>
        
    </span>
</body>

</html>