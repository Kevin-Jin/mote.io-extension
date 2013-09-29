<?php

$buttons = array();

require_once('database.php');
$db = makeConnection();
$ps = $db->prepare("SELECT `elementid`,`icon` FROM `buttons` WHERE `configid` = ?");
$ps->bind_param('s', $_COOKIE['config']);
$ps->execute();
$rs = $ps->get_result();
while ($array = $rs->fetch_array()) {
	$buttons[] = $array;
}

echo "mote.io.remote.blocks=[{type:'buttons',data:[";
foreach ($buttons as $button) {
	echo "{press:function(){
		var item = \$('#target').contents().find('" . $button[0] . "');
		try {
		if (item.prop('tagName').toLowerCase() === 'a')
			\$('#target')[0].contentWindow.location.href = item.attr('href');
		else
			item.click();
		}catch(e){}
	},";
	echo "icon: '" . $button[1] . "'},";
}
echo "]}];";
?>
