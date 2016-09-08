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
$db   = "u290070005_ftree";
$host = "mysql.hostinger.lt";

include_once ("server/FTREE_DAO.php");

$tree = new FTREE_DAO($host,$user,$pass,$db);

$var = $tree->getNames();

//print json_encode($var);

if(isset($_GET["users"])){
    print json_encode($var);
}

if(isset($_GET["relations"])){
    print json_encode($tree->getReliations());
}
