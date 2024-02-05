<?php
$uploadsDirectory = "uploads/";

if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']);
    $filePath = $uploadsDirectory . $fileName;

    if (file_exists($filePath)) {
        ob_clean();  // Очистим буфер вывода (output buffer)
        flush();     // Вытолкнем содержимое буфера на клиентскую сторону

        // Установим заголовки
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Считываем файл и отправляем его клиенту
        readfile($filePath);
        exit;
    } else {
        echo 'File not found.';
    }
} else {
    echo 'Invalid file request.';
}
?>
