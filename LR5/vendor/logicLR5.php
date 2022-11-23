<?php
include 'connect.php';

$output = '';
$message = ''; 
$filename="weapons_exported.xml";


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'export') 
    {
        $stmt = $connect->query('SELECT * FROM kinds_of_weapons1');

        $xml_export = array();
            while ($row = $stmt->fetch()){
                array_push($xml_export, $row);
            }
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/LR5/upload/';
            $xml = simplexml_load_string('<?xml version="1.0" encoding="UTF-8"?><data></data>');

            foreach ($xml_export as $x) {
                $item = $xml->addChild('item');
                $item->addAttribute('id', $x['id']);
                $item->addAttribute('img_path', $x['img_path']);
                $item->addAttribute('weapon_name', $x['weapon_name']);
                $item->addAttribute('weapon_type', $x['weapon_type']);
                $item->addAttribute('weapon_description', $x['weapon_description']);
                $item->addAttribute('cost', $x['cost']);
            }

        if (!file_exists($filename)){
            file_put_contents($uploadDir.$filename, $xml->asXML());
            $output = 'Файл с данными сохранен на диск по адресу: '.$uploadDir.$filename;
        }
    }
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'import'){
        $boolean = TRUE;
        if($_POST['text'] == ''){
            $message = 'Вы ничего не ввели!';
            $boolean = FALSE;
        }
        $path = $_SERVER['DOCUMENT_ROOT']. $_POST['text'];
        if (file_exists($path) && $boolean) {
            $handle = fopen($path, 'r');
            $content = fread($handle, filesize($path));
            fclose($handle);
            $path_info = pathinfo($path);

            if ($path_info['extension'] == 'xml') {
                $xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);
            } else {
                $message = 'Не тот формат!';
                $boolean = FALSE;
            }
            
        } else {
            if($boolean){
                $message = 'Такой файл не существует!';
            }
            $boolean = FALSE;
        }



if ($boolean){
    $connect->query("DROP TABLE IF EXISTS weapons_imported");
        $connect->query("CREATE TABLE weapons_imported(
            id int(11) NOT NULL,
            img_path varchar(45) NOT NULL,
            weapon_name varchar(45) NOT NULL,
            weapon_type int(10) NOT NULL,
            weapon_description varchar(255) NOT NULL,
            cost int(11) NOT NULL,
            PRIMARY KEY(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $count = 0;

        foreach($array['item'] as $dd) {
            $d = $dd['@attributes'];
            $query = "INSERT INTO weapons_imported VALUES (:id, :i, :n, :t, :d, :c)";
            $stmt = $connect->prepare($query);
            $stmt->bindValue("id", intval($d['id']), PDO::PARAM_INT);
            $stmt->bindValue("i", $d['img_path'], PDO::PARAM_STR);
            $stmt->bindValue("n", $d['weapon_name'], PDO::PARAM_STR);
            $stmt->bindValue("t", intval($d['weapon_type']), PDO::PARAM_INT);
            $stmt->bindValue("d", $d['weapon_description'], PDO::PARAM_STR);
            $stmt->bindValue("c", intval($d['cost']), PDO::PARAM_INT);
            $stmt->execute();
            $count++;
        }
        $message = 'Файл с данными получен из '.$path.' и обработан. Создана таблица weapons_imported и '.$count.' записей в ней';
    }
}   

