<?php
// Підключення до бази даних
include 'connect.php'; // Файл з налаштуваннями підключення до бази даних

// Отримання даних зі списку вибору
$project_name = $_GET['project_name']; // Припустимо, що ви передаєте дані методом GET

try {
    // SQL-запит для вибірки даних з бази даних
    $sql = "SELECT DISTINCT DATEDIFF(work.time_end, work.time_start) AS days_difference
            FROM work 
            JOIN project ON work.FID_PROJECTS = project.ID_PROJECTS
            WHERE project.name = :project_name";

    // Підготовка запиту
    $stmt = $dbh->prepare($sql);

    // Підставлення значення параметра
    $stmt->bindParam(':project_name', $project_name);

    // Виконання запиту
    $stmt->execute();

    // Отримання результатів запиту
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Виведення результатів
    foreach ($result as $row) 
    {
        // Обробка результатів (наприклад, виведення на екран)
        echo $row['days_difference'] . " days" . "<br>";
    }
} catch (PDOException $ex) {
    // Обробка помилок
    echo "Помилка виконання запиту: " . $ex->getMessage();
}
?>
