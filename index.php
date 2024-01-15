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
//        const VALID_CALL = true;
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

        echo '<input style="margin-top: 25px;" type="text" readonly value="/'.$dop_path.'"><br>';

        echo '<a style="margin-top: 15px; font-size: 20px" href="javascript:void(0);" data-name="back" >...</a><br>';

        // Выводим все папки и картинки
        if (file_exists($path) && is_dir($path) && strpos($path ,'storage') !== false) {
            $dir = scandir($path);
            foreach ($dir as $element) {
                if ($element != '.' && $element != '..') {
                    $tmp = $img_path . '/' . $element;
                    $info = pathinfo($element, PATHINFO_EXTENSION);
                    if (is_dir($tmp)) {

                        echo '<a style="margin-top: 15px; font-size: 20px" href="javascript:void(0);" data-name ="' . $element . '" ><img src="folder.gif"/>' . $element . '</a><br>';

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    <!-- Сборка GET параметров в зависимости от нажатия -->
    $(document).on('click', 'a', function () {
        var url = window.location.href;
        var param = $(this).data('name');
        if (param === "back"){
            var back1 = url.lastIndexOf(';');
            if (back1 !== -1) {
                url = url.substring(back1, -1)
                window.location.href = url;
            }else {
                var back2 = url.lastIndexOf('?');
                url = url.substring(back2, -1)
                window.location.href = url;
            }
        }else {

            var hasParams = url.includes('?');

            if (hasParams) {
                url += ';' + param;
            } else {
                url += '?dop_path=' + param;
            }
            window.location.href = url;
        }
    });
</script>

</body>
</html>
