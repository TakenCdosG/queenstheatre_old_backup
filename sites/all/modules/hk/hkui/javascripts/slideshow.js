function slideshowWidget(element,speed){
  var current = 0;

  var cur = 0;
  var interval;
  var ind = 1;
  //inizializing
        
  $(element).css("position","relative");
  var maxHeight = 0;
  var items = $('.slide',element); 
  var current =  items.eq(0);     
 
    $('.slide',element)
    .each( function(){

      if($(this).height()>maxHeight){
        maxHeight = $(this).height();
      }      
    }).
    css("position","absolute").
    css("left",0).
    css("top",0).
    css("opacity","0.0");
    
    $(element).css('height',maxHeight);   
                                         
    $('.slide-0',element).css('z-index',2).css('opacity',1);
    $('.slideshow-page-'+0,element).addClass('active');
    
    $('.slideshow-page',element).click(function(){
      clearInterval(interval);
      slideshow(this.name);
    });    
    
    if(!speed){
      speed = 5050;
    }
    
    interval = setInterval(next,speed);
        
  function next(){
    
    if(cur==items.size()-1){
      cur = 0 
    }         
    else{
      cur++;  
    }
    slideshow(cur);
  }
     

  function slideshow(i){

    if(current==i){
      return;
    }
    
    if(ind==4){
       $('.slide',element).css('z-index',1);
       $('.slide-'+current,element).css('z-index',2);
       ind=2;
    }

    //$('.slide-'+current,element).css('z-index',1);
    $('.slide-'+i,element).css('opacity',0);
    ind++;
    
    $('.slide-'+i,element).css('z-index',ind).animate({opacity:1},
      function(){ 
       var last = current>0?current-1:items.size()-1;
       
        $('.slide-'+last,element).css("opacity","0.0");   
      }
    );
             
    $('.slideshow-page-'+current,element).removeClass('active');
    $('.slideshow-page-'+i,element).addClass('active');
    
    current = i;
  }      
};