<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="configmaker.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<style>
#controlbox li {
margin:2px;float: left;width:55px;height:65px;
}
#controlbox li:hover {
background-color:lightgray;cursor:pointer;
}
p.icon-overlay {
position: absolute; width:55px; height:65px;padding:0;text-align:center;font-family:serif;overflow:hidden;opacity:0.3;
}
p.icon-overlay:hover {
opacity:0.9;
}
p.icon-overlay span {
background-color:gray;

}
</style>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
</head>
<body style="margin: 0;background-color:#6C8CD5;">
<form method="post" action="saveconfig.php">
<div style="text-align:center;">
URL:<input id="url" name="url" type="text" size="50"></input>
<input type="button" id="load" value="Load"></input>
<p>Cross domain support coming soon. Only pages on the www.pjtb.net domain may be loaded at this time.</p>
<p>Sample URLs: http://www.pjtb.net/ezmoteio/examples/1.html and http://www.pjtb.net/ezmoteio/examples/2.html</p>
<p>Hold the Ctrl key over a link or button and left click to mark for remote use.</p>
</div>
<iframe id="target" style="background-color: #679FD2; padding: 0; margin: 0; height:100%; float:left; width:830px;border:none;"></iframe>
<div id="rightcolumn" style="float:left;width: 310px; margin: 0; background-color: white; height: 100%;">
<p style="text-align:center">Controls:</p>
<ul id="controlbox" style="list-style-type: none;" class="sortable">
</ul>
<div style="clear:both;text-align:center;">
Remote name:<input type="text" name="config"><input type="submit" value="Save">
</div>
</div>
<div style="clear:both"></div>
</form>
</body>
</html>
