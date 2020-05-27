$(document).ready(function(){
	nbArgs = $('#breadcrumb').children('a').length -1;

	if(nbArgs == 0)
		openMarkTab();
	else if(nbArgs == 1)
		openModelTab();
	else if(nbArgs == 2)
		openPrinterTab();
});

$('#collapse-marks').bind('click', function(e){
	if($('#collapsible-marks').attr('style') == 'display: none;')
		openMarkTab();
	else
		closeMarkTab();
});

$('#collapse-models').bind('click', function(e){
	if($('#collapsible-models').attr('style') == 'display: none;' && nbArgs >= 1)
		openModelTab();
	else
		closeModelTab();
});

$('#collapse-printers').bind('click', function(e){
	if($('#collapsible-printers').attr('style') == 'display: none;' && nbArgs >= 2)
		openPrinterTab();
	else
		closePrinterTab();
});

function openMarkTab(){
	$('#collapsible-marks').slideDown('slow');
	closeModelTab();
	closePrinterTab();
	$('#collapse-marks .fa-chevron-down').fadeOut("", function(){$('#collapse-marks .fa-chevron-up').fadeIn()});
}

function openModelTab(){
	$('#collapsible-models').slideDown('slow');
	closeMarkTab();
	closePrinterTab();
	$('#collapse-models .fa-chevron-down').fadeOut("", function(){$('#collapse-models .fa-chevron-up').fadeIn()});
	;
}

function openPrinterTab(){
	$('#collapsible-printers').slideDown('slow');
	closeMarkTab();
	closeModelTab();
	$('#collapse-printers .fa-chevron-down').fadeOut("", function(){$('#collapse-printers .fa-chevron-up').fadeIn()});
}

function closeMarkTab(){
	$('#collapsible-marks').slideUp('slow');
	$('#collapse-marks .fa-chevron-up').fadeOut("", function(){$('#collapse-marks .fa-chevron-down').fadeIn()});
}

function closeModelTab(){
	$('#collapsible-models').slideUp('slow');
	$('#collapse-models .fa-chevron-up').fadeOut("", function(){$('#collapse-models .fa-chevron-down').fadeIn()});
}

function closePrinterTab(){
	$('#collapsible-printers').slideUp('slow');
	$('#collapse-printers .fa-chevron-up').fadeOut("", function(){$('#collapse-printers .fa-chevron-down').fadeIn()});
}