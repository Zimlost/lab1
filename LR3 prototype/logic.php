<?php
    include 'connect.php';

    $mass = array();


    if (isset($_GET["cost1"]) && $_GET["cost1"] != "") array_push($mass, "cost > :cost1GET");

    if (isset($_GET["cost2"]) && $_GET["cost2"] != "") array_push($mass, "cost < :cost2GET");

    if (isset($_GET["type"]) && $_GET["type"] != "") array_push($mass, "weapon_type LIKE :typeGET"); 

    if (isset($_GET["description"]) && $_GET["description"] != "") array_push($mass,"weapon_description LIKE :descGET");

    if (isset($_GET["name"]) && $_GET["name"] != "") array_push($mass,"weapon_name LIKE :nameGET");

    $query = "SELECT img_path, weapon_name, weapon2.name, weapon_description, cost FROM kinds_of_weapons1 INNER JOIN weapon2 on kinds_of_weapons1.weapon_type = weapon2.id ";

    if (!empty($mass)) $query = $query . "WHERE " . implode(" AND ", $mass);


    $stmt = $connect->prepare($query);
    if (isset($_GET["cost1"]) && $_GET["cost1"] != "") $stmt->bindValue('cost1GET', $_GET['cost1'], PDO::PARAM_INT);
    if (isset($_GET["cost2"]) && $_GET["cost2"] != "") $stmt->bindValue('cost2GET', $_GET['cost2'], PDO::PARAM_INT);
    if (isset($_GET["type"]) && $_GET["type"] != "") $stmt->bindValue('typeGET', $_GET['type'], PDO::PARAM_STR);
    if (isset($_GET["description"]) && $_GET["description"] != "") $stmt->bindValue('descGET', '%' . $_GET['description'] . '%', PDO::PARAM_STR);
    if (isset($_GET["name"]) && $_GET["name"] != "") $stmt->bindValue('nameGET', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
    $stmt->execute();
    $data = array();

    while ($row = $stmt->fetch()) {
        array_push($data, $row);
    }

    $selectA = array();

    $stmt = $connect->query("SELECT * FROM weapon2");
    while ($row = $stmt->fetch()) {
        array_push($selectA, $row);
    }
?>