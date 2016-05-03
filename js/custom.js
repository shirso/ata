function sameheight(classname,width){
	var windowWidth = $(window).width();
	if(windowWidth>width){
	var highestBox = 0;
	 $('.'+classname).each(function(){  
            if($(this).height() > highestBox){  
            highestBox = $(this).height();  
        }
	 });
	  $('.'+classname).height(highestBox);	
	}else{
		$('.'+classname).css("height", "auto");
		}
}
$(document).ready(function(){
	 jQuery('input, textarea').placeholder();
	 
	  $('.nav li.dropdown').hover(function() {
        $(this).addClass('open');
    }, function() {
        $(this).removeClass('open');
    });
	 
 });
 $(window).on( 'resize', function () {
	 sameheight('same-height','768');
	  });
	   $(window).on( 'load', function () {
	sameheight('same-height','768');
	  });
//slide-toggle
$(document).ready(function(){
  $(".team").click(function(){
$(this).find('p').slideToggle('slow');
  });

  var $toggle1=0;
  var elements1 = $(".cus-li");
var numbuttons1 = elements1.length;
var j = 0;
   $(".showmore a").click(function(e){
       if(university_isLink !=='Yes'){
	 e.preventDefault();
$('.cus-li').toggle(0,function(){
	if($toggle1==0){
	$(this).css('display','inline-block');
	  j++;
	   if(j == numbuttons1) {
		   $toggle1=1;
		    $(".showmore a").html(university_showless);
		   }
	}else{
		$(this).css('display','none');
		j--;
		if(j == 0) {
		   $toggle1=0;
		    $(".showmore a").html(university_showmore);
		   }
		}
	});
       } else{
           return true;
       }
 });  
//other one
  var $toggle=0;
  var elements = $(".li-sl");
var numbuttons = elements.length;
var i = 0;

   $(".other-citis a").click(function(e){
       if(cities_isLink !=='Yes'){
	 e.preventDefault();
$('.li-sl').toggle(0,function(){
	if($toggle==0){
	$(this).css('display','inline-block');
	  i++;
	   if(i == numbuttons) {
		   $toggle=1;
            $(".other-citis a").html(other_cities_showless);
		   }
	}else{
		$(this).css('display','none');
		i--;
		if(i == 0) {
		   $toggle=0;
            $(".other-citis a").html(other_cities_showmore);
		   }
		}
	});
    }else{
        return true;
    }
 });
  
});






