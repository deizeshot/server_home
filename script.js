// script.js

function uploadFile() {
    var formData = new FormData(document.getElementById("uploadForm"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // File upload was successful, now update the file list
                loadFileList();
                
                // Optionally, you can provide feedback to the user about the successful upload.
                alert("File successfully uploaded!");
            } else {
                // There was an error during file upload
                alert("Error uploading file. Please try again.");
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
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Очищаем содержимое контейнера перед добавлением нового списка
            fileListContainer.innerHTML = "";

            // Добавляем новый список файлов
            fileListContainer.innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "file_list.php", true);
    xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
    // Загрузка списка файлов при загрузке страницы
    loadFileList();
});
