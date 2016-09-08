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

    public function getNames(){
        $return = array();
        try {
            foreach($this->db->query('SELECT * from user') as $row) {
                $return[] = $row;
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $return;
    }
}