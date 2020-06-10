<?php

namespace app\DB;


interface Iorm{
    public function save($data):bool;
    public function get($id, $col):array;
    public function update($id,$data):bool;
    public function delete($id):bool;
}