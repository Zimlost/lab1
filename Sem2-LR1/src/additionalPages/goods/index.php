<?php
require_once("../../.core/index.php");
$title = GoodsTable::getRuTable();
$columns = GoodsTable::getAllColumn();

$table = GoodsTable::getTableName();

$errors = [];

if (!empty($_POST)) {
    $errors = GoodsActions::checkErrors($_POST, $_FILES);
    $mistakes = GoodsActions::saveErrValues($errors, $_POST, isset($_FILES['img_path']) ? $_FILES['img_path'] : null);
}
if (!empty($_FILES)) {
    $_FILES['item_img_path']['name'] = time() . '_' . $_FILES['item_img_path']['name'];
}

if (isset($_GET['item_id'])) {
    $values = GoodsTable::getItemById($_GET['item_id']);
    if (!empty($_POST) && !empty($_FILES) && GeneralLogic::checkImg($_FILES['item_img_path']) && GoodsActions::validatePrice($_POST['item_price'])) {
        if (GoodsActions::edit() === true) {
            GeneralLogic::editImg($_FILES['item_img_path'], $values[0]['img_path']);
            header("Location: ../../pages/goods");
        }
    }
} else {
    $add = GoodsActions::add();
    if ($add === true) {
        GeneralLogic::pushImg($_FILES['item_img_path']);
        header("Location: ../../pages/goods");
    } else {
        $values = array($add);
    }
}

require_once("../template.php");