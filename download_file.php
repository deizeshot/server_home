<!-- download_file.php -->

<?php
$file = $_GET["file"];

// Validate the file name or path as needed

$filePath = "uploads/" . $file;

if (file_exists($filePath)) {
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . basename($filePath));
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    header("Content-Length: " . filesize($filePath));
    readfile($filePath);
    exit;
} else {
    // Handle the case where the file does not exist
    echo "File not found.";
}
?>
