<?php
$host = 'localhost';
$dbname = 'heaven_marriage';

$creds = [
    ['root', ''],
    ['root', 'root'],
    ['root', 'password'],
    ['admin', '']
];

foreach ($creds as $cred) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $cred[0], $cred[1]);
        echo "Success with user: " . $cred[0] . " and password: " . ($cred[1] ? 'YES' : 'NO') . "\n";
        // List tables
        $stmt = $pdo->query("SHOW TABLES");
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "Table: " . $row[0] . "\n";
        }
        exit;
    } catch (PDOException $e) {
        echo "Failed with user: " . $cred[0] . " and password: " . ($cred[1] ? 'YES' : 'NO') . " - " . $e->getMessage() . "\n";
    }
}
?>