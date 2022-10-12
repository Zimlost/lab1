<?php require_once('logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <mega charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container d-flex" style="gap: 200px; height: 40px; align-items: center;">
        <div class="hP" style="border-bottom: 1px dotted gray">
            Волгоград
        </div>
        <div class="d-flex" style="gap: 15px;">
            <div class="hP">Магазины</div>
            <div class="hP" style="border-bottom: 1px dotted gray"><nobr>Что с моим заказом?</nobr></div>
            <div class="hP">Блог</div>
            <div class="hP"><nobr>Уценённые товары</nobr></div>
        </div>
        <div class="d-flex" style="gap: 15px;">
            <div class="hP">Войти</div>
            <div class="hP">|</div>
            <div class="hP">Регистрация</div>
        </div>
    </div>
    <div class="container d-flex" style="height: 100px; align-items: center; gap: 100px;">
        <div>
            <img src="img/logo.svg" style="width: 175px;">
        </div>
        <div class="searchBar d-flex">
            <input style="width: 100%; height: 100%; border: none; min-width: 50px;">
            <div class="hP" style="text-align: right; display: flex; align-items: center;">&#128269;</div>
        </div>
        <div style="font-size: 13px;">
            <div class="text-muted"><nobr>Звоните с 9:00 до 21:00 (мск)</nobr></div>
            <div>+7 (861) 210-97-80</div>
            <div class="text-danger">Заказать звонок</div>
        </div>
        <div>
            <nobr>Моя корзина</nobr><br>0&#8381;
        </div>
    </div>
    <div class="blackLine">
        <div class="container d-flex">
            <div class="blackLineBox">&emsp;Охота и спортивная стрельба&emsp;</div>
            <div class="blackLineBox">&emsp;Рыбалка&emsp;</div>
            <div class="blackLineBox">&emsp;Туризм&emsp;</div>
            <div class="blackLineBox">&emsp;Одежда&emsp;</div>
            <div class="blackLineBox">&emsp;Обувь&emsp;</div>
            <div class="blackLineBox">&emsp;Подводная охота&emsp;</div>
            <div class="blackLineBox">&emsp;Лодки и моторы&emsp;</div>
            <div class="blackLineBox">&emsp;Прочее&emsp;</div>
            <div class="blackLineBox" style="border-right: none;">&emsp;Электроника&emsp;</div>
            <div class="blackLineBox" style="background: red; border: none;">&emsp;Акции&emsp;</div>
        </div>
    </div>
    <form action="" id="form" method="GET">
        <div class="container gap10down">
            <div class="center w-100">Фильтрация результата поиска</div>
            <div class="center w-100">По цене:</div>
            <input type="text" name="cost1" placeholder="Цена от" class="w-100">
            <input type="text" name="cost2" placeholder="Цена до" class="w-100">
            <div class="center w-100">Фильтрация по бренду:</div>
            <select name="type" type="text" class="w-100">
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
            <input type="text" name="description" placeholder="Введите описание товара" class="w-100">
            <div class="center w-100">Фильтрация по наименованию</div>
            <input type="text" name="name" placeholder="Введите наименование товара" class="w-100">
            <div class="center gap10">
                <button type="submit" class="bBtn">Применить фильтр</button>
                <button type="submit" class="rBtn" onclick="document.getElementById("form").reset();">Очистить фильтр</input>
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