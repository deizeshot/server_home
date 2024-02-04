<?php
$uploadsDirectory = "uploads/";

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath = $uploadsDirectory . $fileName;

    // Проверяем, существует ли файл
    if (file_exists($filePath)) {
        // Удаляем файл
        unlink($filePath);
        echo "File '$fileName' has been deleted.";
    } else {
        echo "File '$fileName' not found.";
    }
} else {
    echo "Invalid request.";
}
?>
