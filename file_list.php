<?php
$uploadsDirectory = "uploads/";

// Получаем список файлов в директории
$fileList = glob($uploadsDirectory . "*");

// Выводим список файлов
foreach ($fileList as $file) {
    $fileName = basename($file);
    echo $fileName . ' <button onclick="deleteFile(\'' . $fileName . '\')">Delete</button><br>';
}
while ($row = $result->fetch_assoc()) {
    $fileName = $row["file_name"];
    echo "<div class='file-item'>";
    echo "<span>$fileName</span>";
    echo "<button onclick='deleteFile(\"$fileName\")'>Delete</button>";
    echo "<a href='download_file.php?file=$fileName' download><button>Download</button></a>";
    echo "</div>";
}
?>
?>
