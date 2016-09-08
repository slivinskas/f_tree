<?php

/**
 * Created by PhpStorm.
 * User: Acer-pc
 * Date: 2016-09-08
 * Time: 15:50
 */
class FTREE_DAO
{
    protected $connect;
    protected $db;
    protected  $database = "mysql.hostinger.lt";
    protected $host = "mysql.hostinger.lt";

    // Attempts to initialize the database connection using the supplied info.
    public function FTREE_DAO($host, $username, $password, $database) {
        $this->db = $dbh = new PDO("mysql:host=$host;dbname={$database}", $username, $password);
    }

    private function getData($sql){
        $ret = array();
        try {
            foreach($this->db->query($sql) as $row) {
                foreach($row as $key=>$var){
                    if(is_numeric($key)){
                        unset($row[$key]);
                    }
                }
                $ret[] = $row;
            }

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $ret;
    }

    public function getNames(){
        return $this->getData('SELECT id, name, surname, email from user');
    }

    public function getReliations(){
        return $this->getData('SELECT * from f_tree_level');
    }
}