// script.js

function uploadFile() {
    var formData = new FormData(document.getElementById("uploadForm"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // File upload was successful, now update the file list
                loadFileList();
                
                // Provide feedback to the user about the successful upload
                alert("File successfully uploaded!");
            } else if (xhr.status === 500) {
                // There was an internal server error during file upload
                alert("Internal Server Error. Please try again.");
            } else {
                // There was an error during file upload
                alert("Error uploading file. Please try again. Status: " + xhr.status);
            }

            // Clear the input field regardless of success or failure
            document.getElementById("fileToUpload").value = "";
        }
    };

    xhr.open("POST", "uploads.php", true);
    xhr.send(formData);
}

// Функция для удаления файла
function deleteFile(fileName) {
    if (confirm("Are you sure you want to delete " + fileName + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // После удаления файла, обновляем список файлов
                loadFileList();
            } else {
                // There was an error during file deletion
                alert("Error deleting file. Please try again. Status: " + xhr.status);
            }
        };
        xhr.open("GET", "delete_file.php?file=" + fileName, true);
        xhr.send();
    }
}

// Функция для загрузки списка файлов с сервера
function loadFileList() {
    var fileListContainer = document.getElementById("file-list");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Очищаем содержимое контейнера перед добавлением нового списка
                fileListContainer.innerHTML = "";

                // Добавляем новый список файлов
                fileListContainer.innerHTML = xhr.responseText;
            } else {
                // There was an error during file list retrieval
                alert("Error loading file list. Please try again. Status: " + xhr.status);
            }
        }
    };

    xhr.open("GET", "file_list.php", true);
    xhr.send();
}

// Функция для скачивания файла
function downloadFile(fileName) {
    var link = document.createElement('a');
    link.href = 'download_file.php?file=' + encodeURIComponent(fileName);
    link.download = fileName;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


document.addEventListener("DOMContentLoaded", function () {
    // Загрузка списка файлов при загрузке страницы
    loadFileList();
});
