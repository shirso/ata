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
    $(window).load(function(){
        if(typeof region_map!="undefined"){
            var canvas = $('#ata_region_map').children('canvas').get(0);
            var design = new fabric.Canvas(canvas, {
                selection: false,
                hoverCursor: 'normal',
                rotationCursor: 'default',
                centeredScaling: true
            });
            var designWidth = $('#ata_region_map').width();
            design.setHeight(500);
            design.setWidth(designWidth);
            var imageInstance= new fabric.Image(document.getElementById('ata_regionMapImage'), {
                top: 0,
                left: 0,
                id:"mainImage",
                scaleX: 1,
                scaleY: 1,
                lockMovementX: true,
                lockMovementY: true,
                lockRotation: true,
                lockScalingX: true,
                lockScalingY: true,
                lockUniScaling: true,
                hasBorders:false,
                hasControls:false
            });
            design.add(imageInstance);
            setTimeout(function(){
                $.each(ata_all_positions,function(k,v){
                    var dotimageInstance= new fabric.Image(document.getElementById('ata_dotImage'), {
                        top: parseInt(v.top)+26,
                        left:parseInt(v.left)+13,
                        id: v.id,
                        scaleX: 1,
                        scaleY: 1,
                        hoverCursor: 'pointer',
                        lockMovementX: true,
                        lockMovementY: true,
                        lockRotation: true,
                        lockScalingX: true,
                        lockScalingY: true,
                        lockUniScaling: true,
                        hasBorders:false,
                        hasControls:false
                    });
                    design.add(dotimageInstance);
                });
            },2000)
            design.on({
                'object:selected': function(opts) {
                     if (typeof opts.target.id != 'undefined') {
                          var id=  opts.target.id;
                         var objects=design.getObjects();
                         for (var i in objects) {
                             if(objects[i].id=="mainImage"){
                                 continue;
                             }
                             if(objects[i].id===id){
                                 objects[i].set({scaleX:1.5,scaleY:1.5});
                                 objects[i].filters.push(new fabric.Image.filters.Tint({color: '#996604'}));
                                 objects[i].applyFilters(design.renderAll.bind(design));
                                 loadRegionData(id);
                             }else{
                                 objects[i].set({scaleX:1,scaleY:1});
                                 objects[i].filters.push(new fabric.Image.filters.Tint({color: '#292f3d'}));
                                 objects[i].applyFilters(design.renderAll.bind(design));
                             }
                         }
                    }
                }
            });
        }
    });
    var loadRegionData=function(regionId){
        var data = {
            'action': 'get_region_data',
            'regionId': regionId
        };
        $.post(ata_data.ajaxurl, data, function(response) {
           $("#ata_region_content").html(response);
        });
    };
});