<?php session_start();
if (empty($_SESSION['login'])) header ('Location: authorization.php'); ?>
<?php require_once('logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <mega charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>   
<?php require_once 'header.php' ?>
    <form action="" id="form" method="GET">
        <div class="container gap10down">
            <div class="center w-100">Фильтрация результата поиска</div>
            <div class="center w-100">По цене:</div>
            <div class="input-group mb-3 gap10down">
                <input type="text" name="cost1" placeholder="Цена от" class="form-control p-2 w-100"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3 gap10down">
                <input type="text" name="cost2" placeholder="Цена до" class="form-control p-2 w-100"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="center w-100">Фильтрация по бренду:</div>
            <select name="type" type="text" class="w-100 input-group mb-3">
                <option value="">Любой</option>
                <?php 
                    foreach($selectA as $items) {
                        ?>
                            <option value="<?php echo $items['id']; ?>"><?php echo $items['name']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <div class="center w-100">Фильтрация по описанию</div>
            <div class="input-group mb-3 gap10down">
                <input type="text" name="description" placeholder="Введите описание товара" class="form-control p-2 w-100"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="center w-100">Фильтрация по наименованию</div>
            <div class="input-group mb-3 gap10down">
                <input type="text" name="name" placeholder="Введите наименование товара" class="form-control p-2 w-100"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="center gap10">
                <button type="submit" class="center btn btn-primary">Применить фильтр</button>
                <button type="submit" class="btn btn-danger" onclick="document.getElementById("form").reset();">Очистить фильтр</input>
            </div>
            <div></div>
        </div>
    </form>
    <table class="table table-bordered container">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Тип</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $items) {
                    ?>
                    <tr>
                        <td><img src="img_catalog/<?= $items['img_path']; ?>" class="w-100"></td>
                        <td><?= $items['weapon_name']; ?></td>
                        <td><?= $items['name']; ?></td>
                        <td><?= $items['weapon_description']; ?></td>
                        <td><?= $items['cost']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>