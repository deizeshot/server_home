<!-- file_list.php -->

<?php
$uploadsDirectory = "uploads/";

// Получаем список файлов в директории
$fileList = glob($uploadsDirectory . "*");

// Выводим список файлов
foreach ($fileList as $file) {
    $fileName = basename($file);
    echo "<div class='file-item'>";
    echo "<span class='file-icon'><i class='far fa-file'></i></span>";
    echo "<span>$fileName</span>";
    echo "<button class='delete-button' onclick='deleteFile(\"$fileName\")'><i class='fas fa-trash'></i> Delete</button>";
    echo "<button class='download-button' onclick='downloadFile(\"$fileName\")'><i class='fas fa-download'></i> Download</button>";
    echo "</div>";
}
?>
