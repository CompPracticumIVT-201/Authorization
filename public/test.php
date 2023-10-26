<?php
$host = 'localhost';
$dbname = 'laravel';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SHOW TABLES";
    $statement = $pdo->query($query);

    $tables = $statement->fetchAll(PDO::FETCH_COLUMN);

    foreach ($tables as $table) {
        echo $table . '<br>';
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
