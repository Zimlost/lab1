<?php

require_once ('tableModule.php');

class Weapons extends TableModule
{
    protected function getTableName() : string
    {
        return "weapons";

    }


    public function readAll()
    {
        $sql = "SELECT weapons.id, weapons.name, weapons.id_type, weapons.description, weapons.cost, types.name as typename
        FROM `weapons` 
        INNER JOIN types ON weapons.id_type = types.id 
        WHERE 1
       ";
        $query = Db::prepare($sql);
        $query->execute();
        $result = array();
        while ($slice = $query->fetch()) {
            $result[] = $slice;
        }
        if($query->errorInfo()[0] !== '00000') {
            throw new Exception($query->errorInfo()[2]);
        }
        return $result;




    }

}