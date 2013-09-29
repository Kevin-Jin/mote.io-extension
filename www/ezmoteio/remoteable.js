$(document).ready(function() {
        var iframe = $('#target');

        var script   = document.createElement("script");
        script.type  = "text/javascript";
        script.src   = "https://mote.io/js/plugin.js";
        //script.text = "alert('hello');";
	iframe[0].appendChild(script);

});

