<?php
// Database connection settings
$host = 'localhost'; // Change if your database is hosted elsewhere
$db = 'project_seeking'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password (default is empty for XAMPP)

// Create a PDO instance for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $professor_name = $_POST['professor-name'];
    $project_title = $_POST['project-title'];
    $project_description = $_POST['project-description'];

    // Prepare and execute the insert statement
    $stmt = $pdo->prepare("INSERT INTO projects (professor_name, project_title, project_description) VALUES (?, ?, ?)");
    $stmt->execute([$professor_name, $project_title, $project_description]);

    echo "<p>Project uploaded successfully! <a href='#projects-list'>View Projects</a></p>";
}

// Retrieve projects from the database
$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Seeking Website</title>
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
        form {
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h1>Project Seeking Website</h1>

    <form id="project-form" action="" method="POST">
        <label for="professor-name">Professor Name:</label>
        <input type="text" id="professor-name" name="professor-name" required>

        <label for="project-title">Project Title:</label>
        <input type="text" id="project-title" name="project-title" required>

        <label for="project-description">Project Description:</label>
        <textarea id="project-description" name="project-description" required></textarea>

        <button type="submit">Upload Project</button>
    </form>

    <h2 id="projects-list">Available Projects</h2>
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
</body>
</html>
