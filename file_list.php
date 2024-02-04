<?php
$uploadsDirectory = "uploads/";

// Получаем список файлов в директории
$fileList = glob($uploadsDirectory . "*");

// Выводим список файлов
foreach ($fileList as $file) {
    echo basename($file) . "<br>";
}
?>
