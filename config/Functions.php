<?php

include_once "Database.php";
const TOKEN = "NmXJeRmCaPDys6Lg6GQHbFxTX";

function dbExec($sql , $param_array)
{
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $stat = $db->prepare($sql);
    $stat->execute($param_array);
    return $stat;

}

function is_auth()
{
    if (isset($_GET["token"]) && $_GET["token"] == TOKEN) {
        return true;
    }
    else {
        return false;
    }
}
