<?php
require_once('database.php');
$configs = array();
$db = makeConnection();
$ps = $db->prepare("SELECT `configid` FROM `sites`");
$ps->execute();
$rs = $ps->get_result();
while ($array = $rs->fetch_array()) {
        $configs[] = $array[0];
}
$ps->close();

echo <<<EOD
<html>
<body>
<form method="post" action="remoteable.php">
Choose the custom configuration that you wish to load: 
<select name="config">
EOD;
foreach ($configs as $config) {
	echo '<option value="' . $config . '">' . $config . '</option>';
}
echo <<<EOD
</select>
<br />
<input type="submit" value="Load Page"></input>
</form>
</body>
</html>
EOD;
?>
