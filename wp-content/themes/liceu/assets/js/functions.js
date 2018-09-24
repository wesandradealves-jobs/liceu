function videos(e){
	var el = $(e),
		url = el.attr("data-video");

		el.parent().find(".-active").not(el).removeClass("-active"),
		el.addClass("-active")

		$('.embed-container').empty().append('<iframe src="'+url+'" width="100%" height="100%" />');
}
function checkBlur(){
	var navigation = $(".navigation.-mobile");
	if(!navigation.is(".-toggle"))
		$("body").addClass("blur")
}
function closeMenu(){
	$(".navigation.-mobile").removeClass("-toggle"),
	$(".tcon-transform").removeClass("tcon-transform"),
	$(".blur").removeClass("blur");
}
function header(){
	var header = $(".header");

    $(window).scroll(function() {
        var t = $(this).scrollTop();
        if (t > 0){
            header.addClass("-scrolled");
        } else {
            header.removeClass("-scrolled");
        }
        closeMenu();
    });	
}
function _mobileNavigation(){
	checkBlur(),
    $(".tcon").toggleClass("tcon-transform");
    if($(".tcon").is(".tcon-transform")){
        $(".navigation.-mobile").addClass("-toggle");
    } else {
        $(".navigation.-mobile").removeClass("-toggle");
    }
} 
$(document).mouseup(function (e){
    var container = $(".navigation.-mobile ul li");
    if (!container.is(e.target) 
    && container.has(e.target).length === 0) 
    {
        closeMenu()
    }
});
$(window).on("resize", function () {
    closeMenu()   
});
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function soLetras(v){
    return v.replace(/\d/g,"") //Remove tudo o que não é Letra
}
$(document).ready(function () {
	$('.galeria').owlCarousel({
	    dots:false,
	    loop:true,
	    margin:30,
	    nav:true,
		responsive : {
		    0 : {
		    	items: 1
		    },
		    768 : {
		    	items: 3
		    },
		    1024 : {
		    	items: 6
		    }
		}	    
	});	
	$('.owl-carousel').owlCarousel({
	    dots:false,
	    items:3,
	    loop:true,
	    margin:30,
	    nav:true,
		responsive : {
		    0 : {
		    	items: 1
		    },
		    768 : {
		    	items: 3
		    }
		}	    
	});
	header();
	$( ".navigation a" ).each(function() {
		var href = $(this).attr("href");
		if(href.indexOf("#") == 0){
			$(this).attr("href", "http://localhost/liceu/#"+href.split("#").pop());
		}
	});
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });
});
      
      