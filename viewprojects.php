<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .project-item {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h1>Available Projects</h1>
    <div id="projects-list">
        <?php if (count($projects) > 0): ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-item">
                    <h3><?php echo htmlspecialchars($project['project_title']); ?></h3>
                    <p><strong>Professor:</strong> <?php echo htmlspecialchars($project['professor_name']); ?></p>
                    <p><?php echo htmlspecialchars($project['project_description']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No projects available.</p>
        <?php endif; ?>
    </div>
    <a href="index.html">Upload Another Project</a>
</body>
</html>
