<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Qwerty@12');
define('DB_DATABASE', 'studentaccommodation_db');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$backupDir = '../backup';

$timestamp = date('YmdHis');
$backupFile = $backupDir . '/backup_' . DB_DATABASE . '_' . $timestamp . '.sql';

$command = "mysqldump -u" . DB_USER . " -p" . DB_PASSWORD . " " . DB_DATABASE . " > " . $backupFile;
exec($command, $output, $returnValue);


if ($returnValue === 0) {
    echo "Backup completed successfully. File: " . $backupFile;
} else {
    echo "Backup failed. Check error messages.";
}

mysqli_close($conn);
