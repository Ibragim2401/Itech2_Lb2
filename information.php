<?php
// Підключення до бази даних
include 'connect.php'; // Файл з налаштуваннями підключення до бази даних

// Отримання даних з форми
$selected_date = $_GET['selected_date']; // Дата, введена користувачем у формі
$project_name = $_GET['project_name']; // Назва проекту, вибрана користувачем у формі

try {
    // SQL-запит для вибірки даних з бази даних
    $sql = "SELECT department.chief, project.manager, project.name, work.description, 
            work.time_start, work.time_end 
            FROM work 
            JOIN worker ON work.FID_WORKER = worker.ID_WORKER 
            JOIN department ON worker.FID_DEPARTMENT = department.ID_DEPARTMENT 
            JOIN project ON work.FID_PROJECTS = project.ID_PROJECTS 
            WHERE project.name = :project_name AND work.time_end < :selected_date";

    // Підготовка запиту
    $stmt = $dbh->prepare($sql);

    // Підставлення значень параметрів
    $stmt->bindParam(':project_name', $project_name);
    $stmt->bindParam(':selected_date', $selected_date);

    // Виконання запиту
    $stmt->execute();

    // Отримання результатів запиту
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Виведення результатів у вигляді таблиці
    echo "<table border='1'>
            <tr>
                <th>Chief</th>
                <th>Manager</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Time Start</th>
                <th>Time End</th>
            </tr>";
    
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['chief'] . "</td>";
        echo "<td>" . $row['manager'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['time_start'] . "</td>";
        echo "<td>" . $row['time_end'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $ex) {
    // Обробка помилок
    echo "Помилка виконання запиту: " . $ex->getMessage();
}
?>
