exec(function() {
	//initialize a blank remote
	//TODO: display a message "Loading..."
	mote.io.remote = {
		api_version: '0.1',
		app_name: 'Ezmoteio',
		display_input: true,
		action: 'listening to',
		blocks: [ ]
	};

	var loadNewLayout = function(url) {
		//load the configuration from the server
		var oXmlHttp = null;
		if (window.XMLHttpRequest)
			oXmlHttp = new XMLHttpRequest();
		else if (window.ActiveXObject)
			oXmlHttp = new ActiveXObject("MsXml2.XmlHttp");
		oXmlHttp.onreadystatechange = function() {
			if (oXmlHttp.readyState == 4)
				if (oXmlHttp.status == 200 || oXmlHttp.status == 304)
					eval(oXmlHttp.responseText);
				else
					alert( 'XML request error: ' + oXmlHttp.statusText + ' (' + oXmlHttp.status + ')' ) ;
		}
		oXmlHttp.open('GET', url, true);
		oXmlHttp.send(null);
	};

	loadNewLayout("http://www.pjtb.net/ezmoteio/customconfig.php");
});
