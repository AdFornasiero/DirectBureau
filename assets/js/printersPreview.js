var path = window.location.pathname.split('/');
var baseurl = window.location.protocol + '//' + window.location.host + '/' + path[1] + '/' + path[2] + '/';
var selectedPrinters = '';

$('#dynamicDropdown').width($('#printerSelector').width());
$('#dynamicDropdown').css('max-height', '12rem');

// Execute search query on key released
$('#printerSelector').keyup(function(){
	text = $('#printerSelector').val();
	if(text.length > 1){	
		$.post({
			url: baseurl + "Products/printerSearchQuery",
			data: {input:text},
			datatype: 'json',
			success: function(data){
				var printers = JSON.parse(data);
				var printersList = new Array();
				printers.forEach(function(printer){
					printersList.push(printer['ID'] + '|' + printer['mark'] + ' ' + printer['printer']);
				});
				showDropdown(printersList);
			},
			error: function(){
				console.log('error');
			}
		});
	}
	else{
		$('#dynamicDropdown').slideUp('fast');
	}
});


// Display results dropdown
function showDropdown(printersList){
	$('#dynamicDropdown').empty();

	if(printersList.length > 0){	
		printersList.forEach(function(printer){
			textLine = '<span id="' + printer.split('|')[0] + '" class="block cursor-pointer text-xs text-gray-900 shadow-sm py-1 pl-2 mt-1">' + printer.split('|')[1] + '</span>';
			$('#dynamicDropdown').append(textLine);
		});
	}
	else{
		text = '<span id="" class="block italic text-sm text-center py-1">Aucun résultat</span>';
		$('#dynamicDropdown').append(text);
	}
	$('#dynamicDropdown').slideDown('fast');
	$('#dynamicDropdown').removeClass('hidden').addClass('absolute');
}

// On selecting a result
$('#dynamicDropdown').click(function(e){
	if(e.target.nodeName == 'SPAN' && e.target.id != ''){
		addPrinter(e.target.outerHTML, e.target.id);
	}
	$('#dynamicDropdown').slideUp('fast');
});


// Generate initial printers spans
$(document).ready(function(){
	if(typeof printers != 'undefined'){
		for(var i = 0; i < printers.length; i++){
			//console.log(printers[i]);
			textLine = '<span id="' + printers[i]['ID'] + '" class="block cursor-pointer text-xs text-gray-900 shadow-sm py-1 pl-2 mt-1">' + printers[i]['mark'] + ' ' + printers[i]['printer'] + '</span>';
			addPrinter(textLine, printers[i]['ID']);
		}
	}
});


// Add span to container
function addPrinter(printerSpan, printerID){
	selectedPrinters += printerID + '|';
	removeIcon = '<i class="fas fa-times ml-2 text-gray-500"></i>';
	printerSpan = printerSpan.substring(0, printerSpan.indexOf('</span>')) + removeIcon + '</span>';
	$('#selectedContainer').append(printerSpan);
	$('#printersField').attr('value',selectedPrinters);
}


// On click on remove icon
$('#selectedContainer').click(function(e){
	if(e.target.nodeName == 'I'){
		selectedPrinters = selectedPrinters.replace(e.target.parentNode.id + '|', '');
		$('#selectedContainer #' + e.target.parentNode.id).remove();
		$('#printersField').attr('value',selectedPrinters);
	}
});