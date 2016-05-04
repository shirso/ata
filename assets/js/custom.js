jQuery(function($){
    var windowWidth = $(window).width();
    var cyclic_div=$("#cyclic_slider_div");
    var all_cyclic_divs=cyclic_div.find(".cyclic_divs");
    var cyclic_div_count=all_cyclic_divs.length;
    var column_count=Math.round(12/(cyclic_div_count-1));
    var active_div=0;
    all_cyclic_divs.each(function(k,v){
        if(k==0){
            $("#slider_content_show").html($(v).find(".slider_content").html());
        }
        if(k>0){
            var html="";
            html+='<div class="col-sm-'+column_count+'">';
            html+='<div class="mm-btnn">';
            html+=$(v).find(".slider_button_content").html();
            html+='</div>';
            html+='</div>';
        }
        $("#slider_button_show").append(html);
    });
    $(document).on("click",".cyclic_button",function(e){
        e.preventDefault();
        var counting=$(this).data("counting");
        $("#slider_content_show").html($("#slider_no_"+counting).find(".slider_content").html());
        $(this).parent().html($("#slider_no_"+active_div).find(".slider_button_content").html());
        active_div=counting;
    });
    $(document).ready(function(){
        //jQuery('input, textarea').placeholder();
        //jQuery('.news ul li:last-child').css({ borderBottom: 'none' });


        $(".pg_header .navbar-nav>li,.pg_header_2 .navbar-nav>li").click(function (e) {
            if (windowWidth > 768) {
                $(this).find('.d-down').slideDown();
            }
            else { $(this).find('.d-down').slideToggle(); }
        });

        $(".srch").click(function (e) {
            e.preventDefault();
            if (windowWidth > 768) {
                $(".srch-frm").slideToggle(200);
            }
        });


        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            auto: true,
            speed:2000
        });
        $(".flltrbtn").click(function (e) {
            e.preventDefault();
            $(".oppflt").slideToggle(300);
        });

        $(".flt-bxx>ul>li").click(function () {
            $(this).find("ul").slideToggle();
        });

        $(".nbartgl").click(function () {
            if (windowWidth < 768) {
                $(this).toggleClass("shnbtn");
                $(".hedlnk-sec").toggleClass("fl");
                $(".navbar-collapse").toggleClass("fl2");
            }
        })
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 50) {
                $('.pg_header .lg-sec').addClass('lgsrl');
                $('.pg_header_2').addClass('stkyhdr');
                $('.pg_header:after').css("height","170%");
                $('.navbar').addClass('tpup');
                $('.hedlnk-sec').addClass('tpup2');
                $('.totop-btn').addClass('dnon');
            }
            else {
                $('.lg-sec').removeClass('lgsrl');
                $('.pg_header_2').removeClass('stkyhdr');
                $('.pg_header:after').css("height","260%");
                $('.navbar').removeClass('tpup');
                $('.hedlnk-sec').removeClass('tpup2');
                $('.totop-btn').removeClass('dnon');
            }
        });

        $(".totop-btn").click(function () {
            $('html, body').animate({
                scrollTop: "0px"
            }, 400);
        });

        $('.grid').masonry({
            itemSelector: '.grid-item'
        });
    });
    $(window).on( 'resize', function () {
        windowWidth=$(window).width();
        $(".nbartgl").click(function () {
            if (windowWidth < 768) {
                $(this).toggleClass("shnbtn");
                $(".hedlnk-sec").toggleClass("fl");
                $(".navbar-collapse").toggleClass("fl2");
            }
        })
    });
});