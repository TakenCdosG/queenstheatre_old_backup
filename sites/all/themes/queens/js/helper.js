$().ready(function(){
	$('a.pretty-lightbox').prettyPhoto();
	homeSlideshow();
	bucketHover();
	$('#edit-submit, #edit-submit-1, #edit-submit-2, #edit-submit-3, #edit-submit-4', $('#body-menu')).attr('value', '');
	searchField();
	colorMiniCalendar();
	shortDaysMini();
	eventCatHeight();
	categoryDates();
	eventSlideshow();
	breadCrumb();
	controlPanel();
	cpHover();
	linkMiniCalendar();
	searchValue();
	fixCalendarURLS();
	unableMiniCalendarDay();
	faqAccordeon();
});

//This function initialize the home slideshow
function homeSlideshow(){
	$('.slides', $('#body-slideshow-image')).each(function(e){
		var slide = $(this);
		
		if(e!=0) slide.css('display', 'none')
	})
		homeSlideshowNav();
		setTimeout('homeAutoSlideshow(1)', 6000);
}

//This fnction make the slideshow slide when click on a item in the menu nav
function homeSlideshowNav(){
	$('.nav', $('#slideshow-nav')).unbind('click').bind('click', function(){
		var nav = $(this);
		var num = nav.attr('name');
		var slide = $('div.slides:eq('+num+')', $('#body-slideshow-image'));
		
		//Cancel auto slide
		$('#body-slideshow-image').attr('data-auto', '0');
		
		if(slide.is(':hidden')){
			////Change background to the active nav num
			$('.nav-active', $('#slideshow-nav')).removeClass('nav-active');
			nav.addClass('nav-active');
			//Make visible the select slide
			$('div.slides:visible', $('#body-slideshow-image')).fadeOut(300, function(){
				slide.fadeIn(300)
			});
		}
	})
}

//This function make the slideshow auto slide
function homeAutoSlideshow(cont){
	var max = $('.slides', $('#body-slideshow-image')).length;
		
	if($('#body-slideshow-image').attr('data-auto')!=0){

		var slide = $('div.slides:eq('+cont+')', $('#body-slideshow-image'));
		
			//Change background to the active nav num
			$('.nav-active', $('#slideshow-nav')).removeClass('nav-active');
			$('.nav:eq('+cont+')', $('#slideshow-nav')).addClass('nav-active');
			//Make visible the select slide
			$('div.slides:visible', $('#body-slideshow-image')).fadeOut(300, function(){
				slide.fadeIn(300)
			});
		
		if(cont >= (max-1)) setTimeout('homeAutoSlideshow(0)', 6000);
			else setTimeout('homeAutoSlideshow('+(cont+1)+')', 6000);
	}
}

//This function create the hover effect on the image buckets
function bucketHover(){
	//MOUSE ENTER
	$('div.bucket', $('#bucket-wrapper')).mouseenter(function(){
		var hover = $(this).children('.bucket-hover');
		hover.stop(true).animate( { marginTop: '-205' }, { duration: 600 } );
	});
	//MOUSE LEAVE
	$('div.bucket', $('#bucket-wrapper')).mouseleave(function(){
		var hover = $(this).children('.bucket-hover');
		hover.stop(true).animate( { marginTop: '0' }, { duration: 600 } );
	});
}

//This function set the color of the mini calendar
function colorMiniCalendar(){
	$('td', $('#mini-calendar')).not('.empty').each(function(e){
		if(e%2!=0 && e!=0){
			if($(this).hasClass('today')!=true) $(this).css('backgroundColor', '#efefef')
		}
	});
}

//This function initialize the event slideshow
function eventSlideshow(){
	$('.event-nav', $('#event-slideshow-nav')).unbind('click').bind('click', function(){
		var nav = $(this);
		var name = nav.attr('name');
	
		var slide = $('div.event-slide[name="'+name+'"]', $('#event-slideshow'));
		
		if(slide.is(':hidden')){
			////Change background to the active nav num
			$('.event-nav-active', $('#event-slideshow-nav')).removeClass('event-nav-active');
			nav.addClass('event-nav-active');
			//Make visible the select slide
			$('div.event-slide:visible', $('#event-slideshow')).fadeOut(300, function(){ slide.fadeIn(300) });
		}
	})	
}

//This function format the breadcrumb
function breadCrumb(){
	if($('#internal-breadcrumb').length>0){
		var str = $('#internal-breadcrumb').html();
		$('#internal-breadcrumb').html(str.replace(/\u00BB/g, '\u003E'));
	}
}

//This function short the days of the week in the mini-calendar
function shortDaysMini(){
	var days = new Array('SU', 'M', 'TU', 'W', 'TH', 'F', 'SA')

	$('#mini-calendar div.calendar-calendar th.days').each(function(e){
		$(this).text(days[e]);
	})
}

//This function set equal height for one row in the category pages
function eventCatHeight(){
	$('div.views-row-odd', $('#category-wrapper')).each(function(){
		var item = $(this);
		var height = item.height();
		var evenHeight = item.next().height();
		
			if(height>evenHeight) item.next().height(height);
				else item.height(item.next().height());
	});
}

//This function set the margin right for the 5 item in every section of the control panel
function controlPanel(){
	$('fieldset', $('#hkui-administrator')).each(function(e){
		$('div.hkui-administrator-item', $(this)).each(function(i){
			var a = i+1;
			if(a%6==0 && a!=0) $(this).css('marginRight', '0px')
		});
	});
}

//This function control the hover effect on the control panel items
function cpHover(){
	//MOUSE ENTER
	$('div.hkui-administrator-item', $('#hkui-administrator')).mouseenter(function(){
		if($(this).hasClass('cp-hover')==false) $(this).addClass('cp-hover');
	});
	//MOUSE LEAVE
	$('div.hkui-administrator-item', $('#hkui-administrator')).mouseleave(function(){
		if($(this).hasClass('cp-hover')==true) $(this).removeClass('cp-hover');
	});	
}

//This function change the link of the month in the mini calendar
function linkMiniCalendar(){
	if($('#mini-calendar').length>0){
		$('div.date-heading h3 a', $('#mini-calendar')).attr('href', '#');
	}
}

//This function add or remove the phone field text
function searchField(){
	var field = $('div.container-inline input[type="text"]', $('#body-menu'));
	
	field.val('Search');
	
	field.unbind('mouseenter').bind('mouseenter', function(){
		if($(this).val() == 'Search') $(this).val('');
	})
	
	field.unbind('mouseleave').bind('mouseleave', function(){
		if($(this).val() == '') $(this).val('Search');
	})
}

//This function show only 2 dates in the categories
function categoryDates(){
	$('div.category-event-date div:last-child', $('#category-wrapper')).each(function(){
		var item = $(this);
		var date_1 = item.parent().find('div:first-child').text();
		var date_2 = item.text();
		var text = item.html();

			if( (date_1 != date_2) ){
				item.html('<span>-</span>'+text);
				item.css('display', 'block');
			}
	});
}

//This function remove the value for the search input
function searchValue(){
	$('div.container-inline input[type="submit"]', $('#search-right')).attr('value', '')
}

//Tis function fix the mini-calendar url
function fixCalendarURLS(){
	if($("#block-views-calendar-calendar_block_1").size()>0){
		var daysarr = new Array();

		$(".calendar_tooltips-title-value").each(function(){
			var day = $(this).parents(".calendar_tooltips").prev().text();
			
			if(daysarr[day]==null){
				var url = $(this).find("a").attr("href");
				$(this).parents(".calendar_tooltips").prev().attr("href",url);
				daysarr[day] = true;
			}
		});
	}
}

//This function disable the links on the days at the mini-calendar
function unableMiniCalendarDay(){
	if($('#block-views-calendar-calendar_block_1').length > 0){
		var links = $('div.calendar-calendar > div.month-view > table.mini > tbody > tr > td > div.month > a', $('#mini-calendar'));
	
		links.css({ 'cursor': 'default' });
	
		links.click(function(e){
			e.preventDefault();
		})
	}
}

//This function create the accordeon effect in the faq section
function faqAccordeon(){
	$('div.faqtitle', $('#internal-body-text')).click(function(){
		$(this).next().slideToggle('normal');
	});
}