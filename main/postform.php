<?php
if (isset($_FILES) && $_FILES['inputfile']['error'] == 0) { // Проверяем, загрузил ли пользователь файл
    $destiation_dir = dirname(__FILE__)   . $_FILES['inputfile']['name']; // Директория для размещения файла
    move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir); // Перемещаем файл в желаемую директорию
  setcookie( 'n',$destiation_dir); ; //  что загрузка прошла успешно
    echo "<body onload='location.href=\"action.php\"'></body>";
} else {
    echo 'blt';// й уведомит юзера, что в жизни не все так радосно, как хотелось бы.
}
