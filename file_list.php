<?php
$uploadsDirectory = "uploads/";

// Получаем список файлов в директории
$fileList = glob($uploadsDirectory . "*");

// Выводим список файлов
foreach ($fileList as $file) {
    $fileName = basename($file);
    echo $fileName . ' <button onclick="deleteFile(\'' . $fileName . '\')">Delete</button><br>';
}

?>
