<?php
/**
 * 
 * User: 
 * Date: 23/03/2018
 * Time: 08:26
 */

$servername = "localhost";
$dbname='storyo';
$username = "root";
$password = "";

// Create connection
$db = new mysqli($servername,  $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//echo "success";