<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 1:54 AM
 */

namespace DB;


use Xpeed\App;
use Xpeed\Exceptions;

class Database
{
    private static $me;
    public $db;
    public $host;
    public $name;
    public $username;
    public $password;
    public $queries;
    public $result;
    public $port;
    public $socket;

    private function __construct($connect = false)
    {

        $this->host       = App::instance()->getConfig('db_host');
        $this->name       = App::instance()->getConfig('db_name');
        $this->username   = App::instance()->getConfig('db_user');
        $this->password   = App::instance()->getConfig('db_password');
        $this->port   = App::instance()->getConfig('db_port');
        $this->socket   = App::instance()->getConfig('db_socket');
        $this->db = false;
        $this->queries = array();
        if($connect === true)
            $this->connect();
    }

    public static function __callStatic($name, $args)
    {
        return self::$me->__call($name, $args);
    }

    public static function getDatabase($connect = true)
    {
        if(is_null(self::$me))
            self::$me = new Database($connect);
        return self::$me;
    }

    public function isConnected()
    {
        return is_object($this->db);
    }

    public function databaseSelected()
    {
        if(!$this->isConnected()) return false;
        $result = mysqli_query($this->db, "SHOW TABLES");
        return is_object($result);
    }

    public function connect()
    {
        $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->name, $this->port,$this->socket) or $this->notify();
        if($this->db === false) return false;
        return $this->isConnected();
    }
    public function query($sql, $args_to_prepare = null, $exception_on_missing_args = true)
    {
        if(!$this->isConnected()) $this->connect();

        if(is_array($args_to_prepare))
        {
            foreach($args_to_prepare as $name => $val)
            {
                $val = $this->quote($val);
                $sql = str_replace(":$name", $val, $sql, $count);
                if($exception_on_missing_args && (0 == $count))
                    throw new Exceptions(":$name was not found in prepared SQL query.");
            }
        }
        $this->queries[] = $sql;
        $this->result = mysqli_query($this->db, $sql) or $this->notify();
        return $this->result;
    }

    private function notify()
        {
            $err_msg = mysqli_error($this->db);
            error_log($err_msg);

            echo "<p style='border:5px solid red;background-color:#fff;padding:5px;'><strong>Database Error:</strong><br/>$err_msg</p>";
            echo "<p style='border:5px solid red;background-color:#fff;padding:5px;'><strong>Last Query:</strong><br/>" . reset($this->queries) . "</p>";
            echo "<pre>";
            debug_print_backtrace();
            echo "</pre>";
            exit;
         }

    public function affectedRows()
    {
        if(!$this->isConnected()) return false;
        return mysqli_affected_rows($this->db);
    }

    public function insertID()
    {
        if(!$this->isConnected()) return false;
        $id = mysqli_insert_id($this->db);
        if($id === 0 || $id === false)
            return false;
        else
            return $id;
    }


    public function quote($var)
    {
        if(!$this->isConnected()) $this->connect();
        return "'" . $this->escape($var) . "'";
    }

    public function escape($var)
    {
        if(!$this->isConnected()) $this->connect();
        return mysqli_real_escape_string($this->db, $var);
    }

    public function __destruct()
    {
        mysqli_close($this->db);
    }


}
