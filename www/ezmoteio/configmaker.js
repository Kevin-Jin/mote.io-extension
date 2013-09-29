$(document).ready(function() {
	$( ".sortable" ).sortable();
	$( ".sortable" ).disableSelection();

	var detectkeydown = false;

	var addToControls = function(caption, elementid, icon) {
		$('#controlbox').append('<li><i class="icon-circle-blank icon-4x" style="position: absolute;"></i><p class="icon-overlay"><span>'+caption+'</span></p><input type="hidden" name="buttons[]" value="' + elementid + ';' + icon + '"></li>');
	};

	jQuery.fn.getPath = function () {
    var current = $(this);

if (current[0].id)
return '#' + current[0].id;

    var path = new Array();
    var realpath = "BODY";
    while ($(current).prop("tagName") != "BODY") {
        var index = $(current).parent().find($(current).prop("tagName")).index($(current));
        var name = $(current).prop("tagName");
        var selector = " " + name + ":eq(" + index + ") ";
        path.push(selector);
        current = $(current).parent();
    }
    while (path.length != 0) {
        realpath += path.pop();
    }
    return realpath;
};


	var maskClickables = function() {

$("#target").contents().find("body").find('input[type="submit"], input[type="button"], button, a').each(function(i) {
$('<div class="override" style="position:absolute;left:' + $(this).position().left + ';top:' + $(this).position().top + ';background-color:white;cursor:crosshair;opacity:0;overflow:hidden;width:' + $(this).outerWidth(true) + 'px;height:' + $(this).outerHeight(true) + 'px;">' + $(this).getPath() + '</div>').appendTo($(this).parent());
});


	};

	$('body').append('<div id="dimmer" style="background-color: black;opacity:0.5;position:fixed;top:0;left:0;width:100%;height:100%;display:none;"></div>').keyup(function(e) {
		if ($('#dimmer').css('display') !== 'none' && e.keyCode === 27) {
			$('#dimmer').fadeOut(100);
		}
	}).click(function() {
		$('#dimmer').fadeOut(100);
	});
	$(document).on('mouseover', '#controlbox li', function(e) {
		$($(this).find("input").val().split(";")[0]);
	});
	$(document).on('click', '#controlbox li', function(e) {
		$("#dimmer").fadeIn(200);
	});
        $('#target').load(function(e) {
                $(this).contents().on('click', '.override', function(e) {
			if (!detectkeydown)
				return;

			$("#target").contents().find(".override").remove();

                        var element = /*$($("#target")[0].contentWindow.document.elementFromPoint(e.pageX,e.pageY));*/ $("#target").contents().find( $(this).html());
			maskClickables();

			switch (element.prop('tagName').toLowerCase()) {
				case 'a':
				case 'button':
					addToControls(element.text(), $(this).html(), 'circle-blank');
					return false;
				case 'input':
					addToControls(element.attr('value'), $(this).html(), 'circle-blank');
					return false;
			}
                });

		$(this).contents().find("body").keydown(function(e) {
			if (!detectkeydown && e.keyCode === 17) { //Ctrl
				detectkeydown = true;
maskClickables();
			}
		}).keyup(function(e) {
			if (detectkeydown && e.keyCode === 17) { //Ctrl
				detectkeydown = false;
$("#target").contents().find(".override").remove();
			}
		});
        });

	$('body').keydown(function(e) {
				if (!detectkeydown && e.keyCode === 17) { //Ctrl
				detectkeydown = true;
maskClickables();
			}
		}).keyup(function(e) {
			if (detectkeydown && e.keyCode === 17) { //Ctrl
				detectkeydown = false;
$("#target").contents().find(".override").remove();
			}
		});
	$('#load').attr('type', 'button').click(function() {
		$('#target').attr('src', $('#url').val());
	});
});

