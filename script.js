// script.js

function uploadFile() {
    var formData = new FormData(document.getElementById("uploadForm"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            // Очищаем содержимое контейнера перед добавлением нового списка
            document.getElementById("file-list").innerHTML = "";

            // Добавляем новый список файлов
            document.getElementById("file-list").innerHTML = xhr.responseText;

            // Очищаем поле ввода файла после успешной загрузки
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
