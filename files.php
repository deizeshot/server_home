<!-- files.php -->

<?php
$uploadsDirectory = 'uploads/';

// Получаем список файлов в директории
$files = scandir($uploadsDirectory);

// Убираем из списка . и ..
$files = array_diff($files, array('.', '..'));

// Выводим список файлов
echo "<h1>Список файлов:</h1>";
echo "<ul>";
foreach ($files as $file) {
    echo "<li><a href='$uploadsDirectory$file' target='_blank'>$file</a></li>";
}
echo "</ul>";
?>