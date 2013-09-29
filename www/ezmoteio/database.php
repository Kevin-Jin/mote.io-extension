<?php
function makeConnection() {
$host='localhost';
$user='ezmoteio';
$pass='';
$db='ezmoteio';

return new mysqli($host, $user, $pass, $db);
}
?>
