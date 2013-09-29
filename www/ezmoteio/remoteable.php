<?php
if (!isset($_POST['config']))
	die("No config");

setcookie('config', $_POST['config']);

require_once('database.php');
$db = makeConnection();
$ps = $db->prepare("SELECT `url` FROM `sites` WHERE `configid` = ?");
$ps->bind_param('s', $_POST['config']);
$ps->execute();
$rs = $ps->get_result();
if ($array = $rs->fetch_array()) {
        $url = $array[0];
}

echo <<<EOD
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="remoteable.js"></script>
</head>
<body style="margin:0;">
<iframe id="target" src="$url" height="100%" width="100%" frameborder="0"></iframe>
</body>
</html>
EOD;
?>
