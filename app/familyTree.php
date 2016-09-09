<?php
/**
 * Created by PhpStorm.
 * User: Acer-pc
 * Date: 2016-09-08
 * Time: 23:01
 */

include_once ("server/FTREE_DAO.php");
include_once ("graph.php");
$user = "u290070005_ftree";
$pass = "ftreeKaupiklis";
$db   = "u290070005_ftree";
$host = "mysql.hostinger.lt";
function userTemplate($user)
{
    return '<a href="#">
            <span class="treeUserPhoto">
                <img alt="Klientas" src="http://www.pickthebrain.com/blog/wp-content/uploads/2008/04/baby-smiling.jpg"/>
            </span>
            <span class="treeUserName">' . $user["name"] . '</span>
            <span class="treeUserSurname">' . $user["surname"] . '</span>
            <span class="treeUserBirthday">1991</span>
            <span class="treeUserEmail">' . $user["email"] . '</span>
        </a>';
}
$tree = new FTREE_DAO($host,$user,$pass,$db);
$usersNames = $tree->getNames();
$usersRel = $tree->getReliations();
$list ="";
foreach ($usersNames as $user) {
    $list .= userTemplate($user);
}

//print $list;

//========================================================
// Santykių sąrašas
print $current = $usersRel[0]['user_id']; // esamas user
$usedList = array();
$nextList = array();
print_r($usersRel[0]);


$rezult = "";


$listRel = array();
//array_push($listRel,$usersRel[0]["user_id"]);
/*
foreach ($usersRel as $user) {
    if($user["level"]=="0"){
        array_push($listRel,$user["friend_id"]);
    }elseif($user["level"]=="3"){
        $user["kaimynas"] = $listRel;
        $listRel = $user;
    }else{

    }
}
*/

$bendras = array();
$bendras[$usersRel[0]['user_id']]=$usersRel[0]['friend_id'];
unset($usersRel[0]);



print_r($bendras);
