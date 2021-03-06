<?php

namespace app\DB;
use PDO;
trait Torm{
    public function get($id = null, $col="") : array{
        $class = get_called_class();

        $where = "";
        if(!$col){
            $query = "SELECT * FROM `".DBNAME."`.`".$class::$table_name."`";
        }else{
            $query = "SELECT `".$col."` FROM `".DBNAME."`.`".$class::$table_name."`";
        }
        
        if($id) {
            $where = "\n WHERE ".$class::$pkName." = ?";
        }
        $query .= $where;
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $return = [];

        if($stmt->rowCount()){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                //$return = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                $return[] = $row;
            }

            /*
            if(count($return) === 1){
                $return = $return[0];
            }
            */
        }
        return  $return;
    }



    public function save($data) :bool{

        $class = get_called_class();
        $vars = get_class_vars($class);
        
        $query = "SELECT column_name from information_schema.columns where table_name = \"" . array_pop(explode('\\', $class)) . "\"";
        $result = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        $result_temp = [];
        $col_names = [];
        $tempData = [];
        foreach($result as $arr){
            $result_temp[] = $arr['column_name'];
        }

        foreach($vars as $key => $val){
            if(in_array($key, $result_temp)){
                $col_names[] = $key;
                if(ctype_digit($data[$key])){
                    $tempData[$key] = intval($data[$key]);
                }else{
                    $tempData[$key] = $data[$key];
                }
            }
        }
        $data = [];
        foreach($tempData as $key => $val){
            if($key !== $class::$pkName){
                $data[] = $val;
            }
        }
        if($tempData[0] === $class::$pkName){
            array_shift($data);
        }
    
        $col_names_implode =  "`" . implode("`,`", $col_names) . "`";
        $vals = "";
        if($col_names[0] === $class::$pkName) {
            array_shift($col_names);
            $vals .= "NULL,";

        }
     
        $vals .= rtrim(str_repeat("?,", count($col_names)), ",");

      
        $query = "INSERT INTO `".DBNAME."`.`".$class::$table_name."` 
                    (".$col_names_implode.")
                    VALUES (".$vals.")";
    
        $stmt = $this->db->prepare($query);

        $stmt->execute($data);
        
        $error_code = $stmt->errorCode();
        return $error_code === "00000";
    }


    public function update($id, $data) :bool{
        $class = get_called_class();
        $vars = get_class_vars($class);
        
        $query = "SELECT column_name from information_schema.columns where table_name = \"" . array_pop(explode('\\', $class)) . "\"";
        $result = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        $result_temp = [];
        $col_names = [];
        $tempData = [];


        foreach($result as $arr){
            $result_temp[] = $arr['column_name'];
        }

        foreach($vars as $key => $val){
            if(in_array($key, $result_temp)){
                $col_names[] = $key;
                if(ctype_digit($data[$key])){
                    $tempData[$key] = intval($data[$key]);
                }else{
                    $tempData[$key] = $data[$key];
                }
            }
        }

        $data = [];
        foreach($tempData as $key => $val){
            if($key !== $class::$pkName){
                $data[] = $val;
            }
        }
        if($tempData[0] === $class::$pkName){
            array_shift($data);
        }

        
        array_shift($col_names);
        $col_names_update = "";
        foreach($col_names as $name) {
           // $col_names_update .= "`" . $name . "`" . " = :".$name.",\n" ;
           $col_names_update .= "`" . $name . "`" . " = ?,\n" ;
        }
        $col_names_update = rtrim(trim($col_names_update), ",");
        $query = "UPDATE `".DBNAME."`.`".$class::$table_name."` set \n";
        $query .= $col_names_update . "\n";
        $query .= "WHERE 
                        ".$class::$pkName." = ?";
        $stmt = $this->db->prepare($query);
        /*
        foreach($col_names as $param){
            $bind = ":".$param;
            $bindVal = $data[$param];
            $stmt->bindParam($bind, $bindVal);
        }
        $bind = ":" . $class::$pkName;
        $bindVal = (int) $id;
        $stmt->bindParam($bind, $bindVal);
        */
        $data[$class::$pkName] = $id;

        $data = array_values($data);

        $stmt->execute($data);
        $error_code = $stmt->errorCode();
        return $error_code === "00000";;
    }


    
    public function delete($id) :bool{
        $id = intval($id);
        $class = get_called_class();
        $query = "DELETE FROM `".DBNAME."`.`".$class::$table_name."` WHERE ".$class::$pkName." = :id ;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $error_code = $stmt->errorCode();
        return $error_code === "00000";
    }

    public function getLastInsertedId(){
        $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
        $lastId = $stmt->fetchColumn();
        return $lastId;
    }
}