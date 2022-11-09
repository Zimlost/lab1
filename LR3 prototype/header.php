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
        <?php
            if (!empty($_SESSION['login'])) {
                ?>
                <div class="login d-flex" style="margin-left: auto;">
                    <div>Вы вошли как &ensp;<?php echo $_SESSION['login'] ?>.</div>
                    &ensp;
                    <div><a href="logout.php">Выйти</a></div>
                </div>
                <?php
            } else {
                ?>
                <div class="login" style="margin-left: auto;">
                    <div>Вы неавторизированы</div>
                    <div><a href="authorization.php">Ввести логин и пароль</a> или <a href="registration.php">Зарегистрироваться</a></div>
                </div>
                <?php
            }
            ?>
    </div>
    <div class="container d-flex" style="height: 100px; align-items: center; gap: 100px;">
        <div>
            <img src="img_catalog/logo.svg" style="width: 175px;">
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
            <a href="W_shop.php"class ="blackLineBox" style="background: red; border: none;">&emsp;Секретная страница&emsp;</a>
        </div>
    </div>