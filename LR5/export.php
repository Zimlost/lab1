<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/LR5/vendor/logicLR5.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style1.css">

    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <?php
        require_once('header.php');
        ?>
        <main class="container-bg bg-white">
            <div class="container">
                <form  class="form-export" method="POST"
                    enctype="multipart/form-data">
                    <label for="">Выгрузка файла XML</label> <br>
                    <button type="submit" name='action' value = 'export' class="btn btn-info text-white mt-2">Экспорт</button>
                    <p><?= $output ?></p>
                </form>
                <form  class="form-export" method="POST">
                    <label for="upload-file">Укажите путь к файлу</label>
                    <input type="text" name="text" class="form-control">
                    <button type="submit"  name='action' value = 'import' class="btn btn-info text-white mt-2">Загрузить</button>
                    <p><?= $message ?></p>
                </form>
            </div>
        </main>
    </div>
</body>

</html>