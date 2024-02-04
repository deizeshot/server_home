<?php
$uploadsDirectory = "uploads/";

// Obtain file list from the directory
$fileList = glob($uploadsDirectory . "*");

// Output file list
foreach ($fileList as $file) {
    $fileName = basename($file);
    echo $fileName . ' <button onclick="deleteFile(\'' . $fileName . '\')">Delete</button><br>';
}

// Assuming you have a database connection established earlier
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a table named 'files' with a column 'file_name'
$sql = "SELECT file_name FROM files";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Output file list from the database
while ($row = $result->fetch_assoc()) {
    $fileName = $row["file_name"];
    echo "<div class='file-item'>";
    echo "<span>$fileName</span>";
    echo "<button onclick='deleteFile(\"$fileName\")'>Delete</button>";
    echo "<a href='download_file.php?file=$fileName' download><button>Download</button></a>";
    echo "</div>";
}

// Close the database connection
$conn->close();
?>
