<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $directory = '../../uploads/files/';

    $tempfi = explode(".", $_FILES['file']['name']);
    $format = $tempfi[(count($tempfi) - 1)];
    $name = rand(0, 1000) . '-' . date('dmy') . '-' . rand(0, 1000) . '.' . $format;

    if (!is_dir($directory)) {
        mkdir($directory);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'],$directory.$name)) {
        echo($_POST['index']);
    }

    exit;
}
?>