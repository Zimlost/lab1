<?php
require_once("../../.core/index.php");
$title = GoodsTable::getRuTable();
$columns = GoodsTable::getAllColumn();

$table = GoodsTable::getTableName();
$values = isset($_GET['item_id']) ? GoodsTable::getItemById($_GET['item_id']) : '';

if (!empty($_POST) && !empty($_FILES) && GoodsActions::validatePrice($_POST['item_price']) && GeneralLogic::checkImg($_FILES['item_img_path'])) {
    if (GoodsActions::add() === true) {
        GeneralLogic::pushImg($_FILES['item_img_path']);
        header("Location: ../../pages/goods");
    }
    if (GoodsActions::edit() === true) {
        GeneralLogic::editImg($_FILES['item_img_path'], $values[0]['img_path']);
        header("Location: ../../pages/goods");
    }
}


require_once("../template.php");