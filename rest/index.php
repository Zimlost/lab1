<?php

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Max-Age: 86400');



if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit;
}


require_once '../vendor/autoload.php';
require_once "../classes/weapons.php";
require_once "../classes/types.php";

$app = new Silex\Application();













//для брендов:
$app->get('/types/list.json', function () use ($app) {
    $type = new Types;
    $list = $type->read();
    return $app->json($list);
});
$app->post('/types/add-item', function () use ($app) {

    $data = json_decode(file_get_contents('php://input'),true);
    if ($data !== null && isset($data['name'])) {
        $name = $data['name'];
        if (strlen($name)) {
            $type = new Types;
            try {
                $type->create(array("name" => $name));
                $lastid = $type->lastID();
                return $app->json(array("create-type" => "yes", "create-id" => $lastid));
            } catch (PDOException $e) {
                return $app->json(array("error" => $e->getMessage(), "create-type" => "no"));
            }
        } else {
            return $app->json(array("create-type" => "no"));
        }
    } else {
        return $app->json(array("create-type" => "no"));
    }

});

$app->post('/types/update-item', function () use ($app) {
    $data = json_decode(file_get_contents('php://input'),true);
    $type = new Types;
    $id = intval($data["id"]);
    $name = $data["name"];
    if ($type->exists($id) && strlen($name)) {
        try {
            $type->update(array("id" => $id, "name" => $name));
            return $app->json(array("name" => $name, "id" => $id));
        } catch (PDOException $e) {
            return $app->json(array("error" => $e->getMessage(),  "update-type" => "no"));
        }
    } else {
        return $app->json(array("update-type" => "no"));
    }
});

$app->post('/types/delete-item', function () use ($app) {
    $data = json_decode(file_get_contents('php://input'),true);
    $type = new Types;
    $id = intval($data["id"]);
    if ($type->exists($id)) {
        try {
            $type->delete($id);
            return $app->json(array("delete-type-" => "yes", "id_delete" => $id));
        } catch (PDOException $e) {
            return $app->json(array("error" => $e->getMessage(), "delete-type-" => "no"));
        }
    } else {
        return $app->json(array("delete-type-" => "no"));
    }
});

//для студентов:

$app->get('/weapons/list.json', function () use ($app) {
    $weapon =  new Weapons;
    $list = $weapon->readAll();
    return $app->json($list);
});
$app->post('/weapons/add-item', function () use ($app) {
    $data = json_decode(file_get_contents('php://input'),true);
    $name = $data["name"];
    $id_type = intval($data["id_type"]);
    $description = ($data["description"]);
    $cost = intval(($data["cost"]));
    if (strlen($name)) {
        $weapon =  new Weapons;
        try {
            $weapon->create(array('name' => $name, "id_type" => $id_type, "description" => $description, "cost" => $cost));
            return $app->json(array("create-weapon" => $name, "id_type" => $id_type, "description" => $description, "cost" => $cost));
        } catch (PDOException $e) {
            return $app->json(array("error" => $e->getMessage(), "create-weapon" => "no"));
        }
    } else {
        return $app->json(array("create-weapon" => "no"));
    }
});
$app->post('/weapons/update-item', function () use ($app) {

    $data = json_decode(file_get_contents('php://input'),true);

    $id = intval($data["id"]);
    $name = $data["name"];
    $id_type = intval($data["id_type"]);
    $description = ($data["description"]);
    $cost = intval(($data["cost"]));
    $weapon =  new Weapons;
    if ($weapon->exists($id) && strlen($name)) {
        try {
            $weapon->update(array("id" => $id, "name" => $name, "description" => $description, "cost" => $cost, "id_type" => $id_type));
            return $app->json(array("name" => $name, "id" => $id, "description" => $description, "cost" =>$cost, "id_type" =>$id_type));
        } catch (PDOException $e) {
            return $app->json(array("error" => $e->getMessage(), "update-weapon" => "no"));
        }
    } else {
        return $app->json(array("update-weapon" => "no"));
    }
});

$app->post('/weapons/delete-item', function () use ($app) {

    $data = json_decode(file_get_contents('php://input'),true);

    $id = intval($data["id"]);
    $weapon =  new Weapons;
    if ($weapon->exists($id)) {
        try {
            $weapon->delete($id);
            return $app->json(array("delete-weapon" => "yes", "id_delete" => $id));
        } catch (PDOException $e) {
            return $app->json(array("error" => $e->getMessage(), "delete-weapon" => "no"));
        }
    } else {
        return $app->json(array("delete-weapon" => "no"));
    }
});


$app->run();