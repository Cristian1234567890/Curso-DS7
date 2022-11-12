<?php

$arr_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/jpeg'];

if (!in_array($_FILES['file']['type'], $arr_file_types)) {
    echo 'false';
    return;
}

if (!file_exists('archivos')) {
    mkdir('archivos', 0777);
}

$file_name = time() . '_' . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], 'archivos/' . $file_name);

echo 'archivos/' . $file_name;
die;

?>