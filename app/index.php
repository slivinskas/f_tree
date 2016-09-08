<?php
/**
 * Created by PhpStorm.
 * User: Acer-pc
 * Date: 2016-09-08
 * Time: 11:14
 *
 */

$user = "u290070005_ftree";
$pass = "ftreeKaupiklis";

class FTREE_DAO{
    protected $connect;
    protected $db = "";
    protected $host = "mysql.hostinger.lt";

    // Attempts to initialize the database connection using the supplied info.
    public function FTREE_DAO($host, $username, $password, $database) {
        $this->db = $dbh = new PDO("mysql:host=$host;dbname={$database}", $username, $password);
    }

    public function getNames(){
        try {
            foreach($this->db->query('SELECT * from user') as $row) {
                print_r($row);
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}

$tree = new FTREE_DAO();

if(isset($_GET["users"])){
    print json_encode();
}
