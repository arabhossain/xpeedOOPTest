<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 1:59 AM
 */

namespace Xpeed;


use DB\Database;
use Helpers\Query;

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db =  Database::getDatabase();

    }

    public function select(){
        if(strlen($this->table) <1 )  throw new Exceptions("Table not selected");
        $result = $this->db->query('SELECT * FROM '.$this->table);
        return new Query($result);
    }

    public function insert($data){
        if(!is_array($data) && !is_object($data)) throw new Exceptions('Invalid data passed');

        if(is_object($data))
            $data = (array) $data;

        $values = implode(', ', array_map(function ($value){
            return '\''.$value.'\'';
        },array_values($data)));

        $sql = 'INSERT INTO '.$this->table.' ('.implode(', ', array_keys($data)).') values ('.$values.')';
        $result = $this->db->query($sql);
        return new Query($result);
    }

}