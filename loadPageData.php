<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 16/05/2018
 * Time: 14:46
 */
include 'functions.php';


error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pName=$_POST["pageid"];
console.log($pName);


$connection=connectDB();

checkExistPage($pName,$connection);

insertPageID($pName,$connection);


//checkExistPage($FBurl,$connection);
?>
