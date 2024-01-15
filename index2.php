<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div style="text-align: center">
    <h1>Хранилище</h1>

    <?php
    // Проверяем GET параметры на наличие вхождения в папки относительно корня "storage/"
    if (isset($_GET['dop_path'])){
        $dop_path = str_replace(";", "/", $_GET['dop_path']);
        $path = $_SERVER["DOCUMENT_ROOT"]."/site/test_project/storage/".$dop_path;
        $img_path = 'storage/'.$dop_path;
    } else{
        $path = $_SERVER["DOCUMENT_ROOT"]."/site/test_project/storage";
        $img_path = 'storage/';
        $dop_path = "";
    }
    $back_path = "";
    if ($dop_path) {
        $back_path_dop = parse_url($_SERVER["REQUEST_URI"]);
        if ($back_path_dop["query"]) {
            $exit_dir = strrpos($back_path_dop["query"], ';');
            if ($exit_dir) {
                $back_path = "?" . substr($back_path_dop["query"], 0, strrpos($back_path_dop["query"], ';'));
            } else {
                $back_path = $back_path_dop["path"];
            }
        }
    }

    echo '<input style="margin-top: 25px;" type="text" readonly value="/'.$dop_path.'"><br>';

    echo '<a style="margin-top: 15px; font-size: 20px" href="'.$back_path.'" >...</a><br>';

    // Выводим все папки и картинки
    if (file_exists($path) && is_dir($path) && strpos($path ,'storage') !== false) {
        $dir = scandir($path);
        foreach ($dir as $element) {
            if ($element != '.' && $element != '..') {
                $tmp = $img_path . '/' . $element;
                $info = pathinfo($element, PATHINFO_EXTENSION);
                if (is_dir($tmp)) {
                    if ($dop_path){
                        $href = str_replace("/", ";", $dop_path).';'.$element;
                    }else{
                        $href = $element;
                    }

                    echo '<a style="margin-top: 15px; font-size: 20px" href="?dop_path='.$href.'" ><img src="folder.gif"/>' . $element . '</a><br>';

                } elseif (in_array($info, ['png', 'jpg'])) {

                    echo '<img style="margin-top: 15px;" src="' . $tmp . '" alt="Картинка ' . $element . '" width="150" height="150" /><br>';

                }
            }
        }
    }else{
        echo '<p>Папка не найдена!</p>';
    }


    ?>

</div>

</body>
</html>
