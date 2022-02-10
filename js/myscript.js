$(document).scroll(function() {
    if($(window).scrollTop() > 50){
        $('#backtotop').css("display","block");
    }else if($(window).scrollTop() < 50){        
        $('#backtotop').css("display","none");
    }    
});

$(document).ready(function(){
    var isshowcount = false;
    $("#main-nav>.topnav>ul>li:not(:last-child)").on("click", function(e){
        $("#main-nav>.topnav>ul").find("a").removeClass("current");        
        var aselector = $(this).find("a");
        aselector.addClass("current");
        // this.classList.add("current");
        $("#main-nav").find(".topnav").removeClass("responsive");
        console.log(this);
    });
    
    $('#section-facts').hover(function(){
        if(!isshowcount){
            isshowcount = ShowCount(isshowcount);
        }        
    });
    iframwidth = screen.width * 0.8;
    iframheight = screen.height * 0.6;
    
    // mobile view
    if (screen.width < 768) {
        $('body').addClass('mobile-view');
        document.getElementById("myFrame").width = "680";
        document.getElementById("myFrame").width = "420";
    }else if( screen.width >= 768 && screen.width <= 820){
        $('body').addClass('tab-view');
        $('#section-accordion').toggleClass('col-xs-9').toggleClass('col-xs-11');
        $('#section-goal').toggleClass('col-xs-9').toggleClass('col-xs-11');
        $('#section-partnering').toggleClass('col-xs-9').toggleClass('col-xs-11');
        $('#section-services').toggleClass('col-xs-9').toggleClass('col-xs-11');
        $('#section-service-items').toggleClass('col-xs-9').toggleClass('col-xs-11');
        $('#footer-body').toggleClass('col-xs-10').toggleClass('col-xs-11');
    }else{
        document.getElementById("myFrame").width = iframwidth;
        document.getElementById("myFrame").height = iframheight;
    }
    if(screen.height < 770){
        $('#contact-page').css('height', '935px');
        // $('.contact-curved-upper').css('top', '-530px');
    }
});
function ShowCount(isshowcount){
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    isshowcount = true;
    return isshowcount;
}
// When the user clicks on the button, scroll to the top of the document
function GoToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
        $('#content').css("padding-top","200px");
        $('.arch').css("padding-top","200px");
    } else {
        x.className = "topnav";
        $('#content').css("padding-top","0px");
        $('.arch').css("padding-top","6em");
    }
}

function loadReport(report_no){
    location.href = "report_" + report_no;
}