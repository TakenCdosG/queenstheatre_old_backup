$().ready(function(){
	$('div.calendar-calendar div.month-view a').unbind('click').attr('target', '_top');
	//preventLink();
	changeDateNav();
	shortDays();
	colorCalendar();
});

//This function change the text of the previous and next label in the calendar
function changeDateNav(){	
	$('div.date-prev span.next a', $('#main')).text('< Previous');
	$('div.date-next span.next a', $('#main')).text('Next >');
}

//This function short the days of the week in the main calendar
function shortDays(){
	var days = new Array('', 'SU', 'M', 'TU', 'W', 'TH', 'F', 'SA')

	$('div.calendar-calendar th.days', $('#main')).each(function(e){
		$(this).text(days[e]);
	})
}

//This function set the color of the mini calendar
function colorCalendar(){
	$('td', $('#main')).not('.empty, .week').each(function(e){
		if(e%2!=0 && e!=0){
			$(this).css('backgroundColor', '#efefef')
		}
	});
}

//This function prevent the default behavior of the day links in the calendar
function preventLink(){
	var links = $('div.calendar-calendar div.inner div.day > a').not('.calendar_tooltips-title-value a').add('div.calendar-calendar div.inner div.view-item a');
	
	links.css({
		'cursor': 'default',
		'text-decoration': 'none'
	}).attr('href', '');
	
	links.click(function(e){
		e.preventDefault();
	})
}