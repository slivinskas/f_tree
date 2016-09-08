<?php
/**
 * Created by PhpStorm.
 * User: Acer-pc
 * Date: 2016-09-08
 * Time: 23:01
 */

include_once ("server/FTREE_DAO.php");
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
$current = $usersRel[0]['user_id']; // esamas user
$usedList = array();
$nextList = array();

print_r($usersRel[0]);


$listRel ="";
foreach ($usersRel as $user) {
    $listRel .= "userID {$user['user_id']} ";
}

print $listRel;
