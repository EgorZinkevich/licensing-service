<?php
// Папка, куда будут загружены файлы
$target_dir = "uploads/"; // Убедитесь, что эта папка существует и имеет правильные разрешения
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1; // Флаг для проверки, можно ли загрузить файл
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Проверка на существование файла
if (file_exists($target_file)) {
    echo "Извините, файл уже существует.";
    $uploadOk = 0;
}

// Проверка, можно ли загружать файл
if ($uploadOk == 0) {
    echo "Извините, файл не был загружен.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Файл ". htmlspecialchars(basename($_FILES["file"]["name"])) . " был загружен.";
    } else {
        echo "Извините, произошла ошибка при загрузке вашего файла.";
    }
}
?>

