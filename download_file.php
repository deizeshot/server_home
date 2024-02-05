<?php
$uploadsDirectory = "uploads/";

if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']);
    $filePath = $uploadsDirectory . $fileName;

    if (file_exists($filePath)) {
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        
        // Добавляем эту строку для правильного типа контента
        header('Content-Type: image/png'); // Или измените тип контента на соответствующий вашему файлу

        readfile($filePath);
        exit;
    } else {
        echo 'File not found.';
    }
}
?>
