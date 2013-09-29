<?php
require_once('database.php');
$db = makeConnection();

$ps = $db->prepare("SELECT * FROM `sites` WHERE `configid` = ? LIMIT 1");
$ps->bind_param('s', $_POST['config']);
$ps->execute();
if (strlen(trim($_POST['config'])) === 0) {
	echo '<p>Name must not be empty.</p>';
} else if (($rs = $ps->get_result()) && $rs->fetch_array()) {
	echo('<p>' . $_POST['config'] . ' is already being used.</p>');
} else {
$ps->close();

$ps = $db->prepare("INSERT INTO `buttons` (`configid`,`elementid`,`icon`) VALUES (?, ?, ?)");

foreach ($_POST['buttons'] as $button) {
	$props = explode(';', $button);
	$ps->bind_param('sss', $_POST['config'],$props[0],$props[1]);
	$ps->execute();
}
$ps->close();

if (count($_POST['buttons']) > 0) {
	$ps = $db->prepare("INSERT INTO `sites` (`configid`,`url`) VALUES (?, ?)");
	$ps->bind_param('ss', $_POST['config'], $_POST['url']);
	$ps->execute();
	$ps->close();

	echo "<p>Successfully added new remote " . $_POST['config'] . ".</p>";
} else {
	echo "<p>No buttons were marked. The remote was not saved.<p>";
}
}
echo '<p><a href="configmaker.php">Make another remote</a> or <a href="chooseremoteable.php">use remote</a>.</p>';
?>
