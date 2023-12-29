<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task_manager";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="createTAsk.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="createTask.php" method="post">
        <label>Task Title:</label><br>
        <input type="text" name="taskTitle"><br>
        <label>Task Description:</label><br>
        <textarea name="taskDescription"></textarea><br>
        <label>Date of Completion:</label><br>
        <input type="date" name="dateOfCompletion"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $taskTitle = $_POST['taskTitle'];
        $taskDescription = $_POST['taskDescription'];
        $dateOfCompletion = $_POST['dateOfCompletion'];
        session_start();
        $userId = $_SESSION['uid'];
        // $sql .= " U_id = '$userId'";

        $sql = "INSERT INTO task (U_id, TaskTitle, Description, DOC) VALUES ('$userId', '$taskTitle', '$taskDescription', '$dateOfCompletion')";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: page1.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>