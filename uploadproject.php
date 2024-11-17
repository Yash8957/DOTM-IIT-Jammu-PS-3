<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $professor_name = $_POST['professor-name'];
    $project_title = $_POST['project-title'];
    $project_description = $_POST['project-description'];

    $stmt = $pdo->prepare("INSERT INTO projects (professor_name, project_title, project_description) VALUES (?, ?, ?)");
    $stmt->execute([$professor_name, $project_title, $project_description]);

    echo "Project uploaded successfully! <a href='view_projects.php'>View Projects</a>";
} else {
    echo "Invalid request method.";
}
?>
